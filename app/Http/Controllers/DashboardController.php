<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Services\LeadService;
use App\Services\NormalizeIdsService;
use Flasher\Laravel\Facade\Flasher;
use App\Traits\TaskEventTrait;

class DashboardController extends Controller
{
    use TaskEventTrait;
    protected $leadService;
    protected $normalizeIdsService;

    public function __construct(LeadService $leadService, NormalizeIdsService $normalizeIdsService)
    {
        $this->leadService = $leadService;
        $this->normalizeIdsService = $normalizeIdsService;
    }

    private function hasDateRange($dateRange): bool
    {
        return !empty($dateRange)
            && !empty($dateRange['start'])
            && !empty($dateRange['end']);
    }

    private function dashboardCacheKey(string $name, array $parts = []): string
    {
        $payload = array_merge([
            'user_id' => Session::get('user_id'),
            'child_ids' => Session::get('child_ids'),
        ], $parts);

        return 'dashboard:' . $name . ':' . md5(json_encode($payload));
    }

    private function rememberDashboard(string $name, array $parts, int $seconds, callable $callback)
    {
        try {
            return Cache::remember($this->dashboardCacheKey($name, $parts), $seconds, $callback);
        } catch (\Throwable $e) {
            return $callback();
        }
    }

    private function getCombinedFollowups($dateRange = [], $perPage = 10, $tab = 'today')
    {
        $today = now()->format('Y-m-d');
        $tomorrow = now()->addDay()->format('Y-m-d');
        $userId = Session::get('user_id');
        $childIds = Session::get('child_ids');
        $childIds = $this->normalizeIdsService->normalize($childIds);

        $dateRangeValid = !empty($dateRange) && isset($dateRange['start'], $dateRange['end']) && $dateRange['start'] && $dateRange['end'];

        $baseQuery = function ($status = null, $remindDate = null, $typeLabel = null) use ($childIds, $dateRangeValid, $dateRange) {
            return DB::table('leads as a')
                ->join('users as b', 'b.id', '=', 'a.user_id')
                ->leftJoin('projects as c', 'c.id', '=', 'a.project_id')
                ->select(
                    'a.id',
                    'a.name',
                    'a.status',
                    'a.phone',
                    'a.whatsapp_no',
                    'a.remind_date',
                    'a.remind_time',
                    'a.source',
                    'a.campaign',
                    DB::raw("'$typeLabel' as type"),
                    DB::raw("'$typeLabel' as type_label"),
                    DB::raw("CONCAT(a.remind_date, ' ', a.remind_time) as datetime"),
                    'b.name as agent_name',
                    'b.role',
                    'c.project_name',
                    'a.classification',
                    'a.last_comment'
                )
                // ->when($remindDate !== null, function ($q) use ($remindDate) {
                //     if (is_array($remindDate)) {
                //         [$operator, $value] = $remindDate;
                //         return $q->whereDate('a.remind_date', $operator, $value);
                //     } else {
                //         return $q->whereDate('a.remind_date', $remindDate);
                //     }
                // })
                ->when($remindDate !== null, function ($q) use ($remindDate) {
                    if (is_array($remindDate)) {
                        [$operator, $value] = $remindDate;
                        if ($operator === 'between') {
                            return $q->whereBetween('a.remind_date', $value);
                        }

                        return $q->where('a.remind_date', $operator, $value);
                    } else {
                        return $q->where('a.remind_date', $remindDate);
                    }
                })
                ->when($status !== null, fn($q) => $q->where('a.status', $status))
                ->when(!empty($childIds), fn($q) => $q->whereIn('a.user_id', $childIds))
                ->when($dateRangeValid, fn($q) => $q->whereBetween('a.lead_date', [$dateRange['start'], $dateRange['end']]));
        };
        if ($tab === 'today') {
            $queries = [
                $baseQuery('CALL SCHEDULED', $today, 'Call'),
                $baseQuery('VISIT SCHEDULED', $today, 'Visit'),
                $baseQuery('INTERESTED', $today, 'Interested'),
                $baseQuery('WHATSAPP', $today, 'WhatsApp'),
                $baseQuery('MEETING SCHEDULED', $today, 'Meeting')
            ];

            $unionQuery = null;
            foreach ($queries as $index => $query) {
                if ($index === 0) {
                    $unionQuery = $query;
                } else {
                    $unionQuery = $unionQuery->unionAll($query);
                }
            }

            return DB::table(DB::raw("({$unionQuery->toSql()}) as combined"))
                ->mergeBindings($unionQuery)
                ->orderBy('datetime')
                ->paginate($perPage);
        }
        if ($tab === 'tomorrow') {
            $queries = [
                $baseQuery('CALL SCHEDULED', $tomorrow, 'Call'),
                $baseQuery('VISIT SCHEDULED', $tomorrow, 'Visit'),
                $baseQuery('WHATSAPP', $tomorrow, 'WhatsApp'),
                $baseQuery('MEETING SCHEDULED', $tomorrow, 'Meeting'),
                $baseQuery('INTERESTED', $tomorrow, 'Interested')
            ];

            $unionQuery = null;
            foreach ($queries as $index => $query) {
                if ($index === 0) {
                    $unionQuery = $query;
                } else {
                    $unionQuery = $unionQuery->unionAll($query);
                }
            }

            return DB::table(DB::raw("({$unionQuery->toSql()}) as combined"))
                ->mergeBindings($unionQuery)
                ->orderBy('datetime')
                ->paginate($perPage);
        }

        if ($tab === 'next7days') {
            $next7Days = now()->addDays(7)->format('Y-m-d');
            $queries = [
                $baseQuery('CALL SCHEDULED', ['between', [$tomorrow, $next7Days]], 'Call'),
                $baseQuery('VISIT SCHEDULED', ['between', [$tomorrow, $next7Days]], 'Visit'),
                $baseQuery('WHATSAPP', ['between', [$tomorrow, $next7Days]], 'WhatsApp'),
                $baseQuery('MEETING SCHEDULED', ['between', [$tomorrow, $next7Days]], 'Meeting'),
                $baseQuery('INTERESTED', ['between', [$tomorrow, $next7Days]], 'Interested')
            ];

            $unionQuery = null;

            foreach ($queries as $index => $query) {
                if ($index === 0) {
                    $unionQuery = $query;
                } else {
                    $unionQuery = $unionQuery->unionAll($query);
                }
            }

            return DB::table(DB::raw("({$unionQuery->toSql()}) as combined"))
                ->mergeBindings($unionQuery)
                ->orderBy('datetime')
                ->paginate($perPage);
        }

        if ($tab === 'missed') {
            $missedQuery = $baseQuery(null, ['<', $today], 'Missed')
                ->whereIn('a.status', ['CALL SCHEDULED', 'VISIT SCHEDULED', 'WHATSAPP', 'INTERESTED', 'MEETING SCHEDULED']);

            return $missedQuery->orderBy('a.remind_date')->paginate($perPage);
        }

        return collect();
    }

    public function dashboard(Request $request)
    {
        $sessionToken = Session::get('token');
        $userId = Session::get('user_id');
        $user = DB::table('users')->where('id', $userId)->first();
        $userType = Session::get('user_type');

        if ($userType == 'post_sale') {
            return redirect()->route('task.list');
        }
        if (!$user || $user->token !== $sessionToken) {
            Session::flush();
            Flasher::addError('Someone else has logged in with your account. You have been logged out');
            return redirect('/')->withErrors('Logut succesfully')->withInput();
        }

        $childIds = Session::get('child_ids');
        $selectedAgentId = $request->input('agent_id');
        if ($selectedAgentId) {
            $childIds = $selectedAgentId;
        }
        $length = $request->query('length', 10);
        $agents = DB::table('users')
            ->whereIn('id', explode(',', Session::get('child_ids')))
            ->orderBy('name')
            ->get(['id', 'name']);

        $allocatedLeadCount = DB::table('leads as a')
            ->where(function ($query) {
                $query->where('a.status', 'allocated_lead')
                    ->orWhereNull('a.status')
                    ->orWhere('a.status', '');
            })
            ->whereIn('a.user_id', explode(',', $childIds))
            ->where('a.is_allocated', '!=', $userId)
            ->leftJoin('users as b', 'b.id', '=', 'a.user_id')
            ->leftJoin('projects as c', 'c.id', '=', 'a.project_id')
            ->select(
                'a.*',
                'b.name as agent',
                'b.role',
                'c.project_name as project_name'
            )
            ->orderBy('a.id', 'desc')
            ->paginate($length);

        $unallocatedLeadCount = DB::table('leads as a')
            ->join('users as b', 'b.id', '=', 'a.user_id')
            ->leftJoin('projects as c', 'c.id', '=', 'a.project_id')
            ->select(
                'a.*',
                'b.name as agent',
                'b.role',
                'c.project_name as project_name'
            )
            ->where('a.unallocated_lead', 1)
            ->where('a.is_allocated', $userId)
            ->orderByDesc('a.id')
            ->paginate($length);

        $advertisement = DB::table('advertisements')
            ->where('is_active', 1)
            ->orderBy('id', 'desc')
            ->first();

        if ($advertisement) {
            if ($advertisement->features && is_string($advertisement->features)) {
                $advertisement->features = json_decode($advertisement->features, true) ?? [];
            }
        }

        $user_type = Session::get('user_type');
        $childIds = $this->normalizeIdsService->normalize($childIds);
        $dateRange = $this->getDateRange($request);

        $projects = DB::table('projects')->orderBy('project_name')->get();
        $cities = DB::table('state_district')->orderBy('District', 'asc')->get();
        $sources = DB::table('sources')->orderBy('name')->get();
        $cacheParts = [
            'child_ids' => $childIds,
            'date_start' => $dateRange['start'] ? (string) $dateRange['start'] : null,
            'date_end' => $dateRange['end'] ? (string) $dateRange['end'] : null,
            'agent_id' => $selectedAgentId,
            'year' => $request->input('year'),
            'datasearch' => $request->input('datasearch'),
        ];

        $taskStats = $this->rememberDashboard('task_stats', $cacheParts, 60, fn() => $this->getTaskStatistics($childIds, $dateRange));
        $taskIds = $this->rememberDashboard('task_ids', $cacheParts, 60, fn() => $this->getTaskIds($childIds));
        $task_all_comments = $this->rememberDashboard('task_comments', $cacheParts, 60, fn() => $this->getTaskComments($taskIds, $dateRange));
        $transferredToUserIds = $this->rememberDashboard('transferred_ids', $cacheParts, 60, fn() => $this->leadService->getTransferredLeadIds($userId));
        $leadStats = $this->rememberDashboard('lead_stats', $cacheParts, 60, fn() => $this->leadService->getLeadStatistics(
            $userId,
            $transferredToUserIds,
            $dateRange,
            $childIds
        ));

        $transferLeadCount = $this->rememberDashboard('transfer_count', $cacheParts, 60, fn() => $this->getTransferLeadCount($childIds, $dateRange));
        $childIdsArr = is_array($childIds) ? $childIds : explode(',', $childIds);

        $transferredLeadCount = $this->rememberDashboard('transferred_count', $cacheParts, 60, fn() => DB::table('transfer_leads')
            ->whereIn('to', $childIdsArr)
            ->count());
        $monthsReport = $this->rememberDashboard('monthly_report', $cacheParts, 60, fn() => $this->getMonthlyLeadReport(
            $request->input('year'),
            $request->input('datasearch'),
            $dateRange,
            $childIds
        ));

        $convertedLeads = $this->getConvertedLeads($childIds, $dateRange);
        $upcomingBirthdays = $this->rememberDashboard('birthdays', $cacheParts, 300, fn() => $this->getUpcomingBirthdays($dateRange));
        $upcomingAnniversaries = $this->rememberDashboard('anniversaries', $cacheParts, 300, fn() => $this->getUpcomingAnniversaries($dateRange));
        $events = $this->rememberDashboard('events', $cacheParts, 60, fn() => $this->getCombinedEvents($dateRange, $childIds));
        $followups = $this->rememberDashboard('followups', $cacheParts, 60, fn() => $this->getFollowups($dateRange, $childIds));
        $availableYears = $this->rememberDashboard('years', $cacheParts, 300, fn() => $this->getAvailableYears($childIds, $dateRange));
        $selectedYear = $request->input('year', date('Y'));
        $statuses = $this->rememberDashboard('statuses', $cacheParts, 300, fn() => $this->getLeadStatuses($childIds, $dateRange));
        $campaignData = $this->rememberDashboard('campaign_data', $cacheParts, 60, fn() => $this->getCampaignAnalysisData($childIds, [], $dateRange));
        $categorys = DB::table('inv_catg')->get();
        $users = DB::table('users')->select('id', 'name')->get();
        $sources = DB::table('sources')->get();
        $campaigns = DB::table('campaigns')->get();
        $projects = DB::table('projects')->get();
        $cities = DB::table('state_district')->orderBy('District', 'asc')->get();
        $task_owner = Session::get('user_id');
        $selectedAgent = $selectedAgentId;
        $calendarEvents = $this->rememberDashboard('calendar_events', $cacheParts, 60, fn() => $this->getCalendarEvents($childIds, $dateRange));
        $lead_statuses = DB::table('lead_statuses')
            ->whereNotIn('system_name', ['BOOKED', 'Completed', 'Cancelled'])
            ->get();
        return view('index', compact(
            'taskStats',
            'categorys',
            'sources',
            'campaigns',
            'projects',
            'cities',
            'advertisement',
            'leadStats',
            'monthsReport',
            'convertedLeads',
            'dateRange',
            'allocatedLeadCount',
            'unallocatedLeadCount',
            'upcomingBirthdays',
            'upcomingAnniversaries',
            'campaignData',
            'events',
            'lead_statuses',
            'followups',
            'availableYears',
            'selectedYear',
            'transferLeadCount',
            'task_all_comments',
            'sources',
            'statuses',
            'task_owner',
            'userType',
            'agents',
            'selectedAgent',
            'calendarEvents',
            'transferredLeadCount'
        ));
    }

    private function getDateRange(Request $request)
    {
        if ($request->filled('start_date') && $request->filled('end_date')) {
            return [
                'start' => Carbon::parse($request->input('start_date'))->startOfDay(),
                'end' => Carbon::parse($request->input('end_date'))->endOfDay()
            ];
        } elseif ($request->filled('dateRange')) {
            $dates = explode(' - ', $request->input('dateRange'));
            // echo '<pre>'; print_r($dates); exit;
            return [
                'start' => Carbon::parse($dates[0])->startOfDay(),
                'end' => Carbon::parse($dates[1])->endOfDay()
            ];
        }
        return [
            'start' => null,
            'end' => null,
        ];
    }

    private function getTaskStatistics($childIds = [], $dateRange = [])
    {
        return DB::table('task_user as tu')
            ->join('tasks as t', 'tu.task_id', '=', 't.id')
            ->select(
                DB::raw('COUNT(DISTINCT t.id) as total_task'),
                DB::raw("SUM(CASE WHEN t.status = 'pending' THEN 1 ELSE 0 END) as pending_task"),
                DB::raw("SUM(CASE WHEN t.status = 'completed' THEN 1 ELSE 0 END) as completed_task")
            )
            ->when(!empty($childIds), fn($q) => $q->whereIn('tu.user_id', $childIds))
            ->when(
                !empty($dateRange) && isset($dateRange['start'], $dateRange['end']) && $dateRange['start'] && $dateRange['end'],
                fn($q) => $q->whereBetween('t.created_at', [$dateRange['start'], $dateRange['end']])
            )
            ->first();
    }

    private function getTaskIds($childIds)
    {
        return DB::table('task_user')
            ->whereIn('user_id', $childIds)
            ->select('task_id')
            ->distinct()
            ->pluck('task_id');
    }

    private function getTaskComments($taskIds, $dateRange)
    {
        return DB::table('task_comment')
            ->whereIn('task_id', $taskIds)
            ->whereNotNull('comment')
            ->when($this->hasDateRange($dateRange), fn($q) => $q->whereBetween('created_at', [$dateRange['start'], $dateRange['end']]))
            ->latest('id')
            ->limit(500)
            ->get()
            ->groupBy('task_id');
    }

    private function getTransferLeadCount($childIds = [], $dateRange = [])
    {
        return DB::table('leads')
            ->where('status', 'TRANSFER LEAD')
            ->when(!empty($childIds), function ($query) use ($childIds) {
                $query->whereIn('user_id', $childIds);
            })
            ->when($this->hasDateRange($dateRange), function ($query) use ($dateRange) {
                $query->whereBetween('created_at', [$dateRange['start'], $dateRange['end']]);
            })
            ->count();
    }

    private function getMonthlyLeadReport($year = null, $dataSearch = null, $dateRange = [], $childIds = null): array
    {
        $userId = session('user_id');
        if ($childIds === null) {
            $childIds = Session::get('child_ids');
            $childIds = $this->normalizeIdsService->normalize($childIds);
        }

        $year = $year ?: date('Y');

        $query = DB::table('leads')
            ->select(DB::raw('COUNT(*) as total'), DB::raw('MONTH(lead_date) as month'))
            ->whereYear('lead_date', $year)
            ->when($this->hasDateRange($dateRange), fn($q) => $q->whereBetween('lead_date', [$dateRange['start'], $dateRange['end']]));
        $userIds = is_array($childIds) ? $childIds : explode(',', $childIds);

        if ($dataSearch === 'Team') {
            $query->whereIn('user_id', $userIds)
                ->where('user_id', '!=', $userId);
        } elseif ($dataSearch === 'Self') {
            $query->where('user_id', $userId);
        } else {
            $query->whereIn('user_id', $userIds);
        }

        $results = $query->groupBy(DB::raw('MONTH(lead_date)'))->get();

        $monthsReport = array_fill(0, 12, 0);
        foreach ($results as $row) {
            $idx = (int)$row->month - 1;
            if ($idx >= 0 && $idx <= 11) {
                $monthsReport[$idx] = $row->total;
            }
        }
        return $monthsReport;
    }

    private function getConvertedLeads($childIds, $dateRange)
    {
        return DB::table('leads as a')
            ->join('users as b', 'a.user_id', '=', 'b.id')
            ->select('a.*', 'b.name as agent', 'b.role', 'a.name', 'a.updated_date')
            ->where('a.status', 'CONVERTED')
            ->when(!empty($childIds), fn($q) => $q->whereIn('a.user_id', $childIds))
            ->when($this->hasDateRange($dateRange), fn($q) => $q->whereBetween('a.lead_date', [$dateRange['start'], $dateRange['end']]))
            ->orderBy('a.updated_date', 'desc')
            ->paginate(10);
    }

    private function getUpcomingBirthdays($dateRange = [])
    {
        return DB::table('users')
            ->join('leads', 'users.id', '=', 'leads.user_id')
            ->select('users.name', 'leads.app_dob')
            ->whereMonth('leads.app_dob', Carbon::now()->month)
            ->whereDay('leads.app_dob', '>=', Carbon::now()->day)
            ->when(
                !empty($dateRange) && isset($dateRange['start'], $dateRange['end']) && $dateRange['start'] && $dateRange['end'],
                fn($q) => $q->whereBetween('leads.lead_date', [$dateRange['start'], $dateRange['end']])
            )
            ->orderByRaw('MONTH(leads.app_dob), DAY(leads.app_dob)')
            ->limit(5)
            ->get();
    }

    private function getUpcomingAnniversaries($dateRange = [])
    {
        return DB::table('users')
            ->join('leads', 'users.id', '=', 'leads.user_id')
            ->select('users.name', 'leads.app_doa')
            ->whereMonth('leads.app_doa', Carbon::now()->month)
            ->whereDay('leads.app_doa', '>=', Carbon::now()->day)
            ->when(
                !empty($dateRange) && isset($dateRange['start'], $dateRange['end']) && $dateRange['start'] && $dateRange['end'],
                fn($q) => $q->whereBetween('leads.lead_date', [$dateRange['start'], $dateRange['end']])
            )
            ->orderByRaw('MONTH(leads.app_doa), DAY(leads.app_doa)')
            ->limit(5)
            ->get();
    }

    private function getCombinedEvents($dateRange = [], $childIds = null)
    {
        $today = now()->format('Y-m-d');
        $tomorrow = now()->addDay()->format('Y-m-d');
        $sevenDaysAgo = now()->subDays(7)->format('Y-m-d');
        $yesterday = now()->subDay()->format('Y-m-d');
        $userId = Session::get('user_id');

        if ($childIds === null) {
            $childIds = Session::get('child_ids');
            $childIds = $this->normalizeIdsService->normalize($childIds);
        }

        $userIds = is_array($childIds) ? $childIds : explode(',', $childIds);
        $todayTasks = DB::table('tasks')
            ->join('task_user', 'task_user.task_id', '=', 'tasks.id')
            ->join('users', 'users.id', '=', 'tasks.user_id')
            ->leftJoin('task_projects', 'task_projects.id', '=', 'tasks.task_project_id')
            ->select(
                'tasks.id',
                'tasks.name as title',
                DB::raw("'task' as type"),
                DB::raw("NULL as event_type"),
                'tasks.priority',
                'tasks.user_id',
                'tasks.description',
                'tasks.end_date as date',
                DB::raw("'Today' as timeframe"),
                'tasks.status',
                'users.name as user_name',
                'task_projects.name as project_name',
                DB::raw("0 as overdue_days")
            )
            ->whereDate('tasks.end_date', '=', $today)
            ->where('tasks.status', '!=', 'completed')
            ->when(!empty($userIds), fn($q) => $q->whereIn('task_user.user_id', $userIds))
            ->when(
                !empty($dateRange) && isset($dateRange['start'], $dateRange['end']) && $dateRange['start'] && $dateRange['end'],
                fn($q) => $q->whereBetween('tasks.created_at', [$dateRange['start'], $dateRange['end']])
            )
            ->get();
        $tomorrowTasks = DB::table('tasks')
            ->join('task_user', 'task_user.task_id', '=', 'tasks.id')
            ->join('users', 'users.id', '=', 'tasks.user_id')
            ->leftJoin('task_projects', 'task_projects.id', '=', 'tasks.task_project_id')
            ->select(
                'tasks.id',
                'tasks.name as title',
                DB::raw("'task' as type"),
                DB::raw("NULL as event_type"),
                'tasks.priority',
                'tasks.user_id',
                'tasks.description',
                'tasks.end_date as date',
                DB::raw("'Tomorrow' as timeframe"),
                'tasks.status',
                'users.name as user_name',
                'task_projects.name as project_name',
                DB::raw("0 as overdue_days")
            )
            ->whereDate('tasks.end_date', '=', $tomorrow)
            ->where('tasks.status', '!=', 'completed')
            ->when(!empty($userIds), fn($q) => $q->whereIn('task_user.user_id', $userIds))
            ->when(
                !empty($dateRange) && isset($dateRange['start'], $dateRange['end']) && $dateRange['start'] && $dateRange['end'],
                fn($q) => $q->whereBetween('tasks.created_at', [$dateRange['start'], $dateRange['end']])
            )
            ->get();

        $missedTasks = DB::table('tasks')
            ->join('task_user', 'task_user.task_id', '=', 'tasks.id')
            ->join('users', 'users.id', '=', 'tasks.user_id')
            ->leftJoin('task_projects', 'task_projects.id', '=', 'tasks.task_project_id')
            ->select(
                'tasks.id',
                'tasks.name as title',
                DB::raw("'task' as type"),
                DB::raw("'Missed Task' as event_type"),
                'tasks.priority',
                'tasks.user_id',
                'tasks.description',
                'tasks.end_date as date',
                DB::raw("'Missed' as timeframe"),
                'tasks.status',
                'users.name as user_name',
                'task_projects.name as project_name',
                DB::raw("DATEDIFF(NOW(), tasks.end_date) as overdue_days")
            )
            ->whereBetween('tasks.end_date', [$sevenDaysAgo, $yesterday])
            ->where('tasks.status', '!=', 'completed')
            ->when(!empty($userIds), fn($q) => $q->whereIn('task_user.user_id', $userIds))
            ->when(
                !empty($dateRange) &&
                    isset($dateRange['start'], $dateRange['end']) &&
                    $dateRange['start'] &&
                    $dateRange['end'],
                fn($q) => $q->whereBetween('tasks.created_at', [$dateRange['start'], $dateRange['end']])
            )
            ->get();

        $todayLeadEvents = DB::table('leads as l')
            ->join('users as u', 'u.id', '=', 'l.user_id')
            ->leftJoin('projects as p', 'p.id', '=', 'l.project_id')
            ->select(
                'l.id',
                'l.name as title',
                DB::raw("'lead' as type"),
                DB::raw("CASE 
                    WHEN l.status = 'SITE_VISIT' THEN 'Site Visit'
                    WHEN l.status = 'OPPORTUNITY' THEN 'Opportunity'
                    WHEN l.status = 'REVISIT_SCHEDULED' THEN 'Revisit'
                    ELSE l.status
                END as event_type"),
                DB::raw("'medium' as priority"),
                'l.user_id',
                'l.last_comment as description',
                'l.remind_date as date',
                DB::raw("'Today' as timeframe"),
                'l.status',
                'u.name as user_name',
                'p.project_name',
                DB::raw("0 as overdue_days")
            )
            ->whereIn('l.status', ['SITE_VISIT', 'OPPORTUNITY', 'REVISIT_SCHEDULED'])
            ->whereDate('l.remind_date', '=', $today)
            ->when(!empty($userIds), fn($q) => $q->whereIn('l.user_id', $userIds))
            ->when(
                !empty($dateRange) && isset($dateRange['start'], $dateRange['end']) && $dateRange['start'] && $dateRange['end'],
                fn($q) => $q->whereBetween('l.lead_date', [$dateRange['start'], $dateRange['end']])
            )
            ->get();
        $tomorrowLeadEvents = DB::table('leads as l')
            ->join('users as u', 'u.id', '=', 'l.user_id')
            ->leftJoin('projects as p', 'p.id', '=', 'l.project_id')
            ->select(
                'l.id',
                'l.name as title',
                DB::raw("'lead' as type"),
                DB::raw("CASE 
                    WHEN l.status = 'SITE_VISIT' THEN 'Site Visit'
                    WHEN l.status = 'OPPORTUNITY' THEN 'Opportunity'
                    WHEN l.status = 'REVISIT_SCHEDULED' THEN 'Revisit'
                    ELSE l.status
                END as event_type"),
                DB::raw("'medium' as priority"),
                'l.user_id',
                'l.last_comment as description',
                'l.remind_date as date',
                DB::raw("'Tomorrow' as timeframe"),
                'l.status',
                'u.name as user_name',
                'p.project_name',
                DB::raw("0 as overdue_days")
            )
            ->whereIn('l.status', ['SITE_VISIT', 'OPPORTUNITY', 'REVISIT_SCHEDULED'])
            ->whereDate('l.remind_date', '=', $tomorrow)
            ->when(!empty($userIds), fn($q) => $q->whereIn('l.user_id', $userIds))
            ->when(
                !empty($dateRange) && isset($dateRange['start'], $dateRange['end']) && $dateRange['start'] && $dateRange['end'],
                fn($q) => $q->whereBetween('l.lead_date', [$dateRange['start'], $dateRange['end']])
            )
            ->get();
        $missedLeadEvents = DB::table('leads as l')
            ->join('users as u', 'u.id', '=', 'l.user_id')
            ->leftJoin('projects as p', 'p.id', '=', 'l.project_id')
            ->select(
                'l.id',
                'l.name as title',
                DB::raw("'lead' as type"),
                DB::raw("CASE 
                    WHEN l.status = 'SITE_VISIT' THEN 'Missed Site Visit'
                    WHEN l.status = 'OPPORTUNITY' THEN 'Missed Opportunity'
                    WHEN l.status = 'REVISIT_SCHEDULED' THEN 'Missed Revisit'
                    ELSE 'Missed Followup'
                END as event_type"),
                DB::raw("'medium' as priority"),
                'l.user_id',
                'l.last_comment as description',
                'l.remind_date as date',
                DB::raw("'Missed' as timeframe"),
                'l.status',
                'u.name as user_name',
                'p.project_name',
                DB::raw("DATEDIFF(NOW(), l.remind_date) as overdue_days")
            )
            ->whereIn('l.status', ['SITE_VISIT', 'OPPORTUNITY', 'REVISIT_SCHEDULED'])
            ->whereDate('l.remind_date', '<', $today)
            ->when(!empty($userIds), fn($q) => $q->whereIn('l.user_id', $userIds))
            ->when(
                !empty($dateRange) && isset($dateRange['start'], $dateRange['end']) && $dateRange['start'] && $dateRange['end'],
                fn($q) => $q->whereBetween('l.lead_date', [$dateRange['start'], $dateRange['end']])
            )
            ->get();
        $allEvents = collect()
            ->merge($todayTasks)
            ->merge($tomorrowTasks)
            ->merge($missedTasks)
            ->merge($todayLeadEvents)
            ->merge($tomorrowLeadEvents)
            ->merge($missedLeadEvents)
            ->unique('id')
            ->map(function ($item) {
                $item->date = Carbon::parse($item->date)->format('M d, Y');
                $item->overdue_days = (int) ($item->overdue_days ?? 0);
                $item->project_name = $item->project_name ?? 'No Project';
                $item->description = $item->description ?? 'No description';
                return $item;
            })
            ->sortBy('date')
            ->values();

        return $allEvents;
    }

    private function getFollowups($dateRange = [])
    {
        $today = now()->format('Y-m-d');
        $tomorrow = now()->addDay()->format('Y-m-d');
        $afterTomorrow = now()->addDays(2)->format('Y-m-d');
        $next7Days = now()->addDays(7)->format('Y-m-d');

        $userId = Session::get('user_id');
        $childIds = Session::get('child_ids');
        $childIds = $this->normalizeIdsService->normalize($childIds);
        $user = DB::table('users')->where('id', $userId)->first();
        $permissions = json_decode($user->master_options ?? '[]', true);
        $isAdmin = ($user->role === 'admin');
        // ---------------- PERMISSIONS ----------------
        $allowedStatuses = [];

        if ($isAdmin || in_array('lead.call_scheduled', $permissions)) {
            $allowedStatuses[] = 'CALL SCHEDULED';
        }

        if ($isAdmin || in_array('lead.visit_scheduled', $permissions)) {
            $allowedStatuses[] = 'VISIT SCHEDULED';
        }

        if ($isAdmin || in_array('lead.meeting_scheduled', $permissions)) {
            $allowedStatuses[] = 'MEETING SCHEDULED';
        }

        if ($isAdmin || in_array('lead.interested', $permissions)) {
            $allowedStatuses[] = 'INTERESTED';
        }

        if ($isAdmin || in_array('lead.whatsapp', $permissions)) {
            $allowedStatuses[] = 'WHATSAPP';
        }
        $dateRangeValid = $this->hasDateRange($dateRange);

        // $baseQuery = function ($status = null, $remindDate = null, $typeLabel = null) use ($childIds, $dateRangeValid, $dateRange)
        $baseQuery = function ($status = null, $remindDate = null, $typeLabel = null) use ($childIds, $dateRangeValid, $dateRange, $allowedStatuses) {
            return DB::table('leads as a')
                ->join('users as b', 'b.id', '=', 'a.user_id')
                ->leftJoin('projects as c', 'c.id', '=', 'a.project_id')
                ->select(
                    'a.id',
                    'a.name',
                    'a.status',
                    'a.phone',
                    'a.whatsapp_no',
                    'a.remind_date',
                    'a.remind_time',
                    'a.source',
                    'a.campaign',
                    'a.created_at',
                    'is_pinned',
                    'visited_on',
                    DB::raw("'$typeLabel' as type"),
                    DB::raw("CONCAT(a.remind_date, ' ', a.remind_time) as datetime"),
                    'b.name as agent_name',
                    'b.role',
                    'c.project_name',
                    'a.classification',
                    'a.last_comment'
                )
                ->when($remindDate !== null, function ($q) use ($remindDate) {
                    if (is_array($remindDate)) {
                        [$operator, $value] = $remindDate;

                        if ($operator === 'between') {
                            return $q->whereBetween('a.remind_date', $value);
                        }

                        return $q->where('a.remind_date', $operator, $value);
                    } else {
                        return $q->where('a.remind_date', $remindDate);
                    }
                })
                ->when($status !== null, fn($q) => $q->where('a.status', $status))->whereIn('a.status', $allowedStatuses)
                ->when(!empty($childIds), fn($q) => $q->whereIn('a.user_id', $childIds))
                ->when($dateRangeValid, fn($q) =>
                $q->whereBetween('a.lead_date', [$dateRange['start'], $dateRange['end']]));
        };

        return [
            'todayCalls' => $baseQuery('CALL SCHEDULED', $today, 'Call')
                ->orderBy('a.remind_time')
                ->limit(50)
                ->get(),
            'todayVisits' => $baseQuery('VISIT SCHEDULED', $today, 'Visit')
                ->orderBy('a.remind_time')
                ->limit(50)
                ->get(),
            'todayWhatsapp' => $baseQuery('WHATSAPP', $today, 'WhatsApp')
                ->orderBy('a.remind_time')
                ->limit(50)
                ->get(),
            'todayMeetings' => $baseQuery('MEETING SCHEDULED', $today, 'Meeting')
                ->orderBy('a.remind_time')
                ->limit(50)
                ->get(),
            'missedFollowups' => $baseQuery(null, ['<', $today], 'Missed')->whereIn('a.status', $allowedStatuses)
                // ->whereIn('a.status', [
                //     'CALL SCHEDULED',
                //     'VISIT SCHEDULED',
                //     'WHATSAPP',
                //     'INTERESTED',
                //     'MEETING SCHEDULED'
                // ])
                ->orderBy('a.remind_date')
                ->limit(100)
                ->get(),
            'interestedLeads' => $baseQuery('INTERESTED', null, 'Interested')
                ->orderBy('a.remind_date')
                ->limit(100)
                ->get(),
            'tomorrowCalls' => $baseQuery('CALL SCHEDULED', $tomorrow, 'Call')
                ->orderBy('a.remind_time')
                ->limit(50)
                ->get(),

            'tomorrowVisits' => $baseQuery('VISIT SCHEDULED', $tomorrow, 'Visit')
                ->orderBy('a.remind_time')
                ->limit(50)
                ->get(),

            'tomorrowWhatsapp' => $baseQuery('WHATSAPP', $tomorrow, 'WhatsApp')
                ->orderBy('a.remind_time')
                ->limit(50)
                ->get(),
            'tomorrowMeetings' => $baseQuery('MEETING SCHEDULED', $tomorrow, 'Meeting')
                ->orderBy('a.remind_time')
                ->limit(50)
                ->get(),
            'next7daysCalls' => $baseQuery(
                'CALL SCHEDULED',
                ['between', [$afterTomorrow, $next7Days]],
                'Call'
            )
                ->orderBy('a.remind_date')
                ->orderBy('a.remind_time')
                ->limit(100)
                ->get(),

            'next7daysVisits' => $baseQuery(
                'VISIT SCHEDULED',
                ['between', [$afterTomorrow, $next7Days]],
                'Visit'
            )
                ->orderBy('a.remind_date')
                ->orderBy('a.remind_time')
                ->limit(100)
                ->get(),

            'next7daysWhatsapp' => $baseQuery(
                'WHATSAPP',
                ['between', [$afterTomorrow, $next7Days]],
                'WhatsApp'
            )
                ->orderBy('a.remind_date')
                ->orderBy('a.remind_time')
                ->limit(100)
                ->get(),

            'next7daysMeetings' => $baseQuery(
                'MEETING SCHEDULED',
                ['between', [$afterTomorrow, $next7Days]],
                'Meeting'
            )
                ->orderBy('a.remind_date')
                ->orderBy('a.remind_time')
                ->limit(100)
                ->get(),

            'interestedNext7Days' => $baseQuery(
                'INTERESTED',
                ['between', [$afterTomorrow, $next7Days]],
                'Interested'
            )
                ->orderBy('a.remind_date')
                ->orderBy('a.remind_time')
                ->limit(100)
                ->get(),
        ];
    }

    private function getAvailableYears($childIds, $dateRange = null)
    {
        return DB::table('leads')
            ->select(DB::raw('YEAR(lead_date) as year'))
            ->when(!empty($childIds), fn($q) => $q->whereIn('user_id', $childIds))
            ->when(
                !empty($dateRange['start']) && !empty($dateRange['end']),
                function ($q) use ($dateRange) {
                    $start = Carbon::parse($dateRange['start'])->startOfDay();
                    $end = Carbon::parse($dateRange['end'])->endOfDay();
                    $q->whereBetween('lead_date', [$start, $end]);
                }
            )
            ->groupBy(DB::raw('YEAR(lead_date)'))
            ->orderBy('year', 'desc')
            ->pluck('year');
    }

    private function getLeadStatuses($childIds, $dateRange)
    {
        return DB::table('leads')
            ->select('status')
            ->when(!empty($childIds), fn($q) => $q->whereIn('user_id', $childIds))
            ->when($this->hasDateRange($dateRange), fn($q) => $q->whereBetween('lead_date', [$dateRange['start'], $dateRange['end']]))
            ->distinct()
            ->pluck('status')
            ->toArray();
    }

    public function getAnalyticsData(Request $request)
    {
        $filters = $request->input('filters', []);
        $childIds = Session::get('child_ids');
        $childIds = $this->normalizeIdsService->normalize($childIds);
        $userId = session('user_id');

        if (!isset($filters['team'])) {
            $filters['team'] = 'all';
        }

        $dateRange = [];
        if (!empty($filters['dateRange'])) {
            $dates = explode(' - ', $filters['dateRange']);
            $dateRange = [
                'start' => Carbon::parse($dates[0])->startOfDay(),
                'end' => Carbon::parse($dates[1])->endOfDay()
            ];
        }

        $sourceData = $this->getSourceAnalysisData($childIds, $filters, $dateRange);
        $projectData = $this->getProjectAnalysisData($childIds, $filters, $dateRange);
        $monthlyTrendData = $this->getMonthlyTrendData($childIds, $filters, $dateRange);
        $campaignData = $this->getCampaignAnalysisData($childIds, $filters, $dateRange);
        $categoryTypeData = $this->getCategoryTypeAnalysisData($childIds, $filters, $dateRange);
        $categoryData = $this->getCategoryAnalysisData($childIds, $filters, $dateRange);
        $subCategoryData = $this->getSubCategoryAnalysisData($childIds, $filters, $dateRange);
        // echo '<pre>'; print_r($monthlyTrendData); exit;
        return response()->json([
            'sourceData' => $sourceData,
            'projectData' => $projectData,
            'campaignData' => $campaignData,
            'monthlyTrendData' => $monthlyTrendData,
            'categoryTypeData' => $categoryTypeData,
            'categoryData' => $categoryData,
            'subCategoryData' => $subCategoryData
        ]);
    }

    private function getSourceAnalysisData($childIds, $filters, $dateRange)
    {
        $query = DB::table('leads')
            ->join('sources', 'leads.source', '=', 'sources.name')
            ->select(
                'sources.name as source',
                DB::raw('COUNT(leads.id) as lead_count')
            )
            ->groupBy('sources.name')
            ->orderBy('lead_count', 'desc')
            ->limit(10);

        $results = $query->get();
        return [
            'labels' => $results->pluck('source')->toArray(),
            'values' => $results->pluck('lead_count')->toArray()
        ];
    }

   
    private function getProjectAnalysisData($childIds, $filters, $dateRange)
    {
        $query = DB::table('leads')
            ->select(
                DB::raw("CASE 
    WHEN leads.project_id IS NULL OR leads.project_id = '' THEN 'No Project'
    WHEN leads.project_id = '0' THEN 'No Project'
    WHEN leads.project_id = 'others' THEN 'others'
    WHEN leads.project_id LIKE '%,others%' THEN 'others'
    ELSE COALESCE(
        (
            SELECT projects.project_name 
            FROM projects 
            WHERE FIND_IN_SET(projects.id, REPLACE(leads.project_id, ' ', ''))
            LIMIT 1
        ),
        'Unknown Project'
    )
END as project"),
                DB::raw('COUNT(leads.id) as lead_count')
            )
            ->when(!empty($childIds), fn($q) => $q->whereIn('leads.user_id', $childIds))
            ->when(!empty($filters['sourceId']), fn($q) => $q->where('leads.source', $filters['sourceId']))
            ->when(!empty($filters['projectId']), fn($q) => $q->where('leads.project_id', $filters['projectId']))
            ->when(!empty($filters['status']), fn($q) => $q->where('leads.status', $filters['status']))
            ->when($this->hasDateRange($dateRange), fn($q) => $q->whereBetween('leads.lead_date', [$dateRange['start'], $dateRange['end']]))
            ->when($filters['team'] === 'self', fn($q) => $q->where('leads.user_id', session('user_id')))
            ->groupBy('project')
            ->orderBy('lead_count', 'desc')
            ->limit(10);

        $results = $query->get();
        
        return [
            'labels' => $results->pluck('project')->toArray(),
            'values' => $results->pluck('lead_count')->toArray()
        ];
    }
    private function getMonthlyTrendData($childIds, $filters, $dateRange)
    {
        $year = $filters['year'] ?? date('Y');

        $query = DB::table('leads')
            ->select(
                DB::raw('MONTH(lead_date) as month'),
                DB::raw('COUNT(*) as lead_count')
            )
            ->whereYear('lead_date', $year)
            ->when(!empty($childIds), fn($q) => $q->whereIn('user_id', $childIds))
            ->when(!empty($filters['sourceId']), fn($q) => $q->where('source', $filters['sourceId']))
            ->when(!empty($filters['projectId']), fn($q) => $q->where('project_id', $filters['projectId']))
            ->when(!empty($filters['status']), fn($q) => $q->where('status', $filters['status']))
            ->when($this->hasDateRange($dateRange), fn($q) => $q->whereBetween('lead_date', [$dateRange['start'], $dateRange['end']]))
            ->when($filters['team'] === 'self', fn($q) => $q->where('user_id', session('user_id')))
            ->groupBy(DB::raw('MONTH(lead_date)'))
            ->orderBy('month');

        $results = $query->get();
        $monthlyData = array_fill(1, 12, 0);
        foreach ($results as $row) {
            $monthlyData[$row->month] = $row->lead_count;
        }

        return [
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            'values' => array_values($monthlyData)
        ];
    }

    private function getCategoryTypeAnalysisData($childIds, $filters, $dateRange)
    {
        $query = DB::table('leads')
            ->select(
                'type',
                DB::raw('COUNT(id) as total_leads')
            )
            ->whereNotNull('type')
            ->where('type', '!=', '')
            ->when(!empty($childIds), fn($q) => $q->whereIn('user_id', $childIds))
            ->when(!empty($filters['sourceId']), fn($q) => $q->where('source', $filters['sourceId']))
            ->when(!empty($filters['projectId']), fn($q) => $q->where('project_id', $filters['projectId']))
            ->when(!empty($filters['status']), fn($q) => $q->where('status', $filters['status']))
            ->when($this->hasDateRange($dateRange), fn($q) => $q->whereBetween('lead_date', [$dateRange['start'], $dateRange['end']]))
            ->when(
                isset($filters['team']) && $filters['team'] === 'self',
                fn($q) => $q->where('user_id', session('user_id'))
            )
            ->groupBy('type')
            ->orderByDesc('total_leads')
            ->limit(10);

        $results = $query->get();

        return [
            'labels' => $results->pluck('type')->toArray(),
            'values' => $results->pluck('total_leads')->toArray()
        ];
    }

    private function getCategoryAnalysisData($childIds, $filters, $dateRange)
    {
        $query = DB::table('leads')
            /* ->join('inv_catg', 'leads.catg_id', '=', 'inv_catg.id')*/
            ->leftJoin('inv_catg', 'leads.catg_id', '=', 'inv_catg.id')
            ->select(
                /* 'inv_catg.name as category', */
                DB::raw('COALESCE(inv_catg.name, "Uncategorized") as category'),

                DB::raw('COUNT(leads.id) as total_leads')
            )
            ->whereNotNull('leads.catg_id')
            ->when(!empty($childIds), fn($q) => $q->whereIn('leads.user_id', $childIds))
            ->when(!empty($filters['sourceId']), fn($q) => $q->where('leads.source', $filters['sourceId']))
            ->when(!empty($filters['projectId']), fn($q) => $q->where('leads.project_id', $filters['projectId']))
            ->when(!empty($filters['status']), fn($q) => $q->where('leads.status', $filters['status']))
            ->when($this->hasDateRange($dateRange), fn($q) => $q->whereBetween('leads.lead_date', [$dateRange['start'], $dateRange['end']]))
            ->when(
                isset($filters['team']) && $filters['team'] === 'self',
                fn($q) => $q->where('leads.user_id', session('user_id'))
            )
            ->groupBy('inv_catg.name')
            ->orderByDesc('total_leads')
            ->limit(10);

        $results = $query->get();

        return [
            'labels' => $results->pluck('category')->toArray(),
            'values' => $results->pluck('total_leads')->toArray()
        ];
    }

    private function getSubCategoryAnalysisData($childIds, $filters, $dateRange)
    {
        $query = DB::table('leads')
            /* ->join('inv_subcatg', 'leads.sub_catg_id', '=', 'inv_subcatg.id') */
            ->leftJoin('inv_subcatg', 'leads.sub_catg_id', '=', 'inv_subcatg.id')
            ->select(
                /* 'inv_subcatg.name as sub_category', */
                DB::raw('COALESCE(inv_subcatg.name, "Uncategorized") as sub_category'),
                DB::raw('COUNT(leads.id) as total_leads')
            )
            ->whereNotNull('leads.sub_catg_id')
            ->when(!empty($childIds), fn($q) => $q->whereIn('leads.user_id', $childIds))
            ->when(!empty($filters['sourceId']), fn($q) => $q->where('leads.source', $filters['sourceId']))
            ->when(!empty($filters['projectId']), fn($q) => $q->where('leads.project_id', $filters['projectId']))
            ->when(!empty($filters['status']), fn($q) => $q->where('leads.status', $filters['status']))
            ->when($this->hasDateRange($dateRange), fn($q) => $q->whereBetween('leads.lead_date', [$dateRange['start'], $dateRange['end']]))
            ->when(
                isset($filters['team']) && $filters['team'] === 'self',
                fn($q) => $q->where('leads.user_id', session('user_id'))
            )
            ->groupBy('inv_subcatg.name')
            ->orderByDesc('total_leads')
            ->limit(10);

        $results = $query->get();

        return [
            'labels' => $results->pluck('sub_category')->toArray(),
            'values' => $results->pluck('total_leads')->toArray()
        ];
    }

    public function exportAnalyticsData(Request $request)
    {
        $type = $request->input('type');
        $filters = $request->input('filters', []);
        $childIds = Session::get('child_ids');
        $childIds = $this->normalizeIdsService->normalize($childIds);
        $dateRange = [];
        if (!empty($filters['dateRange'])) {
            $dates = explode(' - ', $filters['dateRange']);
            $dateRange = [
                'start' => Carbon::parse($dates[0])->startOfDay(),
                'end' => Carbon::parse($dates[1])->endOfDay()
            ];
        }

        switch ($type) {
            case 'source-analysis':
                $data = $this->getSourceAnalysisData($childIds, $filters, $dateRange);
                $filename = 'source_analysis_' . date('Ymd_His') . '.csv';
                $csvData = $this->generateCsv($data['labels'], $data['values'], 'Source', 'Lead Count');
                break;
            case 'project-analysis':
                $data = $this->getProjectAnalysisData($childIds, $filters, $dateRange);
                $filename = 'project_analysis_' . date('Ymd_His') . '.csv';
                $csvData = $this->generateCsv($data['labels'], $data['values'], 'Project', 'Lead Count');
                break;
            case 'monthly-trend':
                $data = $this->getMonthlyTrendData($childIds, $filters, $dateRange);
                $filename = 'monthly_trend_' . date('Ymd_His') . '.csv';
                $csvData = $this->generateCsv($data['labels'], $data['values'], 'Month', 'Lead Count');
                break;
            default:
                return response()->json(['error' => 'Invalid export type'], 400);
        }

        return response($csvData)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }

    private function generateCsv($labels, $values, $labelHeader, $valueHeader)
    {
        $output = fopen('php://output', 'w');
        fputcsv($output, [$labelHeader, $valueHeader]);

        foreach ($labels as $index => $label) {
            fputcsv($output, [$label, $values[$index]]);
        }

        return stream_get_contents($output);
    }

    public function exportChartData(Request $request)
    {
        $year = $request->input('year', date('Y'));
        $type = $request->input('type', 'csv');
        $childIds = Session::get('child_ids');
        $childIds = $this->normalizeIdsService->normalize($childIds);

        $monthsReport = $this->getMonthlyLeadReport($year);

        if ($type === 'csv') {
            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="lead_conversion_' . $year . '.csv"',
            ];

            $callback = function () use ($monthsReport) {
                $file = fopen('php://output', 'w');
                fputcsv($file, ['Month', 'Leads']);
                $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                foreach ($months as $index => $month) {
                    fputcsv($file, [$month, $monthsReport[$index]]);
                }

                fclose($file);
            };
            return response()->stream($callback, 200, $headers);
        } else {
            return response()->json(['error' => 'Export type not supported'], 400);
        }
    }

    public function getChartData(Request $request)
    {
        $year = $request->input('year', date('Y'));
        $childIds = Session::get('child_ids');
        $childIds = $this->normalizeIdsService->normalize($childIds);

        $monthsReport = $this->getMonthlyLeadReport($year);

        return response()->json($monthsReport);
    }

    public function search(Request $request)
    {
        $q = trim($request->input('q'));
        $childIds = Session::get('child_ids');
        $childIds = $this->normalizeIdsService->normalize($childIds);
        $userId = session('user_id');

        $users = DB::table('users')->whereIn('id', $childIds)->get();

        $categorys = DB::table('inv_catg')->get();
        $sources = DB::table('sources')->get();
        $campaigns = DB::table('campaigns')->get();
        $projects = DB::table('projects')->get();
        $cities = DB::table('state_district')->orderBy('District', 'asc')->get();
        $leads = DB::table('leads as a')
            ->join('users as b', 'b.id', '=', 'a.user_id')
            ->leftJoin('projects as c', 'c.id', '=', 'a.project_id')
            ->select(
                'a.*',
                'b.name as agent',
                'b.role',
                'c.project_name as project_name'
            )
            ->where(function ($query) use ($q) {
                $query->where('a.name', 'like', "%$q%")
                    ->orWhere('a.phone', 'like', "%$q%")
                    ->orWhere('a.email', 'like', "%$q%");
            })
            ->when(!empty($childIds), fn($query) => $query->whereIn('a.user_id', $childIds))
            ->orderBy('a.lead_date', 'desc')
            ->paginate(10);

        return view('search.index', compact('categorys', 'users', 'sources', 'campaigns', 'projects', 'cities', 'leads', 'q'));
    }

    public function toggle(Request $request)
    {
        $userId = session('user_id');
        $action = $request->input('action');

        if ($action === 'start') {
            $existing = DB::table('attendance')
                ->where('user_id', $userId)
                ->whereDate('start_time', Carbon::today())
                ->exists();

            if ($existing) {
                return response()->json(['message' => 'Attendance already started for today.'], 409);
            }

            DB::table('attendance')->insert([
                'user_id'       => $userId,
                'start_time'    => Carbon::now(),
                'start_location' => $request->latitude . ',' . $request->longitude,
            ]);

            session(['attendance_active' => true]);

            return response()->json(['message' => 'Attendance started.']);
        }

        if ($action === 'end') {
            $record = DB::table('attendance')
                ->where('user_id', $userId)
                ->whereNull('end_time')
                ->orderByDesc('id')
                ->first();

            if (!$record) {
                return response()->json(['message' => 'No active session found to end.'], 404);
            }

            $start = Carbon::parse($record->start_time);
            $end   = Carbon::now();
            $hours = round($start->diffInMinutes($end) / 60, 2);

            $types = DB::table('attendance_types')->get();
            $matched = $types->first(function ($type) use ($hours) {
                return abs($type->hours - $hours) <= 0.5;
            });

            $status = $matched ? $matched->type : null;

            DB::table('attendance')
                ->where('id', $record->id)
                ->update([
                    'end_time'      => $end,
                    'end_location'  => $request->latitude . ',' . $request->longitude,
                ]);

            session()->forget('attendance_active');

            if ($status) {
                return response()->json(['message' => "Attendance ended. Marked as: {$status}."]);
            } else {
                return response()->json([
                    'message' => "Attendance ended, but duration doesn't match any known attendance type (duration: {$hours}h)."
                ], 200);
            }
        }
        return response()->json(['message' => 'Invalid action.'], 400);
    }

    private function getCalendarEvents($childIds, $dateRange = [])
    {
        $events = collect();
        try {
            $calendarStart = $this->hasDateRange($dateRange)
                ? Carbon::parse($dateRange['start'])->toDateString()
                : now()->startOfMonth()->toDateString();
            $calendarEnd = $this->hasDateRange($dateRange)
                ? Carbon::parse($dateRange['end'])->toDateString()
                : now()->endOfMonth()->toDateString();
            $userId = Session::get('user_id');
            $user = DB::table('users')->where('id', $userId)->first();
            $permissions = json_decode($user->master_options ?? '[]', true);
            $isAdmin = ($user->role === 'admin');

            $allowedStatuses = [];

            if ($isAdmin || in_array('lead.call_scheduled', $permissions)) {
                $allowedStatuses[] = 'CALL SCHEDULED';
            }

            if ($isAdmin || in_array('lead.visit_scheduled', $permissions)) {
                $allowedStatuses[] = 'VISIT SCHEDULED';
            }

            if ($isAdmin || in_array('lead.meeting_scheduled', $permissions)) {
                $allowedStatuses[] = 'MEETING SCHEDULED';
            }

            if ($isAdmin || in_array('lead.interested', $permissions)) {
                $allowedStatuses[] = 'INTERESTED';
            }
            if ($isAdmin || in_array('lead.whatsapp', $permissions)) {
                $allowedStatuses[] = 'WHATSAPP';
            }
            $allowedStatuses = array_merge($allowedStatuses, ['PROCESSING', 'NOT PICKED', 'FUTURE LEAD', 'PENDING']);
            $scheduledLeads = DB::table('leads as a')
                ->join('users as b', 'b.id', '=', 'a.user_id')
                ->leftJoin('projects as c', 'c.id', '=', 'a.project_id')
                ->select(
                    'a.id',
                    'a.name as title',
                    'a.status',
                    'a.phone',
                    'a.whatsapp_no',
                    'a.email',
                    DB::raw('DATE(a.remind_date) as start_date'),
                    'a.remind_time',
                    'a.source',
                    'a.campaign',
                    'a.classification',
                    'a.last_comment',
                    'b.name as agent_name',
                    'c.project_name',
                    DB::raw("'lead' as event_type"),
                    DB::raw("CASE 
                        WHEN CONCAT(a.remind_date, ' ', COALESCE(a.remind_time, '00:00:00')) < NOW() 
                        AND a.status NOT IN ('completed', 'converted', 'cancelled', 'booked', 'LOST') 
                        THEN 1 ELSE 0 END as is_missed"),
                    DB::raw("0 as is_overdue")
                )
                ->whereNotNull('a.remind_date')
                // ->whereIn('a.status', [
                //     'CALL SCHEDULED',
                //     'VISIT SCHEDULED',
                //     'WHATSAPP',
                //     'INTERESTED',
                //     'MEETING SCHEDULED',
                //     'PROCESSING',
                //     'NOT PICKED',
                //     'FUTURE LEAD',
                //     'PENDING',
                // ])
                ->whereIn('a.status', $allowedStatuses)
                ->whereBetween('a.remind_date', [$calendarStart, $calendarEnd])
                ->when(!empty($childIds), function ($q) use ($childIds) {
                    if (is_array($childIds)) {
                        $q->whereIn('a.user_id', $childIds);
                    } else {
                        $q->whereIn('a.user_id', explode(',', $childIds));
                    }
                })
                ->orderBy('a.remind_date')
                ->orderBy('a.remind_time')
                ->limit(1000)
                ->get();

            $events = $events->concat($scheduledLeads);
        } catch (\Exception $e) {
        }
        $groupedEvents = [];
        foreach ($events as $event) {
            $date = $event->start_date;
            if (!isset($groupedEvents[$date])) {
                $groupedEvents[$date] = [];
            }
            $groupedEvents[$date][] = $event;
        }

        return $groupedEvents;
    }

    public function getDetails($id)
    {
        $type = request()->get('type', '');

        if ($type === 'lead') {
            $lead = DB::table('leads as a')
                ->join('users as b', 'b.id', '=', 'a.user_id')
                ->leftJoin('projects as c', 'c.id', '=', 'a.project_id')
                ->select(
                    'a.*',
                    'b.name as agent_name',
                    'c.project_name'
                )
                ->where('a.id', $id)
                ->first();

            if ($lead) {
                return response()->json($lead);
            }
            return response()->json(['error' => 'Lead not found'], 404);
        } else {
            $task = DB::table('tasks as t')
                ->join('users as u', 'u.id', '=', 't.user_id')
                ->leftJoin('task_projects as tp', 'tp.id', '=', 't.task_project_id')
                ->select(
                    't.id',
                    't.name as title',
                    't.description',
                    't.priority',
                    't.status as task_status',
                    't.end_date as start_date',
                    't.start_date',
                    'u.name as assigned_by',
                    'tp.name as project_name'
                )
                ->where('t.id', $id)
                ->first();

            if ($task) {
                return response()->json($task);
            }
            return response()->json(['error' => 'Task not found'], 404);
        }
    }

    private function getCampaignAnalysisData($childIds, $filters, $dateRange)
    {
        $query = DB::table('leads')
            ->select(
                'campaign',
                DB::raw('COUNT(id) as total_leads')
            )
            ->whereNotNull('campaign')
            ->where('campaign', '!=', '')
            ->when(!empty($childIds), fn($q) => $q->whereIn('user_id', $childIds))
            ->when(!empty($filters['sourceId']), fn($q) => $q->where('source', $filters['sourceId']))
            ->when(!empty($filters['projectId']), fn($q) => $q->where('project_id', $filters['projectId']))
            ->when(!empty($filters['status']), fn($q) => $q->where('status', $filters['status']))
            ->when($this->hasDateRange($dateRange), fn($q) => $q->whereBetween('lead_date', [$dateRange['start'], $dateRange['end']]))
            ->when(isset($filters['team']) && $filters['team'] === 'self', fn($q) => $q->where('user_id', session('user_id')))
            ->groupBy('campaign')
            ->orderBy('total_leads', 'desc')
            ->limit(10);

        $results = $query->get();

        return [
            'labels' => $results->pluck('campaign')->toArray(),
            'values' => $results->pluck('total_leads')->toArray()
        ];
    }
}

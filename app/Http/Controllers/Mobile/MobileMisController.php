<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class MobileMisController extends Controller
{
    public function index()
    {
        $entryDate = now()->toDateString();
        $child_ids = Session::get('child_ids');
        $userType = Session::get('user_type');

        if (!empty($child_ids) && !is_array($child_ids)) {
            $child_ids = explode(',', $child_ids);
        }

        $teams = DB::table('users')
            ->where('role', '!=', 'admin')
            ->whereIn('id', $child_ids)
            ->get();

        $misPoints = DB::table('mis_points')
            ->orderBy('id')
            ->get();

        $weeklyTargetsRaw = DB::table('mis_weekly_targets')
            ->where('target_type', 'weekly')
            ->orderBy('year', 'desc')
            ->get();

        $weeks = [];

        foreach ($weeklyTargetsRaw as $target) {
            $weeksData = json_decode($target->weekly_targets, true);
            foreach ($weeksData as $weekKey => $weekValue) {
                $start = Carbon::parse($weekValue['start_date']);
                $end   = Carbon::parse($weekValue['end_date']);
                $weeks[$weekKey] = [
                    'label'    => $weekKey . ' (' . $start->format('d M') . ' - ' . $end->format('d M') . ')',
                    'start'    => $start,
                    'end'      => $end,
                    'selected' => Carbon::parse($entryDate)->between($start, $end)
                ];
            }
        }

        return view('mobile.mis-form', compact('weeks', 'entryDate', 'misPoints', 'teams', 'userType'));
    }

    public function store(Request $request)
    {
        $misPoints = DB::table('mis_points')->get();
        $rules = [];
        $fieldMappings = [];

        $role = Session::get('user_type');
        if (!in_array($role, ['admin', 'team_manager'])) {
            return redirect()->back()->with('error', 'You are not authorized to submit MIS reports.');
        }
        foreach ($misPoints as $point) {
            $fieldName = $this->getFieldName($point->point_name);
            $fieldMappings[$fieldName] = $point->point_name;

            $lowerName = strtolower($point->point_name);
            if (str_contains($lowerName, 'amount') || str_contains($lowerName, '₹')) {
                $rules[$fieldName] = 'nullable|numeric|min:0';
            } elseif (str_contains($lowerName, 'lunch')) {
                $rules[$fieldName] = 'required|in:yes,no';
            } else {
                $rules[$fieldName] = 'nullable|integer|min:0';
            }
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            DB::beginTransaction();

            $userId = session('user_id');
            if (!$userId) {
                return redirect()->back()->with('error', 'User session not found.');
            }

            $weekKey = (int) preg_replace('/\D/', '', $request->week);
            $today = Carbon::now()->toDateString();
            $misDataToday = [];
            foreach ($fieldMappings as $fieldName => $pointName) {
                $value = $request->input($fieldName);
                $lowerName = strtolower($pointName);

                if (str_contains($lowerName, 'lunch')) {
                    $misDataToday[$pointName] = $value === 'yes' ? 1 : 0;
                } elseif (str_contains($lowerName, 'amount') || str_contains($lowerName, '₹')) {
                    $misDataToday[$pointName] = (float) ($value ?? 0);
                } else {
                    $misDataToday[$pointName] = (int) ($value ?? 0);
                }
            }
            DB::table('mis_daily_entries')->updateOrInsert(
                [
                    'user_id'    => $userId,
                    'entry_date' => $today,
                ],
                [
                    'team_id'    => $request->team,
                    'week'       => $weekKey,
                    'mis_data'   => json_encode([$today => $misDataToday], JSON_UNESCAPED_UNICODE),
                    'updated_at' => now(),
                    'created_at' => now(), 
                ]
            );

            DB::commit();
            return redirect()->back()->with('success', 'Daily MIS Report submitted successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong. Please try again. Error: ' . $e->getMessage());
        }
    }

    private function getFieldName($pointName)
    {
        $fieldName = Str::slug($pointName, '_');
        if (empty($fieldName)) {
            $fieldName = 'field_' . uniqid();
        }

        return $fieldName;
    }
}

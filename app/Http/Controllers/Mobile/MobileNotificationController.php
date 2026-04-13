<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class MobileNotificationController extends Controller
{
    public function notification(Request $request)
    {
        $childIds = Session::get('child_ids', '');
        $childIdsArray = $childIds ? array_map('trim', explode(',', $childIds)) : [];
        $selectedStatus = $request->get('status', 'today');
        if (empty($childIdsArray)) 
        {
            if ($request->ajax()) 
            {
                return response()->json([
                    'notifications' => [],
                    'hasMore' => false,
                    'nextPage' => 1,
                    'totalCount' => 0,
                ]);
            }

            return view('mobile.notification', [
                'initialNotifications' => [],
                'hasMoreInitial' => false,
                'totalCount' => 0,
                'selectedStatus' => 'today'
            ]);
        }

        $today = Carbon::today()->toDateString();
        $tomorrow = Carbon::tomorrow()->toDateString();

        $query = DB::table('leads')
            ->select(
                'id',
                'name',
                'phone',
                'status',
                'last_comment',
                'remind_date',
                'remind_time',
                'created_at'
            )
            ->whereIn('user_id', $childIdsArray)
            ->orderBy('remind_date', 'asc')
            ->orderBy('remind_time', 'asc');
        if ($selectedStatus === 'today') 
        {
            $query->whereDate('remind_date', $today);
        } 
        elseif ($selectedStatus === 'tomorrow') 
        {
            $query->whereDate('remind_date', $tomorrow);
        } 
        elseif ($selectedStatus === 'missed') 
        {
            $query->whereDate('remind_date', '<', $today)
                  ->whereIn('status', [
                      'CALL SCHEDULED',
                      'VISIT SCHEDULED',
                      'INTERESTED',
                      'MEETING SCHEDULED'
                  ]);
        } 
        elseif ($selectedStatus !== 'all') 
        {
            $query->where('status', $selectedStatus);
        }
        $perPage = $request->get('per_page', 10);
        $notifications = $query->paginate($perPage);
        if ($request->ajax()) 
        {
            return response()->json([
                'notifications' => $notifications->items(),
                'hasMore' => $notifications->hasMorePages(),
                'nextPage' => $notifications->currentPage() + 1,
                'totalCount' => $notifications->total(),
            ]);
        }
        return view('mobile.notification', [
            'initialNotifications' => $notifications->items(),
            'hasMoreInitial' => $notifications->hasMorePages(),
            'totalCount' => $notifications->total(),
            'selectedStatus' => $selectedStatus
        ]);
    }
}
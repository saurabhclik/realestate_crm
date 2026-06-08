<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LeadStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('check.login');
        $this->middleware('reception.only');
    }

    public function index(Request $request)
    {
        $length = $request->get('length', 25);

        $statuses = DB::table('lead_statuses')
            ->orderBy('seq', 'asc')
            ->orderBy('id', 'asc')
            ->paginate($length);
        $leads = DB::table('leads')->get();
        foreach ($statuses as $status) {
            $status->used_count = DB::table('leads')
                ->where('status', $status->display_name)
                ->count();
        }

        return view('master.lead-status', compact('statuses', 'length', 'leads'));
    }

    public function toggleActive($id)
    {
        $status = DB::table('lead_statuses')
            ->where('id', $id)
            ->first();

        if (!$status) {
            return redirect()->back()
                ->with('error', 'Status not found!');
        }

        $newStatus = $status->is_active ? 0 : 1;

        DB::table('lead_statuses')
            ->where('id', $id)
            ->update([
                'is_active'   => $newStatus,
                'updated_date' => now()
            ]);

        return redirect()->route('lead-status.index')
            ->with(
                'success',
                $newStatus
                    ? 'Status activated successfully!'
                    : 'Status inactivated successfully!'
            );
    }

    public function rename(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'display_name' => 'required|string|max:255|unique:lead_statuses,display_name,' . $id
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->first()
            ], 422);
        }

        $status = DB::table('lead_statuses')
            ->where('id', $id)
            ->first();

        if (!$status) {
            return response()->json([
                'error' => 'Status not found'
            ], 404);
        }

        $newDisplayName = strtoupper(trim($request->display_name));
        DB::table('lead_statuses')
            ->where('id', $id)
            ->update([
                'display_name' => $newDisplayName,
                'updated_date' => now()
            ]);
        //  ADD THIS BLOCK (MASTER MENU SYNC)
        $status = DB::table('lead_statuses')
            ->where('id', $id)
            ->first();

        if ($status && !empty($status->route_name)) {

            DB::table('master_menus')
                ->where('route', $status->route_name)
                ->update([
                    'name' => $newDisplayName,
                    'updated_at' => now()
                ]);
        }
        return response()->json([
            'success' => true,
            'display_name' => $newDisplayName
        ]);
    }

    public function updateSequence(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'seq' => 'required|integer'
        ]);

        if ($validator->fails()) {

            return response()->json([
                'error' => $validator->errors()->first()
            ], 422);
        }

        DB::table('lead_statuses')
            ->where('id', $id)
            ->update([
                'seq' => $request->seq,
                'updated_date' => now()
            ]);

        return response()->json([
            'success' => true
        ]);
    }

    public function destroy($id)
    {
        $status = DB::table('lead_statuses')
            ->where('id', $id)
            ->first();

        if (!$status) {

            return redirect()->back()
                ->with('error', 'Status not found!');
        }

        $usedCount = DB::table('leads')
            ->where('status', $status->display_name)
            ->count();

        if ($usedCount > 0) {

            return redirect()->back()
                ->with(
                    'error',
                    'Cannot delete status because it is used in ' .
                        $usedCount .
                        ' leads.'
                );
        }

        DB::table('lead_statuses')
            ->where('id', $id)
            ->delete();

        return redirect()->route('lead-status.index')
            ->with('success', 'Status deleted successfully!');
    }

    public static function getStatusesForDropdown($role = null)
    {
        $query = DB::table('lead_statuses')
            ->where('is_active', 1)
            ->orderBy('seq', 'asc')
            ->orderBy('id', 'asc');

        $statuses = $query->get();
        if ($role) {
            $statuses = $statuses->filter(function ($status) use ($role) {
                if (
                    !$status->visible_role ||
                    $status->visible_role == 'NULL'
                ) {
                    return true;
                }

                $roles = explode(',', $status->visible_role);

                return in_array($role, $roles);
            });
        }

        return $statuses;
    }
}

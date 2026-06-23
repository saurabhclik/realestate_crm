<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DataCenterActionController extends Controller
{
    public function __construct()
    {
        $this->middleware('check.login');
        $this->middleware('reception.only');
    }

    public function index(Request $request)
    {
        $length = $request->get('length', 25);
        $actions = DB::table('data_center_actions')->orderBy('seq', 'asc')->paginate($length);
        return view('master.data-center-actions', compact('actions', 'length'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'display_name' => 'required|string|max:255',
            'system_name'  => 'required|string|max:255|unique:data_center_actions,system_name',
            'type'         => 'required|in:checkbox,status' // ADD THIS
        ]);

        if ($validator->fails()) return response()->json(['error' => $validator->errors()->first()], 422);

        $maxSeq = DB::table('data_center_actions')->max('seq') ?? 0;

        DB::table('data_center_actions')->insert([
            'display_name' => $request->display_name,
            'system_name'  => strtoupper(str_replace(' ', '_', $request->system_name)),
            'type'         => $request->type, // ADD THIS
            'seq'          => $maxSeq + 1,
            'is_active'    => 1,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        return response()->json(['success' => true]);
    }
    
    public function rename(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'display_name' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 422);
        }

        DB::table('data_center_actions')
            ->where('id', $id)
            ->update([
                'display_name' => $request->display_name,
                'updated_date' => now()
            ]);

        return response()->json(['success' => true]);
    }
    public function toggleActive($id)
    {
        $action = DB::table('data_center_actions')->where('id', $id)->first();
        if (!$action) return redirect()->back()->with('error', 'Not found!');

        $newStatus = $action->is_active ? 0 : 1;
        DB::table('data_center_actions')->where('id', $id)->update(['is_active' => $newStatus, 'updated_date' => now()]);

        return redirect()->back()->with('success', $newStatus ? 'Activated!' : 'Inactivated!');
    }

    public function destroy($id)
    {
        DB::table('data_center_actions')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Deleted!');
    }

    public function reorder(Request $request)
    {
        DB::transaction(function () use ($request) {
            foreach ($request->order as $index => $id) {
                DB::table('data_center_actions')->where('id', $id)->update(['seq' => $index + 1, 'updated_date' => now()]);
            }
        });
        return response()->json(['success' => true]);
    }

    public static function getActiveActions()
    {
        return DB::table('data_center_actions')
            ->where('is_active', 1)
            ->where('type', 'checkbox') 
            ->orderBy('seq', 'asc')
            ->get();
    }

    public static function getActiveStatuses()
    {
        return DB::table('data_center_actions')
            ->where('is_active', 1)
            ->where('type', 'status') 
            ->orderBy('seq', 'asc')
            ->get();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Services\DataCenterService;
use Flasher\Laravel\Facade\Flasher;
use League\Csv\Reader;

class DataCenterController extends Controller
{
    const STATUS_PENDING = 'PENDING';
    const STATUS_PROCESSING = 'PROCESSING';
    const STATUS_INTERESTED = 'INTERESTED';
    const STATUS_WHATSAPP = 'WHATSAPP';
    const STATUS_CALL_SCHEDULED = 'CALL SCHEDULED';
    const STATUS_MEETING_SCHEDULED = 'MEETING SCHEDULED';
    const STATUS_VISIT_SCHEDULED = 'VISIT SCHEDULED';
    const STATUS_VISIT_DONE = 'VISIT DONE';
    const STATUS_FUTURE = 'FUTURE LEAD';
    const STATUS_NOT_REACHABLE = 'NOT REACHABLE';
    const STATUS_WRONG_NUMBER = 'WRONG NUMBER';
    const STATUS_CHANNEL_PARTNER = 'CHANNEL PARTNER';
    const STATUS_NOT_INTERESTED = 'NOT INTERESTED';
    const STATUS_NOT_PICKED = 'NOT PICKED';
    const STATUS_LOST = 'LOST';

    protected $dataCenterService;

    public function __construct(DataCenterService $dataCenterService)
    {
        $this->dataCenterService = $dataCenterService;
    }

    public function pending(Request $request)
    {
        return $this->getDataByStatusType(
            $request,
            self::STATUS_PENDING,
            'pending'
        );
    }

    public function processing(Request $request)
    {
        return $this->getDataByStatusType(
            $request,
            self::STATUS_PROCESSING,
            'processing'
        );
    }

    public function interested(Request $request)
    {
        return $this->getDataByStatusType(
            $request,
            self::STATUS_INTERESTED,
            'interested'
        );
    }

    public function call_scheduled(Request $request)
    {
        return $this->getDataByStatusType(
            $request,
            self::STATUS_CALL_SCHEDULED,
            'call_scheduled'
        );
    }

    public function meeting_scheduled(Request $request)
    {
        return $this->getDataByStatusType(
            $request,
            self::STATUS_MEETING_SCHEDULED,
            'meeting_scheduled'
        );
    }

    public function visit_scheduled(Request $request)
    {
        return $this->getDataByStatusType(
            $request,
            self::STATUS_VISIT_SCHEDULED,
            'visit_scheduled'
        );
    }

    public function whatsApp(Request $request)
    {
        return $this->getDataByStatusType(
            $request,
            self::STATUS_WHATSAPP,
            'whatsApp'
        );
    }

    public function visit_done(Request $request)
    {
        return $this->getDataByStatusType(
            $request,
            self::STATUS_VISIT_DONE,
            'visit_done'
        );
    }

    public function future_leads(Request $request)
    {
        return $this->getDataByStatusType(
            $request,
            self::STATUS_FUTURE,
            'future'
        );
    }

    public function not_reachable(Request $request)
    {
        return $this->getDataByStatusType(
            $request,
            self::STATUS_NOT_REACHABLE,
            'not_reachable'
        );
    }

    public function wrong_number(Request $request)
    {
        return $this->getDataByStatusType(
            $request,
            self::STATUS_WRONG_NUMBER,
            'wrong_number'
        );
    }

    public function channel_partner(Request $request)
    {
        return $this->getDataByStatusType(
            $request,
            self::STATUS_CHANNEL_PARTNER,
            'channel_partner'
        );
    }

    public function not_interested(Request $request)
    {
        return $this->getDataByStatusType(
            $request,
            self::STATUS_NOT_INTERESTED,
            'not_interested'
        );
    }

    public function not_picked(Request $request)
    {
        return $this->getDataByStatusType(
            $request,
            self::STATUS_NOT_PICKED,
            'not_picked'
        );
    }

    public function lost(Request $request)
    {
        return $this->getDataByStatusType(
            $request,
            self::STATUS_LOST,
            'lost'
        );
    }


    private function getDataByStatusType(Request $request, $status, $page_name)
    {
        $length = $request->query('length', 10);

        $query = DB::table('data_center')
            ->where('status', $status)
            ->orderBy('id', 'desc');

        // SEARCH FILTER
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                    ->orWhere('phone', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%");
            });
        }

        // DATE FILTER
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $dataCenters = $query
            ->paginate($length)
            ->withQueryString();

        $projects = DB::table('projects')->get();

        return view('data-center.index', compact(
            'dataCenters',
            'projects',
            'page_name'
        ));
    }

    public function index(Request $request)
    {
        $categoryMap = DB::table('inv_catg')->pluck('name', 'id')->toArray();
        $subCategoryMap = DB::table('inv_subcatg')->pluck('name', 'id')->toArray();
        $projectMap = DB::table('projects')->pluck('project_name', 'id')->toArray();
        $sourceMap = DB::table('sources')->pluck('name', 'id')->toArray();

        $projects = DB::table('projects')->get();
        $createData = $this->dataCenterService->create();

        // Start query (NO get() here)
        $query = DB::table('data_center');

        //SEARCH FILTER
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                    ->orWhere('phone', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%");
            });
        }

        // STATUS FILTER
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // SOURCE FILTER
        if ($request->filled('source')) {
            $query->where('source', $request->source);
        }

        // DATE FILTER
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        // TAB FILTERING
        $activeTab = $request->get('tab', 'all');

        if ($activeTab === 'rejected') {
            $query->where('status', 'REJECTED')
                  ->where(function ($sub) {
                      $sub->whereNull('is_converted')
                          ->orWhere('is_converted', '!=', 1);
                  });
        } elseif ($activeTab === 'schedule') {
            $query->whereIn('status', ['CALL SCHEDULED', 'MEETING SCHEDULED', 'VISIT SCHEDULED', 'VISIT DONE'])
                  ->where(function ($sub) {
                      $sub->whereNull('is_converted')
                          ->orWhere('is_converted', '!=', 1);
                  });
        } elseif ($activeTab === 'converted') {
            $query->where('is_converted', 1);
        } else {
            // 'all' tab -> NOT rejected, NOT scheduled, NOT converted
            $query->where(function ($q) {
                $q->where(function ($sub) {
                    $sub->whereNull('is_converted')
                        ->orWhere('is_converted', '!=', 1);
                })
                ->whereNotIn('status', ['REJECTED', 'CALL SCHEDULED', 'MEETING SCHEDULED', 'VISIT SCHEDULED', 'VISIT DONE']);
            });
        }

        // PAGINATION LENGTH
        $length = $request->get('length', 10);

        if ($length === 'all') {
            $length = $query->count();
        }

        // PAGINATE
        $dataCenters = $query->orderBy('id', 'desc')->paginate($length)->withQueryString();

        // MAP AFTER PAGINATION (IMPORTANT)
        $dataCenters->getCollection()->transform(function ($row) use ($categoryMap, $subCategoryMap, $projectMap, $sourceMap) {

            if (!empty($row->source)) {
                $row->source = $sourceMap[$row->source] ?? $row->source;
            }

            $row->project_ids = $row->project_name;

            if (!empty($row->project_name)) {
                $projectIds = array_filter(array_map('trim', explode(',', $row->project_name)));

                $resolvedNames = array_map(function ($projectId) use ($projectMap) {
                    return $projectMap[$projectId] ?? $projectId;
                }, $projectIds);

                $row->project_name = implode(', ', $resolvedNames);
            }

            return $row;
        });

        return view('data-center.index', array_merge(compact('dataCenters', 'projects', 'activeTab'), $createData));
    }

    public function create()
    {
        // View is handled via modal in index.blade.php
        return redirect()->route('data-center.index');
    }

    public function store(Request $request)
    {
        $total = DB::table('data_center')->count();

        if ($total >= 500) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Data Center limit reached (500 records only). Please delete old data.');
        }
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|digits:10|unique:data_center,phone'
        ], [
            'phone.unique' => 'This phone number already exists.'
        ]);

        $propertyCategory = $this->resolvePropertyCategoryName($request->property_category);
        $propertySubCategory = $this->resolvePropertySubCategoryName($request->property_sub_category);

        $insertData = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'state' => $request->state,
            'city' => $request->city,
            'source' => $request->source,
            'property_type' => $request->property_type,
            'property_category' => $propertyCategory,
            'property_sub_category' => $propertySubCategory,
            'project_name' => implode(',', $request->project_name ?? []),
            'budget' => $request->budget,
            'comment' => $request->comment,
            'user_id' => session('user_id'),

        ];

        if (Schema::hasColumn('data_center', 'status')) {
            $insertData['status'] = 'pending';
        }

        DB::table('data_center')->insert($insertData);

        DB::table('data_center_history')->insert([
            'data_center_id' => DB::getPdo()->lastInsertId(),
            'user_id' => session('user_id'),
            'remark' => $request->comment,
            'remind_date' => $request->remind_date,
            'status' => 'pending',
            'remind_time' => $request->remind_time,
        ]);

        return redirect()->back()->with('success', 'Data created successfully.');
           
    }

    public function edit($id)
    {
        $data = DB::table('data_center')->find($id);

        if (!$data) {
            return response()->json(['success' => false, 'message' => 'Data not found.'], 404);
        }

        return response()->json(['success' => true, 'data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        // Only validate name and phone if they are being updated
        if ($request->filled('name') || $request->filled('phone')) {
            $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|digits:10|unique:data_center,phone,' . $id
            ], [
                'phone.unique' => 'This phone number already exists.'
            ]);
        }

        $updateData = [];

        // Only add fields to update if they are present in the request
        if ($request->filled('name')) $updateData['name'] = $request->input('name');
        if ($request->filled('email')) $updateData['email'] = $request->input('email');
        if ($request->filled('phone')) $updateData['phone'] = $request->input('phone');
        if ($request->filled('state')) $updateData['state'] = $request->input('state');
        if ($request->filled('city')) $updateData['city'] = $request->input('city');
        if ($request->filled('source')) $updateData['source'] = $request->input('source');
        if ($request->filled('property_type')) $updateData['property_type'] = $request->input('property_type');
        if ($request->filled('property_category')) {
            $updateData['property_category'] = $this->resolvePropertyCategoryName($request->input('property_category'));
        }
        if ($request->filled('property_sub_category')) {
            $updateData['property_sub_category'] = $this->resolvePropertySubCategoryName($request->input('property_sub_category'));
        }
        if ($request->filled('project_name')) {
            $updateData['project_name'] = implode(',', $request->input('project_name') ?? []);
        }
        if ($request->filled('budget')) $updateData['budget'] = $request->input('budget');
        if ($request->filled('comment')) $updateData['comment'] = $request->input('comment');
        if ($request->filled('status')) $updateData['status'] = $request->input('status');
       
        // Check if there's anything to update
        if (empty($updateData)) {
            if ($request->expectsJson()) {
                return response()->json(['success' => false, 'message' => 'No data provided to update.'], 400);
            }
            return redirect()->back()->with('error', 'No data provided to update.');
        }

        DB::table('data_center')->where('id', $id)->update($updateData);

        // Fetch existing status if not provided in request
        $existingData = DB::table('data_center')->where('id', $id)->first();
        $currentStatus = $request->status ?? ($existingData ? $existingData->status : 'PENDING');

        DB::table('data_center_history')->insert([
            'data_center_id' => $id,
            'user_id' => session('user_id'),
            'remark' => $request->comment ?? 'Data updated',
            'remind_date' => $request->remind_date,
            'status' => $currentStatus,
            'remind_time' => $request->remind_time,
        ]);

        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Data updated successfully.']);
        }

        return redirect()->back()->with('success', 'Data updated successfully.');
    }

    public function importUpload(Request $request)
    {

        if (session('user_type') !== 'admin') {
            return redirect()->back()->with('error', 'Only admin users can upload bulk data.');
        }

        $request->validate([
            'file' => 'required|mimes:csv,txt|max:4096',
        ]);

        if (!$request->hasFile('file')) {
            return redirect()->back()->with('error', 'Please select a CSV file to upload.');
        }

        $file = $request->file('file');
        if (!$file->isValid()) {
            return redirect()->back()->with('error', 'Uploaded file is not valid.');
        }

        $path = $file->storeAs('temp', uniqid() . '_' . $file->getClientOriginalName());
        $fullPath = storage_path('app/' . $path);

        if (!file_exists($fullPath)) {
            return redirect()->back()->with('error', 'Uploaded file could not be read.');
        }

        $csv = Reader::createFromPath($fullPath, 'r');
        $csv->setHeaderOffset(0);
        $records = $csv->getRecords();

        $currentCount = DB::table('data_center')->count();

        // Block if already 500
        if ($currentCount >= 500) {
            return redirect()->back()->with('error', 'Data Center already has 500 records.');
        }

        // Convert iterator to array
        $recordsArray = iterator_to_array($records);

        // Block if file > 500 rows
        if (count($recordsArray) > 500) {
            return redirect()->back()->with('error', 'You can upload maximum 500 records at a time.');
        }

        $success = 0;
        $duplicate = 0;
        $errors = [];
        $validationErrors = [];

        foreach ($recordsArray as $index => $row) {
            $rowNumber = $index + 2;

            if (empty(array_filter($row))) {
                $validationErrors[] = "Row $rowNumber: Empty row skipped.";
                continue;
            }

            // Clean keys once per row
            $cleanRow = [];
            foreach ($row as $key => $value) {
                $cleanKey = preg_replace('/[\x00-\x1F\x7F\xA0]/u', '', $key);
                $cleanKey = trim($cleanKey, "\xEF\xBB\xBF");
                $keyLower = strtolower(trim($cleanKey));
                $cleanRow[$keyLower] = trim($value);
            }

            // Extract phone
            $phone = $cleanRow['phone no.'] ?? $cleanRow['phone'] ?? $cleanRow['phone no'] ?? $cleanRow['phone number'] ?? '';
            
            if (empty($phone)) {
                $validationErrors[] = "Row $rowNumber: Phone number is required.";
                continue;
            }

            $originalPhone = $phone;
            $phone = preg_replace('/\D/', '', $phone);
            if (strlen($phone) === 12 && substr($phone, 0, 2) === '91') {
                $phone = substr($phone, 2);
            }

            if (!preg_match('/^[6-9]\d{9}$/', $phone)) {
                $validationErrors[] = "Row $rowNumber: Invalid phone number '$originalPhone'.";
                continue;
            }

            // Extract name
            $name = $cleanRow['name'] ?? $cleanRow['full name'] ?? $cleanRow['customer name'] ?? '';

            if (empty($name)) {
                $validationErrors[] = "Row $rowNumber: Name is required.";
                continue;
            }

            // Extract email
            $email = $cleanRow['email'] ?? $cleanRow['e-mail'] ?? $cleanRow['mail'] ?? '';

            if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $validationErrors[] = "Row $rowNumber: Invalid email format '$email'.";
                continue;
            }

            // Extract other fields
            $source = $cleanRow['source'] ?? '';
            $state = $cleanRow['state'] ?? '';
            $city = $cleanRow['city'] ?? '';
            $property_type = $cleanRow['property type'] ?? $cleanRow['type'] ?? '';
            $property_category = $cleanRow['property category'] ?? $cleanRow['category'] ?? '';
            $property_sub_category = $cleanRow['property sub category'] ?? $cleanRow['sub category'] ?? $cleanRow['sub_category'] ?? '';
            $project_name = $cleanRow['project name'] ?? $cleanRow['project_name'] ?? $cleanRow['project'] ?? '';
            $budget = $cleanRow['budget'] ?? '';
            $comment = $cleanRow['comment'] ?? '';

            $existingData = DB::table('data_center')
                ->where('phone', $phone)
                ->first();

            if ($existingData) {
                $duplicate++;
                continue;
            }

            $resolvedCategory = $this->resolvePropertyCategoryName($property_category);
            $resolvedSubCategory = $this->resolvePropertySubCategoryName($property_sub_category);

            try {
                $rowData = [
                    'name' => $name,
                    'email' => $email ?: null,
                    'phone' => $phone,
                    'state' => $state,
                    'city' => $city,
                    'source' => $source,
                    'property_type' => $property_type,
                    'property_category' => $resolvedCategory,
                    'property_sub_category' => $resolvedSubCategory,
                    'project_name' => $project_name,
                    'budget' => $budget,
                    'comment' => $comment,
                    'user_id' => session('user_id'),
                ];

                if (Schema::hasColumn('data_center', 'status')) {
                    $rowData['status'] = 'pending';
                }

                DB::table('data_center')->insert($rowData);
                $success++;
            } catch (\Exception $e) {
                $errors[] = "Row $rowNumber: Database error - " . $e->getMessage();
            }
        }

        if (file_exists($fullPath)) {
            unlink($fullPath);
        }

        $summaryMessage = "";
        if ($success > 0) {
            $summaryMessage .= "✅ $success row(s) imported successfully. ";
        }
        if ($duplicate > 0) {
            $summaryMessage .= "⚠️ $duplicate duplicate(s) skipped. ";
        }

        $allMessages = [];
        if ($success > 0) {
            $allMessages[] = "success <small>✅ $success new row(s) imported successfully.</small>";
        }

        if ($duplicate > 0) {
            $allMessages[] = "warning <small>⚠️ $duplicate duplicate(s) skipped.</small>";
        }

        foreach ($validationErrors as $message) {
            $allMessages[] = "error <small>❌ $message</small>";
        }
        
        if (!empty($validationErrors)) {
            if (empty($summaryMessage)) {
                $summaryMessage = "❌ Found " . count($validationErrors) . " validation error(s). ";
            } else {
                $summaryMessage .= "❌ Found " . count($validationErrors) . " validation error(s). ";
            }
        }

        foreach ($errors as $message) {
            $allMessages[] = "error <small>❌ $message</small>";
        }
        
        if (!empty($errors)) {
            if (empty($summaryMessage)) {
                $summaryMessage = "❌ Found " . count($errors) . " database error(s). ";
            } else {
                $summaryMessage .= "❌ Found " . count($errors) . " database error(s). ";
            }
        }

        session()->flash('import_messages', $allMessages);

        if (!empty($summaryMessage)) {
            if ($success > 0 && empty($validationErrors) && empty($errors)) {
                Flasher::addSuccess(trim($summaryMessage));
            } elseif ($success > 0 && (!empty($validationErrors) || !empty($errors))) {
                Flasher::addWarning(trim($summaryMessage) . " Check details below.");
            } elseif ($duplicate > 0 && $success == 0 && empty($validationErrors) && empty($errors)) {
                Flasher::addWarning(trim($summaryMessage));
            } else {
                Flasher::addError(trim($summaryMessage) . " Check details below.");
            }
        } else {
            Flasher::addSuccess("✅ File processed successfully. No records were imported.");
        }

        return redirect()->back();
    }

    private function resolvePropertyCategoryName($category)
    {
        if (empty($category)) {
            return null;
        }

        if (is_numeric($category)) {
            $record = DB::table('inv_catg')->find($category);
            return $record->name ?? $category;
        }

        return $category;
    }

    private function resolvePropertySubCategoryName($subCategory)
    {
        if (empty($subCategory)) {
            return null;
        }

        if (is_numeric($subCategory)) {
            $record = DB::table('inv_subcatg')->find($subCategory);
            return $record->name ?? $subCategory;
        }

        return $subCategory;
    }

    public function destroy($id)
    {
        try {

            $data = DB::table('data_center')->where('id', $id)->first();

            if (!$data) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data not found.'
                ], 404);
            }

            DB::table('data_center')->where('id', $id)->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data deleted successfully.'
            ], 200);
        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Error deleting data.'
            ], 500);
        }
    }

    public function updateStatusApi(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'status' => 'required|string',
                'comment' => 'nullable|string',
                'remind_date' => 'nullable|date',
                'remind_time' => 'nullable',
                'is_converted' => 'nullable'
            ]);

            $updateData = [
                'status' => strtoupper($request->status),
            ];

            if ($request->filled('comment')) {
                $updateData['comment'] = $request->comment;
            }

            if ((int)$request->is_converted === 1) {

                $alreadyConverted = DB::table('data_center')
                    ->where('id', $id)
                    ->where('is_converted', 1)
                    ->exists();

                if ($alreadyConverted) {
                    DB::rollBack(); 
                    return response()->json([
                        'success' => false,
                        'message' => 'Already converted'
                    ], 400);
                }

                $data = DB::table('data_center')->find($id);

                if (!$data) {
                    throw new \Exception('Record not found');
                }

                $userId = session('user_id') ?? 1;

                DB::table('leads')->insert([
                    'name' => $data->name ?? '',
                    'email' => $data->email ?? '',
                    'phone' => $data->phone ?? '',

                    'property_city' => $data->city ?? '',
                    'property_state' => $data->state ?? '',

                    'source' => $data->source ?? '',
                    'type' => $data->property_type ?? '',

                    'catg_id' => $catgId ?? null,
                    'sub_catg_id' => $subCatgId ?? null,

                    'project_id' => $data->project_name ?? '',
                    'budget' => $data->budget ?? '',
                    'last_comment' => $request->comment ?? '',

                    'status' => strtoupper($request->status),
                    'user_id' => $userId,

                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $updateData['is_converted'] = 1;
            }

            DB::table('data_center')->where('id', $id)->update($updateData);

            DB::table('data_center_history')->insert([
                'data_center_id' => $id,
                'user_id' => session('user_id'),
                'remark' => $request->comment,
                'remind_date' => $request->remind_date,
                'status' => strtoupper($request->status),
                'remind_time' => $request->remind_time,
            ]);

            DB::commit();

            //IMPORTANT RESPONSE
            $data = DB::table('data_center')->find($id);

            return response()->json([
                'success' => true,
                'message' => 'Status updated successfully',
                'data' => $data
            ]);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function getConvertedLeads()
    {
        try {
            $convertedLeads = DB::table('data_center')
                ->where('is_converted', 1)
                ->orderBy('updated_at', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'leads' => $convertedLeads,
                'count' => $convertedLeads->count()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch converted leads'
            ], 500);
        }
    }

    public function getComments($id)
    {
        try {
            $comments = DB::table('data_center_history')
                ->where('data_center_id', $id)
                ->leftJoin('users', 'data_center_history.user_id', '=', 'users.id')
                ->select(
                    'data_center_history.*',
                    'users.name as user_name'
                )
                ->orderBy('data_center_history.created_at', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'comments' => $comments
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch comments'
            ], 500);
        }
    }


    public function addComment(Request $request, $id)
    {
        // get main data center record
        $data = DB::table('data_center')
            ->where('id', $id)
            ->first();

        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found'
            ]);
        }

        DB::table('data_center_history')->insert([
            'data_center_id' => $id,
            'remark' => $request->remark,
            'status' => $data->status,
            'user_id' => Session::get('user_id'),
            'created_at' => now(),
        ]);

        // update latest comment in main table
        DB::table('data_center')
            ->where('id', $id)
            ->update([
                'comment' => strip_tags($request->remark)
            ]);

        return response()->json([
            'success' => true,
            'message' => 'Comment added successfully'
        ]);
    }
}

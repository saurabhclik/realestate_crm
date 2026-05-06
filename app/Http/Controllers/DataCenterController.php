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
    protected $dataCenterService;

    public function __construct(DataCenterService $dataCenterService)
    {
        $this->dataCenterService = $dataCenterService;
    }

    public function create()
    {
        $data = $this->dataCenterService->create();
        $users = session('user_type') === 'admin'
            ? DB::table('users')->get()
            : null;

        return view('data_center.create_data', array_merge($data, ['users' => $users]));
    }


    public function store(Request $request)
    {
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
            'changed_by' => $request->changed_by,
        ];

        if (Schema::hasColumn('data_center', 'status')) {
            $insertData['status'] = 'pending';
        }

        DB::table('data_center')->insert($insertData);

        return redirect()->route('data-center.index')
            ->with('success', 'Data created successfully.');
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

        $success = 0;
        $duplicate = 0;
        $errors = [];
        $validationErrors = [];

        foreach ($records as $index => $row) {
            $rowNumber = $index + 2;

            if (empty(array_filter($row))) {
                $validationErrors[] = "Row $rowNumber: Empty row skipped.";
                continue;
            }

            $phone = '';
            foreach ($row as $key => $value) {
                $keyLower = strtolower(trim($key));
                if (in_array($keyLower, ['phone no.', 'phone', 'phone no', 'phone number'])) {
                    $phone = trim($value);
                    break;
                }
            }

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

            $name = '';
            foreach ($row as $key => $value) {
                $keyLower = strtolower(trim($key));
                if (in_array($keyLower, ['name', 'full name', 'customer name'])) {
                    $name = trim($value);
                    break;
                }
            }

            if (empty($name)) {
                $validationErrors[] = "Row $rowNumber: Name is required.";
                continue;
            }

            $email = '';
            foreach ($row as $key => $value) {
                $keyLower = strtolower(trim($key));
                if (in_array($keyLower, ['email', 'e-mail', 'mail'])) {
                    $email = trim($value);
                    break;
                }
            }

            if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $validationErrors[] = "Row $rowNumber: Invalid email format '$email'.";
                continue;
            }

            $source = '';
            $state = '';
            $city = '';
            $property_type = '';
            $property_category = '';
            $property_sub_category = '';
            $project_name = '';
            $budget = '';
            $comment = '';
            $changed_by = '';

            foreach ($row as $key => $value) {
                $keyLower = strtolower(trim($key));
                $cellValue = trim($value);
                if (in_array($keyLower, ['source'])) {
                    $source = $cellValue;
                }
                if (in_array($keyLower, ['state'])) {
                    $state = $cellValue;
                }
                if (in_array($keyLower, ['city'])) {
                    $city = $cellValue;
                }
                if (in_array($keyLower, ['property type', 'type'])) {
                    $property_type = $cellValue;
                }
                if (in_array($keyLower, ['property category', 'category'])) {
                    $property_category = $cellValue;
                }
                if (in_array($keyLower, ['property sub category', 'sub category', 'sub_category'])) {
                    $property_sub_category = $cellValue;
                }
                if (in_array($keyLower, ['project name', 'project_name', 'project'])) {
                    $project_name = $cellValue;
                }
                if (in_array($keyLower, ['budget'])) {
                    $budget = $cellValue;
                }
                if (in_array($keyLower, ['comment'])) {
                    $comment = $cellValue;
                }
                if (in_array($keyLower, ['approved by', 'changed by', 'changed_by'])) {
                    $changed_by = $cellValue;
                }
            }

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
                    'changed_by' => $changed_by,
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

        $allMessages = [];
        if ($success > 0) {
            $allMessages[] = "success $success row(s) imported successfully.";
        }

        if ($duplicate > 0) {
            $allMessages[] = "warning $duplicate duplicate(s) skipped because they already exist.";
        }

        foreach ($validationErrors as $message) {
            $allMessages[] = "error $message";
        }
        foreach ($errors as $message) {
            $allMessages[] = "error $message";
        }

        session()->flash('import_messages', $allMessages);

        if ($success > 0 && empty($validationErrors) && empty($errors)) {
            Flasher::addSuccess(" $success row(s) imported successfully.");
        } elseif ($success > 0 && (!empty($validationErrors) || !empty($errors))) {
            Flasher::addWarning(" $success row(s) imported with some issues. Check details below.");
        } elseif ($duplicate > 0 && $success === 0 && empty($validationErrors) && empty($errors)) {
            Flasher::addWarning(" No new rows imported. All rows already existed.");
        } else {
            Flasher::addError(' Import finished with errors. Check the details below.');
        }

        return redirect()->back();
    }

    public function index()
    {
        $categoryMap = DB::table('inv_catg')->pluck('name', 'id')->toArray();
        $subCategoryMap = DB::table('inv_subcatg')->pluck('name', 'id')->toArray();
        $projectMap = DB::table('projects')->pluck('project_name', 'id')->toArray();

        $dataCenters = DB::table('data_center')->get()->map(function ($row) use ($categoryMap, $subCategoryMap, $projectMap) {
            if (!empty($row->property_category) && is_numeric($row->property_category)) {
                $row->property_category = $categoryMap[$row->property_category] ?? $row->property_category;
            }
            if (!empty($row->property_sub_category) && is_numeric($row->property_sub_category)) {
                $row->property_sub_category = $subCategoryMap[$row->property_sub_category] ?? $row->property_sub_category;
            }

            if (!empty($row->project_name)) {
                $projectIds = array_filter(array_map('trim', explode(',', $row->project_name)));
                $resolvedNames = array_map(function ($projectId) use ($projectMap) {
                    return $projectMap[$projectId] ?? $projectId;
                }, $projectIds);
                $row->project_name = implode(', ', $resolvedNames);
            }

            return $row;
        });

        return view('data_center.index', compact('dataCenters'));
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
            DB::table('data_center')->where('id', $id)->delete();
            return response()->json(['success' => true, 'message' => 'Data deleted successfully.'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error deleting data.'], 500);
        }
    }
}

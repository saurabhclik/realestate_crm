<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Validation\Rule;

class MasterController extends Controller
{
    public function form_field()
    {
        try {
            $settings = DB::table('settings')->where('id', 1)->first();
            return view('master.form-field', compact('settings'));
        } catch (\Exception $e) {
            Flasher::addError('Failed to load form field settings: ' . $e->getMessage());
            return back();
        }
    }

    public function update_settings(Request $request)
    {
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'field1' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                foreach ($validator->errors()->all() as $error) {
                    Flasher::addError($error);
                }
                return redirect()->back()->withInput();
            }

            DB::table('settings')->where('id', 1)->update([
                'field1' => $request->input('field1'),
                'is_rpt_field1' => $request->has('is_rpt_field1') ? 1 : 0,
            ]);

            DB::commit();
            Flasher::addSuccess('Settings updated successfully.');
            return redirect()->route('form.field');
        } catch (\Exception $e) {
            DB::rollBack();
            Flasher::addError('Failed to update settings: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function project_name(Request $request)
    {
        try {
            // Add these (same as campaign)
            $length = $request->query('length', 10);
            $sortColumn = $request->query('sort', 'id');
            $sortDirection = $request->query('direction', 'desc');
            $sortDirection = in_array($sortDirection, ['asc', 'desc']) ? $sortDirection : 'desc';
            $allowedColumns = ['id', 'name', 'created_at'];
            $sortColumn = in_array($sortColumn, $allowedColumns) ? $sortColumn : 'id';

            $projects = DB::table("projects")
                ->orderBy($sortColumn, $sortDirection)
                ->paginate((int)$length)
                ->appends([
                    'sort' => $sortColumn,
                    'direction' => $sortDirection,
                    'length' => $length
                ]);

            $categoryList = DB::table('category')->select('id', 'name')->get();

            return view('master.projects', compact(
                'projects',
                'categoryList',
                'length',
                'sortColumn',
                'sortDirection'
            ));
        } catch (\Exception $e) {
            Flasher::addError('Failed to load projects: ' . $e->getMessage());
            return back();
        }
    }

    public function store_project(Request $request)
    {
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'name' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('projects', 'project_name')
                ]
            ]);

            if ($validator->fails()) {
                foreach ($validator->errors()->all() as $error) {
                    Flasher::addError($error);
                }
                return redirect()->back()->withInput();
            }

            DB::table('projects')->insert([
                'project_name' => $request->name,
            ]);

            DB::commit();
            Flasher::addSuccess('Project created successfully.');
            return redirect()->route('project.name');
        } catch (\Exception $e) {
            DB::rollBack();
            Flasher::addError('Failed to create project: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function update_project(Request $request)
    {
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|exists:projects,id',
                'name' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('projects', 'project_name')
                ],
            ]);

            if ($validator->fails()) {
                foreach ($validator->errors()->all() as $error) {
                    Flasher::addError($error);
                }
                return redirect()->back()->withInput();
            }

            DB::table('projects')
                ->where('id', $request->id)
                ->update([
                    'project_name' => $request->name,
                ]);

            DB::commit();
            Flasher::addSuccess('Project updated successfully.');
            return redirect()->route('project.name');
        } catch (\Exception $e) {
            DB::rollBack();
            Flasher::addError('Failed to update project: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function campaign(Request $request)
    {
        $user_role = session()->get('user_type');
        if ($user_role !== 'admin' && $user_role !== 'team_manager') {
            abort(404);
        }

        try {

            $length = $request->query('length', 10);
            $sortColumn = $request->query('sort', 'id');
            $sortDirection = $request->query('direction', 'desc');
            $sortDirection = in_array($sortDirection, ['asc', 'desc']) ? $sortDirection : 'desc';
            $allowedColumns = ['id', 'name', 'created_at'];
            $sortColumn = in_array($sortColumn, $allowedColumns) ? $sortColumn : 'id';

            $campaigns = DB::table('campaigns')
                ->orderBy($sortColumn, $sortDirection)
                ->paginate((int)$length)
                ->appends([
                    'sort' => $sortColumn,
                    'direction' => $sortDirection,
                    'length' => $length
                ]);

            $categoryList = DB::table('category')->select('id', 'name')->get();

            return view('master.campaigns', compact(
                'campaigns',
                'categoryList',
                'length',
                'sortColumn',
                'sortDirection'
            ));
        } catch (\Exception $e) {
            Flasher::addError('Failed to load campaigns: ' . $e->getMessage());
            return back();
        }
    }

    public function campaign_store(Request $request)
    {
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'name' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('campaigns', 'name')
                ],
            ]);

            if ($validator->fails()) {
                foreach ($validator->errors()->all() as $error) {
                    Flasher::addError($error);
                }
                return redirect()->back()->withInput();
            }

            DB::table('campaigns')->insert([
                'name' => $request->name,
            ]);

            DB::commit();
            Flasher::addSuccess('Campaign created successfully.');
            return redirect()->route('campaign');
        } catch (\Exception $e) {
            DB::rollBack();
            Flasher::addError('Failed to create campaign: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function campaign_update(Request $request)
    {
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|exists:campaigns,id',
                'name' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('campaigns', 'name')
                ],
            ]);

            if ($validator->fails()) {
                foreach ($validator->errors()->all() as $error) {
                    Flasher::addError($error);
                }
                return redirect()->back()->withInput();
            }

            DB::table('campaigns')
                ->where('id', $request->id)
                ->update([
                    'name' => $request->name,
                ]);

            DB::commit();
            Flasher::addSuccess('Campaign updated successfully.');
            return redirect()->route('campaign');
        } catch (\Exception $e) {
            DB::rollBack();
            Flasher::addError('Failed to update campaign: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function source_platform(Request $request)
    {
        $user_role = session()->get('user_type');
        if ($user_role !== 'admin' && $user_role !== 'team_manager') {
            abort(404);
        }

        try {
            //  Pagination + Sorting params
            $length = $request->query('length', 10);
            $sortColumn = $request->query('sort', 'id');
            $sortDirection = $request->query('direction', 'asc');
            $sortDirection = in_array($sortDirection, ['asc', 'desc']) ? $sortDirection : 'asc';
            $allowedColumns = ['id', 'name', 'created_at'];

            $sortColumn = in_array($sortColumn, $allowedColumns) ? $sortColumn : 'id';

            //  Main query
            $sources = DB::table('sources')
                ->orderBy($sortColumn, $sortDirection)
                ->paginate((int)$length)
                ->appends([
                    'sort' => $sortColumn,
                    'direction' => $sortDirection,
                    'length' => $length
                ]);

            $categoryList = DB::table('category')->select('id', 'name')->get();

            return view('master.source-platform', compact(
                'sources',
                'categoryList',
                'length',
                'sortColumn',
                'sortDirection'
            ));
        } catch (\Exception $e) {
            Flasher::addError('Failed to load sources: ' . $e->getMessage());
            return back();
        }
    }

    public function source_create(Request $request)
    {
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'name' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('sources', 'name')
                ],
            ]);

            if ($validator->fails()) {
                foreach ($validator->errors()->all() as $error) {
                    Flasher::addError($error);
                }
                return redirect()->back()->withInput();
            }

            DB::table('sources')->insert([
                'name' => $request->name,
            ]);

            DB::commit();
            Flasher::addSuccess('Source created successfully.');
            return redirect()->route('source.platform');
        } catch (\Exception $e) {
            DB::rollBack();
            Flasher::addError('Failed to create source: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function source_update(Request $request)
    {
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|exists:sources,id',
                'name' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('sources', 'name')
                ],
            ]);

            if ($validator->fails()) {
                foreach ($validator->errors()->all() as $error) {
                    Flasher::addError($error);
                }
                return redirect()->back()->withInput();
            }

            DB::table('sources')
                ->where('id', $request->id)
                ->update([
                    'name' => $request->name,
                ]);

            DB::commit();
            Flasher::addSuccess('Source updated successfully.');
            return redirect()->route('source.platform');
        } catch (\Exception $e) {
            DB::rollBack();
            Flasher::addError('Failed to update source: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function checklist_store(Request $request)
    {
        $user_role = session()->get('user_type');
        if ($user_role !== 'admin' && $user_role !== 'team_manager') {
            abort(404);
        }

        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'name' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('checklist', 'name')
                ],
            ]);

            if ($validator->fails()) {
                foreach ($validator->errors()->all() as $error) {
                    Flasher::addError($error);
                }
                return redirect()->back()->withInput();
            }

            DB::table('checklist')->insert([
                'name' => $request->name,
                'type' => 'post_sale',
            ]);

            DB::commit();
            Flasher::addSuccess('Checklist created successfully.');
            return redirect()->route('check.list');
        } catch (\Exception $e) {
            DB::rollBack();
            Flasher::addError('Failed to create checklist: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function check_list(Request $request)
    {
        $activeFeatures = Session::get('active_features', []);
        if (in_array('post_sale', $activeFeatures)) {

            $user_role = session()->get('user_type');
            if ($user_role !== 'admin') {
                abort(404);
            }

            try {
                // Params
                $length = $request->query('length', 10);
                $sortColumn = $request->query('sort', 'id');
                $sortDirection = $request->query('direction', 'desc');
                $sortDirection = in_array($sortDirection, ['asc', 'desc']) ? $sortDirection : 'desc';
                $allowedColumns = ['id', 'name', 'created_at'];
                $sortColumn = in_array($sortColumn, $allowedColumns) ? $sortColumn : 'id';

                // Query
                $checklists = DB::table('checklist')
                    ->orderBy($sortColumn, $sortDirection)
                    ->paginate((int)$length)
                    ->appends([
                        'sort' => $sortColumn,
                        'direction' => $sortDirection,
                        'length' => $length
                    ]);

                $categoryList = DB::table('category')->select('id', 'name')->get();

                return view('master.check-list', compact(
                    'checklists',
                    'categoryList',
                    'length',
                    'sortColumn',
                    'sortDirection'
                ));
            } catch (\Exception $e) {
                Flasher::addError('Failed to load checklists: ' . $e->getMessage());
                return back();
            }
        } else {
            abort(404);
        }
    }

    public function checklist_update(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->merge([
                'type' => strtolower(trim($request->type))
            ]);

            $validator = Validator::make($request->all(), [
                'id' => 'required|exists:checklist,id',
                'type' => 'required|string|in:buyer,seller,common,post_sale',
                'name' => [
                    'required',
                    'string',
                    'max:255',
                ],
            ]);

            if ($validator->fails()) {
                foreach ($validator->errors()->all() as $error) {
                    Flasher::addError($error);
                }
                return redirect()->back()->withInput();
            }

            DB::table('checklist')
                ->where('id', $request->id)
                ->update([
                    'type' => $request->type,
                    'name' => $request->name,
                ]);

            DB::commit();
            Flasher::addSuccess('Check List updated successfully.');
            return redirect()->route('check.list');
        } catch (\Exception $e) {
            DB::rollBack();
            Flasher::addError('Failed to update checklist: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function project_category(Request $request)
    {
        $user_role = session()->get('user_type');
        if ($user_role !== 'admin' && $user_role !== 'team_manager') {
            abort(404);
        }
        try {
            $length = $request->query('length', 10);
            $sortColumn = $request->query('sort', 'id');
            $sortDirection = $request->query('direction', 'asc');
            $sortDirection = in_array($sortDirection, ['asc', 'desc']) ? $sortDirection : 'asc';
            $allowedColumns = ['id', 'name', 'code', 'created_at'];
            $sortColumn = in_array($sortColumn, $allowedColumns) ? $sortColumn : 'id';

            $categories = DB::table("inv_catg")
                ->orderBy($sortColumn, $sortDirection)
                ->paginate((int)$length)
                ->appends([
                    'sort' => $sortColumn,
                    'direction' => $sortDirection,
                    'length' => $length
                ]);

            $categoryList = DB::table('category')->select('id', 'name')->get();

            return view('master.project-category', compact('categories', 'categoryList', 'length', 'sortColumn', 'sortDirection'));
        } catch (\Exception $e) {
            Flasher::addError('Failed to load categories: ' . $e->getMessage());
            return back();
        }
    }

    public function project_category_store(Request $request)
    {
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'cat_type' => 'required|string',
                'name' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('inv_catg', 'name')
                ],
            ]);

            if ($validator->fails()) {
                foreach ($validator->errors()->all() as $error) {
                    Flasher::addError($error);
                }
                return redirect()->back()->withInput();
            }

            DB::table('inv_catg')->insert([
                'name' => $request->name,
                'type' => $request->cat_type
            ]);

            DB::commit();
            Flasher::addSuccess('Category created successfully.');
            return redirect()->route('project.category');
        } catch (\Exception $e) {
            DB::rollBack();
            Flasher::addError('Failed to create source: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function category_update(Request $request)
    {
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|exists:inv_catg,id',
                'cat_type' => 'required|string',
                'name' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('inv_catg', 'name')
                ],
            ]);

            if ($validator->fails()) {
                foreach ($validator->errors()->all() as $error) {
                    Flasher::addError($error);
                }
                return redirect()->back()->withInput();
            }

            DB::table('inv_catg')
                ->where('id', $request->id)
                ->update([
                    'type' => $request->cat_type,
                    'name' => $request->name,
                ]);

            DB::commit();
            Flasher::addSuccess('Category updated successfully.');
            return redirect()->route('project.category');
        } catch (\Exception $e) {
            DB::rollBack();
            Flasher::addError('Failed to update category: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function project_sub_category(Request $request)
    {
        $user_role = session()->get('user_type');
        if ($user_role !== 'admin' && $user_role !== 'team_manager') {
            abort(404);
        }

        try {

            $length = $request->query('length', 10);
            $sortColumn = $request->query('sort', 'a.id');
            $sortDirection = $request->query('direction', 'asc');
            $sortDirection = in_array($sortDirection, ['asc', 'desc']) ? $sortDirection : 'asc';
            $allowedColumns = ['a.id', 'a.name', 'a.created_at', 'b.name'];
            $sortColumn = in_array($sortColumn, $allowedColumns) ? $sortColumn : 'a.id';

            //Query with sorting + pagination
            $project_sub_categories = DB::table('inv_subcatg as a')
                ->join('inv_catg as b', 'a.catg_id', '=', 'b.id')
                ->select('a.*', 'b.name as cat_name', 'b.type as type')
                ->orderBy($sortColumn, $sortDirection)
                ->paginate((int)$length)
                ->appends([
                    'sort' => $sortColumn,
                    'direction' => $sortDirection,
                    'length' => $length
                ]);

            $categories = $this->getCategories();
            $categoryList = DB::table('category')->select('id', 'name')->get();

            return view('master.project-sub-category', compact(
                'project_sub_categories',
                'categories',
                'categoryList',
                'length',
                'sortColumn',
                'sortDirection'
            ));
        } catch (\Exception $e) {
            Flasher::addError('Failed to load sub categories: ' . $e->getMessage());
            return back();
        }
    }

    public function sub_category_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required|exists:inv_catg,id',
            'name'     => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            DB::table('inv_subcatg')->insert([
                'catg_id' => $request->category,
                'name'    => $request->name,
            ]);

            Flasher::addSuccess('Sub Category created successfully!');
            return redirect()->back();
        } catch (\Exception $e) {
            Flasher::addError('Failed to create sub category: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    public function sub_category_update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required|exists:inv_catg,id',
            'name'     => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            DB::table('inv_subcatg')
                ->where('id', $id)
                ->update([
                    'catg_id' => $request->category,
                    'name'    => $request->name,
                ]);

            Flasher::addSuccess('Sub Category updated successfully!');
            return redirect()->back();
        } catch (\Exception $e) {
            Flasher::addError('Failed to update sub category: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    private function getCategories()
    {
        return DB::table('inv_catg')->get();
    }

    private function getSubcategories($categoryId)
    {
        $subcategories = DB::table('inv_subcatg')->where('catg_id', $categoryId)->get();
        return response()->json($subcategories);
    }

    public function attendance(Request $request)
    {
        try {
            //Params
            $length = $request->query('length', 10);
            $sortColumn = $request->query('sort', 'id');
            $sortDirection = $request->query('direction', 'desc');
            $sortDirection = in_array($sortDirection, ['asc', 'desc']) ? $sortDirection : 'desc';
            $allowedColumns = ['id', 'name', 'created_at'];
            $sortColumn = in_array($sortColumn, $allowedColumns) ? $sortColumn : 'id';

            // Query
            $attendanceTypes = DB::table('attendance_types')
                ->orderBy($sortColumn, $sortDirection)
                ->paginate((int)$length)
                ->appends([
                    'sort' => $sortColumn,
                    'direction' => $sortDirection,
                    'length' => $length
                ]);

            return view('master.attendance', compact(
                'attendanceTypes',
                'length',
                'sortColumn',
                'sortDirection'
            ));
        } catch (\Exception $e) {
            Flasher::addError('Failed to load attendance types: ' . $e->getMessage());
            return back();
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:50',
            'hours' => 'required|numeric|min:0|max:24',
        ]);

        DB::table('attendance_types')->insert([
            'type' => $request->type,
            'hours' => $request->hours,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Attendance type added.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|string|max:50',
            'hours' => 'required|numeric|min:0|max:24',
        ]);

        DB::table('attendance_types')
            ->where('id', $id)
            ->update([
                'type' => $request->type,
                'hours' => $request->hours,
                'updated_at' => now(),
            ]);

        return back()->with('success', 'Attendance type updated.');
    }

    public function inquiry_question(Request $request)
    {
        try {
            // Params
            $length = $request->query('length', 10);
            $sortColumn = $request->query('sort', 'created_at');
            $sortDirection = $request->query('direction', 'desc');
            $sortDirection = in_array($sortDirection, ['asc', 'desc']) ? $sortDirection : 'desc';
            $allowedColumns = ['id', 'question', 'created_at'];
            $sortColumn = in_array($sortColumn, $allowedColumns) ? $sortColumn : 'created_at';

            //Query
            $questions = DB::table('inquiry_questions')
                ->orderBy($sortColumn, $sortDirection)
                ->paginate((int)$length)
                ->appends([
                    'sort' => $sortColumn,
                    'direction' => $sortDirection,
                    'length' => $length
                ]);

            return view('master.inquiry-questions', compact(
                'questions',
                'length',
                'sortColumn',
                'sortDirection'
            ));
        } catch (\Exception $e) {
            Flasher::addError('Failed to load questions: ' . $e->getMessage());
            return back();
        }
    }

    public function inquiry_question_store(Request $request)
    {
        $request->validate([
            'question_text' => 'required|string|max:255',
            'is_active' => 'nullable|boolean',
        ]);

        $exists = DB::table('inquiry_questions')
            ->whereRaw('LOWER(question_text) = ?', [strtolower($request->question_text)])
            ->exists();

        if ($exists) {
            Flasher::addError('This inquiry question already exists.');
            return redirect()->back()->withInput();
        }

        try {
            DB::table('inquiry_questions')->insert([
                'question_text' => $request->question_text,
                'is_active' => $request->has('is_active') ? 1 : 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            Flasher::addSuccess('Inquiry question added successfully.');
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
        }

        return redirect()->back();
    }

    public function inquiry_question_update(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'question_text' => 'required|string|max:255',
            'is_active' => 'nullable|boolean',
        ]);
        $exists = DB::table('inquiry_questions')
            ->whereRaw('LOWER(question_text) = ?', [strtolower($request->question_text)])
            ->where('id', '!=', $request->id)
            ->exists();

        if ($exists) {
            Flasher::addError('This inquiry question already exists.');
            return redirect()->back()->withInput();
        }
        try {
            DB::table('inquiry_questions')
                ->where('id', $request->id)
                ->update([
                    'question_text' => $request->question_text,
                    'is_active' => $request->has('is_active') ? 1 : 0,
                    'updated_at' => now(),
                ]);

            Flasher::addSuccess('Inquiry question updated successfully.');
        } catch (\Exception $e) {
            Flasher::addError('Update failed: ' . $e->getMessage());
        }

        return redirect()->back();
    }

    public function integration_settings(Request $request)
    {
        try {
            $currentUserId = session()->get('user_id');
            $childIds = session()->get('child_ids', []);

            if (!$currentUserId) {
                Flasher::addError('Please login to access integration settings.');
                return redirect()->route('login');
            }

            if (is_string($childIds)) {
                $childIds = array_map('trim', explode(',', $childIds));
            }

            $userIds = array_merge([$currentUserId], $childIds);

            // Params
            $length = $request->query('length', 10);
            $sortColumn = $request->query('sort', 'id');
            $sortDirection = $request->query('direction', 'desc');
            $sortDirection = in_array($sortDirection, ['asc', 'desc']) ? $sortDirection : 'desc';
            $allowedColumns = ['id', 'type', 'created_at'];
            $sortColumn = in_array($sortColumn, $allowedColumns) ? $sortColumn : 'id';

            // Query
            $integrations = DB::table('integration_settings')
                ->whereIn('user_id', $userIds)
                ->orderBy($sortColumn, $sortDirection)
                ->paginate((int)$length)
                ->appends([
                    'sort' => $sortColumn,
                    'direction' => $sortDirection,
                    'length' => $length
                ]);

            $integrationTypes = [
                'housing' => 'Housing API',
                'facebook' => 'Facebook',
                'gmail' => 'Gmail',
                'magicbricks' => 'MagicBricks',
                '99acres' => '99acres',
                'firebase' => 'Firebase Cloud Messaging',
                'other' => 'Other'
            ];

            return view('master.integration-settings', compact(
                'integrations',
                'integrationTypes',
                'length',
                'sortColumn',
                'sortDirection'
            ));
        } catch (\Exception $e) {
            Flasher::addError('Failed to load integration settings: ' . $e->getMessage());
            return back();
        }
    }

    public function integration_store(Request $request)
    {
        DB::beginTransaction();
        $userId = session()->get('user_id');
        $childIds = session()->get('child_ids', []);
        if (is_string($childIds)) {
            $childIds = array_map('trim', explode(',', $childIds));
        }

        if (!$userId) {
            Flasher::addError('Please login to save integration settings.');
            return redirect()->route('login');
        }

        try {
            $validator = Validator::make($request->all(), [
                'integration_type' => 'required|string|max:250',
                'settings' => 'required|array',
                'is_encrypted' => 'nullable|boolean',
                'status' => 'required|in:active,inactive',
            ]);


            if ($validator->fails()) {
                foreach ($validator->errors()->all() as $error) {
                    Flasher::addError($error);
                }
                return redirect()->back()->withInput();
            }

            $existing = DB::table('integration_settings')
                ->where('user_id', $userId)
                ->where('integration_type', $request->integration_type)
                ->first();

            if ($existing) {
                Flasher::addError('Integration settings for this platform already exist.');
                return redirect()->back()->withInput();
            }

            DB::table('integration_settings')->insert([
                'user_id' => $userId,
                'integration_type' => $request->integration_type,
                'settings' => json_encode($request->settings),
                'is_encrypted' => $request->has('is_encrypted') ? 1 : 0,
                'status' => $request->status,
                'created_at' => now(),
                'updated_at' => now(),
            ]);


            DB::commit();
            Flasher::addSuccess('Integration settings saved successfully.');
            return redirect()->route('integration.settings');
        } catch (\Exception $e) {
            DB::rollBack();
            Flasher::addError('Failed to save integration settings: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function integration_update(Request $request, $id)
    {
        $userId = session()->get('user_id');
        if (!$userId) {
            Flasher::addError('Please login to update integration settings.');
            return redirect()->route('login');
        }

        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'integration_type' => 'required|string|max:250',
                'settings' => 'required|array',
                'is_encrypted' => 'nullable|boolean',
                'status' => 'required|in:active,inactive',
            ]);

            if ($validator->fails()) {
                foreach ($validator->errors()->all() as $error) {
                    Flasher::addError($error);
                }
                return redirect()->back()->withInput();
            }

            $integration = DB::table('integration_settings')
                ->where('id', $id)
                ->where('user_id', $userId)
                ->first();

            if (!$integration) {
                Flasher::addError('Integration settings not found.');
                return redirect()->back();
            }

            $duplicate = DB::table('integration_settings')
                ->where('user_id', $userId)
                ->where('integration_type', $request->integration_type)
                ->where('id', '!=', $id)
                ->exists();

            if ($duplicate) {
                Flasher::addError('Another integration with this type already exists.');
                return redirect()->back()->withInput();
            }

            DB::table('integration_settings')
                ->where('id', $id)
                ->update([
                    'integration_type' => $request->integration_type,
                    'settings' => json_encode($request->settings),
                    'is_encrypted' => $request->has('is_encrypted') ? 1 : 0,
                    'status' => $request->status,
                    'updated_at' => now(),
                ]);

            DB::commit();
            Flasher::addSuccess('Integration settings updated successfully.');
            return redirect()->route('integration.settings');
        } catch (\Exception $e) {
            DB::rollBack();
            Flasher::addError('Failed to update integration settings: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function integration_destroy($id)
    {
        $userId = session()->get('user_id');

        if (!$userId) {
            Flasher::addError('Please login to delete integration settings.');
            return redirect()->route('login');
        }

        DB::beginTransaction();
        try {
            $integration = DB::table('integration_settings')
                ->where('id', $id)
                ->where('user_id', $userId)
                ->first();

            if (!$integration) {
                Flasher::addError('Integration settings not found.');
                return redirect()->back();
            }

            DB::table('integration_settings')
                ->where('id', $id)
                ->delete();

            DB::commit();
            Flasher::addSuccess('Integration settings deleted successfully.');
            return redirect()->route('integration.settings');
        } catch (\Exception $e) {
            DB::rollBack();
            Flasher::addError('Failed to delete integration settings: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function mis_points(Request $request)
    {
        try {
            // Params
            $length = $request->query('length', 10);
            $sortColumn = $request->query('sort', 'id');
            $sortDirection = $request->query('direction', 'desc');
            $sortDirection = in_array($sortDirection, ['asc', 'desc']) ? $sortDirection : 'desc';
            $allowedColumns = ['id', 'user_id', 'created_at'];
            $sortColumn = in_array($sortColumn, $allowedColumns) ? $sortColumn : 'id';

            // Query
            $points = DB::table('mis_points')
                ->orderBy($sortColumn, $sortDirection)
                ->paginate((int)$length)
                ->appends([
                    'sort' => $sortColumn,
                    'direction' => $sortDirection,
                    'length' => $length
                ]);

            $users = DB::table('users')->get()->keyBy('id');

            foreach ($points as $point) {
                $point->associated_users = [];

                if ($point->user_id) {
                    $userIds = explode(',', $point->user_id);

                    foreach ($userIds as $id) {
                        if (isset($users[$id])) {
                            $point->associated_users[] = $users[$id]->name;
                        }
                    }
                }
            }

            return view('master.mis-points', compact(
                'points',
                'users',
                'length',
                'sortColumn',
                'sortDirection'
            ));
        } catch (\Exception $e) {
            Flasher::addError('Failed to load MIS points: ' . $e->getMessage());
            return back();
        }
    }

    public function mis_points_store(Request $request)
    {
        $request->validate([
            'point_name' => 'required|string|max:255|unique:mis_points,point_name',
            'associated_user' => 'required|array',
        ]);
        try {
            DB::table('mis_points')->insert([
                'user_id'  => implode(',', $request->associated_user),
                'point_name' => $request->point_name,
                'description' => $request->description,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            Flasher::addSuccess('MIS Point created successfully.');
            return redirect()->route('mis.points');
        } catch (\Exception $e) {
            Flasher::addError('Failed to create MIS Point: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function mis_points_update(Request $request, $id)
    {
        $request->validate([
            'point_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('mis_points', 'point_name')->ignore($id)
            ],
            'associated_user' => 'required|array',
        ]);

        try {
            DB::table('mis_points')->where('id', $id)->update([
                'user_id'  => implode(',', $request->associated_user),
                'point_name' => $request->point_name,
                'description' => $request->description,
                'updated_at' => now(),
            ]);
            Flasher::addSuccess('MIS Point updated successfully.');
            return redirect()->route('mis.points');
        } catch (\Exception $e) {
            Flasher::addError('Failed to update MIS Point: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function mis_points_destroy($id)
    {
        try {
            DB::table('mis_points')->where('id', $id)->delete();
            Flasher::addSuccess('MIS Point deleted successfully.');
            return redirect()->route('mis.points');
        } catch (\Exception $e) {
            Flasher::addError('Failed to delete MIS Point: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function property_name(Request $request)
    {
        try {
            $length = $request->query('length', 10);
            $sortColumn = $request->query('sort', 'id');
            $sortDirection = $request->query('direction', 'desc');
            $sortDirection = in_array($sortDirection, ['asc', 'desc']) ? $sortDirection : 'desc';
            $allowedColumns = ['id', 'property_category', 'created_at'];
            $sortColumn = in_array($sortColumn, $allowedColumns) ? $sortColumn : 'id';


            $properties = DB::table("properties")
                ->orderBy($sortColumn, $sortDirection)
                ->paginate((int)$length)
                ->appends([
                    'sort' => $sortColumn,
                    'direction' => $sortDirection,
                    'length' => $length
                ]);

            foreach ($properties as $property) {
                if ($property->property_category) {
                    $category = DB::table('inv_catg')
                        ->where('name', $property->property_category)
                        ->first();
                    $property->category_id = $category->id ?? null;
                } else {
                    $property->category_id = null;
                }
            }

            $categoryList = DB::table('category')->select('id', 'name')->get();
            $invCatg = DB::table('inv_catg')->select('id', 'type', 'name')->get();

            return view('master.property', compact(
                'properties',
                'categoryList',
                'invCatg',
                'length',
                'sortColumn',
                'sortDirection'
            ));
        } catch (\Exception $e) {
            Flasher::addError('Failed to load properties: ' . $e->getMessage());
            return back();
        }
    }


    public function store_property(Request $request)
    {
        DB::beginTransaction();
        try {
            $rules = [
                'name' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('properties', 'property_name')
                ]
            ];

            if (session('software_type') !== 'lead_management') {
                $rules['property_type'] = 'nullable|string|max:100';
                $rules['property_category'] = 'nullable|exists:inv_catg,id';
                $rules['property_sub_category'] = 'nullable|string|max:255';
                $rules['state'] = 'nullable|string|max:100';
                $rules['city'] = 'nullable|string|max:100';
                $rules['address'] = 'nullable|string';
                $rules['budget_price'] = 'nullable|string|max:100';
                $rules['property_status'] = 'nullable|in:Available,Hold,Procession,Sold';
                $rules['gallery_images.*'] = 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048';
            }

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                foreach ($validator->errors()->all() as $error) {
                    Flasher::addError($error);
                }
                return redirect()->back()->withInput();
            }

            $data = [
                'property_name' => $request->name,
                'created_date' => now()
            ];

            if (session('software_type') !== 'lead_management') {
                if ($request->hasFile('gallery_images')) {
                    $images = [];
                    foreach ($request->file('gallery_images') as $image) {
                        $path = $image->store('property-gallery', 'public');
                        $images[] = '/storage/' . $path;
                    }
                    $data['gallery_images'] = json_encode($images);
                }
                $categoryName = null;
                if ($request->property_category) {
                    $category = DB::table('inv_catg')->find($request->property_category);
                    $categoryName = $category->name ?? null;
                }

                $data['property_type'] = $request->property_type;
                $data['property_category'] = $categoryName;
                $data['property_sub_category'] = $request->property_sub_category;
                $data['state'] = $request->state;
                $data['city'] = $request->city;
                $data['address'] = $request->address;
                $data['budget_price'] = $request->budget_price;
                $data['property_status'] = $request->property_status ?? 'Available';
            }

            DB::table('properties')->insert($data);
            DB::commit();

            Flasher::addSuccess('Property created successfully.');
            return redirect()->route('property.name');
        } catch (\Exception $e) {
            DB::rollBack();
            Flasher::addError('Failed to create: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function update_property(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $rules = [
                'name' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('properties', 'property_name')->ignore($id)
                ]
            ];

            if (session('software_type') !== 'lead_management') {
                $rules['property_type'] = 'nullable|string|max:100';
                $rules['property_category'] = 'nullable|exists:inv_catg,id';
                $rules['property_sub_category'] = 'nullable|string|max:255';
                $rules['state'] = 'nullable|string|max:100';
                $rules['city'] = 'nullable|string|max:100';
                $rules['address'] = 'nullable|string';
                $rules['budget_price'] = 'nullable|string|max:100';
                $rules['property_status'] = 'nullable|in:Available,Hold,Procession,Sold';
                $rules['gallery_images.*'] = 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048';
            }

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                foreach ($validator->errors()->all() as $error) {
                    Flasher::addError($error);
                }
                return redirect()->back()->withInput();
            }

            $data = [
                'property_name' => $request->name,
                'updated_date' => now()
            ];

            if (session('software_type') !== 'lead_management') {
                if ($request->hasFile('gallery_images')) {
                    $oldProperty = DB::table('properties')->where('id', $id)->first();
                    if ($oldProperty && $oldProperty->gallery_images) {
                        $oldImages = json_decode($oldProperty->gallery_images);
                        foreach ($oldImages as $oldImage) {
                            $path = str_replace('/storage/', '', $oldImage);
                            Storage::disk('public')->delete($path);
                        }
                    }

                    $images = [];
                    foreach ($request->file('gallery_images') as $image) {
                        $path = $image->store('property-gallery', 'public');
                        $images[] = '/storage/' . $path;
                    }
                    $data['gallery_images'] = json_encode($images);
                }

                $categoryName = null;
                if ($request->property_category) {
                    $category = DB::table('inv_catg')->find($request->property_category);
                    $categoryName = $category->name ?? null;
                }

                $data['property_type'] = $request->property_type;
                $data['property_category'] = $categoryName;
                $data['property_sub_category'] = $request->property_sub_category;
                $data['state'] = $request->state;
                $data['city'] = $request->city;
                $data['address'] = $request->address;
                $data['budget_price'] = $request->budget_price;
                $data['property_status'] = $request->property_status;
            }

            DB::table('properties')
                ->where('id', $id)
                ->update($data);

            DB::commit();
            Flasher::addSuccess('Property updated successfully.');
            return redirect()->route('property.name');
        } catch (\Exception $e) {
            DB::rollBack();
            Flasher::addError('Failed to update: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
}

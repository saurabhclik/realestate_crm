@extends('layouts.app')

@section('title', isset($user) ? 'Edit User' : 'Create User | Pro-leadexpertz')

@section('content')

    <div class="page-content">
        <div class="container-fluid">
            @if (session('import_errors'))
                <div class="row justify-content-center">
                    <div class="col-xl-12">
                        <div class="alert alert-danger">
                            <h5 class="alert-heading">Import Errors</h5>
                            <ul class="mb-0">
                                @foreach (session('import_errors') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">{{ isset($user) ? 'Edit' : 'Create' }} User
                                <div class="border-bottom border-3 border-primary mb-2 mt-1" style="width:6%"></div>
                            </h5>
                            @if(isset($user))
                            <button type="button" class="btn btn-info btn-sm float-end me-2" id="openAdvanceConfigBtn">
                                <i class="fas fa-cogs me-1"></i> Advanced Configuration
                            </button>
                            @endif
                            <button type="button" class="btn btn-success btn-sm float-end me-2" data-bs-toggle="modal" data-bs-target="#importModal">
                                <i class="fas fa-file-import me-1"></i> Bulk Import
                            </button>
                        </div>
                        <div class="card-body">
                            @if ($userLimit ?? false)
                                @php
                                    $totalUsers = $users->total();
                                    $userLimitValue = $userLimit->user_limit;
                                @endphp
                                @if ($userLimitValue !== 'all' && $remaining > 0)
                                    <div class="alert alert-light border mb-3">
                                        <small class="text-muted">📊 User Slots: <strong>{{ $remaining }}</strong> remaining ({{ $totalUsers }}/{{ $userLimitInt }} used)</small>
                                    </div>
                                @elseif($userLimitValue !== 'all')
                                    <div class="alert alert-danger border mb-3">
                                        <small>⚠️ User limit reached! ({{ $totalUsers }}/{{ $userLimitInt }} used)</small>
                                    </div>
                                @endif
                            @endif
                            
                            <form class="needs-validation" novalidate
                                action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}"
                                method="POST">
                                @csrf
                                @if (isset($user))
                                    @method('PUT')
                                @endif
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name
                                            <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ old('name', $user->name ?? '') }}" required>
                                            <div class="invalid-feedback">Please enter Name</div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email
                                            <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{ old('email', $user->email ?? '') }}" required>
                                            <div class="invalid-feedback">Please enter a valid email</div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="mobile" class="form-label">Mobile
                                            <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-text">+91</span>
                                                <input type="tel" class="form-control" id="mobile" name="mobile"
                                                    value="{{ old('mobile', $user->mobile ?? '') }}" required>
                                            </div>
                                            <div class="invalid-feedback">Please enter mobile number</div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="password" class="form-label">
                                                Password <span class="text-danger">*</span>@if (isset($user))
                                                    <small class="text-muted">(Leave blank to keep current)</small>
                                                @endif
                                            </label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="password" name="password" {{ !isset($user) ? 'required' : '' }}>
                                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="role" class="form-label">Role <span class="text-danger">*</span></label>
                                            <select class="form-select" id="role" name="role" required>
                                                <option value="" selected disabled>Select Role</option>
                                                @foreach ($roles ?? [] as $role)
                                                    <option value="{{ $role->role_name }}" @if (isset($user)) {{ old('role', $user->role) == $role->role_name ? 'selected' : '' }} @endif>
                                                        {{ ucfirst($role->role_name) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="designation" class="form-label">Designation <span class="text-danger">*</span></label>
                                            <select class="form-select" id="designation" name="designation" required>
                                                <option value="" selected disabled>Select designation</option>
                                                @foreach ($designation ?? [] as $item)
                                                    <option value="{{ $item->id }}" @if (isset($user)) {{ old('designation', $user->designation_id) == $item->id ? 'selected' : '' }} @endif>
                                                        {{ $item->designation }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="manager" class="form-label">Reporting Manager <span class="text-danger">*</span></label>
                                            <select class="form-select" id="manager" name="reporting_manager" required>
                                                <option value="" selected disabled>Select manager</option>
                                                @foreach ($reporting_manager ?? [] as $manager)
                                                    <option value="{{ $manager->id }}" @if (isset($user)) {{ old('reporting_manager', $user->tm_id) == $manager->id ? 'selected' : '' }} @endif>
                                                        {{ $manager->name }} ({{ $manager->role }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 d-none">
                                        <div class="mb-3 form-check">
                                            <input class="form-check-input" type="checkbox" id="is_special" name="is_special" value="1" checked>
                                            <label class="form-check-label" for="is_special">Is Special User</label>
                                        </div>
                                    </div>

                                    <div id="advancedConfigWrapper" style="display: none;" class="bg-light p-3">
                                        <div class="mt-4 pt-2 border-top">
                                            <h6 class="mb-3">
                                                <i class="fas fa-cog text-primary me-2"></i>Advanced Configuration
                                                <small class="text-muted fw-normal">- User Permissions & Access Controls</small>
                                            </h6>
                                            
                                            <?php
                                                $selected = old('master_options', $user->master_options ?? []);
                                                if (!is_array($selected)) 
                                                {
                                                    $selected = json_decode($selected, true) ?? [];
                                                } 
                                            ?>
                                            <ul class="nav nav-tabs mb-3" id="configTab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="core-tab" data-bs-toggle="tab" data-bs-target="#core" type="button" role="tab">
                                                        <i class="fas fa-database me-1"></i> Core
                                                    </button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="leads-tab" data-bs-toggle="tab" data-bs-target="#leads" type="button" role="tab">
                                                        <i class="fas fa-chart-line me-1"></i> Leads
                                                    </button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="tasks-tab" data-bs-toggle="tab" data-bs-target="#tasks" type="button" role="tab">
                                                        <i class="fas fa-tasks me-1"></i> Tasks & MIS
                                                    </button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="modules-tab" data-bs-toggle="tab" data-bs-target="#modules" type="button" role="tab">
                                                        <i class="fas fa-puzzle-piece me-1"></i> Modules
                                                    </button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="reports-tab" data-bs-toggle="tab" data-bs-target="#reports" type="button" role="tab">
                                                        <i class="fas fa-chart-bar me-1"></i> Reports & Settings
                                                    </button>
                                                </li>
                                            </ul>
                                            
                                            <!-- Tab Content -->
                                            <div class="tab-content" id="configTabContent">
                                                <!-- Tab 1: Core -->
                                                <div class="tab-pane fade show active" id="core" role="tabpanel">
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <div class="border rounded p-3 h-100">
                                                                <h6 class="mb-3 pb-2">Staff Management</h6>
                                                                @php
                                                                    $staffOptions = DB::table('master_menus')->where('category', 'Staff')->pluck('name', 'route')->toArray();
                                                                    if (empty(old('master_options')) && empty($user->master_options)) {
                                                                        $selected = array_merge($selected, array_keys($staffOptions));
                                                                    }
                                                                @endphp
                                                                @foreach ($staffOptions as $key => $label)
                                                                    <div class="form-check mb-1">
                                                                        <input class="form-check-input" type="checkbox" name="master_options[]" value="{{ $key }}" id="staff_{{ $loop->index }}" {{ in_array($key, $selected) ? 'checked' : '' }}>
                                                                        <label class="form-check-label small" for="staff_{{ $loop->index }}">{{ $label }}</label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-6 mb-3">
                                                            <div class="border rounded p-3 h-100">
                                                                <h6 class="mb-3 pb-2">Master</h6>
                                                                @php
                                                                    $softwareType = session('software_type', 'real_state');
                                                                    $masterOptions = DB::table('master_menus')->where('category', 'Master')->whereNotIn('route', ['messaging.templates.create', 'integration.settings'])->pluck('name', 'route')->toArray();
                                                                    if ($softwareType == 'lead_management') {
                                                                        $masterOptions['project.category'] = 'Product Category';
                                                                        $masterOptions['project.sub_category'] = 'Product Sub Category';
                                                                        $masterOptions['project.name'] = 'Name Of Products';
                                                                    }
                                                                    if (empty(old('master_options')) && empty($user->master_options)) {
                                                                        $selected = array_keys($masterOptions);
                                                                    }
                                                                @endphp
                                                                <div class="row">
                                                                    @foreach ($masterOptions as $key => $label)
                                                                        <div class="col-md-6">
                                                                            <div class="form-check mb-1">
                                                                                <input class="form-check-input" type="checkbox" name="master_options[]" value="{{ $key }}" id="opt_{{ $loop->index }}" {{ in_array($key, $selected) ? 'checked' : '' }}>
                                                                                <label class="form-check-label small" for="opt_{{ $loop->index }}">{{ $label }}</label>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="leads" role="tabpanel">
                                                    <div class="row">
                                                        <div class="col-md-12 mb-3">
                                                            <div class="border rounded p-3">
                                                                <h6 class="mb-3 pb-2">Leads Management</h6>
                                                                @php
                                                                    $leadOptions = DB::table('master_menus')->where('category', 'Leads')->pluck('name', 'route')->toArray();
                                                                    if (empty(old('master_options')) && empty($user->master_options)) {
                                                                        $selected = array_merge($selected, array_keys($leadOptions));
                                                                    }
                                                                    $frozenOptions = ['lead.allocate', 'lead.unallocated']; 
                                                                @endphp
                                                                <div class="row">
                                                                    @foreach ($leadOptions as $key => $label)
                                                                        <div class="col-md-3">
                                                                            <div class="form-check mb-1">
                                                                                <input class="form-check-input" type="checkbox" name="master_options[]" value="{{ $key }}" id="lead_{{ $loop->index }}" {{ in_array($key, $selected) ? 'checked' : '' }} @if(in_array($key, $frozenOptions)) disabled @endif>
                                                                                @if(in_array($key, $frozenOptions)) <input type="hidden" name="master_options[]" value="{{ $key }}"> @endif
                                                                                <label class="form-check-label small" for="lead_{{ $loop->index }}">{{ $label }}</label>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-12">
                                                            <div class="border rounded p-3">
                                                                <h6 class="mb-3 pb-2">Transfer Leads</h6>
                                                                @php
                                                                    $transferOptions = DB::table('master_menus')->where('category', 'Transfer')->pluck('name', 'route')->toArray();
                                                                    if (empty(old('master_options')) && empty($user->master_options)) {
                                                                        $selected = array_merge($selected, array_keys($transferOptions));
                                                                    }
                                                                @endphp
                                                                <div class="row">
                                                                    @foreach ($transferOptions as $key => $label)
                                                                        <div class="col-md-3">
                                                                            <div class="form-check mb-1">
                                                                                <input class="form-check-input" type="checkbox" name="master_options[]" value="{{ $key }}" id="transfer_{{ $loop->index }}" {{ in_array($key, $selected) ? 'checked' : '' }}>
                                                                                <label class="form-check-label small" for="transfer_{{ $loop->index }}">{{ $label }}</label>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <!-- Tab 3: Tasks & MIS -->
                                                <div class="tab-pane fade" id="tasks" role="tabpanel">
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <div class="border rounded p-3 h-100">
                                                                <h6 class="mb-3 pb-2">Task Management</h6>
                                                                @php
                                                                    $taskOptions = DB::table('master_menus')->where('category', 'Tasks')->pluck('name', 'route')->toArray();
                                                                    if (empty(old('master_options')) && empty($user->master_options)) {
                                                                        $selected = array_merge($selected, array_keys($taskOptions));
                                                                    }
                                                                @endphp
                                                                @foreach ($taskOptions as $key => $label)
                                                                    <div class="form-check mb-1">
                                                                        <input class="form-check-input" type="checkbox" name="master_options[]" value="{{ $key }}" id="task_{{ $loop->index }}" {{ in_array($key, $selected) ? 'checked' : '' }}>
                                                                        <label class="form-check-label small" for="task_{{ $loop->index }}">{{ $label }}</label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-6 mb-3">
                                                            <div class="border rounded p-3 h-100">
                                                                <h6 class="mb-3 pb-2">MIS Management</h6>
                                                                @php
                                                                    $misOptions = DB::table('master_menus')->where('category', 'MIS')->pluck('name', 'route')->toArray();
                                                                    if (empty(old('master_options')) && empty($user->master_options)) {
                                                                        $selected = array_merge($selected, array_keys($misOptions));
                                                                    }
                                                                @endphp
                                                                @foreach ($misOptions as $key => $label)
                                                                    <div class="form-check mb-1">
                                                                        <input class="form-check-input" type="checkbox" name="master_options[]" value="{{ $key }}" id="mis_{{ $loop->index }}" {{ in_array($key, $selected) ? 'checked' : '' }}>
                                                                        <label class="form-check-label small" for="mis_{{ $loop->index }}">{{ $label }}</label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <!-- Tab 4: Modules -->
                                                <div class="tab-pane fade" id="modules" role="tabpanel">
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <div class="border rounded p-3 h-100">
                                                                <h6 class="mb-3 pb-2">Data Center</h6>
                                                                @php
                                                                    $generalOptions = DB::table('master_menus')->where('category', 'General')->pluck('name', 'route')->toArray();
                                                                    if (empty(old('master_options')) && empty($user->master_options)) {
                                                                        $selected = array_merge($selected, array_keys($generalOptions));
                                                                    }
                                                                @endphp
                                                                @foreach ($generalOptions as $key => $label)
                                                                    <div class="form-check mb-1">
                                                                        <input class="form-check-input" type="checkbox" name="master_options[]" value="{{ $key }}" id="general_{{ $loop->index }}" {{ in_array($key, $selected) ? 'checked' : '' }}>
                                                                        <label class="form-check-label small" for="general_{{ $loop->index }}">{{ $label }}</label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-6 mb-3">
                                                            <div class="border rounded p-3 h-100">
                                                                <h6 class="mb-3 pb-2">Inventory & Post Sale</h6>
                                                                @php
                                                                    $inventoryOptions = DB::table('master_menus')->where('category', 'Inventory')->pluck('name', 'route')->toArray();
                                                                    $postSaleOptions = DB::table('master_menus')->where('category', 'Post Sale')->pluck('name', 'route')->toArray();
                                                                    if (empty(old('master_options')) && empty($user->master_options)) {
                                                                        $selected = array_merge($selected, array_keys($inventoryOptions), array_keys($postSaleOptions));
                                                                    }
                                                                @endphp
                                                                <div class="mb-2"><strong class="small">Inventory:</strong></div>
                                                                @foreach ($inventoryOptions as $key => $label)
                                                                    <div class="form-check mb-1">
                                                                        <input class="form-check-input" type="checkbox" name="master_options[]" value="{{ $key }}" id="inventory_{{ $loop->index }}" {{ in_array($key, $selected) ? 'checked' : '' }}>
                                                                        <label class="form-check-label small" for="inventory_{{ $loop->index }}">{{ $label }}</label>
                                                                    </div>
                                                                @endforeach
                                                                <div class="mt-2 mb-2"><strong class="small">Post Sale:</strong></div>
                                                                @foreach ($postSaleOptions as $key => $label)
                                                                    <div class="form-check mb-1">
                                                                        <input class="form-check-input" type="checkbox" name="master_options[]" value="{{ $key }}" id="post_sale_{{ $loop->index }}" {{ in_array($key, $selected) ? 'checked' : '' }}>
                                                                        <label class="form-check-label small" for="post_sale_{{ $loop->index }}">{{ $label }}</label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-6 mb-3">
                                                            <div class="border rounded p-3 h-100">
                                                                <h6 class="mb-3 pb-2">Exhibition & Events</h6>
                                                                @php
                                                                    $exhibitionOptions = DB::table('master_menus')->where('category', 'Exhibition')->pluck('name', 'route')->toArray();
                                                                    $eventsOptions = DB::table('master_menus')->where('category', 'Events')->pluck('name', 'route')->toArray();
                                                                    if (empty(old('master_options')) && empty($user->master_options)) {
                                                                        $selected = array_merge($selected, array_keys($exhibitionOptions), array_keys($eventsOptions));
                                                                    }
                                                                @endphp
                                                                <div class="mb-2"><strong class="small">Exhibition:</strong></div>
                                                                @foreach ($exhibitionOptions as $key => $label)
                                                                    <div class="form-check mb-1">
                                                                        <input class="form-check-input" type="checkbox" name="master_options[]" value="{{ $key }}" id="exhibition_{{ $loop->index }}" {{ in_array($key, $selected) ? 'checked' : '' }}>
                                                                        <label class="form-check-label small" for="exhibition_{{ $loop->index }}">{{ $label }}</label>
                                                                    </div>
                                                                @endforeach
                                                                <div class="mt-2 mb-2"><strong class="small">Events:</strong></div>
                                                                @foreach ($eventsOptions as $key => $label)
                                                                    <div class="form-check mb-1">
                                                                        <input class="form-check-input" type="checkbox" name="master_options[]" value="{{ $key }}" id="event_{{ $loop->index }}" {{ in_array($key, $selected) ? 'checked' : '' }}>
                                                                        <label class="form-check-label small" for="event_{{ $loop->index }}">{{ $label }}</label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-6 mb-3">
                                                            <div class="border rounded p-3 h-100">
                                                                <h6 class="mb-3 pb-2">Attendance & Employee Track</h6>
                                                                @php
                                                                    $attendanceOptions = DB::table('master_menus')->where('category', 'Attendance')->pluck('name', 'route')->toArray();
                                                                    $employeeTrackOptions = DB::table('master_menus')->where('category', 'Employee Track')->pluck('name', 'route')->toArray();
                                                                    if (empty(old('master_options')) && empty($user->master_options)) {
                                                                        $selected = array_merge($selected, array_keys($attendanceOptions), array_keys($employeeTrackOptions));
                                                                    }
                                                                @endphp
                                                                <div class="mb-2"><strong class="small">Attendance:</strong></div>
                                                                @foreach ($attendanceOptions as $key => $label)
                                                                    <div class="form-check mb-1">
                                                                        <input class="form-check-input" type="checkbox" name="master_options[]" value="{{ $key }}" id="attendance_{{ $loop->index }}" {{ in_array($key, $selected) ? 'checked' : '' }}>
                                                                        <label class="form-check-label small" for="attendance_{{ $loop->index }}">{{ $label }}</label>
                                                                    </div>
                                                                @endforeach
                                                                <div class="mt-2 mb-2"><strong class="small">Employee Track:</strong></div>
                                                                @foreach ($employeeTrackOptions as $key => $label)
                                                                    <div class="form-check mb-1">
                                                                        <input class="form-check-input" type="checkbox" name="master_options[]" value="{{ $key }}" id="emp_track_{{ $loop->index }}" {{ in_array($key, $selected) ? 'checked' : '' }}>
                                                                        <label class="form-check-label small" for="emp_track_{{ $loop->index }}">{{ $label }}</label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <!-- Tab 5: Reports & Settings -->
                                                <div class="tab-pane fade" id="reports" role="tabpanel">
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <div class="border rounded p-3 h-100">
                                                                <h6 class="mb-3 pb-2">Expense & Reports</h6>
                                                                @php
                                                                    $expenseOptions = DB::table('master_menus')->where('category', 'Expense')->pluck('name', 'route')->toArray();
                                                                    $reportsOptions = DB::table('master_menus')->where('category', 'Reports')->pluck('name', 'route')->toArray();
                                                                    if (empty(old('master_options')) && empty($user->master_options)) {
                                                                        $selected = array_merge($selected, array_keys($expenseOptions), array_keys($reportsOptions));
                                                                    }
                                                                @endphp
                                                                <div class="mb-2"><strong class="small">Expense Management:</strong></div>
                                                                @foreach ($expenseOptions as $key => $label)
                                                                    <div class="form-check mb-1">
                                                                        <input class="form-check-input" type="checkbox" name="master_options[]" value="{{ $key }}" id="expense_{{ $loop->index }}" {{ in_array($key, $selected) ? 'checked' : '' }}>
                                                                        <label class="form-check-label small" for="expense_{{ $loop->index }}">{{ $label }}</label>
                                                                    </div>
                                                                @endforeach
                                                                <div class="mt-2 mb-2"><strong class="small">Reports:</strong></div>
                                                                @foreach ($reportsOptions as $key => $label)
                                                                    <div class="form-check mb-1">
                                                                        <input class="form-check-input" type="checkbox" name="master_options[]" value="{{ $key }}" id="report_{{ $loop->index }}" {{ in_array($key, $selected) ? 'checked' : '' }}>
                                                                        <label class="form-check-label small" for="report_{{ $loop->index }}">{{ $label }}</label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-6 mb-3">
                                                            <div class="border rounded p-3 h-100">
                                                                <h6 class="mb-3 pb-2">Settings</h6>
                                                                @php
                                                                    $settingsOptions = DB::table('master_menus')->where('category', 'Settings')->pluck('name', 'route')->toArray();
                                                                    if (empty(old('master_options')) && empty($user->master_options)) {
                                                                        $selected = array_merge($selected, array_keys($settingsOptions));
                                                                    }
                                                                @endphp
                                                                @foreach ($settingsOptions as $key => $label)
                                                                    <div class="form-check mb-1">
                                                                        <input class="form-check-input" type="checkbox" name="master_options[]" value="{{ $key }}" id="setting_{{ $loop->index }}" {{ in_array($key, $selected) ? 'checked' : '' }}>
                                                                        <label class="form-check-label small" for="setting_{{ $loop->index }}">{{ $label }}</label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <button type="submit" id="SubmitUserBtn" class="btn btn-primary px-4 py-2">
                                        <span id="UserSubmitText">
                                            <i class="bi bi-{{ isset($user) ? 'save' : 'person-plus' }} me-2"></i>
                                            {{ isset($user) ? 'Update' : 'Create' }} User
                                        </span>
                                        <span id="UserSubmitSpinner" class="d-none">
                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Please wait...
                                        </span>
                                    </button>
                                    <a href="{{ route('users.index') }}" class="btn btn-outline-secondary px-4 py-2 ms-2">
                                        <i class="bi bi-arrow-left me-2"></i> Cancel
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header bg-primary text-light">
                        <h5 class="modal-title" id="importModalLabel">Import Users</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="csv_file" class="form-label">CSV File</label>
                            <input class="form-control" type="file" id="csv_file" name="csv_file" accept=".csv" required>
                            <div class="form-text">Columns: name, email, phone, password, role</div>
                        </div>
                        <div class="mb-3">
                            <a href="{{ asset('sample_users.csv') }}" download="sample_users.csv" class="btn btn-sm btn-outline-primary">
                                <i class="ri-download-line align-bottom me-1"></i> Download Sample CSV
                            </a>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="SubmitBtn">
                            <span id="SubmitText">Import</span>
                            <span id="SubmitSpinner" class="d-none">
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Please wait...
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="passwordVerificationModal" tabindex="-1" aria-labelledby="passwordVerificationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title" id="passwordVerificationModalLabel">
                        <i class="fas fa-shield-alt text-primary me-2"></i>Security Verification
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4 pt-0">
                    <div class="text-center mb-4">
                        <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 64px; height: 64px;">
                            <i class="fas fa-lock fa-2x text-primary"></i>
                        </div>
                        <h6 class="mb-1">Admin Access Required</h6>
                        <p class="small text-muted mb-0">Enter your admin password to modify permissions</p>
                    </div>
                    
                    <div class="mb-3">
                        <label for="adminPassword" class="form-label small fw-bold">Admin Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="adminPassword" placeholder="Enter password" autocomplete="off">
                            <button class="btn btn-outline-secondary" type="button" id="togglePasswordModal">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <div class="invalid-feedback" id="passwordError"></div>
                        <div id="attemptDisplay" class="mt-2"></div>
                        <small class="text-muted mt-1 d-block">
                            <i class="fas fa-info-circle me-1"></i>3 failed attempts = 30 min IP block
                        </small>
                    </div>
                    
                    <button type="button" class="btn btn-primary w-100" id="verifyAdminBtn">
                        <i class="fas fa-check-circle me-2"></i>Verify & Continue
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() 
        {
            @if(session('success'))
                flasher.success('{{ session('success') }}');
            @endif
            
            @if(session('error'))
                flasher.error('{{ session('error') }}');
            @endif
            
            @if(session('warning'))
                flasher.warning('{{ session('warning') }}');
            @endif
            
            @if(session('info'))
                flasher.info('{{ session('info') }}');
            @endif

            $('form.needs-validation').on('submit', function () 
            {
                $('#SubmitUserBtn').prop('disabled', true);
                $('#UserSubmitText').addClass('d-none');
                $('#UserSubmitSpinner').removeClass('d-none');
            });

            $('#importModal form').on('submit', function () 
            {
                $('#SubmitBtn').prop('disabled', true);
                $('#SubmitText').addClass('d-none');
                $('#SubmitSpinner').removeClass('d-none');
            });

            $('#togglePassword').click(function() 
            {
                const input = $('#password');
                const icon = $(this).find('i');
                if (input.attr('type') === 'password') 
                {
                    input.attr('type', 'text');
                    icon.removeClass('fa-eye').addClass('fa-eye-slash');
                } 
                else 
                {
                    input.attr('type', 'password');
                    icon.removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });
            
            let isVerified = false;
            let attemptCount = 0;
            
            $('#openAdvanceConfigBtn').click(function() 
            {
                $('#adminPassword').val('').removeClass('is-invalid');
                $('#passwordError').text('');
                $('#verifyAdminBtn').prop('disabled', false).html('<i class="fas fa-check-circle me-2"></i>Verify & Continue');
                flasher.info('Please enter admin password to access advanced configuration', 'Security Verification', {
                    timeout: 3000
                });
                
                $('#passwordVerificationModal').modal('show');
            });
            
            $('#togglePasswordModal').click(function() 
            {
                const input = $('#adminPassword');
                const icon = $(this).find('i');
                if (input.attr('type') === 'password') 
                {
                    input.attr('type', 'text');
                    icon.removeClass('fa-eye').addClass('fa-eye-slash');
                } 
                else 
                {
                    input.attr('type', 'password');
                    icon.removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });
            
            $('#adminPassword').keypress(function(e) 
            {
                if (e.which === 13) $('#verifyAdminBtn').click();
            });
            
            $('#verifyAdminBtn').click(function() 
            {
                const password = $('#adminPassword').val();
                if (!password) 
                {
                    $('#adminPassword').addClass('is-invalid');
                    $('#passwordError').text('Please enter your admin password');
                    flasher.warning('Password is required for verification', 'Missing Password', {
                        timeout: 3000
                    });
                    return;
                }
                
                $('#adminPassword').removeClass('is-invalid');
                const btn = $(this);
                const originalHtml = btn.html();
                btn.html('<span class="spinner-border spinner-border-sm me-2"></span>Verifying...').prop('disabled', true);
                
                $.ajax({
                    url: '{{ route("staff.verify-admin-password") }}',
                    method: 'POST',
                    data: { 
                        password: password, 
                        _token: $('meta[name="csrf-token"]').attr('content') 
                    },
                    success: function(response) 
                    {
                        if (response.success) 
                        {
                            isVerified = true;
                            attemptCount = 0;
                            $('#passwordVerificationModal').modal('hide');
                            $('#advancedConfigWrapper').slideDown(400);
                            
                            // Success notification
                            flasher.success('Password verified successfully! Advanced configuration unlocked.', 'Access Granted', {
                                timeout: 4000
                            });
                            
                            $('html, body').animate({ scrollTop: $('#advancedConfigWrapper').offset().top - 80 }, 500);
                        }
                    },
                    error: function(xhr) 
                    {
                        const response = xhr.responseJSON;
                        
                        if (response?.blocked) 
                        {
                            $('#adminPassword').addClass('is-invalid');
                            $('#passwordError').text(response.message);
                            flasher.error(response.message, 'IP Blocked', {
                                timeout: 10000
                            });
                            
                            $('#verifyAdminBtn').prop('disabled', true);
                            let minutes = response.minutes_remaining || 30;
                            const timer = setInterval(() => {
                                if (minutes <= 0) 
                                {
                                    clearInterval(timer);
                                    $('#verifyAdminBtn').prop('disabled', false).html(originalHtml);
                                    $('#adminPassword').removeClass('is-invalid');
                                    $('#passwordError').text('');
                                    flasher.success('IP block has been lifted. You can try again now.', 'Access Restored', {
                                        timeout: 4000
                                    });
                                } 
                                else 
                                {
                                    minutes--;
                                    $('#verifyAdminBtn').html(`<i class="fas fa-clock me-2"></i>Try again in ${minutes} min`);
                                }
                            }, 60000);
                        } 
                        else if (response?.remaining_attempts !== undefined) 
                        {
                            const remaining = response.remaining_attempts;
                            const attemptsMade = response.attempts_made || (3 - remaining);
                            attemptCount = attemptsMade;
                            
                            $('#adminPassword').addClass('is-invalid');
                            
                            let errorMessage = '';
                            let notificationType = 'warning';
                            
                            if (remaining === 2) 
                            {
                                errorMessage = `⚠️ Invalid password! ${remaining} attempt(s) remaining before IP block.`;
                                flasher.warning(errorMessage, `Attempt ${attemptsMade}/3`, {
                                    timeout: 5000
                                });
                            } 
                            else if (remaining === 1) 
                            {
                                errorMessage = `⚠️⚠️ Invalid password! Last attempt before IP block!`;
                                flasher.warning(errorMessage, `Attempt ${attemptsMade}/3 - Final Warning!`, {
                                    timeout: 6000
                                });
                            } 
                            else 
                            {
                                errorMessage = response.message;
                                flasher.error(errorMessage, 'Verification Failed', {
                                    timeout: 4000
                                });
                            }
                            
                            $('#passwordError').text(errorMessage);
                            btn.html(originalHtml).prop('disabled', false);
                            $('#adminPassword').val('').focus();
                        }
                        else 
                        {
                            $('#adminPassword').addClass('is-invalid');
                            $('#passwordError').text(response?.message || 'Invalid password');
                            flasher.error(response?.message || 'Invalid admin password', 'Verification Failed', {
                                timeout: 4000
                            });
                            btn.html(originalHtml).prop('disabled', false);
                        }
                    }
                });
            });
            $('#adminPassword').on('focus', function() 
            {
                $(this).removeClass('is-invalid');
                $('#passwordError').text('');
            });
        });
        
        const rolePermissions = @json(DB::table('role_mst')->get()->mapWithKeys(function ($role) 
        {
            return [$role->role_name => json_decode($role->unselected_routes, true) ?? []];
        }));

        function applyRole(role) 
        {
            const blocked = rolePermissions[role] || [];
            document.querySelectorAll("input[data-route]").forEach(el => {
                el.checked = true;
                if (blocked.includes(el.dataset.route)) el.checked = false;
            });
        }

        $('#role').on('change', function() 
        { 
            applyRole($(this).val());
        });
       
        function updateAttemptDisplay(attempts) 
        {
            const attemptText = $('#attemptDisplay');
            if (attemptText.length) 
            {
                if (attempts === 1) 
                {
                    attemptText.html('<span class="text-warning"><i class="fas fa-exclamation-triangle me-1"></i>1 failed attempt</span>');
                } 
                else if (attempts === 2) 
                {
                    attemptText.html('<span class="text-danger"><i class="fas fa-exclamation-circle me-1"></i>2 failed attempts - 1 remaining</span>');
                } 
                else 
                {
                    attemptText.html('');
                }
            }
        }
    </script>
@endsection
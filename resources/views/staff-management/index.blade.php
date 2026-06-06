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
                            <h5 class="card-title mb-0">{{ isset($user) ? 'Edit' : 'Create' }} User<div
                                    class="border-bottom border-3 border-primary mb-2 mt-1" style="width:6%"></div>
                            </h5>
                            <button type="button" class="btn btn-success btn-sm float-end" data-bs-toggle="modal"
                                data-bs-target="#importModal">
                                <i class="fas fa-file-import"></i> Bulk Import
                            </button>
                        </div>
                        <div class="card-body">
                            @if ($userLimit)
                                @php
                                    $totalUsers = $users->total();
                                    $userLimitValue = $userLimit->user_limit;
                                @endphp

                                @if ($userLimitValue === 'all')
                                @else
                                    @php
                                        $userLimitInt = (int) $userLimitValue;
                                        $remaining = $userLimitInt - $totalUsers;
                                    @endphp

                                    @if ($remaining > 0)
                                        <div class="alert alert-info mb-3" role="alert">
                                            👥 You can create up to <strong>{{ $userLimitInt }}</strong> users in this
                                            software.
                                            <p class="text-muted mb-0">
                                                You have <strong>{{ $remaining }}</strong> user slots remaining
                                                ({{ $totalUsers }}/{{ $userLimitInt }} used).
                                            </p>
                                        </div>
                                    @else
                                        <div class="alert alert-danger mb-3" role="alert">
                                            ❌ User limit reached! You have already created
                                            <strong>{{ $totalUsers }}</strong> users (limit: {{ $userLimitInt }}).
                                        </div>
                                    @endif
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
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ old('name', $user->name ?? '') }}" required>
                                            <div class="invalid-feedback">Please enter Name</div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{ old('email', $user->email ?? '') }}" required>
                                            <div class="invalid-feedback">Please enter a valid email</div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="mobile" class="form-label">Mobile</label>
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
                                                Password @if (isset($user))
                                                    (Leave blank to keep current)
                                                @endif
                                            </label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="password" name="password" {{ !isset($user) ? 'required' : '' }} value="{{ $user->password ?? '' }}">
                                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </div>
                                            @if (!isset($user))
                                                <div class="invalid-feedback">Please enter password</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="role" class="form-label">Role</label>
                                            <select class="select2" id="role" name="role" required>
                                                <option value="" selected disabled>Select Role</option>
                                                @foreach ($roles ?? [] as $role)
                                                    <option value="{{ $role->role_name }}" @if (isset($user)) {{ old('role', $user->role) == $role->role_name ? 'selected' : '' }} @else {{ old('role') == $role->role_name ? 'selected' : '' }} @endif>
                                                        {{ $role->role_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">Please select role</div>
                                        </div>
                                    </div>
                                    {{-- IS SPECIAL --}}
                                    <div class="col-md-12" style="display:none;">
                                        <div class="mb-3 form-check">
                                            <input class="form-check-input" type="checkbox" id="is_special"
                                                name="is_special" value="1" {{-- {{ old( 'is_special' , isset($user) ?
                                                ($user->is_special ?? 0) // Edit mode → use DB value
                                            : 1 // Create mode → default checked
                                            )
                                            ? 'checked'
                                            : '' }} --}} checked>

                                            <label class="form-check-label" for="is_special">
                                                Is Special User
                                            </label>
                                        </div>
                                    </div>

                                    <div id="special-user-sections">
                                        {{-- ==================== STAFF MANAGEMENT ==================== --}}
                                        <?php
    // Define $selected ONCE so all sections can see it
    $selected = old('master_options', $user->master_options ?? []);

    if (!is_array($selected)) {
        $selected = json_decode($selected, true) ?? [];
    } ?>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Staff Management</label>
                                                <div class="row">
                                                    @php
                                                        // Only define the specific options here
                                                        $staffOptions = DB::table('master_menus')
                                                            ->where('category', 'Staff')
                                                            ->pluck('name', 'route')
                                                            ->toArray();
                                                        if (
                                                            empty(old('master_options')) &&
                                                            empty($user->master_options)
                                                        ) {
                                                            $selected = array_merge(
                                                                $selected,
                                                                array_keys($staffOptions),
                                                            );
                                                        }
                                                    @endphp

                                                    @foreach ($staffOptions as $key => $label)
                                                        <div class="col-md-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    data-route="{{ $key }}" name="master_options[]"
                                                                    value="{{ $key }}" id="staff_{{ $loop->index }}" {{ in_array($key, $selected) ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="staff_{{ $loop->index }}">
                                                                    {{ $label }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        {{-- MASTER OPTIONS --}}
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Master </label>

                                                <div class="row">

                                                    @php
                                                        $softwareType = session('software_type', 'real_state');
                                                        $excludedRoutes = [
                                                            'messaging.templates.create',
                                                            'integration.settings', // <-- replace with your actual API route if different
                                                        ];
                                                        $masterOptions = DB::table('master_menus')
                                                            ->where('category', 'Master')
                                                            ->where('route', '!=', 'messaging.templates.create')
                                                            ->where('route', '!=', 'integration.settings')
                                                            ->pluck('name', 'route')
                                                            ->toArray();
                                                        // Change names for Lead Management
                                                        if ($softwareType == 'lead_management') {
                                                            $masterOptions['project.category'] = 'Product Category';
                                                            $masterOptions['project.sub_category'] =
                                                                'Product Sub Category';
                                                            $masterOptions['project.name'] = 'Name Of Products';
                                                        }

                                                        $selected = old('master_options', $user->master_options ?? []);

                                                        if (!is_array($selected)) {
                                                            $selected = json_decode($selected, true) ?? [];
                                                        }

                                                        // default select all
                                                        if (
                                                            empty(old('master_options')) &&
                                                            empty($user->master_options)
                                                        ) {
                                                            $selected = array_keys($masterOptions);
                                                        }
                                                    @endphp

                                                    @foreach ($masterOptions as $key => $label)
                                                        <div class="col-md-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    data-route="{{ $key }}" name="master_options[]"
                                                                    value="{{ $key }}" id="opt_{{ $loop->index }}" {{ in_array($key, $selected) ? 'checked' : '' }}>

                                                                <label class="form-check-label" for="opt_{{ $loop->index }}">
                                                                    {{ $label }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>
                                        {{-- ==================== LEADS MANAGEMENT ==================== --}}
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Leads Management </label>
                                                <div class="row">
                                                    @php
                                                        // Query ONLY 'Leads' items
                                                        $leadOptions = DB::table('master_menus')
                                                            ->where('category', 'Leads')
                                                            ->pluck('name', 'route')
                                                            ->toArray();

                                                        // DEFAULT SELECT ALL LOGIC
                                                        // If the user hasn't saved anything yet, add all these leads to the selected array
                                                        if (
                                                            empty(old('master_options')) &&
                                                            empty($user->master_options)
                                                        ) {
                                                            $selected = array_merge(
                                                                $selected,
                                                                array_keys($leadOptions),
                                                            );
                                                        }
                                                    @endphp

                                                    @foreach ($leadOptions as $key => $label)
                                                        <div class="col-md-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    data-route="{{ $key }}" name="master_options[]"
                                                                    value="{{ $key }}" id="lead_{{ $loop->index }}" {{-- THIS
                                                                    LINE CHECKS IF IT IS ALREADY SELECTED --}} {{ in_array($key, $selected) ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="lead_{{ $loop->index }}">
                                                                    {{ $label }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Transfer Leads</label>
                                                <div class="row">
                                                    @php
                                                        // Query ONLY 'Transfer' items
                                                        $transferOptions = DB::table('master_menus')
                                                            ->where('category', 'Transfer')
                                                            ->pluck('name', 'route')
                                                            ->toArray();

                                                        // DEFAULT SELECT ALL LOGIC
                                                        if (
                                                            empty(old('master_options')) &&
                                                            empty($user->master_options)
                                                        ) {
                                                            $selected = array_merge(
                                                                $selected,
                                                                array_keys($transferOptions),
                                                            );
                                                        }
                                                    @endphp

                                                    @foreach ($transferOptions as $key => $label)
                                                        <div class="col-md-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    data-route="{{ $key }}" name="master_options[]"
                                                                    value="{{ $key }}" id="transfer_{{ $loop->index }}" {{ in_array($key, $selected) ? 'checked' : '' }}>
                                                                <label class="form-check-label"
                                                                    for="transfer_{{ $loop->index }}">
                                                                    {{ $label }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">MIS Management</label>
                                                <div class="row">
                                                    @php
                                                        // Query ONLY 'MIS' items
                                                        $misOptions = DB::table('master_menus')
                                                            ->where('category', 'MIS')
                                                            ->pluck('name', 'route')
                                                            ->toArray();

                                                        // DEFAULT SELECT ALL LOGIC
                                                        if (
                                                            empty(old('master_options')) &&
                                                            empty($user->master_options)
                                                        ) {
                                                            $selected = array_merge($selected, array_keys($misOptions));
                                                        }
                                                    @endphp

                                                    @foreach ($misOptions as $key => $label)
                                                        <div class="col-md-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    data-route="{{ $key }}" name="master_options[]"
                                                                    value="{{ $key }}" id="mis_{{ $loop->index }}" {{ in_array($key, $selected) ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="mis_{{ $loop->index }}">
                                                                    {{ $label }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Task Management</label>
                                                <div class="row">
                                                    @php
                                                        // Query ONLY 'Tasks' items
                                                        $taskOptions = DB::table('master_menus')
                                                            ->where('category', 'Tasks')
                                                            ->pluck('name', 'route')
                                                            ->toArray();

                                                        // DEFAULT SELECT ALL LOGIC
                                                        if (
                                                            empty(old('master_options')) &&
                                                            empty($user->master_options)
                                                        ) {
                                                            $selected = array_merge(
                                                                $selected,
                                                                array_keys($taskOptions),
                                                            );
                                                        }
                                                    @endphp

                                                    @foreach ($taskOptions as $key => $label)
                                                        <div class="col-md-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    data-route="{{ $key }}" name="master_options[]"
                                                                    value="{{ $key }}" id="task_{{ $loop->index }}" {{ in_array($key, $selected) ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="task_{{ $loop->index }}">
                                                                    {{ $label }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Data Center</label>
                                                <div class="row">
                                                    @php
                                                        $generalOptions = DB::table('master_menus')
                                                            ->where('category', 'General')
                                                            ->pluck('name', 'route')
                                                            ->toArray();

                                                        if (
                                                            empty(old('master_options')) &&
                                                            empty($user->master_options)
                                                        ) {
                                                            $selected = array_merge(
                                                                $selected,
                                                                array_keys($generalOptions),
                                                            );
                                                        }
                                                    @endphp

                                                    @foreach ($generalOptions as $key => $label)
                                                        <div class="col-md-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    data-route="{{ $key }}" name="master_options[]"
                                                                    value="{{ $key }}" id="general_{{ $loop->index }}" {{ in_array($key, $selected) ? 'checked' : '' }}>
                                                                <label class="form-check-label"
                                                                    for="general_{{ $loop->index }}">
                                                                    {{ $label }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Inventory</label>
                                                <div class="row">
                                                    @php
                                                        $inventoryOptions = DB::table('master_menus')
                                                            ->where('category', 'Inventory')
                                                            ->pluck('name', 'route')
                                                            ->toArray();

                                                        if (
                                                            empty(old('master_options')) &&
                                                            empty($user->master_options)
                                                        ) {
                                                            $selected = array_merge(
                                                                $selected,
                                                                array_keys($inventoryOptions),
                                                            );
                                                        }
                                                    @endphp

                                                    @foreach ($inventoryOptions as $key => $label)
                                                        <div class="col-md-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    data-route="{{ $key }}" name="master_options[]"
                                                                    value="{{ $key }}" id="inventory_{{ $loop->index }}" {{ in_array($key, $selected) ? 'checked' : '' }}>
                                                                <label class="form-check-label"
                                                                    for="inventory_{{ $loop->index }}">
                                                                    {{ $label }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Post Sale</label>
                                                <div class="row">
                                                    @php
                                                        $postSaleOptions = DB::table('master_menus')
                                                            ->where('category', 'Post Sale')
                                                            ->pluck('name', 'route')
                                                            ->toArray();

                                                        if (
                                                            empty(old('master_options')) &&
                                                            empty($user->master_options)
                                                        ) {
                                                            $selected = array_merge(
                                                                $selected,
                                                                array_keys($postSaleOptions),
                                                            );
                                                        }
                                                    @endphp

                                                    @foreach ($postSaleOptions as $key => $label)
                                                        <div class="col-md-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    data-route="{{ $key }}" name="master_options[]"
                                                                    value="{{ $key }}" id="post_sale_{{ $loop->index }}" {{ in_array($key, $selected) ? 'checked' : '' }}>
                                                                <label class="form-check-label"
                                                                    for="post_sale_{{ $loop->index }}">
                                                                    {{ $label }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Exhibition Management</label>
                                                <div class="row">
                                                    @php
                                                        $exhibitionOptions = DB::table('master_menus')
                                                            ->where('category', 'Exhibition')
                                                            ->pluck('name', 'route')
                                                            ->toArray();

                                                        if (
                                                            empty(old('master_options')) &&
                                                            empty($user->master_options)
                                                        ) {
                                                            $selected = array_merge(
                                                                $selected,
                                                                array_keys($exhibitionOptions),
                                                            );
                                                        }
                                                    @endphp

                                                    @foreach ($exhibitionOptions as $key => $label)
                                                        <div class="col-md-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    data-route="{{ $key }}" name="master_options[]"
                                                                    value="{{ $key }}" id="exhibition_{{ $loop->index }}" {{ in_array($key, $selected) ? 'checked' : '' }}>
                                                                <label class="form-check-label"
                                                                    for="exhibition_{{ $loop->index }}">
                                                                    {{ $label }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Events</label>
                                                <div class="row">
                                                    @php
                                                        $eventsOptions = DB::table('master_menus')
                                                            ->where('category', 'Events')
                                                            ->pluck('name', 'route')
                                                            ->toArray();

                                                        if (
                                                            empty(old('master_options')) &&
                                                            empty($user->master_options)
                                                        ) {
                                                            $selected = array_merge(
                                                                $selected,
                                                                array_keys($eventsOptions),
                                                            );
                                                        }
                                                    @endphp

                                                    @foreach ($eventsOptions as $key => $label)
                                                        <div class="col-md-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    data-route="{{ $key }}" name="master_options[]"
                                                                    value="{{ $key }}" id="event_{{ $loop->index }}" {{ in_array($key, $selected) ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="event_{{ $loop->index }}">
                                                                    {{ $label }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Attendance</label>
                                                <div class="row">
                                                    @php
                                                        $attendanceOptions = DB::table('master_menus')
                                                            ->where('category', 'Attendance')
                                                            ->pluck('name', 'route')
                                                            ->toArray();

                                                        if (
                                                            empty(old('master_options')) &&
                                                            empty($user->master_options)
                                                        ) {
                                                            $selected = array_merge(
                                                                $selected,
                                                                array_keys($attendanceOptions),
                                                            );
                                                        }
                                                    @endphp

                                                    @foreach ($attendanceOptions as $key => $label)
                                                        <div class="col-md-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    data-route="{{ $key }}" name="master_options[]"
                                                                    value="{{ $key }}" id="attendance_{{ $loop->index }}" {{ in_array($key, $selected) ? 'checked' : '' }}>
                                                                <label class="form-check-label"
                                                                    for="attendance_{{ $loop->index }}">
                                                                    {{ $label }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Employee Track</label>
                                                <div class="row">
                                                    @php
                                                        $employeeTrackOptions = DB::table('master_menus')
                                                            ->where('category', 'Employee Track')
                                                            ->pluck('name', 'route')
                                                            ->toArray();

                                                        if (
                                                            empty(old('master_options')) &&
                                                            empty($user->master_options)
                                                        ) {
                                                            $selected = array_merge(
                                                                $selected,
                                                                array_keys($employeeTrackOptions),
                                                            );
                                                        }
                                                    @endphp

                                                    @foreach ($employeeTrackOptions as $key => $label)
                                                        <div class="col-md-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    data-route="{{ $key }}" name="master_options[]"
                                                                    value="{{ $key }}" id="emp_track_{{ $loop->index }}" {{ in_array($key, $selected) ? 'checked' : '' }}>
                                                                <label class="form-check-label"
                                                                    for="emp_track_{{ $loop->index }}">
                                                                    {{ $label }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Expense Management</label>
                                                <div class="row">
                                                    @php
                                                        $expenseOptions = DB::table('master_menus')
                                                            ->where('category', 'Expense')
                                                            ->pluck('name', 'route')
                                                            ->toArray();

                                                        if (
                                                            empty(old('master_options')) &&
                                                            empty($user->master_options)
                                                        ) {
                                                            $selected = array_merge(
                                                                $selected,
                                                                array_keys($expenseOptions),
                                                            );
                                                        }
                                                    @endphp

                                                    @foreach ($expenseOptions as $key => $label)
                                                        <div class="col-md-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    data-route="{{ $key }}" name="master_options[]"
                                                                    value="{{ $key }}" id="expense_{{ $loop->index }}" {{ in_array($key, $selected) ? 'checked' : '' }}>
                                                                <label class="form-check-label"
                                                                    for="expense_{{ $loop->index }}">
                                                                    {{ $label }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Reports</label>
                                                <div class="row">
                                                    @php
                                                        $reportsOptions = DB::table('master_menus')
                                                            ->where('category', 'Reports')
                                                            ->pluck('name', 'route')
                                                            ->toArray();

                                                        if (
                                                            empty(old('master_options')) &&
                                                            empty($user->master_options)
                                                        ) {
                                                            $selected = array_merge(
                                                                $selected,
                                                                array_keys($reportsOptions),
                                                            );
                                                        }
                                                    @endphp

                                                    @foreach ($reportsOptions as $key => $label)
                                                        <div class="col-md-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    data-route="{{ $key }}" name="master_options[]"
                                                                    value="{{ $key }}" id="report_{{ $loop->index }}" {{ in_array($key, $selected) ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="report_{{ $loop->index }}">
                                                                    {{ $label }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Settings</label>
                                                <div class="row">
                                                    @php
                                                        $settingsOptions = DB::table('master_menus')
                                                            ->where('category', 'Settings')
                                                            ->pluck('name', 'route')
                                                            ->toArray();

                                                        if (
                                                            empty(old('master_options')) &&
                                                            empty($user->master_options)
                                                        ) {
                                                            $selected = array_merge(
                                                                $selected,
                                                                array_keys($settingsOptions),
                                                            );
                                                        }
                                                    @endphp

                                                    @foreach ($settingsOptions as $key => $label)
                                                        <div class="col-md-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    data-route="{{ $key }}" name="master_options[]"
                                                                    value="{{ $key }}" id="setting_{{ $loop->index }}" {{ in_array($key, $selected) ? 'checked' : '' }}>
                                                                <label class="form-check-label"
                                                                    for="setting_{{ $loop->index }}">
                                                                    {{ $label }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="designation" class="form-label">Designation</label>
                                            <select class="select2" id="designation" name="designation" required>
                                                <option value="" selected disabled>Select designation</option>
                                                @foreach ($designation ?? [] as $item)
                                                    <option value="{{ $item->id }}" @if (isset($user)) {{ old('designation', $user->designation_id) == $item->id ? 'selected' : '' }} @else {{ old('designation') == $item->id ? 'selected' : '' }} @endif>
                                                        {{ $item->designation }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">Please select designation</div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="manager" class="form-label">Reporting Manager</label>
                                            <select class="select2" id="manager" name="reporting_manager" required>
                                                <option value="" selected disabled>Select manager</option>
                                                @foreach ($reporting_manager ?? [] as $manager)
                                                    <option value="{{ $manager->id }}" @if (isset($user)) {{ old('reporting_manager', $user->tm_id) == $manager->id ? 'selected' : '' }} @else {{ old('reporting_manager') == $manager->id ? 'selected' : '' }}
                                                    @endif>
                                                        {{ $manager->name }} ({{ $manager->role }})
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">Please select manager</div>
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
                                            <span class="spinner-border spinner-border-sm" role="status"
                                                aria-hidden="true"></span> Please wait...
                                        </span>
                                    </button>
                                    <a href="{{ route('users.index') }}" class="btn btn-secondary px-4 py-2 ms-2">
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
                            <div class="form-text">Please upload a CSV file with columns: name, email, phone, password,
                                role</div>
                        </div>
                        <div class="mb-3">
                            <a href="{{ asset('sample_users.csv') }}" class="btn btn-sm btn-outline-primary">
                                <i class="ri-download-line align-bottom me-1"></i> Download Sample CSV
                            </a>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="SubmitBtn">
                            <span id="SubmitText">Import</span>
                            <span id="SubmitSpinner" class="d-none">
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                Please wait...
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $('form.needs-validation').on('submit', function () {
            $('#SubmitUserBtn').prop('disabled', true);
            $('#UserSubmitText').addClass('d-none');
            $('#UserSubmitSpinner').removeClass('d-none');
        });

        $('#importModal form').on('submit', function () {
            $('#SubmitBtn').prop('disabled', true);
            $('#SubmitText').addClass('d-none');
            $('#SubmitSpinner').removeClass('d-none');
        });
    </script>
    <script>
        $(document).ready(function () {

            // Current selected role when page loads
            console.log("Default Role:", $('#role').val());

            // Whenever role changes
            $('#role').on('change', function () {
                console.log("Changed Role:", $(this).val());
            });

        });
    </script>
    <script>
        const rolePermissions = @json(DB::table('role_mst')->get()->mapWithKeys(function ($role) {
            return [
                $role->role_name => json_decode($role->unselected_routes, true) ?? [],
            ];
        }));

        $(document).ready(function () {

            function applyRole(role) {

                const blocked = rolePermissions[role] || [];

                document.querySelectorAll("input[data-route]").forEach(el => {

                    // First select everything
                    el.checked = true;

                    // Then unselect role restricted routes
                    if (blocked.includes(el.dataset.route)) {
                        el.checked = false;
                    }

                });
            }

            $('#role').on('change', function () {
                applyRole($(this).val());
            });

        });
    </script>
@endsection
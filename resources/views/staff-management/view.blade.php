@extends('layouts.app')

@section('title', 'User Management | Pro-leadexpertz')
@section('content')
<style>
    .dataTables_info,
    .dataTables_filter {
        display: none !important;
    }

    #table_length {
        display: none !important;
    }

    .datepicker {
        border: 1px solid #d1d1d1 !important;
    }

    .form-check-input:checked {
        background-color: #28a745;
        border-color: #28a745;
    }

    .status-inactive {
        color: #dc3545;
    }

    .status-active {
        color: #28a745;
    }

    .input-group-text {
        min-width: 100px;
        justify-content: center;
    }
</style>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">User Management</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Length Dropdown -->
        <div class="mb-0">
            <label>
                Show
                <select id="lengthSelect" class="form-select form-select-sm" style="width:auto; display:inline-block;">
                    @foreach([10,25,50,100,500] as $len)
                    <option value="{{ $len }}" {{ $length == $len ? 'selected' : '' }}>{{ $len }}</option>
                    @endforeach
                </select>
                entries
            </label>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-title mb-0">User List</h4>
                            <div>
                                <button class="btn btn-outline-secondary me-2" id="resetFilters">
                                    <i class="fas fa-sync-alt me-1"></i> Reset
                                </button>
                                <a href="{{ route('users.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus me-1"></i> Add User
                                </a>
                            </div>
                        </div>

                        <div class="row mb-3 g-2">
                            <div class="col-md-3">
                                <div class="input-group">
                                    <span class="input-group-text bg-transparent"><i class="fas fa-search"></i></span>
                                    <input type="text" class="form-control" id="nameFilter" placeholder="Search by name">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="input-group">
                                    <span class="input-group-text bg-transparent">Status</span>
                                    <select class="form-select" id="statusFilter">
                                        <option value="">All</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="input-group">
                                    <span class="input-group-text bg-transparent">Role</span>
                                    <select class="form-select" id="roleFilter">
                                        <option value="">All</option>
                                        @foreach($roles as $role)
                                        <option value="{{ $role->role_name }}">{{ ucfirst($role->role_name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="input-group">
                                    <span class="input-group-text bg-transparent">Team Lead</span>
                                    <select class="form-select" id="teamLeadFilter">
                                        <option value="">All</option>
                                        @foreach($teamLeads as $lead)
                                        <option value="{{ $lead->id }}">{{ $lead->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <span class="input-group-text bg-transparent"><i class="fas fa-calendar"></i></span>
                                    <input type="text" class="form-control datepicker" id="dateFilter" placeholder="Joined date">
                                    <button class="btn btn-outline-secondary" id="clearDate">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="table" class="table table-hover table-bordered dt-responsive nowrap w-100">
                                <thead class="table-light">
                                    <tr>
                                        <th width="50">#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th width="120">Status</th>
                                        <th width="120">Role</th>
                                        <th>Team Lead</th>
                                        <th width="120">Joined</th>
                                        <th width="120">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">{{ $user->name }}</h6>

                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->mobile ?? 'N/A' }}</td>
                                        <td>
                                            <div class="form-check d-block form-switch form-switch-md" dir="ltr">
                                                <input type="checkbox" class="form-check-input status-toggle"
                                                    id="statusToggle{{ $user->id }}"
                                                    data-user-id="{{ $user->id }}"
                                                    {{ $user->is_active ? 'checked' : '' }}>
                                            </div>
                                            <span class="{ $user->is_active ? 'status-active' : 'status-inactive' }} ms-4"
                                                for="statusToggle{{ $user->id }}" id="statusLabel{{ $user->id }}">
                                                {{ $user->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-{{ $user->role == 'admin' ? 'danger' : 'primary' }}">
                                                {{ ucfirst($user->role) }}
                                            </span>
                                        </td>
                                        <td>{{ $user->team_lead_name ?? 'N/A' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($user->created_date)->format('d M Y') }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('users.show', $user->id) }}"
                                                    class="btn btn-sm btn-soft-primary"
                                                    data-bs-toggle="tooltip"
                                                    data-bs-title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button class="btn btn-sm btn-soft-danger delete-user-btn"
                                                    data-user-id="{{ $user->id }}"
                                                    data-bs-toggle="tooltip"
                                                    data-bs-title="Delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-end mt-3">
                            {!! $users->links('pagination::bootstrap-5') !!}
                        </div>

                        <!-- <div class="d-flex justify-content-between align-items-center mt-3">
                                <div class="text-muted">
                                    Showing <span class="fw-bold">{{ $users->firstItem() }}</span> to 
                                    <span class="fw-bold">{{ $users->lastItem() }}</span> of 
                                    <span class="fw-bold">{{ $users->total() }}</span> entries
                                </div>
                                <div>
                                    {{ $users->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}
                                </div>
                            </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
        $('#dateFilter').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true
        });
        $('#clearDate').click(function() {
            $('#dateFilter').val('');
            applyFilters();
        });
        $('#resetFilters').click(function() {
            $('#nameFilter').val('');
            $('#statusFilter').val('');
            $('#roleFilter').val('');
            $('#teamLeadFilter').val('');
            $('#dateFilter').val('');
            applyFilters();
        });
        $('.status-toggle').change(function() {
            const userId = $(this).data('user-id');
            const isActive = $(this).is(':checked') ? 1 : 0;
            const $toggle = $(this);
            const $label = $(`#statusLabel${userId}`);

            $toggle.prop('disabled', true);

            $.ajax({
                url: "{{ route('users.update-status') }}",
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    user_id: userId,
                    is_active: isActive
                },
                success: function(response) {
                    if (response.success) {
                        $label.text(isActive ? 'Active' : 'Inactive');
                        $label.toggleClass('status-active status-inactive');
                        toastr.success('User status updated successfully');
                    } else {
                        toastr.error(response.message || 'Failed to update status');
                        $toggle.prop('checked', !isActive);
                    }
                },
                error: function(xhr) {
                    toastr.error('Error updating status');
                    $toggle.prop('checked', !isActive);
                },
                complete: function() {
                    $toggle.prop('disabled', false);
                }
            });
        });
        $('#nameFilter, #statusFilter, #roleFilter, #teamLeadFilter, #dateFilter').change(function() {
            applyFilters();
        });
        let timer;
        $('#nameFilter').keyup(function() {
            clearTimeout(timer);
            timer = setTimeout(() => {
                applyFilters();
            }, 500);
        });

        function applyFilters() {
            const name = $('#nameFilter').val();
            const status = $('#statusFilter').val();
            const role = $('#roleFilter').val();
            const teamLead = $('#teamLeadFilter').val();
            const date = $('#dateFilter').val();

            let queryParams = {};
            if (name) queryParams.name = name;
            if (status) queryParams.status = status;
            if (role) queryParams.role = role;
            if (teamLead) queryParams.team_lead = teamLead;
            if (date) queryParams.date = date;
            const queryString = $.param(queryParams);
            window.location.href = "{{ route('users.index') }}?" + queryString;
        }

        function setFilterValuesFromUrl() {
            const urlParams = new URLSearchParams(window.location.search);
            $('#nameFilter').val(urlParams.get('name') || '');
            $('#statusFilter').val(urlParams.get('status') || '');
            $('#roleFilter').val(urlParams.get('role') || '');
            $('#teamLeadFilter').val(urlParams.get('team_lead') || '');
            $('#dateFilter').val(urlParams.get('date') || '');
        }
        setFilterValuesFromUrl();
    });
</script>
@endsection
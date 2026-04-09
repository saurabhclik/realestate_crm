@extends('layouts.app')

@section('title', 'User Management | Pro-leadexpertz')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Promote Management</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-title mb-0">Promote List</h4>
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

                        <div class="table-responsive">
                            <table id="table" class="table table-hover table-bordered dt-responsive nowrap w-100">
                                <thead class="table-light">
                                    <tr>
                                        <th>S.No</th>
                                        <th>User Name</th>
                                        <th>Old Role</th>
                                        <th>New Role</th>
                                        <th>Approved</th>
                                        <th>Team Lead</th>
                                        @if($user_role == 'admin')
                                        <th>Actions</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($users)
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->old_role}}</td>
                                        <td>{{$user->new_role}}</td>
                                        <td>
                                            @if($user->is_approved == 0)
                                            <span class="badge bg-primary">Pending</span>
                                            @elseif($user->is_approved == 1)
                                            <span class="badge bg-success">Approved</span>
                                            @else
                                            <span class="badge bg-danger">Rejected</span>
                                            @endif
                                        </td>
                                        <td>{{ optional(collect($users)->firstWhere('id', $user->tm_id))->name ?? 'Admin' }}</td>
                                        @if($user_role == 'admin')
                                        <td>
                                            @if($user->is_approved == 0)
                                            <form method="POST" action="{{ route('promote.approved', $user->id) }}">
                                                @csrf
                                                <div class="d-flex gap-2">
                                                    <button class="btn btn-success" type="submit" name="action" value="approve">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                    <button class="btn btn-danger" type="submit" name="action" value="reject">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </div>
                                            </form>
                                            @else
                                            <span class="text-muted">No action</span>
                                            @endif
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-end mt-3">
                            {!! $users->links('pagination::bootstrap-5') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
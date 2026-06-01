@extends('layouts.app')

@section('title', 'Transfer leads | Pro-leadexpertz')

@section('content')
    @php
        $softwareType = session('software_type', 'real_state');
        $isLeadManagement = $softwareType === 'lead_management';
    @endphp
    @include('modals.view-comments')
    @include('modals.status-update')
    <style>
        .cust-badge {
            white-space: normal;
            padding: 6px 10px;
            font-size: 0.9rem;
            line-height: 1.4;
        }

        .dataTables_scroll {
            overflow: auto;
        }

        .dataTables_scrollHead {
            position: sticky;
            top: 0;
            z-index: 10;
            background: white;
        }

        .dataTables_scrollBody {
            max-height: 100% !important;
        }

        #table_filter {
            margin: 10px;
        }

        .filter-section {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .pinned-badge {
            background: linear-gradient(45deg, #fd7e14, #ffc107);
            color: white;
            font-size: 0.7rem;
            padding: 2px 6px;
            border-radius: 10px;
            margin-left: 5px;
        }
    </style>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <h4 class="mb-0 text-gradient-primary">
                                <i class="fas fa-exchange-alt me-2"></i>Transfer Leads<div class="border-bottom border-3 border-primary mb-2 mt-1 w-75"></div>
                            </h4>
                            <span class="cust-badge text-dark bg-soft-primary ms-2">{{ $leads->total() }} Leads</span>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="filter-section">
                        <form action="{{ route('lead.transfer') }}" method="GET">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="user">Select User</label>
                                    <select name="user" id="user" class="form-select select2" required>
                                        <option value="">Select User</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}"
                                                {{ $selected_user == $user->id ? 'selected' : '' }}>
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label for="status">Select Status</label>
                                    <select name="status" id="status" class="form-select select2" required>
                                        <option value="">Select Status</option>
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status }}"
                                                {{ request('status') == $status ? 'selected' : '' }}>
                                                {{ $status }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label for="from_date">From Date</label>
                                    <input type="date" name="from_date" id="from_date" value="{{ $from_date }}"
                                        class="form-control">
                                </div>

                                <div class="col-md-2">
                                    <label for="to_date">To Date</label>
                                    <input type="date" name="to_date" id="to_date" value="{{ $to_date }}"
                                        class="form-control">
                                </div>

                                <div class="col-md-2">
                                    <label for="length">Show</label>
                                    <select name="length" id="length" class="form-select">
                                        <option value="20" {{ request('length', 20) == '20' ? 'selected' : '' }}>20
                                        </option>
                                        <option value="50" {{ request('length') == '50' ? 'selected' : '' }}>50
                                        </option>
                                        <option value="100" {{ request('length') == '100' ? 'selected' : '' }}>100
                                        </option>
                                        <option value="500" {{ request('length') == '500' ? 'selected' : '' }}>500
                                        </option>
                                        <option value="all" {{ request('length') == 'all' ? 'selected' : '' }}>All
                                        </option>
                                    </select>
                                </div>


                                <div class="col-md-1 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-filter me-1"></i>
                                    </button>
                                </div>

                                @if ($selected_user && $selected_status)
                                    <div class="col-md-1 d-flex align-items-end">
                                        <a href="{{ route('lead.transfer') }}" class="btn btn-secondary">
                                            <i class="fa fa-filter-circle-xmark"></i>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card p-3">
                        @if ($selected_user && $selected_status)
                            <form action="{{ route('lead.transfer_user') }}" method="POST" id="transferForm">
                                @csrf
                                <input type="hidden" name="from_user" value="{{ $selected_user }}">
                                <input type="hidden" name="from_status" value="{{ $selected_status }}">

                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="to_user">Transfer To User</label>
                                        <select name="to_user" id="to_user" class="form-select select2" required>
                                            <option value="">Select User</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-2 d-flex align-items-end">
                                        <div class="form-check mt-4">
                                            <input type="checkbox" class="form-check-input" name="not_picked"
                                                id="not-picked" value="NOT PICKED"
                                                {{ request('NOT PICKED') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="include_not_picked">
                                                Not Picked
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-2 d-flex align-items-end">
                                        <button type="submit" class="btn btn-primary" id="SubmitBtn">
                                            <span id="SubmitText">Transfer Selected</span>
                                            <span id="SubmitSpinner" class="d-none">
                                                <span class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span> Please wait...
                                            </span>
                                        </button>
                                    </div>

                                    <div class="col-md-2 d-flex align-items-end">
                                        <div class="form-check form-switch">
                                            <input type="checkbox" class="form-check-input" id="selectAll">
                                            <label class="form-check-label" for="selectAll">Select All
                                                ({{ $leads->total() }})</label>
                                        </div>
                                    </div>
                                </div>

                                <table id="table" class="table table-hover table-bordered dt-responsive nowrap w-100">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="no-sort">
                                                <input type="checkbox" id="all-check" class="form-check-input">
                                            </th>
                                            <th>#</th>
                                            <th>Lead ID</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Agent</th>
                                            <th>Sharing Status</th>
                                            <th>Source</th>
                                            <th>Campaign</th>
                                            <th>Classification</th>
                                            <th>Status</th>
                                            <th>Budget</th>
                                            <th>{{ $isLeadManagement ? 'Product' : 'Project' }}</th>
                                            <th>Email</th>
                                            <th>Last Comment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($leads as $row)
                                            @php
                                                $phone = preg_replace('/\D/', '', $row->phone);
                                                if (substr($phone, 0, 2) == '91') {
                                                    $phone = substr($phone, 2);
                                                }
                                            @endphp
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="form-check-input checked"
                                                        name="checked[]" value="{{ $row->id }}">
                                                </td>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <div class="d-flex gap-3 align-items-center">
                                                        <span class="fw-semibold">{{ $row->id }}</span>
                                                        @if ($row->is_pinned)
                                                            <span class="pinned-badge">Pinned</span>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column">
                                                        <div class="d-flex align-items-center mb-1">
                                                            <div class="flex-grow-1">
                                                                <h6 class="mb-0">{{ $row->name }}</h6>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="d-flex">
                                                                <a href="tel:{{ $phone }}"
                                                                    class="btn btn-xs btn-soft-light"
                                                                    data-bs-toggle="tooltip" title="Call">
                                                                    <i class="fas fa-phone text-primary"></i>
                                                                </a>
                                                                <a href="https://wa.me/91{{ $phone }}"
                                                                    target="_blank" class="btn btn-xs btn-soft-light"
                                                                    data-bs-toggle="tooltip" title="WhatsApp">
                                                                    <i class="fab fa-whatsapp text-success"></i>
                                                                </a>
                                                                <a href="{{ route('lead.edit', ['id' => $row->id] + request()->query()) }}"
                                                                    class="btn btn-xs btn-soft-light"
                                                                    data-bs-toggle="tooltip" title="Edit">
                                                                    <i class="fas fa-edit text-warning"></i>
                                                                </a>
                                                                <button type="button" class="btn btn-xs btn-soft-light"
                                                                    onclick="showStatusUpdateModal('{{ $row->id }}', '{{ $row->status }}')"
                                                                    data-bs-toggle="tooltip" title="Update Status">
                                                                    <i class="fas fa-sync-alt text-info"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $row->phone }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1">
                                                            <span class="d-block">{{ $row->agent ?? '-' }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if (!empty($row->lead_shared_with))
                                                        <div class="shared-users">
                                                            @php
                                                                $sharedIds = explode(',', $row->lead_shared_with);
                                                                $sharedUsers = [];
                                                                foreach ($sharedIds as $id) {
                                                                    $user = collect($users)->firstWhere('id', trim($id));
                                                                    if ($user) {
                                                                        $sharedUsers[] = $user->name;
                                                                    }
                                                                }
                                                            @endphp
                                                            @if (count($sharedUsers) > 0)
                                                                <span class="badge bg-success me-1">Shared</span>
                                                                <small class="text-muted d-block mt-1">
                                                                    With: {{ implode(', ', $sharedUsers) }}
                                                                </small>
                                                            @else
                                                                <span class="badge bg-secondary">Not Shared</span>
                                                            @endif
                                                        </div>
                                                    @else
                                                        <span class="badge bg-secondary">Not Shared</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span class="cust-badge bg-soft-info text-info">
                                                        <i
                                                            class="fas fa-{{ $row->source == 'Website' ? 'globe' : ($row->source == 'Referral' ? 'user-friends' : 'ad') }} me-1"></i>
                                                        {{ $row->source }}
                                                    </span>
                                                </td>
                                                <td>{{ $row->campaign }}</td>
                                                <td>
                                                    <span class="cust-badge text-dark">
                                                        {{ $row->classification }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="cust-badge text-dark">
                                                        {{ $row->status }}
                                                    </span>
                                                </td>
                                                <td>
                                                    {{ $row->budget }}
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="flex-grow-1">
                                                            @php
                                                                if (!empty($row->project_id) && strpos($row->project_id, ',') !== false) {
                                                                    $projectIds = explode(',', $row->project_id);
                                                                    $projectNames = [];
                                                                    foreach ($projectIds as $projectId) {
                                                                        $project = DB::table('projects')->where('id', trim($projectId))->first();
                                                                        if ($project) {
                                                                            $projectNames[] = $project->project_name;
                                                                        }
                                                                    }
                                                                    echo implode(', ', $projectNames);
                                                                } else {
                                                                    echo $row->project_name ?? '-';
                                                                }
                                                            @endphp
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="mailto:{{ $row->email }}" class="text-truncate d-inline-block"
                                                        style="max-width: 200px;">
                                                        {{ $row->email }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0 me-2">
                                                            <i class="fas fa-comment-alt text-muted"></i>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            @php
                                                                $userType = session('user_type');
                                                                $comment = strtolower(trim(strip_tags($row->last_comment ?? '')));

                                                                if ($userType === 'salesman') {
                                                                    if (str_contains($comment, 'transfer') || str_contains($comment, 'allocated')) {
                                                                        $comment = '';
                                                                    }
                                                                }

                                                                $short = \Illuminate\Support\Str::limit($comment, 30);
                                                            @endphp
                                                            <span class="d-block" data-bs-toggle="tooltip"
                                                                title="{{ $comment }}">{!! $short !!}</span>
                                                            <a href="javascript:void(0);"
                                                                onclick="showComment('{{ $row->id }}')"
                                                                class="text-primary small">View more</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </form>

                            <div class="modal fade" id="transferConfirmModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Confirm Transfer</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>You are about to transfer <span id="transferCount">0</span> lead(s).</p>
                                            <p>From: <strong>{{ $selected_user_name }}</strong> ({{ $selected_status }})
                                            </p>
                                            <p>To: <strong id="toUserName"></strong> (<span id="toStatusName"></span>)</p>
                                            <p class="text-danger">This action cannot be undone!</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <button type="button" id="confirmTransferBtn"
                                                class="btn btn-primary">Confirm Transfer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="alert alert-info text-center">
                                <i class="fas fa-info-circle me-2"></i> Please select a user and status to view
                                transferable leads.
                            </div>
                        @endif

                        @if ($selected_user && $selected_status)
                            <div class="d-flex justify-content-end mt-3">
                                {{ $leads->appends([
                                        'user' => $selected_user,
                                        'status' => $selected_status,
                                        'from_date' => $from_date,
                                        'to_date' => $to_date,
                                    ])->links('vendor.pagination.bootstrap-5') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            let allLeadIds = {!! json_encode($leads->pluck('id')->toArray()) !!};
            let totalLeads = {!! $leads->total() !!};
            $('#selectAll, #all-check').change(function() {
                const isChecked = $(this).prop('checked');
                $('.checked').prop('checked', isChecked);
                if (isChecked) {
                    $('form').append(
                        allLeadIds.map(id =>
                            `<input type="hidden" name="all_lead_ids[]" value="${id}">`
                        ).join('')
                    );
                } else {
                    $('input[name="all_lead_ids[]"]').remove();
                }
            });
            $('.checked').change(function() {
                if (!$(this).prop('checked')) {
                    $('#selectAll, #all-check').prop('checked', false);
                }
            });
            $('#transferBtn').click(function() {
                const checkedCount = $('.checked:checked').length;
                const bulkCount = $('input[name="all_lead_ids[]"]').length;

                if (checkedCount === 0 && bulkCount === 0) {
                    flasher.error('Please select at least one lead to transfer');
                    return;
                }

                const count = bulkCount > 0 ? totalLeads : checkedCount;
                $('#transferCount').text(count);
                const toUserName = $('#to_user option:selected').text();
                const toStatusName = $('#to_status option:selected').text();

                $('#toUserName').text(toUserName);
                $('#toStatusName').text(toStatusName);
                const modal = new bootstrap.Modal(document.getElementById('transferConfirmModal'));
                modal.show();
            });
            $('#confirmTransferBtn').click(function() {
                $('#transferForm').submit();
            });
        });

        function showComment(leadId) {
            var commentsModal = new bootstrap.Modal(document.getElementById('commentsModal'));
            commentsModal.show();
            $.ajax({
                url: '/lead/' + leadId + '/comments',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    var html = '';
                    if (response.comments.length > 0) {
                        html += `
                        <div class="table-responsive">
                        <table class="table table-borderless table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th class="py-2">#</th>
                                    <th class="py-2">Comment</th>
                                    <th class="py-2">Status</th>
                                    <th class="py-2">Agent</th>
                                    <th class="py-2">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                    `;

                        response.comments.forEach(function(comment, index) {
                            html += `
                            <tr>
                                <td class="py-2">${index + 1}</td>
                                <td class="py-2">${comment.comment}</td>
                                <td class="py-2"><span class="cust-badge bg-${comment.status === 'Positive' ? 'success' : (comment.status === 'Negative' ? 'danger' : 'info')}">${comment.status || '-'}</span></td>
                                <td class="py-2">${comment.user_name || 'System'}</td>
                                <td class="py-2">${new Date(comment.created_date).toLocaleString()}</td>
                            </tr>
                        `;
                        });

                        html += `
                                </tbody>
                            </table>
                        </div>
                    `;
                    } else {
                        html = `
                        <div class="text-center py-4">
                            <h5 class="mb-1">No comments found</h5>
                            <p class="text-muted">This lead doesn't have any comments yet.</p>
                        </div>
                    `;
                    }

                    $('#commentsModalBody').html(html);
                },
                error: function() {
                    $('#commentsModalBody').html(`
                    <div class="text-center py-4">
                        <h5 class="mb-1">Error loading comments</h5>
                        <p class="text-muted">Please try again later.</p>
                        <button class="btn btn-primary" onclick="showComment(${leadId})">
                            <i class="fas fa-sync-alt me-1"></i> Retry
                        </button>
                    </div>
                `);
                }
            });
        }
        $('#transferForm').on('submit', function() {
            $('#SubmitBtn').prop('disabled', true);
            $('#SubmitText').addClass('d-none');
            $('#SubmitSpinner').removeClass('d-none');
        });
    </script>
@endsection

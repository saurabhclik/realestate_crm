@extends('layouts.app')
@section('title', 'leads | Pro-leadexpertz')
@section('content')
@php
$softwareType = session('software_type', 'real_state');
$isLeadManagement = $softwareType === 'lead_management';
@endphp

@include('modals.view-comments')
@include('modals.status-update', ['projects' => $projects])
@include('modals.duplicate-lead')
@include('modals.share-lead')
<style>
    .add-project-btn {
        padding: 2px 6px;
        font-size: 0.7rem;
        border: 1px solid #0d6efd;
    }

    .add-project-btn:hover {
        background-color: #0d6efd;
        color: white;
    }

    #currentProjects .badge {
        font-size: 0.75rem;
        padding: 4px 8px;
    }

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

    .applicant-modal .modal-dialog {
        max-width: 500px;
    }

    .applicant-modal .modal-header {
        background: #4b6cb7;
        color: white;
        border-bottom: none;
        border-radius: 5px 5px 0 0;
    }

    .applicant-modal .modal-title {
        font-weight: 600;
        font-size: 1.2rem;
    }

    .applicant-modal .modal-body {
        padding: 20px;
    }

    .applicant-detail {
        display: flex;
        margin-bottom: 12px;
        align-items: flex-start;
    }

    .applicant-label {
        font-weight: 600;
        color: #495057;
        width: 140px;
        flex-shrink: 0;
    }

    .applicant-value {
        color: #6c757d;
        flex-grow: 1;
        word-break: break-word;
    }

    .applicant-section {
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 1px solid #eee;
    }

    .applicant-section:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    .applicant-section-title {
        font-weight: 600;
        color: #4b6cb7;
        margin-bottom: 15px;
        font-size: 1.1rem;
        padding-bottom: 5px;
        border-bottom: 1px solid #e9ecef;
    }

    .eye-btn {
        color: #17a2b8;
        transition: all 0.3s;
    }

    .eye-btn:hover {
        color: #138496;
        transform: scale(1.1);
    }

    .duplicate-item {
        color: #fd7e14;
    }

    .share-item {
        color: #20c997;
    }

    .pin-item {
        color: #ffc107;
        cursor: pointer;
        transition: all 0.3s;
    }

    .pin-item.pinned {
        color: #fd7e14;
    }

    .pin-item:hover {
        transform: scale(1.1);
    }

    .pinned-badge {
        background: linear-gradient(45deg, #fd7e14, #ffc107);
        color: white;
        font-size: 0.7rem;
        padding: 2px 6px;
        border-radius: 10px;
        margin-left: 5px;
    }

    .visited-history-table {
        font-size: 0.875rem;
    }

    .visit-status-badge {
        font-size: 0.75rem;
        padding: 4px 8px;
    }

    .no-visits-message {
        text-align: center;
        padding: 40px 20px;
        color: #6c757d;
    }

    .no-visits-message i {
        font-size: 3rem;
        margin-bottom: 15px;
        opacity: 0.5;
    }

    .card .card-body.p-2 {
        padding: 0.5rem !important;
    }

    .btn-xs {
        padding: 0.15rem 0.3rem;
        font-size: 0.7rem;
        line-height: 1.2;
        border-radius: 0.2rem;
    }

    .badge.rounded-pill {
        font-weight: 500;
    }

    .text-truncate-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .card:hover {
        transform: translateY(-2px);
        transition: transform 0.2s ease;
        box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.1) !important;
    }

    .bg-success {
        background-color: #28a745 !important;
    }

    .bg-info {
        background-color: #17a2b8 !important;
    }

    .bg-warning {
        background-color: #ffc107 !important;
    }

    #matchingProjectsModal .modal-dialog {
        max-width: 1000px;
    }

    #matchingProjectsModal .modal-body {
        max-height: 70vh;
        overflow-y: auto;
        padding: 1rem;
    }
</style>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <h4 class="mb-0 text-gradient-primary">
                            @if (isset($lead_name))
                            @if ($lead_name === 'all_lead')
                            <i class="fas fa-user-tie me-2"></i>All Leads
                            @elseif ($lead_name === 'allocate')
                            <i class="fas fa-user-tie me-2"></i>Allocated Leads
                            @elseif ($lead_name === 'unallocated')
                            <i class="fas fa-user-clock me-2"></i>Unallocated Leads
                            @elseif ($lead_name === 'new')
                            <i class="fas fa-star me-2"></i>New Leads
                            @elseif ($lead_name === 'sale_manager')
                            <i class="fas fa-user-shield me-2"></i>Sales Manager
                            @elseif ($lead_name === 'pending')
                            <i class="fas fa-pause-circle me-2"></i>Pending Leads
                            @elseif ($lead_name === 'processing')
                            <i class="fas fa-cogs me-2"></i>Processing Leads
                            @elseif ($lead_name === 'interested')
                            <i class="fas fa-thumbs-up me-2"></i>Interested Leads
                            @elseif ($lead_name === 'call_scheduled')
                            <i class="fas fa-phone-volume me-2"></i>Scheduled Calls
                            @elseif ($lead_name === 'visit_scheduled')
                            <i class="fas fa-calendar-check me-2"></i>Scheduled Visits
                            @elseif ($lead_name === 'visit_done')
                            <i class="fas fa-check-circle me-2"></i>Completed Visits
                            @elseif ($lead_name === 'booked')
                            <i class="fas fa-handshake me-2"></i>Booked Leads
                            @elseif ($lead_name === 'completed')
                            <i class="fas fa-trophy me-2"></i>Completed Leads
                            @elseif ($lead_name === 'cancelled')
                            <i class="fas fa-times-circle me-2"></i>Cancelled Leads
                            @elseif ($lead_name === 'future')
                            <i class="fas fa-clock me-2"></i>Future Leads
                            @elseif ($lead_name === 'not_picked')
                            <i class="fas fa-clock me-2"></i>Not Picked
                            @elseif ($lead_name === 'not_interested')
                            <i class="fas fa-clock me-2"></i>Not Interested
                            @elseif ($lead_name === 'lost')
                            <i class="fas fa-clock me-2"></i>Lost
                            @elseif ($lead_name === 'wrong_number')
                            <i class="fas fa-clock me-2"></i>Wrong Number
                            @elseif ($lead_name === 'transfer')
                            <i class="fa-solid fa-money-bill-transfer"></i>Transfer Leads
                            @elseif ($lead_name === 'not_reachable')
                            <i class="fas fa-clock me-2"></i>Not Reachable
                            @endif
                            @else
                            <i class="fas fa-users me-2"></i>Others Lead Dashboard
                            @endif
                        </h4>
                        <span class="cust-badge text-dark bg-soft-primary ms-2">{{ $leads->total() }} Leads</span>
                    </div>
                    @if($lead_name == 'all_lead')
                    <div class="d-flex gap-2">
                        <button id="btnExportExcel" class="shadow btn btn-success btn-sm d-flex align-items-center" data-bs-toggle="tooltip" data-bs-placement="top" title="Export table data to Excel">
                            <i class="fas fa-file-excel me-2"></i> Excel
                        </button>

                        <button id="btnExportPDF" class="shadow btn btn-danger btn-sm d-flex align-items-center" data-bs-toggle="tooltip" data-bs-placement="top" title="Export table data to PDF">
                            <i class="fas fa-file-pdf me-2"></i> PDF
                        </button>
                        <button class="btn btn-sm btn-outline-secondary me-2" type="button" data-bs-toggle="collapse" data-bs-target="#filterCollapse" aria-expanded="false" aria-controls="filterCollapse">
                            <i class="fas fa-sliders-h"></i>
                        </button>
                    </div>
                    @endif
                </div>
            </div>
            @include('partial.lead-filter')
            <div class="col-12">
                <div class="card p-3">
                    @if(in_array($lead_name, ['allocate']))
                    <form class="lead-allocate-form" action="{{ $lead_name === 'allocate' ? route('lead.allocate_user') : route('lead.transfer_user') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="user">Select User to {{ $lead_name === 'allocate' ? 'Allocate' : 'Transfer' }}</label>
                                <select name="user" id="user" class="select2" required>
                                    <option value="">Select User</option>
                                    @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 d-flex align-items-center">
                                <div class="form-check mt-4">
                                    <input type="checkbox" class="form-check-input" name="send_to_new_lead" id="sendToNewLead" value="1">
                                    <label class="form-check-label" for="sendToNewLead">
                                        <strong>Send to New Lead</strong>
                                        <small class="d-block text-muted">If checked, lead goes to NEW LEAD status</small>
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-2 d-flex align-items-end">
                                <button type="submit" class="btn btn-success submit-btn">
                                    <span class="submit-text">Allocate Selected</span>
                                    <span id="SubmitSpinner" class="d-none">
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Please wait...
                                    </span>
                                </button>
                            </div>
                        </div>
                        @endif
                        <div>
                            <label>
                                Show
                                <select id="lengthSelect" class="form-select form-select-sm" style="width: auto; display: inline-block;">
                                    <option value="10" {{ $length == 10 ? 'selected' : '' }}>10</option>
                                    <option value="25" {{ $length == 25 ? 'selected' : '' }}>25</option>
                                    <option value="50" {{ $length == 50 ? 'selected' : '' }}>50</option>
                                    <option value="100" {{ $length == 100 ? 'selected' : '' }}>100</option>
                                    <option value="500" {{ $length == 500 ? 'selected' : '' }}>500</option>
                                    @if ($lead_name === 'all_lead')
                                    <option value="all" {{ $requestedLength == 'all' ? 'selected' : '' }}>All</option>
                                    @endif
                                </select>
                                entries
                            </label>
                        </div>
                        <table id="table" class="table-hover table-bordered dt-responsive nowrap w-100">
                            <thead class="table-light">
                                <tr>
                                    @if($lead_name == 'allocate' || $lead_name == 'transfer')
                                    <th class="no-sort">
                                        <input type="checkbox" id="all-check" class="form-check-input">
                                    </th>
                                    @endif
                                    <th>#</th>
                                    <th>Lead ID</th>
                                    <th>Lead Details</th>
                                    @if($lead_name != 'allocate')
                                    <th>Agent</th>
                                    @endif
                                    <th>Sharing Status</th>
                                    <th>Source</th>
                                    <th>Campaign</th>
                                    @if(!in_array($lead_name, ['booked','completed','cancelled']))
                                    <th>Classification</th>
                                    @else
                                    <th>Conversion</th>
                                    @endif
                                    <th>Status</th>
                                    <th>Budget</th>
                                    <th>{{ $isLeadManagement ? 'Product' : 'Project' }}</th>
                                    <th>Email</th>
                                    @if ($lead_name !== 'transfer')
                                    <th>Lead Date</th>
                                    @if($lead_name !== 'allocate' && $lead_name !== 'unallocated')
                                    <th>Follow Up</th>
                                    @endif
                                    @endif
                                    @if($lead_name != 'allocate')
                                    <th>Last Comment</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($leads as $row)
                                @php
                                    $createdDate = \Carbon\Carbon::parse($row->created_at);
                                    $currentDate = \Carbon\Carbon::now();
                                    $diff_date_count = $createdDate->diffInDays($currentDate);
                                    $excludedLeadNames = [
                                    'completed',
                                    'cancelled',
                                    'not_picked',
                                    'not_interested',
                                    'lost',
                                    'wrong_number',
                                    'transfer',
                                    'not_reachable'
                                    ];
                                @endphp
                                <tr>
                                    @if($lead_name == 'allocate' || $lead_name == 'transfer')
                                    <td>
                                        <input type="checkbox" class="form-check-input checked" name="checked[]" value="{{ $row->id }}">
                                    </td>
                                    @endif
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        <div class="d-flex gap-3 align-items-center">
                                            @if(session('user_type') == 'admin' || session('user_type') == 'team_manager')
                                            <div class="position-relative d-inline-block text-center">
                                                @if($diff_date_count > 5 && !in_array($lead_name, $excludedLeadNames))
                                                <span
                                                    class="position-absolute bottom-50 start-50 translate-middle badge rounded-pill bg-danger text-light shadow-sm cursor-pointer"
                                                    style="font-size: 0.65rem; padding: 0.25em 0.5em;"
                                                    data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    title="Lead created on {{ $createdDate->format('Y-m-d H:i') }}, {{ $diff_date_count }} days ago">
                                                    👋🏻 {{ $diff_date_count }} days
                                                </span>
                                                @endif
                                                <div class="action-item duplicate-item" onclick="showDuplicateModal('{{ $row->id }}')" data-bs-toggle="tooltip" title="Duplicate Lead" style="cursor:pointer;">
                                                    <i class="fas fa-copy"></i>
                                                </div>
                                            </div>
                                            <div class="action-item share-item" onclick="showShareModal('{{ $row->id }}')" data-bs-toggle="tooltip" title="Share Lead" style="cursor:pointer;">
                                                <i class="fas fa-share-alt"></i>
                                            </div>
                                            @endif
                                            <div class="action-item pin-item {{ $row->is_pinned ? 'pinned' : '' }}"
                                                onclick="togglePin('{{ $row->id }}, {{ $row->is_pinned ? 0 : 1 }}')"
                                                data-bs-toggle="tooltip"
                                                title="{{ $row->is_pinned ? 'Unpin Lead' : 'Pin Lead' }}"
                                                style="cursor:pointer;">
                                                <i class="fas fa-thumbtack"></i>
                                            </div>
                                            @if($row->is_pinned)
                                            <span class="pinned-badge">Pinned</span>
                                            @endif
                                            @if($row->duplicate_count > 0)
                                            <span
                                                class="position-absolute bottom-50 start-100 translate-middle badge rounded-pill bg-warning text-dark shadow-sm cursor-pointer"
                                                style="font-size: 0.65rem; padding: 0.25em 0.5em;"
                                                data-bs-toggle="tooltip"
                                                data-bs-html="true"
                                                title="
                                                            @foreach($row->duplicate_details as $dup)
                                                                Status: {{ $dup->status }}, Created: {{ \Carbon\Carbon::parse($dup->created_at)->format('d M Y H:i') }}<br>
                                                            @endforeach
                                                        ">
                                                👬🏼 {{ $row->duplicate_count }}
                                            </span>
                                            @endif
                                            <span class="fw-semibold">{{ $row->id }}</span>
                                        </div>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <div class="d-flex align-items-center mb-1">
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">{{ $row->name }}</h6>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="text-muted small">{{ $row->phone }}</span>
                                                <div class="d-flex">
                                                    <a href="tel:{{ $row->phone }}" class="btn btn-xs btn-soft-light" data-bs-toggle="tooltip" title="Call">
                                                        <i class="fas fa-phone text-primary"></i>
                                                    </a>
                                                    <a href="https://wa.me/91{{ $row->phone }}" target="_blank" class="btn btn-xs btn-soft-light" data-bs-toggle="tooltip" title="WhatsApp">
                                                        <i class="fab fa-whatsapp text-success"></i>
                                                    </a>
                                                    <!-- <a href="{{ route('lead.edit', $row->id) }}" class="btn btn-xs btn-soft-light" data-bs-toggle="tooltip" title="Edit">
                                                        <i class="fas fa-edit text-warning"></i>
                                                    </a> -->
                                                    <a href="{{ route('lead.edit', ['id' => $row->id] + request()->query()) }}" class="btn btn-xs btn-soft-light" data-bs-toggle="tooltip" title="Edit">
                                                        <i class="fas fa-edit text-warning"></i>
                                                    </a>
                                                    @if($lead_name != 'allocate' && $lead_name != 'unallocated')
                                                    <button class="btn btn-xs btn-soft-light"
                                                        onclick="showStatusUpdateModal('{{ $row->id }}', '{{ $row->status }}')"
                                                        data-bs-toggle="tooltip" title="Update Status">
                                                        <i class="fas fa-sync-alt text-info"></i>
                                                    </button>
                                                    @endif
                                                    @if($lead_name === 'completed')
                                                    <button class="btn btn-xs btn-soft-light view-applicant-btn"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#applicantModal"
                                                        data-id="{{ $row->id }}"
                                                        data-app-city="{{ $row->app_city }}"
                                                        data-app-contact="{{ $row->app_contact }}"
                                                        data-app-doa="{{ $row->app_doa }}"
                                                        data-app-dob="{{ $row->app_dob }}"
                                                        data-app-name="{{ $row->app_name }}"
                                                        data-final-price="{{ $row->final_price }}"
                                                        data-size="{{ $row->size }}"
                                                        data-project-id="{{ $row->project_id }}"
                                                        title="View Applicant Details">
                                                        <i class="fas fa-eye eye-btn"></i>
                                                    </button>
                                                    @endif
                                                    @if(session('user_type') == 'admin')
                                                    <button class="btn btn-xs btn-soft-light delete-lead-btn"
                                                        data-lead-id="{{ $row->id }}"
                                                        data-lead-name="{{ $row->name }}"
                                                        data-bs-toggle="tooltip"
                                                        title="Delete Lead">
                                                        <i class="fas fa-trash text-danger"></i>
                                                    </button>
                                                    @endif
                                                    <button class="btn btn-xs btn-soft-light matching-projects-btn"
                                                        data-lead-id="{{ $row->id }}"
                                                        data-lead-phone="{{ $row->phone }}"
                                                        title="Matching Projects">
                                                        <i class="fas fa-building text-info"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="d-block">
                                                @if($row->visited_on == 1)
                                                <span class="rounded-pill px-3 py-1 bg-light border text-success fw-semibold small">
                                                    <i class="fas fa-user-check me-1"></i> Visited
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    @if($lead_name != 'allocate')
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <span class="d-block">{{ $row->agent ?? '—' }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    @endif
                                    <td>
                                        @if(!empty($row->lead_shared_with))
                                        <div class="shared-users">
                                            @php
                                            $sharedIds = explode(',', $row->lead_shared_with);
                                            $sharedUsers = [];
                                            foreach($sharedIds as $id) {
                                            $user = collect($users)->firstWhere('id', $id);
                                            if($user) {
                                            $sharedUsers[] = $user->name;
                                            }
                                            }
                                            @endphp
                                            @if(count($sharedUsers) > 0)
                                            <span class="badge bg-success me-1">Shared</span>
                                            <small class="text-muted d-block mt-1">
                                                With: {{ implode(', ', $sharedUsers) }}
                                            </small>
                                            @endif
                                        </div>
                                        @else
                                        <span class="badge bg-secondary">Not Shared</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="cust-badge bg-soft-info text-info">
                                            <i class="fas fa-{{ $row->source == 'Website' ? 'globe' : ($row->source == 'Referral' ? 'user-friends' : 'ad') }} me-1"></i>
                                            {{ $row->source }}
                                        </span>
                                    </td>
                                    <td>{{ $row->campaign }}</td>
                                    @if(!in_array($lead_name, ['booked','completed','cancelled']))
                                    <td>
                                        <span class="cust-badge text-dark">
                                            {{ $row->classification }}
                                        </span>
                                    </td>
                                    @else
                                    <td>
                                        <span class="cust-badge text-dark">
                                            {{ $row->conversion_type }}
                                        </span>
                                    </td>
                                    @endif
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
                                                if (strpos($row->project_id, ',') !== false) {
                                                $projectIds = explode(',', $row->project_id);
                                                $projectNames = [];
                                                foreach($projectIds as $projectId) {
                                                $project = DB::table('projects')->where('id', trim($projectId))->first();
                                                if($project) {
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
                                        <a href="mailto:{{ $row->email }}" class="text-truncate d-inline-block" style="max-width: 200px;">
                                            {{ $row->email }}
                                        </a>
                                    </td>
                                    @if($lead_name !== 'transfer')
                                    <td>{{ \Carbon\Carbon::parse($row->lead_date)->format('d M Y') }}</td>
                                    @endif
                                    @if($lead_name !== 'allocate' && $lead_name !== 'unallocated' && $lead_name !== 'transfer')
                                    <td>
                                        <span class="cust-badge text-dark">
                                            {{ \Carbon\Carbon::parse($row->updated_date)->format('d M Y') }}
                                        </span>
                                    </td>
                                    @endif
                                    @if($lead_name !== 'allocate')
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 me-2">
                                                <i class="fas fa-comment-alt text-muted"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                @php
                                                $comment = strip_tags($row->last_comment ?? '');
                                                $short = \Illuminate\Support\Str::limit($comment, 30);
                                                @endphp
                                                <span class="d-block" data-bs-toggle="tooltip" title="{{ $comment }}">
                                                    {!! $short !!}
                                                </span>
                                                <a href="javascript:void(0);" onclick="showComment('{{ $row->id }}')" class="text-primary small">
                                                    View more
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @if($lead_name === 'allocate')
                    </form>
                    @endif
                    <div class="d-flex justify-content-end mt-3">
                        {{ $leads->links('vendor.pagination.bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="matchingProjectsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info text-light">
                <h5 class="modal-title">Matching Projects</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="matchingProjectsContent" class="text-center py-4">
                    <div class="spinner-border text-info" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mt-2">Loading matching projects...</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade applicant-modal" id="applicantModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Applicant Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="applicant-section">
                    <div class="applicant-section-title">Personal Information</div>
                    <div class="applicant-detail">
                        <span class="applicant-label">Name:</span>
                        <span class="applicant-value" id="modal-app-name">-</span>
                    </div>
                    <div class="applicant-detail">
                        <span class="applicant-label">Contact:</span>
                        <span class="applicant-value" id="modal-app-contact">-</span>
                    </div>
                    <div class="applicant-detail">
                        <span class="applicant-label">Date of Birth:</span>
                        <span class="applicant-value" id="modal-app-dob">-</span>
                    </div>
                    <div class="applicant-detail">
                        <span class="applicant-label">City:</span>
                        <span class="applicant-value" id="modal-app-city">-</span>
                    </div>
                </div>

                <div class="applicant-section">
                    <div class="applicant-section-title">{{ $isLeadManagement ? 'Product Details' : 'Project Details' }}</div>
                    <div class="applicant-detail">
                        <span class="applicant-label">{{ $isLeadManagement ? 'Product:' : 'Project:' }}</span>
                        <span class="applicant-value" id="modal-project-name">-</span>
                    </div>
                    <div class="applicant-detail">
                        <span class="applicant-label">{{ $isLeadManagement ? 'Quantity:' : 'Property Size:' }}</span>
                        <span class="applicant-value" id="modal-size">-</span>
                    </div>
                    <div class="applicant-detail">
                        <span class="applicant-label">Final Price:</span>
                        <span class="applicant-value" id="modal-final-price">-</span>
                    </div>
                    <div class="applicant-detail">
                        <span class="applicant-label">Date of Application:</span>
                        <span class="applicant-value" id="modal-app-doa">-</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addProjectModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-light">Add More Projects</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="leadId">
                <div class="mb-3">
                    <label for="newProjects" class="form-label">Add More Projects</label>
                    <select id="newProjects" class="form-control" multiple>
                        @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                        @endforeach
                    </select>
                </div>
                <p class="text-muted mb-3">
                    <i class="fas fa-info-circle me-1"></i>
                    Hold <strong>Ctrl</strong> (or <strong>Cmd</strong> on Mac) to select multiple products.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveProjectsBtn">
                    <span class="submit-text">Add Projects</span>
                    <span class="spinner-border spinner-border-sm d-none" role="status"></span>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="visitedHistoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-light">
                    <i class="fas fa-history me-2"></i>
                    Project Visit History
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="visitedHistoryContent">
                    <div class="text-center py-4">
                        <div class="spinner-border text-info" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2">Loading visit history...</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteLeadModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-light">
                    <i class="fas fa-trash me-2"></i>Delete Lead
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="deleteLeadForm" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="lead_id" id="deleteLeadId">
                <div class="modal-body">
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Warning:</strong> This action cannot be undone. All lead data, comments, and history will be permanently deleted.
                    </div>

                    <div class="mb-3">
                        <p>Are you sure you want to delete lead: <strong id="deleteLeadName"></strong>?</p>
                    </div>

                    <div class="mb-3">
                        <label for="deletePassword" class="form-label">Admin Password</label>
                        <input type="password" class="form-control" id="deletePassword" name="password" placeholder="Enter your password" required>
                        <small class="text-muted">For security, admin password is required to delete leads.</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger" id="deleteSubmitBtn">
                        <span id="deleteSubmitText">Delete Lead</span>
                        <span id="deleteSubmitSpinner" class="d-none">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Deleting...
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#all-check').on('change', function() {
        const isChecked = $(this).is(':checked');
        $('.checked').prop('checked', isChecked);
    });

    function showDuplicateModal(leadId) {
        document.getElementById('duplicateLeadId').value = leadId;
        const modal = new bootstrap.Modal(document.getElementById('duplicateLeadModal'));
        modal.show();
    }

    function showShareModal(leadId) {
        document.getElementById('shareLeadId').value = leadId;
        const modal = new bootstrap.Modal(document.getElementById('shareLeadModal'));
        modal.show();
    }

    $('#applicantModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var appCity = button.data('app-city');
        var appContact = button.data('app-contact');
        var appDoa = button.data('app-doa');
        var appDob = button.data('app-dob');
        var appName = button.data('app-name');
        var finalPrice = button.data('final-price');
        var size = button.data('size');
        var projectId = button.data('project-id');

        var formattedDoa = appDoa ? new Date(appDoa).toLocaleDateString() : '-';
        var formattedDob = appDob ? new Date(appDob).toLocaleDateString() : '-';

        var formattedPrice = finalPrice ? '₹' + parseFloat(finalPrice).toLocaleString('en-IN') : '-';

        $('#modal-app-name').text(appName || '-');
        $('#modal-app-contact').text(appContact || '-');
        $('#modal-app-city').text(appCity || '-');
        $('#modal-app-doa').text(formattedDoa);
        $('#modal-app-dob').text(formattedDob);
        $('#modal-final-price').text(formattedPrice);
        $('#modal-size').text(size || '-');

        if (projectId) {
            $.ajax({
                url: '/get-project-name/' + projectId,
                type: 'GET',
                success: function(response) {
                    if (response.success) {
                        $('#modal-project-name').text(response.projectName);
                    } else {
                        $('#modal-project-name').text('{{ $isLeadManagement ? "Product" : "Project" }} ID: ' + projectId);
                    }
                },
                error: function() {
                    $('#modal-project-name').text('{{ $isLeadManagement ? "Product" : "Project" }} ID: ' + projectId);
                }
            });
        } else {
            $('#modal-project-name').text('-');
        }
    });

    $('#ShareSubmitBtn').closest('form').on('submit', function() {
        $('#ShareSubmitBtn').prop('disabled', true);
        $('#ShareSubmitText').addClass('d-none');
        $('#ShareSubmitSpinner').removeClass('d-none');
    });

    $('#DuplicateSubmitBtn').closest('form').on('submit', function() {
        $('#DuplicateSubmitBtn').prop('disabled', true);
        $('#DuplicateSubmitText').addClass('d-none');
        $('#DuplicateSubmitSpinner').removeClass('d-none');
    });

    $(document).on('click', '.add-project-btn', function() {
        const leadId = $(this).data('lead-id');
        const currentProjects = $(this).data('current-projects');
        showAddProjectModal(leadId, currentProjects);
    });

    $(document).on('click', '.add-project-btn', function() {
        const leadId = $(this).data('lead-id');
        const currentProjects = $(this).data('current-projects');
        showAddProjectModal(leadId, currentProjects);
    });

    function showAddProjectModal(leadId, currentProjects) {
        $('#leadId').val(leadId);
        let currentProjectsHtml = '<div class="d-flex flex-wrap gap-1">';

        if (currentProjects) {
            let projectIds = [];
            if (typeof currentProjects === 'string') {
                projectIds = currentProjects.split(',');
            } else if (Array.isArray(currentProjects)) {
                projectIds = currentProjects;
            } else if (typeof currentProjects === 'number') {
                projectIds = [currentProjects.toString()];
            } else {
                projectIds = String(currentProjects).split(',');
            }
            projectIds = projectIds.filter(id => id && id.toString().trim() !== '');
            if (projectIds.length > 0) {
                projectIds.forEach(projectId => {
                    const trimmedId = projectId.toString().trim();
                    if (trimmedId) {
                        currentProjectsHtml += `<span class="badge bg-primary me-1 mb-1">Project ID: ${trimmedId}</span>`;
                    }
                });
            } else {
                currentProjectsHtml += '<span class="text-muted">No projects assigned</span>';
            }
        } else {
            currentProjectsHtml += '<span class="text-muted">No projects assigned</span>';
        }

        currentProjectsHtml += '</div>';
        $('#currentProjects').html(currentProjectsHtml);
        $('#newProjects').val(null);
        $('#addProjectNotes').val('');
        $('#addProjectModal').modal('show');
        setTimeout(() => {
            console.log('leadId value in form:', $('#leadId').val());
        }, 100);
    }

    $('#saveProjectsBtn').on('click', function() {
        const btn = $(this);
        const submitText = btn.find('.submit-text');
        const spinner = btn.find('.spinner-border');
        const leadId = $('#leadId').val();
        const selectedProjects = $('#newProjects').val();
        const notes = $('#addProjectNotes').val();

        if (!leadId) {
            toastr.error('Lead ID is missing. Please try again.');
            return;
        }

        if (!selectedProjects || selectedProjects.length === 0) {
            toastr.error('Please select at least one project');
            return;
        }
        submitText.addClass('d-none');
        spinner.removeClass('d-none');
        btn.prop('disabled', true);
        $.ajax({
            url: '{{ route("lead.add-projects") }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                lead_id: leadId,
                projects: selectedProjects,
                notes: notes
            },
            success: function(response) {
                if (response.success) {
                    toastr.success(response.message);
                    $('#addProjectModal').modal('hide');
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                } else {
                    toastr.error(response.message);
                }
            },
            error: function(xhr) {
                const errorMessage = xhr.responseJSON?.message || 'Unknown error occurred';
                toastr.error('Error adding projects: ' + errorMessage);
            },
            complete: function() {
                submitText.removeClass('d-none');
                spinner.addClass('d-none');
                btn.prop('disabled', false);
            }
        });
    });

    $('#addProjectModal').on('hidden.bs.modal', function() {
        $('#leadId').val('');
        $('#newProjects').val(null);
        $('#addProjectNotes').val('');
    });

    $(document).on('click', '.visited-history-btn', function() {
        const leadId = $(this).data('lead-id');
        if (!leadId) {
            toastr.error('Could not find lead ID. Please try again.');
            return;
        }

        showVisitedHistory(leadId);
    });

    function showVisitedHistory(leadId) {
        $('#visitedHistoryModal').modal('show');
        $('#visitedHistoryContent').html(`
            <div class="text-center py-4">
                <div class="spinner-border text-info" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <p class="mt-2">Loading visit history for lead ${leadId}...</p>
            </div>
        `);
        $.ajax({
            url: `/lead/${leadId}/project-visits`,
            type: 'GET',
            data: {
                lead_id: leadId
            },
            success: function(response) {
                if (response.success && response.projectVisits && response.projectVisits.length > 0) {
                    renderVisitedHistoryTable(response.projectVisits);
                } else {
                    showNoVisitsMessage();
                }
            },
            error: function(xhr, status, error) {
                let errorMessage = 'Error loading visit history';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }

                $('#visitedHistoryContent').html(`
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        ${errorMessage}
                        ${xhr.responseJSON && xhr.responseJSON.received_data ? 
                        '<br><small>Received data: ' + JSON.stringify(xhr.responseJSON.received_data) + '</small>' : ''}
                    </div>
                `);
            }
        });
    }

    function renderVisitedHistoryTable(projectVisits) {
        let tableHtml = `
            <div class="table-responsive">
                <table class="table table-bordered visited-history-table">
                    <thead class="table-light">
                        <tr>
                            <th>Project Name</th>
                            <th>Visit Status</th>
                            <th>Visit Date</th>
                            <th>Visit Time</th>
                            <th>Created Date</th>
                        </tr>
                    </thead>
                    <tbody>
        `;

        projectVisits.forEach(visit => {
            const visitDate = visit.visit_date ? formatDate(visit.visit_date) : 'N/A';
            const visitTime = visit.visit_time ? formatTime(visit.visit_time) : 'N/A';
            const createdDate = formatDateTime(visit.created_at);
            const statusBadgeClass = getStatusBadgeClass(visit.visit_status);

            tableHtml += `
                <tr>
                    <td>
                        <strong>${visit.project_name || 'N/A'}</strong>
                        ${visit.location ? `<br><small class="text-muted">${visit.location}</small>` : ''}
                    </td>
                    <td>
                        <span class="badge ${statusBadgeClass} visit-status-badge">
                            ${visit.visit_status}
                        </span>
                    </td>
                    <td>${visitDate}</td>
                    <td>${visitTime}</td>
                    <td>${createdDate}</td>
                </tr>
            `;
        });

        tableHtml += `
                    </tbody>
                </table>
            </div>
            <div class="mt-3 text-muted small">
                Showing ${projectVisits.length} visit record(s)
            </div>
        `;

        $('#visitedHistoryContent').html(tableHtml);
    }

    function showNoVisitsMessage() {
        $('#visitedHistoryContent').html(`
            <div class="no-visits-message">
                <i class="fas fa-calendar-times"></i>
                <h5 class="mt-3">No Visit History Found</h5>
                <p class="text-muted">This lead doesn't have any recorded project visits yet.</p>
            </div>
        `);
    }

    function getStatusBadgeClass(status) {
        const statusClasses = {
            'SITE_VISIT': 'bg-primary',
            'SITE_VISIT_DONE': 'bg-success',
            'REVISIT_SCHEDULED': 'bg-warning text-dark',
            'REVISIT_DONE': 'bg-info',
            'VISIT_SCHEDULED': 'bg-primary',
            'VISIT_DONE': 'bg-success'
        };

        return statusClasses[status] || 'bg-secondary';
    }

    function formatDate(dateString) {
        if (!dateString) return 'N/A';
        const date = new Date(dateString);
        return date.toLocaleDateString('en-IN', {
            day: '2-digit',
            month: 'short',
            year: 'numeric'
        });
    }

    function formatTime(timeString) {
        if (!timeString) return 'N/A';
        const time = new Date(`2000-01-01T${timeString}`);
        return time.toLocaleTimeString('en-IN', {
            hour: '2-digit',
            minute: '2-digit',
            hour12: true
        });
    }

    function formatDateTime(dateTimeString) {
        if (!dateTimeString) return 'N/A';
        const date = new Date(dateTimeString);
        return date.toLocaleDateString('en-IN', {
            day: '2-digit',
            month: 'short',
            year: 'numeric'
        }) + ' ' + date.toLocaleTimeString('en-IN', {
            hour: '2-digit',
            minute: '2-digit',
            hour12: true
        });
    }

    $(document).on('click', '.delete-lead-btn', function() {
        const leadId = $(this).data('lead-id');
        const leadName = $(this).data('lead-name');

        $('#deleteLeadId').val(leadId);
        $('#deleteLeadName').text(leadName);
        $('#deletePassword').val('');
        $('#deleteLeadForm').attr('action', '{{ route("lead.delete") }}');

        const deleteModal = new bootstrap.Modal(document.getElementById('deleteLeadModal'));
        deleteModal.show();
    });

    $('#deleteLeadForm').on('submit', function(e) {
        e.preventDefault();

        const form = $(this);
        const submitBtn = $('#deleteSubmitBtn');
        const submitText = $('#deleteSubmitText');
        const submitSpinner = $('#deleteSubmitSpinner');

        submitBtn.prop('disabled', true);
        submitText.addClass('d-none');
        submitSpinner.removeClass('d-none');

        $.ajax({
            url: form.attr('action'),
            method: 'DELETE',
            data: form.serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.status === 200) {
                    toastr.success(response.message);
                    $('#deleteLeadModal').modal('hide');
                    $(`button[data-lead-id="${response.lead_id}"]`).closest('tr').fadeOut(300, function() {
                        $(this).remove();
                    });
                } else if (response.status === 403) {
                    toastr.error(response.message);
                    submitBtn.prop('disabled', true);
                    submitText.text('Blocked for 1 day').removeClass('d-none');
                    submitSpinner.addClass('d-none');
                } else {
                    toastr.error(response.message);
                    submitBtn.prop('disabled', false);
                    submitText.removeClass('d-none');
                    submitSpinner.addClass('d-none');
                    $('#deletePassword').val('');
                }
            },
            error: function(xhr) {
                const errorMessage = xhr.responseJSON?.message || 'An error occurred';
                toastr.error(errorMessage);
                submitBtn.prop('disabled', false);
                submitText.removeClass('d-none');
                submitSpinner.addClass('d-none');
            }
        });
    });

    $('#deleteLeadModal').on('hidden.bs.modal', function() {
        $('#deletePassword').val('');
        $('#deleteSubmitBtn').prop('disabled', false);
        $('#deleteSubmitText').removeClass('d-none');
        $('#deleteSubmitSpinner').addClass('d-none');
    });

    $(document).on('click', '.matching-projects-btn', function() {
        const leadId = $(this).data('lead-id');
        const leadPhone = $(this).data('lead-phone');
        if (!leadId) {
            toastr.error('Lead ID not found');
            return;
        }

        $('#matchingProjectsContent').html(`
            <div class="text-center py-4">
                <div class="spinner-border text-info" role="status"></div>
                <p class="mt-2">Loading matching projects...</p>
            </div>
        `);

        const modal = new bootstrap.Modal(document.getElementById('matchingProjectsModal'));
        modal.show();

        $.ajax({
            url: `/lead/${leadId}/matching-properties`,
            type: 'GET',
            success: function(response) {
                if (response.data && response.data.length > 0) {
                    let html = '<div class="row g-2">';
                    response.data.forEach(property => {
                        let scoreColor = 'secondary';
                        if (property.match_score >= 70) scoreColor = 'success';
                        else if (property.match_score >= 40) scoreColor = 'info';
                        else if (property.match_score >= 20) scoreColor = 'warning';
                        const reasons = property.match_reasons && property.match_reasons.length > 0 ?
                            property.match_reasons.slice(0, 2).join(', ') + (property.match_reasons.length > 2 ? '...' : '') :
                            '-';

                        html += `
                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100 shadow-sm border-0" style="border-radius: 8px;">
                                <div class="card-body p-2"> <!-- Reduced padding -->
                                    <div class="d-flex justify-content-between align-items-start mb-1">
                                        <h6 class="card-title mb-0 fw-bold text-truncate" style="max-width: 140px;" title="${property.property_name}">
                                            ${property.property_name}
                                        </h6>
                                        <span class="badge bg-${scoreColor} rounded-pill" style="font-size: 0.7rem;">
                                            ${property.match_score}%
                                        </span>
                                    </div>
                                    
                                    <div class="small">
                                        <div class="d-flex mb-1">
                                            <span class="text-muted" style="min-width: 45px;">Type:</span>
                                            <span class="fw-medium text-truncate" title="${property.property_type}">${property.property_type || '-'}</span>
                                        </div>
                                        
                                        <div class="d-flex mb-1">
                                            <span class="text-muted" style="min-width: 45px;">City:</span>
                                            <span class="fw-medium text-truncate" title="${property.city}">${property.city || '-'}</span>
                                        </div>
                                        
                                        <div class="d-flex mb-1">
                                            <span class="text-muted" style="min-width: 45px;">Budget:</span>
                                            <span class="fw-medium">${property.budget_price || '-'}</span>
                                        </div>
                                        
                                        <div class="mb-1">
                                            <span class="text-muted">Category:</span>
                                            <span class="fw-medium d-block text-truncate" title="${property.property_category} - ${property.property_sub_category}">
                                                ${property.property_category || ''} ${property.property_sub_category ? '/ ' + property.property_sub_category : ''}
                                            </span>
                                        </div>
                                        
                                        <div class="mb-1">
                                            <span class="text-muted">Match:</span>
                                            <span class="fw-medium text-truncate small" title="${property.match_reasons ? property.match_reasons.join(', ') : ''}">
                                                ${reasons}
                                            </span>
                                        </div>
                                    </div>
                                    
                                    <div class="d-grid gap-1 mt-2">
                                        <button class="btn btn-success btn-xs share-whatsapp-btn w-100 py-0" style="font-size: 0.7rem;"
                                            data-property-id="${property.id}"
                                            data-lead-id="${leadId}"
                                            data-lead-phone="${leadPhone}">
                                            <i class="bi bi-whatsapp"></i> Share
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                    });

                    html += '</div>'
                    $('#matchingProjectsContent').html(html);
                } else {
                    $('#matchingProjectsContent').html(`
                        <div class="text-center py-4">
                            <i class="fas fa-building fa-3x text-muted mb-2"></i>
                            <p class="text-muted">No matching properties found.</p>
                        </div>
                    `);
                }
            },
            error: function() {
                $('#matchingProjectsContent').html(`
                    <div class="text-center py-4">
                        <i class="fas fa-exclamation-triangle fa-3x text-danger mb-2"></i>
                        <p class="text-danger">Error fetching matching properties.</p>
                    </div>
                `);
            }
        });
    });

    $(document).on('click', '.share-whatsapp-btn', function() {
        const propertyId = $(this).data('property-id');
        const leadId = $(this).data('lead-id');
        const phone = $(this).data('lead-phone');
        const button = $(this);

        if (!propertyId || !leadId || !phone) {
            toastr.error('Missing data for WhatsApp share');
            return;
        }

        button.prop('disabled', true);
        button.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sending...');

        // Use a hardcoded URL as fallback if route helper fails
        const shareUrl = '/property/share-whatsapp'; // Direct URL instead of route helper

        $.ajax({
            url: shareUrl, // Use the direct URL
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                property_id: propertyId,
                lead_id: leadId,
                phone: phone
            },
            success: function(response) {
                if (response.status === 200 && response.data) {
                    // Check if response.data is an object or string
                    if (typeof response.data === 'object' && response.data.whatsapp_url) {
                        window.open(response.data.whatsapp_url, '_blank');
                    } else if (typeof response.data === 'string') {
                        window.open(response.data, '_blank');
                    } else {
                        console.error('Unexpected response format:', response.data);
                        toastr.error('Invalid response format');
                    }
                    toastr.success('WhatsApp link generated successfully!');
                } else {
                    toastr.error(response.message || 'Failed to generate WhatsApp link');
                }
            },
            error: function(xhr) {
                let errorMessage = 'Error generating WhatsApp link';
                if (xhr.status === 419) {
                    errorMessage = 'Session expired. Please refresh the page and try again.';
                } else if (xhr.responseJSON?.message) {
                    errorMessage = xhr.responseJSON.message;
                }

                toastr.error(errorMessage);
                console.error('AJAX Error:', xhr.responseText);
            },
            complete: function() {
                button.prop('disabled', false);
                button.html('<i class="bi bi-whatsapp"></i> Share');
            }
        });
    });

    // $('#btnExportExcel').click(function() {
    //     let query = window.location.search;
    //     window.location.href = "/export-excel" + query;
    // });

    // $('#btnExportPDF').click(function() {
    //     let query = window.location.search;
    //     window.location.href = "/export-pdf" + query;
    // });
</script>
@endsection
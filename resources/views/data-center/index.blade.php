@extends('layouts.app')
@section('title', 'Data Center | Pro-leadexpertz')
@section('content')

    @include('modals.data-status-update')
    @include('modals.view-data-comment')

    <div class="modal fade" id="addCommentModal" tabindex="-1" aria-labelledby="addCommentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 480px;">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 12px;">
                <div class="modal-header text-white" style="background: linear-gradient(135deg, #556ee6, #3b50b5); border-top-left-radius: 12px; border-top-right-radius: 12px;">
                    <h5 class="modal-title fw-bold" id="addCommentModalLabel">
                        <i class="fas fa-comment-medical me-2"></i>Update Comment
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <input type="hidden" id="addCommentDataId" value="">
                    
                    <!-- Quick Notes Tags Section -->
                    <div class="mb-3">
                        <label class="form-label fw-bold text-muted small text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.5px;">Quick Calling Notes</label>
                        <div class="d-flex flex-wrap gap-2" id="quickNotesContainer">
                            <button type="button" class="btn btn-sm btn-outline-primary quick-note-btn px-3 py-1.5 rounded-pill" data-note="Not available" style="font-size: 0.8rem; font-weight: 500; transition: all 0.2s;">
                                Not available
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-primary quick-note-btn px-3 py-1.5 rounded-pill" data-note="Asked to call tomorrow" style="font-size: 0.8rem; font-weight: 500; transition: all 0.2s;">
                                Asked to call tomorrow
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-primary quick-note-btn px-3 py-1.5 rounded-pill" data-note="Interested" style="font-size: 0.8rem; font-weight: 500; transition: all 0.2s;">
                                Interested
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-primary quick-note-btn px-3 py-1.5 rounded-pill" data-note="Busy" style="font-size: 0.8rem; font-weight: 500; transition: all 0.2s;">
                                Busy
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-primary quick-note-btn px-3 py-1.5 rounded-pill" data-note="Not picked" style="font-size: 0.8rem; font-weight: 500; transition: all 0.2s;">
                                Not picked
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-primary quick-note-btn px-3 py-1.5 rounded-pill" data-note="Wrong number" style="font-size: 0.8rem; font-weight: 500; transition: all 0.2s;">
                                Wrong number
                            </button>
                        </div>
                    </div>

                    <!-- Custom Comment Textarea Section -->
                    <div class="mb-3">
                        <label for="addCommentRemark" class="form-label fw-bold text-muted small text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.5px;">Custom Calling Note</label>
                        <textarea class="form-control border-light shadow-sm" id="addCommentRemark" rows="3" placeholder="Type custom note or select a quick note above..." style="border-radius: 8px; resize: none; font-size: 0.9rem; padding: 10px; border: 1px solid #ced4da;"></textarea>
                    </div>

                    <!-- Beautiful Live Preview Section -->
                    <div class="p-3 border rounded-3" style="border-style: dashed !important; border-color: #556ee6 !important; background-color: #f4f6fd !important;">
                        <small class="text-primary fw-bold d-block mb-1 text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.5px;">Comment Preview</small>
                        <div id="commentPreview" class="text-secondary fw-semibold font-monospace" style="font-size: 0.85rem; word-break: break-word;">
                            Called on {{ date('j M') }} - [Your Note] - {{ session('user_name', 'Guest') }}
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light border-0" style="border-bottom-left-radius: 12px; border-bottom-right-radius: 12px; padding: 12px 24px;">
                    <button type="button" class="btn btn-secondary px-4 py-2" data-bs-dismiss="modal" style="border-radius: 8px; font-size: 0.85rem; font-weight: 500;">Cancel</button>
                    <button type="button" class="btn btn-primary px-4 py-2" onclick="submitDataCenterComment()" style="border-radius: 8px; background: #556ee6; border-color: #556ee6; font-size: 0.85rem; font-weight: 500; box-shadow: 0 4px 12px rgba(85, 110, 230, .25);">Submit</button>
                </div>
            </div>
        </div>
    </div>


    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs5.min.css" rel="stylesheet">

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

        #table_filter,
        #table_rejected_filter,
        #table_schedule_filter,
        #table_converted_filter {
            margin: 10px;
        }

        .table th,
        .table td {
            padding: 0.75rem 1rem;
            vertical-align: middle;
            line-height: 1.5;
            font-size: 0.92rem;
        }

        .table td h6,
        .table td span,
        .table td a,
        .table td small {
            line-height: 1.4 !important;
        }

        .table tbody tr {
            transition: background-color 0.2s ease;
        }

        .table tbody tr:hover {
            background-color: #f9f9f9;
        }

        .data-modal .modal-dialog {
            max-width: 500px;
        }

        .data-modal .modal-header {
            background: #4b6cb7;
            color: white;
            border-bottom: none;
            border-radius: 5px 5px 0 0;
        }

        .data-modal .modal-title {
            font-weight: 600;
            font-size: 1.2rem;
        }

        .data-modal .modal-body {
            padding: 20px;
        }

        .data-detail {
            display: flex;
            margin-bottom: 12px;
            align-items: flex-start;
        }

        .data-label {
            font-weight: 600;
            color: #495057;
            width: 140px;
            flex-shrink: 0;
        }

        .data-value {
            color: #6c757d;
            flex-grow: 1;
            word-break: break-word;
        }

        .data-section {
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .data-section:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .data-section-title {
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

        .nav-pills .nav-link {
            border-radius: 10px;
            padding: 10px 18px;
            background: #f8f9fa;
            color: #495057;
            font-weight: 600;
            transition: .3s;
        }

        .nav-pills .nav-link.active {
            background: #556ee6;
            color: #fff;
            box-shadow: 0 4px 12px rgba(85, 110, 230, .25);
        }

        .table td,
        .table th {
            vertical-align: middle;
        }

        .card-body1 {
            text-align: end;
        }
    </style>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card shadow-sm border-0">
                        <div class="card-body">

                            <!-- HEADER -->
                            <div class="page-title-box d-flex align-items-center justify-content-between flex-wrap gap-3">
                                <div class="d-flex align-items-center flex-wrap gap-2">
                                    <h4 class="mb-0 text-primary fw-bold">
                                        <i class="fas fa-database me-2"></i>
                                        Data Center
                                    </h4>

                                    <span class="badge bg-soft-primary text-dark px-3 py-2 fs-6 fw-semibold border border-primary border-opacity-25" style="border-radius: 8px;">
                                        {{ $dataCenters->count() }} Datas
                                    </span>
                                </div>

                                <div class="d-flex gap-2 flex-wrap align-items-center">
                                    <button id="btnExportExcel"
                                        class="shadow btn btn-success btn-sm d-flex align-items-center">
                                        <i class="fas fa-file-excel me-2"></i>
                                        Excel
                                    </button>

                                    <button id="btnExportPDF"
                                        class="shadow btn btn-danger btn-sm d-flex align-items-center">
                                        <i class="fas fa-file-pdf me-2"></i>
                                        PDF
                                    </button>

                                    <button class="shadow btn btn-primary btn-sm d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addDataModal"
                                        type="button">
                                        <i class="fas fa-plus-circle me-2"></i>
                                        Add Data
                                    </button>

                                    @if (session('user_type') === 'admin')
                                        <button type="button" class="shadow btn btn-info btn-sm text-white d-flex align-items-center" data-bs-toggle="modal"
                                            data-bs-target="#bulkImportModal">
                                            <i class="fas fa-file-import me-2"></i>
                                            Bulk Import
                                        </button>
                                    @endif
                                </div>
                            </div>

                            <!-- TABS -->
                            <ul class="nav nav-pills mt-4 mb-4 gap-2" id="dataTabs" role="tablist">
                                <!-- ALL DATA -->
                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#allData"
                                        type="button">
                                        <i class="fas fa-list me-1"></i>
                                        All Data
                                    </button>
                                </li>

                                <!-- REJECTED -->
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#rejectedData"
                                        type="button">

                                        <i class="fas fa-times-circle me-1"></i>
                                        Rejected
                                    </button>
                                </li>

                                <!-- SCHEDULE -->
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#scheduleData"
                                        type="button">

                                        <i class="fas fa-calendar-alt me-1"></i>
                                        Schedule
                                    </button>
                                </li>

                                <!-- CONVERTED -->
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#convertedData"
                                        type="button">

                                        <i class="fas fa-check-circle me-1"></i>
                                        Converted
                                    </button>
                                </li>
                            </ul>

                            <!-- TAB CONTENT -->
                            <div class="tab-content">

                                <!-- ALL DATA -->
                                <div class="tab-pane fade show active" id="allData">

                                    <div class="card p-3">
                                        <form class="data-list-form" action="" method="POST">
                                                    @csrf
                                                    <div>
                                                        <label>
                                                            Show
                                                            <select id="lengthSelect" class="form-select form-select-sm"
                                                                style="width: auto; display: inline-block;">
                                                                <option value="10" {{ request('length') == 10 ? 'selected' : '' }}>10</option>
                                                                <option value="25" {{ request('length') == 25 ? 'selected' : '' }}>25</option>
                                                                <option value="50" {{ request('length') == 50 ? 'selected' : '' }}>50</option>
                                                                <option value="100" {{ request('length') == 100 ? 'selected' : '' }}>100</option>
                                                                <option value="500" {{ request('length') == 500 ? 'selected' : '' }}>500</option>
                                                                <option value="all" {{ request('length') == 'all' ? 'selected' : '' }}>All</option>
                                                            </select>
                                                            entries
                                                        </label>
                                                    </div>
                                                    <table id="table"
                                                        class="table table-hover table-bordered dt-responsive nowrap w-100">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>#</th>
                                                                <th>ID</th>
                                                                <th>Name</th>
                                                                <th>Phone</th>
                                                                <th>Email</th>
                                                                <th>Source</th>
                                                                <th>State</th>
                                                                <th>City</th>
                                                                <th>Status</th>
                                                                <th>Budget</th>
                                                                <th>Property Type</th>
                                                                <th>Property Category</th>
                                                                <th>Property Sub Category</th>
                                                                <th>Project</th>
                                                                <th>Date</th>
                                                                <th>Last Comment</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($dataCenters as $row)
                                                                @php
                                                                    $phone = preg_replace('/\D/', '', $row->phone);
                                                                    if (substr($phone, 0, 2) == '91') {
                                                                        $phone = substr($phone, 2);
                                                                    }
                                                                @endphp
                                                                <tr data-id="{{ $row->id }}"
                                                                    data-comment="{{ $row->comment }}">
                                                                    <td>
                                                                        {{ $loop->iteration }}
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex gap-3 align-items-center">
                                                                            <span
                                                                                class="fw-semibold">{{ $row->id }}</span>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex flex-column">
                                                                            <div class="d-flex align-items-center mb-1">
                                                                                <div class="flex-grow-1">
                                                                                    <h6 class="mb-0">{{ $row->name }}
                                                                                        @if(isset($row->is_converted) && $row->is_converted == 1)
                                                                                            <span class="badge bg-success ms-1" style="font-size: 0.65rem;">Converted</span>
                                                                                        @endif
                                                                                    </h6>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="d-flex justify-content-between align-items-center">
                                                                                <div class="d-flex">
                                                                                    <a href="tel:{{ $phone }}"
                                                                                        class="btn btn-xs btn-soft-light"
                                                                                        data-bs-toggle="tooltip"
                                                                                        title="Call">
                                                                                        <i
                                                                                            class="fas fa-phone text-primary"></i>
                                                                                    </a>
                                                                                    <a href="https://wa.me/91{{ $phone }}"
                                                                                        target="_blank"
                                                                                        class="btn btn-xs btn-soft-light"
                                                                                        data-bs-toggle="tooltip"
                                                                                        title="WhatsApp">
                                                                                        <i
                                                                                            class="fab fa-whatsapp text-success"></i>
                                                                                    </a>

                                                                                    <a href="{{ route('data-center.edit', $row->id) }}"
                                                                                        class="btn btn-xs btn-soft-light"
                                                                                        data-bs-toggle="tooltip"
                                                                                        title="Edit">
                                                                                        <i
                                                                                            class="fas fa-edit text-warning"></i>
                                                                                    </a>

                                                                                    <button type="button"
                                                                                        class="btn btn-xs btn-soft-light update-status-btn"
                                                                                        data-id="{{ $row->id }}"
                                                                                        data-status="{{ $row->status }}"
                                                                                        data-projects="{{ $row->project_ids }}"
                                                                                        data-converted="{{ $row->is_converted ?? 0 }}">
                                                                                        <i
                                                                                            class="fas fa-sync-alt text-info"></i>
                                                                                    </button>

                                                                                    <button type="button"
                                                                                        class="btn btn-xs btn-soft-light add-comment-btn"
                                                                                        data-id="{{ $row->id }}"
                                                                                        data-bs-toggle="tooltip"
                                                                                        title="Update Comment">
                                                                                        <i
                                                                                            class="fas fa-comments text-info"></i>
                                                                                    </button>

                                                                                    @if (session('user_type') == 'admin')
                                                                                        <button
                                                                                            class="btn btn-xs btn-soft-light delete-data-btn"
                                                                                            data-data-id="{{ $row->id }}"
                                                                                            data-data-name="{{ $row->name }}"
                                                                                            data-bs-toggle="tooltip"
                                                                                            title="Delete Data"
                                                                                            type="button">
                                                                                            <i
                                                                                                class="fas fa-trash text-danger"></i>
                                                                                        </button>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>{{ $row->phone }}</td>
                                                                    <td>
                                                                        <a href="mailto:{{ $row->email }}"
                                                                            class="text-truncate d-inline-block"
                                                                            style="max-width: 200px;">
                                                                            {{ $row->email }}
                                                                        </a>
                                                                    </td>
                                                                    <td>
                                                                        <span class="cust-badge bg-soft-info text-info">
                                                                            <i class="fas fa-globe me-1"></i>
                                                                            {{ $row->source ?? '-' }}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="cust-badge text-dark">
                                                                            {{ $row->state ?? '-' }}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="cust-badge text-dark">
                                                                            {{ $row->city ?? '-' }}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        @php
                                                                            $status = strtolower(
                                                                                trim($row->status ?? 'pending'),
                                                                            );
                                                                            $statusClass =
                                                                                $status === 'approved'
                                                                                    ? 'success'
                                                                                    : ($status === 'rejected' ||
                                                                                    $status === 'reject'
                                                                                        ? 'danger'
                                                                                        : 'warning');
                                                                        @endphp
                                                                        <span
                                                                            class="cust-badge {{ $statusClass }} text-dark">
                                                                            {{ $row->status ?? 'pending' }}
                                                                        </span>
                                                                        @if(isset($row->is_converted) && $row->is_converted == 1)
                                                                            <div class="mt-1">
                                                                                <span class="badge bg-success">CONVERTED</span>
                                                                            </div>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        {{ $row->budget ?? '-' }}
                                                                    </td>
                                                                    <td>
                                                                        <span class="cust-badge text-dark">
                                                                            {{ $row->property_type ?? '-' }}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="cust-badge text-dark">
                                                                            {{ $row->property_category ?? '-' }}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="cust-badge text-dark">
                                                                            {{ $row->property_sub_category ?? '-' }}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <div
                                                                            class="d-flex align-items-center justify-content-between">
                                                                            <div class="flex-grow-1">
                                                                                {{ $row->project_name ?? '-' }}
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <span class="cust-badge text-dark">
                                                                            {{ \Carbon\Carbon::parse($row->created_at)->format('d M Y') }}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="flex-shrink-0 me-2">
                                                                                <i
                                                                                    class="fas fa-comment-alt text-muted"></i>
                                                                            </div>
                                                                            <div class="flex-grow-1">
                                                                                @php
                                                                                    $comment = strtolower(
                                                                                        trim(
                                                                                            strip_tags(
                                                                                                $row->comment ?? '',
                                                                                            ),
                                                                                        ),
                                                                                    );
                                                                                    $short = \Illuminate\Support\Str::limit(
                                                                                        $comment,
                                                                                        30,
                                                                                    );
                                                                                @endphp
                                                                                <span class="d-block"
                                                                                    data-bs-toggle="tooltip"
                                                                                    title="{{ $comment }}">
                                                                                    {!! $short !!}
                                                                                </span>
                                                                                @if (!empty($row->comment))
                                                                                    <a href="javascript:void(0);"
                                                                                        onclick="showDataCenterComment('{{ $row->id }}')"
                                                                                        class="text-primary small">
                                                                                        View more
                                                                                    </a>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </form>

                                                <div class="d-flex justify-content-end mt-3">
                                                    {{ $dataCenters->links() }}
                                                </div>
                                            </div>

                                </div>

                                <!-- REJECTED -->
                                <div class="tab-pane fade" id="rejectedData">

                                    <div class="card p-3">
                                        <form class="data-list-form" action="" method="POST">
                                                    @csrf
                                                    <div>
                                                        <label>
                                                            Show
                                                            <select id="lengthSelectRejected" class="form-select form-select-sm"
                                                                style="width: auto; display: inline-block;">
                                                                <option value="10" {{ request('length') == 10 ? 'selected' : '' }}>10</option>
                                                                <option value="25" {{ request('length') == 25 ? 'selected' : '' }}>25</option>
                                                                <option value="50" {{ request('length') == 50 ? 'selected' : '' }}>50</option>
                                                                <option value="100" {{ request('length') == 100 ? 'selected' : '' }}>100</option>
                                                                <option value="500" {{ request('length') == 500 ? 'selected' : '' }}>500</option>
                                                                <option value="all" {{ request('length') == 'all' ? 'selected' : '' }}>All</option>
                                                            </select>
                                                            entries
                                                        </label>
                                                    </div>
                                                    <table id="table_rejected"
                                                        class="table table-hover table-bordered dt-responsive nowrap w-100">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>#</th>
                                                                <th>ID</th>
                                                                <th>Name</th>
                                                                <th>Phone</th>
                                                                <th>Email</th>
                                                                <th>Source</th>
                                                                <th>State</th>
                                                                <th>City</th>
                                                                <th>Status</th>
                                                                <th>Budget</th>
                                                                <th>Property Type</th>
                                                                <th>Property Category</th>
                                                                <th>Property Sub Category</th>
                                                                <th>Project</th>
                                                                <th>Date</th>
                                                                <th>Last Comment</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($dataCenters->filter(function($item) { return strtoupper($item->status ?? '') === 'REJECTED'; }) as $row)
                                                                @php
                                                                    $phone = preg_replace('/\D/', '', $row->phone);
                                                                    if (substr($phone, 0, 2) == '91') {
                                                                        $phone = substr($phone, 2);
                                                                    }
                                                                @endphp
                                                                <tr data-id="{{ $row->id }}"
                                                                    data-comment="{{ $row->comment }}">
                                                                    <td>
                                                                        {{ $loop->iteration }}
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex gap-3 align-items-center">
                                                                            <span
                                                                                class="fw-semibold">{{ $row->id }}</span>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex flex-column">
                                                                            <div class="d-flex align-items-center mb-1">
                                                                                <div class="flex-grow-1">
                                                                                    <h6 class="mb-0">{{ $row->name }}
                                                                                        @if(isset($row->is_converted) && $row->is_converted == 1)
                                                                                            <span class="badge bg-success ms-1" style="font-size: 0.65rem;">Converted</span>
                                                                                        @endif
                                                                                    </h6>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="d-flex justify-content-between align-items-center">
                                                                                <div class="d-flex">
                                                                                    <a href="tel:{{ $phone }}"
                                                                                        class="btn btn-xs btn-soft-light"
                                                                                        data-bs-toggle="tooltip"
                                                                                        title="Call">
                                                                                        <i
                                                                                            class="fas fa-phone text-primary"></i>
                                                                                    </a>
                                                                                    <a href="https://wa.me/91{{ $phone }}"
                                                                                        target="_blank"
                                                                                        class="btn btn-xs btn-soft-light"
                                                                                        data-bs-toggle="tooltip"
                                                                                        title="WhatsApp">
                                                                                        <i
                                                                                            class="fab fa-whatsapp text-success"></i>
                                                                                    </a>

                                                                                    <a href="{{ route('data-center.edit', $row->id) }}"
                                                                                        class="btn btn-xs btn-soft-light"
                                                                                        data-bs-toggle="tooltip"
                                                                                        title="Edit">
                                                                                        <i
                                                                                            class="fas fa-edit text-warning"></i>
                                                                                    </a>

                                                                                    <button type="button"
                                                                                        class="btn btn-xs btn-soft-light update-status-btn"
                                                                                        data-id="{{ $row->id }}"
                                                                                        data-status="{{ $row->status }}"
                                                                                        data-projects="{{ $row->project_ids }}"
                                                                                        data-converted="{{ $row->is_converted ?? 0 }}">
                                                                                        <i
                                                                                            class="fas fa-sync-alt text-info"></i>
                                                                                    </button>

                                                                                    <button type="button"
                                                                                        class="btn btn-xs btn-soft-light add-comment-btn"
                                                                                        data-id="{{ $row->id }}"
                                                                                        data-bs-toggle="tooltip"
                                                                                        title="Update Comment">
                                                                                        <i
                                                                                            class="fas fa-comments text-info"></i>
                                                                                    </button>

                                                                                    @if (session('user_type') == 'admin')
                                                                                        <button
                                                                                            class="btn btn-xs btn-soft-light delete-data-btn"
                                                                                            data-data-id="{{ $row->id }}"
                                                                                            data-data-name="{{ $row->name }}"
                                                                                            data-bs-toggle="tooltip"
                                                                                            title="Delete Data"
                                                                                            type="button">
                                                                                            <i
                                                                                                class="fas fa-trash text-danger"></i>
                                                                                        </button>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>{{ $row->phone }}</td>
                                                                    <td>
                                                                        <a href="mailto:{{ $row->email }}"
                                                                            class="text-truncate d-inline-block"
                                                                            style="max-width: 200px;">
                                                                            {{ $row->email }}
                                                                        </a>
                                                                    </td>
                                                                    <td>
                                                                        <span class="cust-badge bg-soft-info text-info">
                                                                            <i class="fas fa-globe me-1"></i>
                                                                            {{ $row->source ?? '-' }}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="cust-badge text-dark">
                                                                            {{ $row->state ?? '-' }}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="cust-badge text-dark">
                                                                            {{ $row->city ?? '-' }}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        @php
                                                                            $status = strtolower(
                                                                                trim($row->status ?? 'pending'),
                                                                            );
                                                                            $statusClass =
                                                                                $status === 'approved'
                                                                                    ? 'success'
                                                                                    : ($status === 'rejected' ||
                                                                                    $status === 'reject'
                                                                                        ? 'danger'
                                                                                        : 'warning');
                                                                        @endphp
                                                                        <span
                                                                            class="cust-badge {{ $statusClass }} text-dark">
                                                                            {{ $row->status ?? 'pending' }}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        {{ $row->budget ?? '-' }}
                                                                    </td>
                                                                    <td>
                                                                        <span class="cust-badge text-dark">
                                                                            {{ $row->property_type ?? '-' }}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="cust-badge text-dark">
                                                                            {{ $row->property_category ?? '-' }}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="cust-badge text-dark">
                                                                            {{ $row->property_sub_category ?? '-' }}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <div
                                                                            class="d-flex align-items-center justify-content-between">
                                                                            <div class="flex-grow-1">
                                                                                {{ $row->project_name ?? '-' }}
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <span class="cust-badge text-dark">
                                                                            {{ \Carbon\Carbon::parse($row->created_at)->format('d M Y') }}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="flex-shrink-0 me-2">
                                                                                <i
                                                                                    class="fas fa-comment-alt text-muted"></i>
                                                                            </div>
                                                                            <div class="flex-grow-1">
                                                                                @php
                                                                                    $comment = strtolower(
                                                                                        trim(
                                                                                            strip_tags(
                                                                                                $row->comment ?? '',
                                                                                            ),
                                                                                        ),
                                                                                    );
                                                                                    $short = \Illuminate\Support\Str::limit(
                                                                                        $comment,
                                                                                        30,
                                                                                    );
                                                                                @endphp
                                                                                <span class="d-block"
                                                                                    data-bs-toggle="tooltip"
                                                                                    title="{{ $comment }}">
                                                                                    {!! $short !!}
                                                                                </span>
                                                                                @if (!empty($row->comment))
                                                                                    <a href="javascript:void(0);"
                                                                                        onclick="showDataCenterComment('{{ $row->id }}')"
                                                                                        class="text-primary small">
                                                                                        View more
                                                                                    </a>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </form>

                                                <div class="d-flex justify-content-end mt-3">
                                                    {{ $dataCenters->links() }}
                                                </div>
                                            </div>

                                </div>

                                <!-- SCHEDULE -->
                                <div class="tab-pane fade" id="scheduleData">

                                    <div class="card p-3">
                                        <form class="data-list-form" action="" method="POST">
                                                    @csrf
                                                    <div>
                                                        <label>
                                                            Show
                                                            <select id="lengthSelectSchedule" class="form-select form-select-sm"
                                                                style="width: auto; display: inline-block;">
                                                                <option value="10" {{ request('length') == 10 ? 'selected' : '' }}>10</option>
                                                                <option value="25" {{ request('length') == 25 ? 'selected' : '' }}>25</option>
                                                                <option value="50" {{ request('length') == 50 ? 'selected' : '' }}>50</option>
                                                                <option value="100" {{ request('length') == 100 ? 'selected' : '' }}>100</option>
                                                                <option value="500" {{ request('length') == 500 ? 'selected' : '' }}>500</option>
                                                                <option value="all" {{ request('length') == 'all' ? 'selected' : '' }}>All</option>
                                                            </select>
                                                            entries
                                                        </label>
                                                    </div>
                                                    <table id="table_schedule"
                                                        class="table table-hover table-bordered dt-responsive nowrap w-100">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>#</th>
                                                                <th>ID</th>
                                                                <th>Name</th>
                                                                <th>Phone</th>
                                                                <th>Email</th>
                                                                <th>Source</th>
                                                                <th>State</th>
                                                                <th>City</th>
                                                                <th>Status</th>
                                                                <th>Budget</th>
                                                                <th>Property Type</th>
                                                                <th>Property Category</th>
                                                                <th>Property Sub Category</th>
                                                                <th>Project</th>
                                                                <th>Date</th>
                                                                <th>Last Comment</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($dataCenters->filter(function($item) { return strtoupper($item->status ?? '') === 'CALL SCHEDULED'; }) as $row)
                                                                @php
                                                                    $phone = preg_replace('/\D/', '', $row->phone);
                                                                    if (substr($phone, 0, 2) == '91') {
                                                                        $phone = substr($phone, 2);
                                                                    }
                                                                @endphp
                                                                <tr data-id="{{ $row->id }}"
                                                                    data-comment="{{ $row->comment }}">
                                                                    <td>
                                                                        {{ $loop->iteration }}
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex gap-3 align-items-center">
                                                                            <span
                                                                                class="fw-semibold">{{ $row->id }}</span>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex flex-column">
                                                                            <div class="d-flex align-items-center mb-1">
                                                                                <div class="flex-grow-1">
                                                                                    <h6 class="mb-0">{{ $row->name }}
                                                                                        @if(isset($row->is_converted) && $row->is_converted == 1)
                                                                                            <span class="badge bg-success ms-1" style="font-size: 0.65rem;">Converted</span>
                                                                                        @endif
                                                                                    </h6>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="d-flex justify-content-between align-items-center">
                                                                                <div class="d-flex">
                                                                                    <a href="tel:{{ $phone }}"
                                                                                        class="btn btn-xs btn-soft-light"
                                                                                        data-bs-toggle="tooltip"
                                                                                        title="Call">
                                                                                        <i
                                                                                            class="fas fa-phone text-primary"></i>
                                                                                    </a>
                                                                                    <a href="https://wa.me/91{{ $phone }}"
                                                                                        target="_blank"
                                                                                        class="btn btn-xs btn-soft-light"
                                                                                        data-bs-toggle="tooltip"
                                                                                        title="WhatsApp">
                                                                                        <i
                                                                                            class="fab fa-whatsapp text-success"></i>
                                                                                    </a>

                                                                                    <a href="{{ route('data-center.edit', $row->id) }}"
                                                                                        class="btn btn-xs btn-soft-light"
                                                                                        data-bs-toggle="tooltip"
                                                                                        title="Edit">
                                                                                        <i
                                                                                            class="fas fa-edit text-warning"></i>
                                                                                    </a>

                                                                                    <button type="button"
                                                                                        class="btn btn-xs btn-soft-light update-status-btn"
                                                                                        data-id="{{ $row->id }}"
                                                                                        data-status="{{ $row->status }}"
                                                                                        data-projects="{{ $row->project_ids }}"
                                                                                        data-converted="{{ $row->is_converted ?? 0 }}">
                                                                                        <i
                                                                                            class="fas fa-sync-alt text-info"></i>
                                                                                    </button>

                                                                                    <button type="button"
                                                                                        class="btn btn-xs btn-soft-light add-comment-btn"
                                                                                        data-id="{{ $row->id }}"
                                                                                        data-bs-toggle="tooltip"
                                                                                        title="Update Comment">
                                                                                        <i
                                                                                            class="fas fa-comments text-info"></i>
                                                                                    </button>

                                                                                    @if (session('user_type') == 'admin')
                                                                                        <button
                                                                                            class="btn btn-xs btn-soft-light delete-data-btn"
                                                                                            data-data-id="{{ $row->id }}"
                                                                                            data-data-name="{{ $row->name }}"
                                                                                            data-bs-toggle="tooltip"
                                                                                            title="Delete Data"
                                                                                            type="button">
                                                                                            <i
                                                                                                class="fas fa-trash text-danger"></i>
                                                                                        </button>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>{{ $row->phone }}</td>
                                                                    <td>
                                                                        <a href="mailto:{{ $row->email }}"
                                                                            class="text-truncate d-inline-block"
                                                                            style="max-width: 200px;">
                                                                            {{ $row->email }}
                                                                        </a>
                                                                    </td>
                                                                    <td>
                                                                        <span class="cust-badge bg-soft-info text-info">
                                                                            <i class="fas fa-globe me-1"></i>
                                                                            {{ $row->source ?? '-' }}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="cust-badge text-dark">
                                                                            {{ $row->state ?? '-' }}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="cust-badge text-dark">
                                                                            {{ $row->city ?? '-' }}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        @php
                                                                            $status = strtolower(
                                                                                trim($row->status ?? 'pending'),
                                                                            );
                                                                            $statusClass =
                                                                                $status === 'approved'
                                                                                    ? 'success'
                                                                                    : ($status === 'rejected' ||
                                                                                    $status === 'reject'
                                                                                        ? 'danger'
                                                                                        : 'warning');
                                                                        @endphp
                                                                        <span
                                                                            class="cust-badge {{ $statusClass }} text-dark">
                                                                            {{ $row->status ?? 'pending' }}
                                                                        </span>
                                                                        @if(isset($row->is_converted) && $row->is_converted == 1)
                                                                            <div class="mt-1">
                                                                                <span class="badge bg-success">CONVERTED</span>
                                                                            </div>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        {{ $row->budget ?? '-' }}
                                                                    </td>
                                                                    <td>
                                                                        <span class="cust-badge text-dark">
                                                                            {{ $row->property_type ?? '-' }}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="cust-badge text-dark">
                                                                            {{ $row->property_category ?? '-' }}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="cust-badge text-dark">
                                                                            {{ $row->property_sub_category ?? '-' }}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <div
                                                                            class="d-flex align-items-center justify-content-between">
                                                                            <div class="flex-grow-1">
                                                                                {{ $row->project_name ?? '-' }}
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <span class="cust-badge text-dark">
                                                                            {{ \Carbon\Carbon::parse($row->created_at)->format('d M Y') }}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="flex-shrink-0 me-2">
                                                                                <i
                                                                                    class="fas fa-comment-alt text-muted"></i>
                                                                            </div>
                                                                            <div class="flex-grow-1">
                                                                                @php
                                                                                    $comment = strtolower(
                                                                                        trim(
                                                                                            strip_tags(
                                                                                                $row->comment ?? '',
                                                                                            ),
                                                                                        ),
                                                                                    );
                                                                                    $short = \Illuminate\Support\Str::limit(
                                                                                        $comment,
                                                                                        30,
                                                                                    );
                                                                                @endphp
                                                                                <span class="d-block"
                                                                                    data-bs-toggle="tooltip"
                                                                                    title="{{ $comment }}">
                                                                                    {!! $short !!}
                                                                                </span>
                                                                                @if (!empty($row->comment))
                                                                                    <a href="javascript:void(0);"
                                                                                        onclick="showDataCenterComment('{{ $row->id }}')"
                                                                                        class="text-primary small">
                                                                                        View more
                                                                                    </a>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </form>

                                                <div class="d-flex justify-content-end mt-3">
                                                    {{ $dataCenters->links() }}
                                                </div>
                                            </div>

                                </div>

                                <!-- CONVERTED -->
                                <div class="tab-pane fade" id="convertedData">

                                    <div class="card p-3">
                                        <form class="data-list-form" action="" method="POST">
                                                    @csrf
                                                    <div>
                                                        <label>
                                                            Show
                                                            <select id="lengthSelectConverted" class="form-select form-select-sm"
                                                                style="width: auto; display: inline-block;">
                                                                <option value="10" {{ request('length') == 10 ? 'selected' : '' }}>10</option>
                                                                <option value="25" {{ request('length') == 25 ? 'selected' : '' }}>25</option>
                                                                <option value="50" {{ request('length') == 50 ? 'selected' : '' }}>50</option>
                                                                <option value="100" {{ request('length') == 100 ? 'selected' : '' }}>100</option>
                                                                <option value="500" {{ request('length') == 500 ? 'selected' : '' }}>500</option>
                                                                <option value="all" {{ request('length') == 'all' ? 'selected' : '' }}>All</option>
                                                            </select>
                                                            entries
                                                        </label>
                                                    </div>
                                                    <table id="table_converted"
                                                        class="table table-hover table-bordered dt-responsive nowrap w-100">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>#</th>
                                                                <th>ID</th>
                                                                <th>Name</th>
                                                                <th>Phone</th>
                                                                <th>Email</th>
                                                                <th>Source</th>
                                                                <th>State</th>
                                                                <th>City</th>
                                                                <th>Status</th>
                                                                <th>Budget</th>
                                                                <th>Property Type</th>
                                                                <th>Property Category</th>
                                                                <th>Property Sub Category</th>
                                                                <th>Project</th>
                                                                <th>Date</th>
                                                                <th>Last Comment</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($dataCenters->filter(function($item) { return (int)($item->is_converted ?? 0) === 1; }) as $row)
                                                                @php
                                                                    $phone = preg_replace('/\D/', '', $row->phone);
                                                                    if (substr($phone, 0, 2) == '91') {
                                                                        $phone = substr($phone, 2);
                                                                    }
                                                                @endphp
                                                                <tr data-id="{{ $row->id }}"
                                                                    data-comment="{{ $row->comment }}">
                                                                    <td>
                                                                        {{ $loop->iteration }}
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex gap-3 align-items-center">
                                                                            <span
                                                                                class="fw-semibold">{{ $row->id }}</span>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex flex-column">
                                                                            <div class="d-flex align-items-center mb-1">
                                                                                <div class="flex-grow-1">
                                                                                    <h6 class="mb-0">{{ $row->name }}
                                                                                        @if(isset($row->is_converted) && $row->is_converted == 1)
                                                                                            <span class="badge bg-success ms-1" style="font-size: 0.65rem;">Converted</span>
                                                                                        @endif
                                                                                    </h6>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="d-flex justify-content-between align-items-center">
                                                                                <div class="d-flex">
                                                                                    <a href="tel:{{ $phone }}"
                                                                                        class="btn btn-xs btn-soft-light"
                                                                                        data-bs-toggle="tooltip"
                                                                                        title="Call">
                                                                                        <i
                                                                                            class="fas fa-phone text-primary"></i>
                                                                                    </a>
                                                                                    <a href="https://wa.me/91{{ $phone }}"
                                                                                        target="_blank"
                                                                                        class="btn btn-xs btn-soft-light"
                                                                                        data-bs-toggle="tooltip"
                                                                                        title="WhatsApp">
                                                                                        <i
                                                                                            class="fab fa-whatsapp text-success"></i>
                                                                                    </a>

                                                                                    <a href="{{ route('data-center.edit', $row->id) }}"
                                                                                        class="btn btn-xs btn-soft-light"
                                                                                        data-bs-toggle="tooltip"
                                                                                        title="Edit">
                                                                                        <i
                                                                                            class="fas fa-edit text-warning"></i>
                                                                                    </a>

                                                                                    <button type="button"
                                                                                        class="btn btn-xs btn-soft-light update-status-btn"
                                                                                        data-id="{{ $row->id }}"
                                                                                        data-status="{{ $row->status }}"
                                                                                        data-projects="{{ $row->project_ids }}"
                                                                                        data-converted="{{ $row->is_converted ?? 0 }}">
                                                                                        <i
                                                                                            class="fas fa-sync-alt text-info"></i>
                                                                                    </button>

                                                                                    <button type="button"
                                                                                        class="btn btn-xs btn-soft-light add-comment-btn"
                                                                                        data-id="{{ $row->id }}"
                                                                                        data-bs-toggle="tooltip"
                                                                                        title="Update Comment">
                                                                                        <i
                                                                                            class="fas fa-comments text-info"></i>
                                                                                    </button>

                                                                                    @if (session('user_type') == 'admin')
                                                                                        <button
                                                                                            class="btn btn-xs btn-soft-light delete-data-btn"
                                                                                            data-data-id="{{ $row->id }}"
                                                                                            data-data-name="{{ $row->name }}"
                                                                                            data-bs-toggle="tooltip"
                                                                                            title="Delete Data"
                                                                                            type="button">
                                                                                            <i
                                                                                                class="fas fa-trash text-danger"></i>
                                                                                        </button>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>{{ $row->phone }}</td>
                                                                    <td>
                                                                        <a href="mailto:{{ $row->email }}"
                                                                            class="text-truncate d-inline-block"
                                                                            style="max-width: 200px;">
                                                                            {{ $row->email }}
                                                                        </a>
                                                                    </td>
                                                                    <td>
                                                                        <span class="cust-badge bg-soft-info text-info">
                                                                            <i class="fas fa-globe me-1"></i>
                                                                            {{ $row->source ?? '-' }}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="cust-badge text-dark">
                                                                            {{ $row->state ?? '-' }}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="cust-badge text-dark">
                                                                            {{ $row->city ?? '-' }}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        @php
                                                                            $status = strtolower(
                                                                                trim($row->status ?? 'pending'),
                                                                            );
                                                                            $statusClass =
                                                                                $status === 'approved'
                                                                                    ? 'success'
                                                                                    : ($status === 'rejected' ||
                                                                                    $status === 'reject'
                                                                                        ? 'danger'
                                                                                        : 'warning');
                                                                        @endphp
                                                                        <span
                                                                            class="cust-badge {{ $statusClass }} text-dark">
                                                                            {{ $row->status ?? 'pending' }}
                                                                        </span>
                                                                        @if(isset($row->is_converted) && $row->is_converted == 1)
                                                                            <div class="mt-1">
                                                                                <span class="badge bg-success">CONVERTED</span>
                                                                            </div>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        {{ $row->budget ?? '-' }}
                                                                    </td>
                                                                    <td>
                                                                        <span class="cust-badge text-dark">
                                                                            {{ $row->property_type ?? '-' }}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="cust-badge text-dark">
                                                                            {{ $row->property_category ?? '-' }}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="cust-badge text-dark">
                                                                            {{ $row->property_sub_category ?? '-' }}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <div
                                                                            class="d-flex align-items-center justify-content-between">
                                                                            <div class="flex-grow-1">
                                                                                {{ $row->project_name ?? '-' }}
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <span class="cust-badge text-dark">
                                                                            {{ \Carbon\Carbon::parse($row->created_at)->format('d M Y') }}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="flex-shrink-0 me-2">
                                                                                <i
                                                                                    class="fas fa-comment-alt text-muted"></i>
                                                                            </div>
                                                                            <div class="flex-grow-1">
                                                                                @php
                                                                                    $comment = strtolower(
                                                                                        trim(
                                                                                            strip_tags(
                                                                                                $row->comment ?? '',
                                                                                            ),
                                                                                        ),
                                                                                    );
                                                                                    $short = \Illuminate\Support\Str::limit(
                                                                                        $comment,
                                                                                        30,
                                                                                    );
                                                                                @endphp
                                                                                <span class="d-block"
                                                                                    data-bs-toggle="tooltip"
                                                                                    title="{{ $comment }}">
                                                                                    {!! $short !!}
                                                                                </span>
                                                                                @if (!empty($row->comment))
                                                                                    <a href="javascript:void(0);"
                                                                                        onclick="showDataCenterComment('{{ $row->id }}')"
                                                                                        class="text-primary small">
                                                                                        View more
                                                                                    </a>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </form>

                                                <div class="d-flex justify-content-end mt-3">
                                                    {{ $dataCenters->links() }}
                                                </div>
                                            </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ADD DATA MODAL -->
    <div class="modal fade" id="addDataModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content border-0 shadow-lg">

                <!-- HEADER -->
                <div class="modal-header border-0 text-white"
                    style="background: linear-gradient(135deg,#556ee6,#556ee6);">

                    <div>
                        <h4 class="modal-title fw-bold mb-1">
                            <i class="fas fa-plus-circle me-2"></i>
                            Add New Data
                        </h4>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('import_messages'))
                        <div class="alert alert-light alert-dismissible fade show m-3" role="alert">
                            <ul class="mb-0">
                                @foreach (session('import_messages') as $message)
                                    <li>{!! $message !!}</li>
                                @endforeach
                            </ul>

                        </div>
                    @endif
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal">
                    </button>
                </div>

                <!-- BODY -->
                <div class="modal-body p-4">
                    <form method="POST" action="{{ route('data-center.store') }}" class="needs-validation" novalidate>
                        @csrf

                        <!-- BASIC DETAILS -->
                        <div class="card border-0 shadow-sm mb-4">

                            <div class="card-header bg-light">
                                <h5 class="mb-0 fw-bold">
                                    <i class="fas fa-user me-2 text-primary"></i>
                                    Basic Details
                                </h5>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <!-- NAME -->
                                    <div class="col-md-4 mb-3">
                                        <label for="name">Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" id="name" value="{{ old('name') }}" required>
                                        <div class="invalid-feedback">
                                            @error('name')
                                                {{ $message }}
                                            @else
                                                Please enter a name
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- EMAIL -->
                                    <div class="col-md-4 mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            value="{{ old('email') }}">
                                    </div>

                                    <!-- PHONE -->
                                    <div class="col-md-4 mb-3">
                                        <label for="phone">Phone No <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                            name="phone" id="phone" value="{{ old('phone') }}" required>
                                        <div class="invalid-feedback">
                                            @error('phone')
                                                {{ $message }}
                                            @else
                                                Please enter a phone number
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- ALT NUMBER -->
                                    <div class="col-md-4 mb-3">
                                        <label for="alternative phone">Alternative Number</label>
                                        <input type="text" class="form-control" name="alternative_number"
                                            id="alternative_number" value="{{ old('alternative_number') }}">
                                    </div>

                                    <!-- STATE -->
                                    <div class="col-md-4 mb-3">
                                        <label for="state">State</label>
                                        <select class="select2" name="state" id="state">
                                            <option value="">-- Select State --</option>
                                            {{-- @foreach ($states as $state)
                                                <option value="{{ $state->state }}">
                                                    {{ $state->state }}
                                                </option>
                                            @endforeach --}}
                                        </select>
                                    </div>

                                    <!-- CITY -->
                                    <div class="col-md-4 mb-3">
                                        <label for="city">City</label>
                                        <select class="select2" name="city" id="city">
                                            <option value="">-- Select City --</option>
                                            {{-- @foreach ($cities as $city)
                                                <option value="{{ $city->city }}">
                                                    {{ $city->city }}
                                                </option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- REQUIREMENTS -->
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0 fw-bold">
                                    <i class="fas fa-clipboard-list me-2 text-success"></i>
                                    Requirements
                                </h5>
                            </div>

                            <div class="card-body">
                                <div class="row">

                                    <!-- PROPERTY TYPE -->
                                    <div class="col-md-4 mb-3">
                                        <label for="property_type">Property Type</label>
                                        <select class="form-select select2" name="property_type" id="property_type">
                                            <option value="">-- Select Property Type --</option>
                                            {{-- @foreach ($propertyTypes as $type)
                                                <option value="{{ $type->type }}"
                                                    {{ old('property_type') === $type->type ? 'selected' : '' }}>
                                                    {{ $type->type }}
                                                </option>
                                            @endforeach --}}
                                        </select>
                                    </div>

                                    <!-- PROPERTY CATEGORY -->
                                    <div class="col-md-4 mb-3">
                                        <label for="property_category">Property Category</label>
                                        <select class="select2" name="property_category" id="property_category">
                                            <option value="">-- Select Property Category --</option>
                                            {{-- @foreach ($propertyCategories as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('property_category') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach --}}
                                        </select>
                                    </div>

                                    <!-- SUB CATEGORY -->
                                    <div class="col-md-4 mb-3">
                                        <label for="property_sub_category">Property Sub Category</label>
                                        <select class="select2" name="property_sub_category" id="property_sub_category">
                                            <option value="">-- Select Property Sub Category --</option>
                                            {{-- @foreach ($subCategories as $sub)
                                                <option value="{{ $sub->id }}"
                                                    {{ old('property_sub_category') == $sub->id ? 'selected' : '' }}>
                                                    {{ $sub->name }}
                                                </option>
                                            @endforeach --}}
                                        </select>
                                    </div>

                                    <!-- PROJECT -->
                                    <div class="col-md-4 mb-3">
                                        <label for="projects">Projects</label>
                                        <select class="select2" name="project_name[]" id="projects" multiple>
                                            <option value="">-- Select Project --</option>
                                            {{-- @foreach ($projects as $project)
                                                <option value="{{ $project->id }}">
                                                    {{ $project->project_name }}
                                                </option>
                                            @endforeach --}}
                                        </select>
                                    </div>

                                    <!-- BUDGET -->
                                    <div class="col-md-4 mb-3">
                                        <label for="budget">Budget</label>
                                        <select class="select2" name="budget" id="budget">
                                            <option value="">Select Budget</option>
                                            <option value="10L-20L" {{ old('budget') == '10L-20L' ? 'selected' : '' }}>
                                                ₹10 Lakh - ₹20 Lakh</option>
                                            <option value="20L-30L" {{ old('budget') == '20L-30L' ? 'selected' : '' }}>
                                                ₹20 Lakh - ₹30 Lakh</option>
                                            <option value="30L-40L" {{ old('budget') == '30L-40L' ? 'selected' : '' }}>
                                                ₹30 Lakh - ₹40 Lakh</option>
                                            <option value="40L-50L" {{ old('budget') == '40L-50L' ? 'selected' : '' }}>
                                                ₹40 Lakh - ₹50 Lakh</option>
                                            <option value="50L-60L" {{ old('budget') == '50L-60L' ? 'selected' : '' }}>
                                                ₹50 Lakh - ₹60 Lakh</option>
                                            <option value="60L-70L" {{ old('budget') == '60L-70L' ? 'selected' : '' }}>
                                                ₹60 Lakh - ₹70 Lakh</option>
                                            <option value="70L-80L" {{ old('budget') == '70L-80L' ? 'selected' : '' }}>
                                                ₹70 Lakh - ₹80 Lakh</option>
                                            <option value="80L-90L" {{ old('budget') == '80L-90L' ? 'selected' : '' }}>
                                                ₹80 Lakh - ₹90 Lakh</option>
                                            <option value="90L-1Cr" {{ old('budget') == '90L-1Cr' ? 'selected' : '' }}>
                                                ₹90 Lakh - ₹1 Crore</option>
                                            <option value="1Cr-1.25Cr"
                                                {{ old('budget') == '1Cr-1.25Cr' ? 'selected' : '' }}>₹1 Crore - ₹1.25
                                                Crore</option>
                                            <option value="1.25Cr-1.5Cr"
                                                {{ old('budget') == '1.25Cr-1.5Cr' ? 'selected' : '' }}>₹1.25 Crore -
                                                ₹1.5 Crore</option>
                                            <option value="1.5Cr-1.75Cr"
                                                {{ old('budget') == '1.5Cr-1.75Cr' ? 'selected' : '' }}>₹1.5 Crore -
                                                ₹1.75 Crore</option>
                                            <option value="1.75Cr-2Cr"
                                                {{ old('budget') == '1.75Cr-2Cr' ? 'selected' : '' }}>₹1.75 Crore - ₹2
                                                Crore</option>
                                            <option value="2Cr-2.25Cr"
                                                {{ old('budget') == '2Cr-2.25Cr' ? 'selected' : '' }}>₹2 Crore - ₹2.25
                                                Crore</option>
                                            <option value="2.25Cr-3Cr"
                                                {{ old('budget') == '2.25Cr-3Cr' ? 'selected' : '' }}>₹2.25 Crore - ₹3
                                                Crore</option>
                                            <option value="3Cr-3.5Cr"
                                                {{ old('budget') == '3Cr-3.5Cr' ? 'selected' : '' }}>₹3 Crore - ₹3.5
                                                Crore</option>
                                            <option value="3.5Cr-5Cr"
                                                {{ old('budget') == '3.5Cr-5Cr' ? 'selected' : '' }}>₹3.5 Crore - ₹5
                                                Crore</option>
                                            <option value="5Cr-10Cr" {{ old('budget') == '5Cr-10Cr' ? 'selected' : '' }}>
                                                ₹5 Crore - ₹10 Crore
                                            </option>
                                        </select>
                                    </div>

                                    <!-- SOURCE -->
                                    <div class="col-md-4 mb-3">
                                        <label for="source">Source</label>
                                        <select class="select2" name="source" id="source">
                                            <option value="">-- Select Source --</option>
                                            {{-- @foreach ($sources as $source)
                                                <option value="{{ $source->id }}">
                                                    {{ $source->name }}
                                                </option>
                                            @endforeach --}}
                                        </select>
                                    </div>

                                    <!-- COMMENT -->
                                    <div class="col-md-12 mb-3">
                                        <label for="comment">Comment:</label>
                                        <textarea id="comment" name="comment" rows="3" placeholder="Type your comment here..."
                                            class="form-control"></textarea>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- FOOTER -->
                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                                Cancel
                            </button>

                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>
                                Save Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @include('data-center.bulk-import-modal')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs5.min.js"></script>

    <script>
        $(document).ready(function() {
            const userName = "{{ session('user_name', 'Guest') }}";
            const addCommentRemark = document.getElementById('addCommentRemark');
            const commentPreview = document.getElementById('commentPreview');

            function getFormattedDate() {
                const date = new Date();
                const day = date.getDate();
                const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                const month = months[date.getMonth()];
                return `Called on ${day} ${month}`;
            }

            window.updateCommentPreview = function() {
                if (!addCommentRemark) return;
                const note = addCommentRemark.value.trim();
                if (note) {
                    commentPreview.textContent = `${getFormattedDate()} - ${note} - ${userName}`;
                    commentPreview.classList.remove('text-secondary');
                    commentPreview.classList.add('text-primary');
                } else {
                    commentPreview.textContent = `${getFormattedDate()} - [Your Note] - ${userName}`;
                    commentPreview.classList.remove('text-primary');
                    commentPreview.classList.add('text-secondary');
                }
            }

            // Bind textarea events for dynamic live preview
            if (addCommentRemark) {
                addCommentRemark.addEventListener('input', window.updateCommentPreview);
            }

            // Quick note buttons click handler
            $(document).on('click', '.quick-note-btn', function() {
                // Toggle active class visually
                $('.quick-note-btn').removeClass('active btn-primary text-white').addClass('btn-outline-primary');
                $(this).removeClass('btn-outline-primary').addClass('active btn-primary text-white');

                const noteText = $(this).data('note');
                if (addCommentRemark) {
                    addCommentRemark.value = noteText;
                    window.updateCommentPreview();
                }
            });

            // Expose a function to get formatted comment on submission
            window.getFormattedComment = function() {
                if (!addCommentRemark) return '';
                const note = addCommentRemark.value.trim();
                if (!note) return '';
                return `${getFormattedDate()} - ${note} - ${userName}`;
            };

            // Expose dynamic preview update on modal show
            $('#addCommentModal').on('show.bs.modal', function () {
                $('.quick-note-btn').removeClass('active btn-primary text-white').addClass('btn-outline-primary');
                if (addCommentRemark) {
                    addCommentRemark.value = '';
                }
                window.updateCommentPreview();
            });
        });
    </script>

    <script>
        document.addEventListener('click', function(e) {
            if (e.target.closest('.update-status-btn')) {

                let btn = e.target.closest('.update-status-btn');

                let dataId = btn.getAttribute('data-id');
                let status = btn.getAttribute('data-status');
                let projectIds = btn.getAttribute('data-projects');
                let isAlreadyConverted = btn.getAttribute('data-converted') === '1';

                // console.log("DATA ID FROM BUTTON:", dataId);

                document.getElementById('dataId').value = dataId;
                document.getElementById('newStatus').value = status || '';

                if (projectIds) {
                    let ids = projectIds.split(',');
                    $('#visitProjects').val(ids).trigger('change');
                } else {
                    $('#visitProjects').val(null).trigger('change');
                }

                const isConvertedCheckbox = document.getElementById('isConverted');
                const isRejectedCheckbox = document.getElementById('isRejected');
                const allFields = document.getElementById('allFields');
                const rejectedFields = document.getElementById('rejectedFields');

                if (isAlreadyConverted) {
                    if (isConvertedCheckbox) {
                        isConvertedCheckbox.checked = true;
                        isConvertedCheckbox.disabled = true;
                        isConvertedCheckbox.closest('.mb-3').style.display = 'none';
                    }
                    if (isRejectedCheckbox) {
                        isRejectedCheckbox.checked = false;
                        isRejectedCheckbox.disabled = true;
                        isRejectedCheckbox.closest('.mb-3').style.display = 'none';
                    }
                    if (allFields) {
                        allFields.style.display = 'block';
                    }
                    if (rejectedFields) {
                        rejectedFields.style.display = 'none';
                    }
                } else {
                    if (isConvertedCheckbox) {
                        isConvertedCheckbox.checked = false;
                        isConvertedCheckbox.disabled = false;
                        isConvertedCheckbox.closest('.mb-3').style.display = 'block';
                    }
                    if (isRejectedCheckbox) {
                        isRejectedCheckbox.checked = false;
                        isRejectedCheckbox.disabled = false;
                        isRejectedCheckbox.closest('.mb-3').style.display = 'block';
                    }
                    if (allFields) {
                        allFields.style.display = 'none';
                    }
                    if (rejectedFields) {
                        rejectedFields.style.display = 'none';
                    }
                }

                // Check if opened from Rejected tab
                let isRejectedTab = !!btn.closest('#table_rejected') || !!btn.closest('#rejectedData');
                if (isRejectedCheckbox && !isAlreadyConverted) {
                    if (isRejectedTab) {
                        isRejectedCheckbox.disabled = true;
                        isRejectedCheckbox.checked = false;
                        isRejectedCheckbox.closest('.form-check').style.opacity = '0.5';
                    } else {
                        isRejectedCheckbox.disabled = false;
                        isRejectedCheckbox.closest('.form-check').style.opacity = '1';
                    }
                }

                const modal = new bootstrap.Modal(document.getElementById('statusUpdateModal'));
                modal.show();
            }
        });

        // Show status update modal
        function updateDataStatus() {

            const dataId = document.getElementById('dataId').value.trim();
            const isRejectedCheckbox = document.getElementById('isRejected');
            const isRejected = isRejectedCheckbox && isRejectedCheckbox.checked;

            let newStatus, comment, remindDate, remindTime, isConverted;

            if (isRejected) {
                newStatus = 'REJECTED';
                comment = document.getElementById('rejectedComment').value.trim();
                remindDate = '';
                remindTime = '';
                isConverted = 0;

                if (!comment) {
                    toastr.warning('Please enter a rejection remark or select a quick note');
                    return;
                }
            } else {
                newStatus = document.getElementById('newStatus').value;
                comment = document.getElementById('comment').value.trim();
                remindDate = document.getElementById('remindDate').value;
                remindTime = document.getElementById('remindTime').value;
                isConverted = document.getElementById('isConverted').checked ? 1 : 0;
            }

            const payload = {
                status: newStatus,
                comment: comment,
                remind_date: remindDate,
                remind_time: remindTime,
                is_converted: isConverted
            };

            console.log("Payload:", payload);

            fetch(`/data-center/status/${dataId}`, {
                    method: 'PUT',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(payload)
                })
                .then(res => res.json())
                .then(data => {

                    if (data.success) {

                        toastr.success(data.message || 'Status updated successfully');

                        const statusUpper = newStatus.toUpperCase();

                        // Handle REJECTED dynamically without page reload
                        if (payload.is_converted !== 1 && statusUpper === 'REJECTED') {
                            const row = $(`tr[data-id="${dataId}"]`);
                            if (row.length) {
                                // Update Status cell
                                row.find('td:eq(8)').html(`<span class="cust-badge danger text-dark">REJECTED</span>`);
                                
                                // Update Comment cell
                                const shortComment = payload.comment.length > 30 ? payload.comment.substring(0, 30) + '...' : payload.comment;
                                row.find('td:eq(15)').html(`
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 me-2"><i class="fas fa-comment-alt text-muted"></i></div>
                                        <div class="flex-grow-1">
                                            <span class="d-block" data-bs-toggle="tooltip" title="${payload.comment}">${shortComment}</span>
                                            <a href="javascript:void(0);" onclick="showDataCenterComment('${dataId}')" class="text-primary small">View more</a>
                                        </div>
                                    </div>
                                `);

                                // Remove from current table
                                const currentTableId = row.closest('table').attr('id');
                                if (currentTableId && $.fn.DataTable.isDataTable('#' + currentTableId)) {
                                    $('#' + currentTableId).DataTable().row(row).remove().draw(false);
                                } else {
                                    row.detach(); 
                                }

                                // Add to Rejected table
                                if ($.fn.DataTable.isDataTable('#table_rejected')) {
                                    $('#table_rejected').DataTable().row.add(row).draw(false);
                                } else {
                                    $('#table_rejected tbody').append(row);
                                }

                                // Close modal and switch tab
                                $('#statusUpdateModal').modal('hide');
                                $('.nav-pills button[data-bs-target="#rejectedData"]').tab('show');
                                
                                const url = new URL(window.location.href);
                                url.searchParams.set('tab', 'rejected');
                                window.history.replaceState({}, '', url.toString());

                                return; // Stop reload
                            }
                        }

                        // redirect if converted
                        let redirectUrl = '/data-center';

                        if (payload.is_converted === 1) {

                            switch (statusUpper) {

                                case 'PENDING':
                                    redirectUrl = '/lead/pending';
                                    break;

                                case 'PROCESSING':
                                    redirectUrl = '/lead/processing';
                                    break;

                                case 'INTERESTED':
                                    redirectUrl = '/lead/interested';
                                    break;

                                case 'CALL SCHEDULED':
                                    redirectUrl = '/lead/call-scheduled';
                                    break;

                                case 'WHATSAPP':
                                    redirectUrl = '/lead/whatsapp';
                                    break;

                                case 'MEETING SCHEDULED':
                                    redirectUrl = '/lead/meeting-scheduled';
                                    break;

                                case 'VISIT SCHEDULED':
                                    redirectUrl = '/lead/visit-scheduled';
                                    break;

                                case 'VISIT DONE':
                                    redirectUrl = '/lead/visit-done';
                                    break;

                                case 'NOT INTERESTED':
                                    redirectUrl = '/lead/not-interested';
                                    break;

                                case 'NOT PICKED':
                                    redirectUrl = '/lead/not-picked';
                                    break;

                                case 'NOT REACHABLE':
                                    redirectUrl = '/lead/not-reachable';
                                    break;

                                case 'FUTURE LEAD':
                                    redirectUrl = '/lead/future';
                                    break;

                                case 'WRONG NUMBER':
                                    redirectUrl = '/lead/wrong-number';
                                    break;

                                case 'CHANNEL PARTNER':
                                    redirectUrl = '/lead/channel-partner';
                                    break;

                                case 'LOST':
                                    redirectUrl = '/lead/lost';
                                    break;

                                default:
                                    redirectUrl = '/lead/all-lead';
                            }

                        } else {
                            const statusUpper = newStatus.toUpperCase();
                            if (statusUpper === 'REJECTED') {
                                redirectUrl = '/data-center?tab=rejected';
                            } else if (['CALL SCHEDULED', 'MEETING SCHEDULED', 'VISIT SCHEDULED', 'VISIT DONE'].includes(statusUpper)) {
                                redirectUrl = '/data-center?tab=schedule';
                            } else {
                                redirectUrl = '/data-center';
                            }
                        }

                        setTimeout(() => {
                            window.location.href = redirectUrl;
                        }, 800);

                    } else {
                        toastr.error(data.message || 'Failed to update status');
                    }

                })
                .catch(err => {
                    console.error("ERROR:", err);
                    toastr.error('Update failed');
                });
        }

        // Edit Data
        function editData(dataId) {
            window.location.href = `/data-center/${dataId}/edit`;
        }

        // Add Comment
        document.addEventListener('click', function(event) {
            if (event.target.closest('.add-comment-btn')) {
                const btn = event.target.closest('.add-comment-btn');
                const dataId = btn.dataset.id;

                document.getElementById('addCommentDataId').value = dataId;
                document.getElementById('addCommentRemark').value = '';
                if (window.updateCommentPreview) {
                    window.updateCommentPreview();
                }

                const addCommentModal = new bootstrap.Modal(document.getElementById('addCommentModal'));
                addCommentModal.show();
                return;
            }

            // Delete Data
            if (event.target.closest('.delete-data-btn')) {

                const btn = event.target.closest('.delete-data-btn');
                const dataId = btn.dataset.dataId;

                Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            fetch(`/data-center/${dataId}`, {
                                    method: 'DELETE',
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                            .content,
                                        'Content-Type': 'application/json',
                                        'Accept': 'application/json'
                                    }
                                })
                                .then(res => res.json())
                                .then(data => {

                                    if (data.success) {
                                        Swal.fire('Deleted!', data.message, 'success');

                                        setTimeout(() => {
                                            location.reload();
                                        }, 1000);

                                    } else {
                                        Swal.fire('Error!', data.message, 'error');
                                    }
                                })
                                .catch(error => {
                                    toastr.clear();
                                    console.error('Delete error:', error);

                                    Swal.fire('Error!', 'Something went wrong.', 'error');
                                });
                        }

                    });
            }
        });


        // Export functionality
        document.getElementById('btnExportExcel').addEventListener('click', function() {
            // Implement Excel export
            alert('Excel export functionality to be implemented');
        });

        document.getElementById('btnExportPDF').addEventListener('click', function() {
            // Implement PDF export
            alert('PDF export functionality to be implemented');
        });

        function showDataCenterComment(id) {
            console.log("Fetching comments for ID:", id);

            fetch(`/data-center/comments/${id}`)
                .then(res => res.json())
                .then(data => {

                    if (!data.success) {
                        toastr.error('Failed to load comments');
                        return;
                    }

                    let html = '';

                    if (data.comments.length === 0) {
                        html = `<tr><td colspan="5" class="text-center">No comments found</td></tr>`;
                    } else {

                        data.comments.forEach((item, index) => {

                            html += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${item.remark ?? '-'}</td>
                            <td>${item.status ?? '-'}</td>
                            <td>
                                ${item.created_at 
                                    ? new Date(item.created_at).toLocaleDateString('en-GB', {
                                        day: '2-digit',
                                        month: 'short',
                                        year: 'numeric'
                                    })
                                    : '-'
                                }
                            </td>
                        </tr>
                    `;
                        });
                    }

                    document.getElementById('commentList').innerHTML = html;

                    let modal = new bootstrap.Modal(document.getElementById('commentModal'));
                    modal.show();
                })
                .catch(err => {
                    console.error(err);
                    toastr.error('Error loading comments');
                });
        }

        function submitDataCenterComment() {
            const dataId = document.getElementById('addCommentDataId').value;
            const remarkInput = document.getElementById('addCommentRemark').value.trim();

            if (!remarkInput) {
                toastr.warning('Please enter comment or select a quick note');
                return;
            }

            const remark = window.getFormattedComment ? window.getFormattedComment() : remarkInput;

            fetch(`/data-center/comments/${dataId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        remark
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        const addCommentModal = bootstrap.Modal.getInstance(document.getElementById('addCommentModal'));
                        if (addCommentModal) {
                            addCommentModal.hide();
                        }

                        toastr.success(data.message || 'Comment added successfully');
                        showDataCenterComment(dataId);

                        const row = document.querySelector(`tr[data-id="${dataId}"]`);
                        if (row) {
                            const commentCell = row.cells[15];
                            if (commentCell) {
                                const shortComment = remark.length > 30 ? remark.substring(0, 30) + '...' : remark;
                                commentCell.innerHTML = `
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-2">
                                        <i class="fas fa-comment-alt text-muted"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <span class="d-block" title="${remark}">${shortComment}</span>
                                        <a href="javascript:void(0);" onclick="showDataCenterComment('${dataId}')" class="text-primary small">View more</a>
                                    </div>
                                </div>
                            `;
                            }
                        }
                    } else {
                        toastr.error(data.message || 'Failed to update comment');
                    }
                })
                .catch(err => {
                    console.error(err);
                    toastr.error('Error adding comment');
                });
        }

        // Handle is_converted checkbox
        document.addEventListener('DOMContentLoaded', function() {
            const isConvertedCheckbox = document.getElementById('isConverted');

            if (isConvertedCheckbox) {
                isConvertedCheckbox.addEventListener('change', function() {
                    if (this.checked) {
                        toastr.info('This lead will be added to New Leads section after update',
                            'Converting Lead');
                    }
                });
            }

            // Tab selection from URL query
            const urlParams = new URLSearchParams(window.location.search);
            const tabParam = urlParams.get('tab');
            if (tabParam) {
                const tabButton = document.querySelector(`button[data-bs-target="#${tabParam}Data"]`);
                if (tabButton) {
                    const triggerEl = new bootstrap.Tab(tabButton);
                    triggerEl.show();
                }
            }

            // Keep URL query parameter ?tab=... in sync when switching tabs
            const tabButtons = document.querySelectorAll('button[data-bs-toggle="pill"]');
            tabButtons.forEach(button => {
                button.addEventListener('shown.bs.tab', function(e) {
                    const targetId = e.target.getAttribute('data-bs-target').replace('#', '').replace('Data', '');
                    const url = new URL(window.location.href);
                    url.searchParams.set('tab', targetId);
                    window.history.replaceState({}, '', url.toString());
                    updatePaginationLinks();
                    
                    // Adjust DataTables layout for hidden tabs
                    if (typeof $ !== 'undefined' && $.fn.dataTable) {
                        $.fn.dataTable.tables({ visible: true, api: true }).columns.adjust().responsive.recalc();
                    }
                });
            });

            // Append current tab parameter to all pagination links so clicking page number preserves active tab
            function updatePaginationLinks() {
                const urlParams = new URLSearchParams(window.location.search);
                const currentTab = urlParams.get('tab') || 'all';
                document.querySelectorAll('.pagination a, .page-link').forEach(link => {
                    if (link.href) {
                        try {
                            const linkUrl = new URL(link.href);
                            linkUrl.searchParams.set('tab', currentTab);
                            link.href = linkUrl.toString();
                        } catch (e) {
                            // Ignore invalid URLs
                        }
                    }
                });
            }

            // Run initial pagination links update on page load
            updatePaginationLinks();

            // Handle length select change for Rejected tab
            const lengthSelectRejected = document.getElementById('lengthSelectRejected');
            if (lengthSelectRejected) {
                lengthSelectRejected.addEventListener('change', function() {
                    const length = this.value;
                    const url = new URL(window.location.href);
                    url.searchParams.set('length', length);
                    url.searchParams.set('tab', 'rejected');
                    url.searchParams.set('page', 1);
                    window.location.href = url.toString();
                });
            }

            // Initialize DataTable for table_rejected exactly like table
            if (typeof $ !== 'undefined' && $.fn.DataTable && $('#table_rejected').length) {
                $('#table_rejected').DataTable({
                    scrollX: true,
                    scrollCollapse: true,
                    responsive: true,
                    paging: false,
                    fixedColumns: {
                        leftColumns: 2,
                        rightColumns: 1
                    },
                });

                // Configure and bind custom search logic for Rejected tab search box
                const $rejectedSearchInput = $('#table_rejected_filter input');
                if ($rejectedSearchInput.length) {
                    $rejectedSearchInput.attr('placeholder', 'Enter search term');
                    
                    $rejectedSearchInput.on('keypress', function(e) {
                        if (e.which === 13) {
                            const searchValue = $(this).val();
                            const url = new URL(window.location.href);
                            url.searchParams.set('search', searchValue);
                            url.searchParams.set('page', 1);
                            window.location.href = url.toString();
                        }
                    });

                    $rejectedSearchInput.on('input', function() {
                        if ($(this).val() === '') {
                            const url = new URL(window.location.href);
                            url.searchParams.delete('search');
                            url.searchParams.set('page', 1);
                            window.location.href = url.toString();
                        }
                    });

                    // Pre-fill from URL params
                    const urlParams = new URLSearchParams(window.location.search);
                    const searchParam = urlParams.get('search');
                    if (searchParam) {
                        $rejectedSearchInput.val(searchParam);
                    }
                }
            }

            // Handle length select change for Schedule tab
            const lengthSelectSchedule = document.getElementById('lengthSelectSchedule');
            if (lengthSelectSchedule) {
                lengthSelectSchedule.addEventListener('change', function() {
                    const length = this.value;
                    const url = new URL(window.location.href);
                    url.searchParams.set('length', length);
                    url.searchParams.set('tab', 'schedule');
                    url.searchParams.set('page', 1);
                    window.location.href = url.toString();
                });
            }

            // Initialize DataTable for table_schedule exactly like table
            if (typeof $ !== 'undefined' && $.fn.DataTable && $('#table_schedule').length) {
                $('#table_schedule').DataTable({
                    scrollX: true,
                    scrollCollapse: true,
                    responsive: true,
                    paging: false,
                    fixedColumns: {
                        leftColumns: 2,
                        rightColumns: 1
                    },
                });

                // Configure and bind custom search logic for Schedule tab search box
                const $scheduleSearchInput = $('#table_schedule_filter input');
                if ($scheduleSearchInput.length) {
                    $scheduleSearchInput.attr('placeholder', 'Enter search term');
                    
                    $scheduleSearchInput.on('keypress', function(e) {
                        if (e.which === 13) {
                            const searchValue = $(this).val();
                            const url = new URL(window.location.href);
                            url.searchParams.set('search', searchValue);
                            url.searchParams.set('page', 1);
                            window.location.href = url.toString();
                        }
                    });

                    $scheduleSearchInput.on('input', function() {
                        if ($(this).val() === '') {
                            const url = new URL(window.location.href);
                            url.searchParams.delete('search');
                            url.searchParams.set('page', 1);
                            window.location.href = url.toString();
                        }
                    });

                    // Pre-fill from URL params
                    const urlParams = new URLSearchParams(window.location.search);
                    const searchParam = urlParams.get('search');
                    if (searchParam) {
                        $scheduleSearchInput.val(searchParam);
                    }
                }
            }

            // Handle length select change for Converted tab
            const lengthSelectConverted = document.getElementById('lengthSelectConverted');
            if (lengthSelectConverted) {
                lengthSelectConverted.addEventListener('change', function() {
                    const length = this.value;
                    const url = new URL(window.location.href);
                    url.searchParams.set('length', length);
                    url.searchParams.set('tab', 'converted');
                    url.searchParams.set('page', 1);
                    window.location.href = url.toString();
                });
            }

            // Initialize DataTable for table_converted exactly like table
            if (typeof $ !== 'undefined' && $.fn.DataTable && $('#table_converted').length) {
                $('#table_converted').DataTable({
                    scrollX: true,
                    scrollCollapse: true,
                    responsive: true,
                    paging: false,
                    fixedColumns: {
                        leftColumns: 2,
                        rightColumns: 1
                    },
                });

                // Configure and bind custom search logic for Converted tab search box
                const $convertedSearchInput = $('#table_converted_filter input');
                if ($convertedSearchInput.length) {
                    $convertedSearchInput.attr('placeholder', 'Enter search term');
                    
                    $convertedSearchInput.on('keypress', function(e) {
                        if (e.which === 13) {
                            const searchValue = $(this).val();
                            const url = new URL(window.location.href);
                            url.searchParams.set('search', searchValue);
                            url.searchParams.set('page', 1);
                            window.location.href = url.toString();
                        }
                    });

                    $convertedSearchInput.on('input', function() {
                        if ($(this).val() === '') {
                            const url = new URL(window.location.href);
                            url.searchParams.delete('search');
                            url.searchParams.set('page', 1);
                            window.location.href = url.toString();
                        }
                    });

                    // Pre-fill from URL params
                    const urlParams = new URLSearchParams(window.location.search);
                    const searchParam = urlParams.get('search');
                    if (searchParam) {
                        $convertedSearchInput.val(searchParam);
                    }
                }
            }
        });
    </script>

@endsection

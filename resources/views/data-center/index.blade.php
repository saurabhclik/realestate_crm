@extends('layouts.app')
@section('title', 'Data Center | Pro-leadexpertz')
@section('content')

    @include('modals.data-status-update')
    @include('modals.view-data-comment')

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

                            @if(session('import_messages'))
                            <div class="mt-4 mb-4">
                                @foreach(session('import_messages') as $message)
                                @php
                                $type = 'info';
                                $text = $message;
                                if (strpos($message, 'success') === 0) {
                                    $type = 'success';
                                    $text = substr($message, 8);
                                } elseif (strpos($message, 'warning') === 0) {
                                    $type = 'warning';
                                    $text = substr($message, 8);
                                } elseif (strpos($message, 'error') === 0) {
                                    $type = 'danger'; // Bootstrap alert class for error is danger
                                    $text = substr($message, 6);
                                }
                                @endphp
                                <div class="alert alert-{{ $type }} alert-dismissible fade show" role="alert">
                                    {!! $text !!}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endforeach
                            </div>
                            @endif

                            <!-- HEADER -->
                            <div class="page-title-box d-flex align-items-center justify-content-between flex-wrap gap-3">
                                <div class="d-flex align-items-center flex-wrap gap-2">
                                    <h4 class="mb-0 text-primary fw-bold">
                                        <i class="fas fa-database me-2"></i>
                                        Data Center
                                    </h4>

                                    <span class="badge bg-soft-primary text-dark px-3 py-2 fs-6">
                                        {{ $dataCenters->total() }} Datas
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
                                    <a class="nav-link {{ $activeTab === 'all' ? 'active' : '' }}" 
                                       href="{{ request()->fullUrlWithQuery(['tab' => 'all', 'page' => 1]) }}">
                                        <i class="fas fa-list me-1"></i> All Data
                                    </a>
                                </li>

                                <!-- REJECTED -->
                                <li class="nav-item">
                                    <a class="nav-link {{ $activeTab === 'rejected' ? 'active' : '' }}" 
                                       href="{{ request()->fullUrlWithQuery(['tab' => 'rejected', 'page' => 1]) }}">
                                        <i class="fas fa-times-circle me-1"></i> Rejected
                                    </a>
                                </li>

                                <!-- SCHEDULE -->
                                <li class="nav-item">
                                    <a class="nav-link {{ $activeTab === 'schedule' ? 'active' : '' }}" 
                                       href="{{ request()->fullUrlWithQuery(['tab' => 'schedule', 'page' => 1]) }}">
                                        <i class="fas fa-calendar-alt me-1"></i> Schedule
                                    </a>
                                </li>

                                <!-- CONVERTED -->
                                <li class="nav-item">
                                    <a class="nav-link {{ $activeTab === 'converted' ? 'active' : '' }}" 
                                       href="{{ request()->fullUrlWithQuery(['tab' => 'converted', 'page' => 1]) }}">
                                        <i class="fas fa-check-circle me-1"></i> Converted
                                    </a>
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

                                                                                    <button type="button"
                                                                                        class="btn btn-xs btn-soft-light edit-data-btn"
                                                                                        data-id="{{ $row->id }}"
                                                                                        data-bs-toggle="tooltip"
                                                                                        title="Edit">
                                                                                        <i
                                                                                            class="fas fa-edit text-warning"></i>
                                                                                    </button>

                                                                                    <button type="button"
                                                                                        class="btn btn-xs btn-soft-light update-status-btn"
                                                                                        data-id="{{ $row->id }}"
                                                                                        data-name="{{ $row->name }}"
                                                                                        data-status="{{ $row->status }}"
                                                                                        data-projects="{{ $row->project_ids }}"
                                                                                        data-converted="{{ $row->is_converted ?? 0 }}">
                                                                                        <i
                                                                                            class="fas fa-sync-alt text-info"></i>
                                                                                    </button>

                                                                                    <!-- <button type="button"
                                                                                        class="btn btn-xs btn-soft-light add-comment-btn"
                                                                                        data-id="{{ $row->id }}"
                                                                                        data-bs-toggle="tooltip"
                                                                                        title="Update Comment">
                                                                                        <i
                                                                                            class="fas fa-comments text-info"></i>
                                                                                    </button> -->

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


   @include('modals.create-data')

    @include('modals.bulk-import-modal-data')

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
                let dataName = btn.getAttribute('data-name') || '';
                let status = btn.getAttribute('data-status');
                let projectIds = btn.getAttribute('data-projects');
                let isAlreadyConverted = btn.getAttribute('data-converted') === '1';

                // console.log("DATA ID FROM BUTTON:", dataId);

                document.getElementById('dataId').value = dataId;
                
                let modalDataNameInput = document.getElementById('modalDataName');
                if (modalDataNameInput) {
                    modalDataNameInput.value = dataName;
                }

                document.getElementById('newStatus').value = status || '';
                document.getElementById('currentStatus').value = status || '';

                if (projectIds) {
                    let ids = projectIds.split(',');
                    $('#visitProjects').val(ids).trigger('change');
                } else {
                    $('#visitProjects').val(null).trigger('change');
                }

                const isConvertedCheckbox = document.getElementById('isConverted');
                const isRejectedCheckbox = document.getElementById('isRejected');
                const isFollowupCheckbox = document.getElementById('isFollowup');
                const isUpdateCommentCheckbox = document.getElementById('isUpdateComment');
                
                const allFields = document.getElementById('allFields');
                const rejectedFields = document.getElementById('rejectedFields');
                const followupFields = document.getElementById('followupFields');
                const updateCommentFields = document.getElementById('updateCommentFields');

                // Check if opened from Rejected tab or status is rejected
                let isRejectedTab = (status && status.toUpperCase() === 'REJECTED') || window.location.search.indexOf('tab=rejected') > -1;
                window.isRejectedData = isRejectedTab;

                function resetAndHide(chk) {
                    if (chk) {
                        chk.checked = false;
                        chk.disabled = false;
                        chk.closest('.mb-3').style.display = 'none';
                    }
                }

                function resetAndDisable(chk) {
                    if (chk) {
                        chk.checked = false;
                        chk.disabled = true;
                        chk.closest('.mb-3').style.display = 'block';
                        let formCheck = chk.closest('.form-check');
                        if (formCheck) formCheck.style.opacity = '0.5';
                    }
                }

                function resetAndShow(chk) {
                    if (chk) {
                        chk.checked = false;
                        chk.disabled = false;
                        chk.closest('.mb-3').style.display = 'block';
                        let formCheck = chk.closest('.form-check');
                        if (formCheck) formCheck.style.opacity = '1';
                    }
                }

                if (allFields) allFields.style.display = 'none';
                if (rejectedFields) rejectedFields.style.display = 'none';
                if (followupFields) followupFields.style.display = 'none';
                if (updateCommentFields) updateCommentFields.style.display = 'none';

                if (isAlreadyConverted) {
                    resetAndHide(isConvertedCheckbox);
                    resetAndHide(isRejectedCheckbox);
                    resetAndHide(isFollowupCheckbox);
                    resetAndHide(isUpdateCommentCheckbox);
                    toastr.warning('This data is already converted to a lead and cannot be modified.');
                    return; // Prevent opening the modal
                } else if (isRejectedTab) {
                    resetAndDisable(isConvertedCheckbox);
                    resetAndDisable(isRejectedCheckbox);
                    resetAndShow(isFollowupCheckbox);
                    resetAndShow(isUpdateCommentCheckbox);
                } else {
                    resetAndShow(isConvertedCheckbox);
                    resetAndShow(isRejectedCheckbox);
                    resetAndShow(isFollowupCheckbox);
                    resetAndShow(isUpdateCommentCheckbox);
                }

                const modal = new bootstrap.Modal(document.getElementById('statusUpdateModal'));
                modal.show();
            }
        });

        // Show status update modal
        function updateDataStatus() {

            const dataId = document.getElementById('dataId').value.trim();
            const isRejectedCheckbox = document.getElementById('isRejected');
            const isFollowupCheckbox = document.getElementById('isFollowup');
            const isUpdateCommentCheckbox = document.getElementById('isUpdateComment');
            
            const isRejected = isRejectedCheckbox && isRejectedCheckbox.checked;
            const isFollowup = isFollowupCheckbox && isFollowupCheckbox.checked;
            const isUpdateComment = isUpdateCommentCheckbox && isUpdateCommentCheckbox.checked;

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
            } else if (isFollowup) {
                newStatus = 'CALL SCHEDULED';
                comment = document.getElementById('followupComment').value.trim();
                remindDate = document.getElementById('followupDate').value;
                remindTime = document.getElementById('followupTime').value;
                isConverted = 0;

                if (!comment && !remindDate) {
                    toastr.warning('Please enter a note or select a date/time');
                    return;
                }
            } else if (isUpdateComment) {
                newStatus = document.getElementById('currentStatus').value; // Keep existing status
                let rawComment = document.getElementById('ucRemark').value.trim();
                remindDate = document.getElementById('ucDate').value;
                remindTime = document.getElementById('ucTime').value;
                isConverted = 0;

                if (!rawComment && !remindDate) {
                    toastr.warning('Please enter a note or select a date/time');
                    return;
                }
                
                comment = document.getElementById('finalCommentText') ? document.getElementById('finalCommentText').value : rawComment;
            } else {
                newStatus = document.getElementById('newStatus').value;
                comment = document.getElementById('statusComment').value.trim();
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

                        // redirect if converted
                        let redirectUrl = '{{ url("data-center") }}';

                        if (payload.is_converted === 1) {

                            switch (newStatus.toUpperCase()) {

                                case 'PENDING':
                                    redirectUrl = '{{ url("lead/pending") }}';
                                    break;

                                case 'PROCESSING':
                                    redirectUrl = '{{ url("lead/processing") }}';
                                    break;

                                case 'INTERESTED':
                                    redirectUrl = '{{ url("lead/interested") }}';
                                    break;

                                case 'CALL SCHEDULED':
                                    redirectUrl = '{{ url("lead/call-scheduled") }}';
                                    break;

                                case 'WHATSAPP':
                                    redirectUrl = '{{ url("lead/whatsapp") }}';
                                    break;

                                case 'MEETING SCHEDULED':
                                    redirectUrl = '{{ url("lead/meeting-scheduled") }}';
                                    break;

                                case 'VISIT SCHEDULED':
                                    redirectUrl = '{{ url("lead/visit-scheduled") }}';
                                    break;

                                case 'VISIT DONE':
                                    redirectUrl = '{{ url("lead/visit-done") }}';
                                    break;

                                case 'NOT INTERESTED':
                                    redirectUrl = '{{ url("lead/not-interested") }}';
                                    break;

                                case 'NOT PICKED':
                                    redirectUrl = '{{ url("lead/not-picked") }}';
                                    break;

                                case 'NOT REACHABLE':
                                    redirectUrl = '{{ url("lead/not-reachable") }}';
                                    break;

                                case 'FUTURE LEAD':
                                    redirectUrl = '{{ url("lead/future") }}';
                                    break;

                                case 'WRONG NUMBER':
                                    redirectUrl = '{{ url("lead/wrong-number") }}';
                                    break;

                                case 'CHANNEL PARTNER':
                                    redirectUrl = '{{ url("lead/channel-partner") }}';
                                    break;

                                case 'LOST':
                                    redirectUrl = '{{ url("lead/lost") }}';
                                    break;

                                default:
                                    redirectUrl = '{{ url("lead/all-lead") }}';
                            }

                        } else {
                            if (isUpdateCommentCheckbox && isUpdateCommentCheckbox.checked) {
                                // For update comment, redirect to the All Data tab
                                redirectUrl = '{{ url("data-center/data") }}?tab=all';
                            } else {
                                const statusUpper = newStatus.toUpperCase();
                                if (statusUpper === 'REJECTED') {
                                    redirectUrl = '{{ url("data-center/data") }}?tab=rejected';
                                } else if (['CALL SCHEDULED', 'MEETING SCHEDULED', 'VISIT SCHEDULED', 'VISIT DONE'].includes(statusUpper)) {
                                    redirectUrl = '{{ url("data-center/data") }}?tab=schedule';
                                } else {
                                    redirectUrl = '{{ url("data-center/data") }}?tab=all';
                                }
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

        function exportToExcel() {
            var selectedTab = document.querySelector('.nav-link.active').getAttribute('id').replace('-tab', '');
            window.location.href = `{{ url('data-center/export-excel') }}?tab=${selectedTab}`;
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

        //excel Export functionality
        document.getElementById('btnExportExcel').addEventListener('click', function() {
           let btn = $(this);
           let originalHtml = btn.html();
           btn.html('<i class="fas fa-spinner fa-spin"></i> Downloading...');
           btn.prop('disabled', true);
           
        });

        // PDF export functionality
        document.getElementById('btnExportPDF').addEventListener('click', function() {
            let btn = $(this);
            let originalHtml = btn.html();
            btn.html('<i class="fas fa-spinner fa-spin"></i> Downloading...');
            btn.prop('disabled', true);
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

        });

        // Edit Data Functionality
        $(document).on('click', '.edit-data-btn', function(e) {
            e.preventDefault();
            let dataId = $(this).data('id');
            let btn = $(this);
            let originalHtml = btn.html();
            
            btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin text-warning"></i>');
            
            $.ajax({
                url: `/data-center/${dataId}/edit`,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    btn.prop('disabled', false).html(originalHtml);
                    if (response.success) {
                        let data = response.data;
                        let modal = $('#addDataModal');
                        
                        modal.find('.modal-title').html('<i class="fas fa-edit me-2"></i>Edit Data');
                        modal.find('button[type="submit"]').html('<i class="fas fa-save me-2"></i>Update Data');
                        modal.find('form').attr('action', `/data-center/${dataId}`);
                        
                        modal.find('#name').val(data.name || '');
                        modal.find('#email').val(data.email || '');
                        modal.find('#phone').val(data.phone || '');
                        modal.find('#alternative_number').val(data.alternative_number || '');
                        modal.find('#comment').val(data.comment || '');
                        
                        if (data.budget) {
                            let bgtOption = modal.find('#budget option').filter(function() {
                                return $(this).val() == data.budget || $(this).text().trim() == data.budget;
                            });
                            if (bgtOption.length) {
                                modal.find('#budget').val(bgtOption.val()).trigger('change');
                            } else {
                                modal.find('#budget').val(data.budget).trigger('change');
                            }
                        } else {
                            modal.find('#budget').val('').trigger('change');
                        }
                        
                        if (data.source) {
                            let sourceOption = modal.find('#source option').filter(function() {
                                return $(this).text().trim() == data.source || $(this).val() == data.source;
                            });
                            if(sourceOption.length) {
                                modal.find('#source').val(sourceOption.val()).trigger('change');
                            } else {
                                modal.find('#source').val(data.source).trigger('change');
                            }
                        } else {
                            modal.find('#source').val('').trigger('change');
                        }

                        if (data.state) {
                            modal.find('#state').val(data.state).trigger('change');
                            setTimeout(() => {
                                if (data.city) {
                                    if (modal.find('#city option[value="'+data.city+'"]').length === 0) {
                                        modal.find('#city').append(new Option(data.city, data.city, true, true));
                                    }
                                    modal.find('#city').val(data.city).trigger('change');
                                }
                            }, 1000);
                        } else {
                            modal.find('#state').val('').trigger('change');
                            modal.find('#city').val('').trigger('change');
                        }

                        if (data.property_type) {
                            modal.find('#property_type').val(data.property_type).trigger('change');
                            if (data.property_category) {
                                let catOption = modal.find('#property_category option').filter(function() {
                                    return $(this).text().trim() == data.property_category || $(this).val() == data.property_category;
                                });
                                if(catOption.length) {
                                    modal.find('#property_category').val(catOption.val()).trigger('change');
                                } else {
                                    modal.find('#property_category').append(new Option(data.property_category, data.property_category, true, true)).trigger('change');
                                }
                                
                                if (data.property_sub_category) {
                                    let subOption = modal.find('#property_sub_category option').filter(function() {
                                        return $(this).text().trim() == data.property_sub_category || $(this).val() == data.property_sub_category;
                                    });
                                    if(subOption.length) {
                                        modal.find('#property_sub_category').val(subOption.val()).trigger('change');
                                    } else {
                                        modal.find('#property_sub_category').append(new Option(data.property_sub_category, data.property_sub_category, true, true)).trigger('change');
                                    }
                                } else {
                                    modal.find('#property_sub_category').val('').trigger('change');
                                }
                            } else {
                                modal.find('#property_category').val('').trigger('change');
                                modal.find('#property_sub_category').val('').trigger('change');
                            }
                        } else {
                            modal.find('#property_type').val('').trigger('change');
                            modal.find('#property_category').val('').trigger('change');
                            modal.find('#property_sub_category').val('').trigger('change');
                        }
                        
                        if (data.project_name) {
                            let projects = data.project_name.split(',').map(s => s.trim());
                            modal.find('#projects').val(projects).trigger('change');
                        } else {
                            modal.find('#projects').val([]).trigger('change');
                        }
                        
                        modal.modal('show');
                    } else {
                        toastr.error('Error: ' + response.message);
                    }
                },
                error: function() {
                    btn.prop('disabled', false).html(originalHtml);
                    toastr.error('Failed to fetch data details.');
                }
            });
        });

        $('#addDataModal').on('hidden.bs.modal', function () {
            $('#addDataModal .modal-title').html('<i class="fas fa-plus-circle me-2"></i>Add New Data');
            $('#addDataModal button[type="submit"]').html('<i class="fas fa-save me-2"></i>Save Data');
            $('#addDataModal form').attr('action', "{{ route('data-center.store') }}");
            $('#addDataModal form')[0].reset();
            $('#addDataModal form').removeClass('was-validated');
            $('#addDataModal .select2').val('').trigger('change');
        });
    </script>

@endsection

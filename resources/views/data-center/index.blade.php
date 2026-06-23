@extends('layouts.app')
@section('title', 'Data Center | Pro-leadexpertz')
@section('content')
    @include('modals.data-status-update')
    @include('modals.view-data-comment')
    @include('modals.create-data')
    @include('modals.bulk-import-modal-data')

    <style>
        .nav-pills .nav-link {
            position: relative;
            border-radius: 0;
            color: #6c757d;
            font-weight: 500;
            padding-bottom: 10px;
            transition: 0.3s;
        }

        .nav-pills .nav-link.active-tab {
            color: #3762b8;
            background: transparent;
        }

        .nav-pills .nav-link.active-tab::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -2px;
            width: 100%;
            height: 3px;
            background: #3762b8;
            border-radius: 10px;
        }

        <style>
        /* ... your existing styles ... */

        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 8px;
            min-width: 180px;
        }

        .dropdown-item {
            border-radius: 6px;
            padding: 10px 15px;
            transition: all 0.2s ease;
            font-size: 14px;
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
            transform: translateX(3px);
        }

        .dropdown-item i {
            width: 20px;
            text-align: center;
        }
    </style>
    </style>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
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
                                    $type = 'danger';
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
                <div class="page-title-box d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <h4 class="mb-0">
                            <i class="fas fa-database me-2"></i>
                            Data Center<div class="border-bottom border-3 border-primary mb-2 mt-1 w-75"></div>
                        </h4>
                        <span class="badge bg-soft-primary text-dark px-3 py-2 fs-6">
                            {{ $dataCenters->total() }} Datas
                        </span>
                    </div>
                    <div class="d-flex gap-2 flex-wrap align-items-center">
                        <!-- Add Data Button -->
                        <button class="shadow btn btn-primary btn-sm d-flex align-items-center" data-bs-toggle="modal"
                            data-bs-target="#addDataModal" type="button">
                            <i class="fas fa-plus-circle me-2"></i>
                            Add Data
                        </button>

                        @if (session('user_type') === 'admin')
                            <button type="button" class="shadow btn btn-info btn-sm text-white d-flex align-items-center"
                                data-bs-toggle="modal" data-bs-target="#bulkImportModal">
                                <i class="fas fa-file-import me-2"></i>
                                Bulk Import
                            </button>
                        @endif

                        <div class="dropdown">
                            <button class="shadow btn btn-success btn-sm d-flex align-items-center dropdown-toggle"
                                type="button" id="exportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-file-export me-2"></i>
                                Export
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="exportDropdown">
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:void(0)"
                                        id="btnExportExcel">
                                        <i class="fas fa-file-excel me-2 text-success"></i>
                                        Export to Excel
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:void(0)"
                                        id="btnExportPDF">
                                        <i class="fas fa-file-pdf me-2 text-danger"></i>
                                        Export to PDF
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                   
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <ul class="nav nav-pills" style="gap: 2.5rem !important; " id="dataTabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link {{ $activeTab === 'new' ? 'active-tab' : '' }}"
                                        href="{{ request()->fullUrlWithQuery(['tab' => 'new', 'page' => 1]) }}">
                                        <i class="fas fa-bolt me-1"></i> New Data <span
                                            class="text-muted">({{ number_format($newCount) }})</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ $activeTab === 'schedule' ? 'active-tab' : '' }}"
                                        href="{{ request()->fullUrlWithQuery(['tab' => 'schedule', 'page' => 1]) }}">
                                        <i class="fas fa-calendar-alt me-1"></i> Follow-up <span
                                            class="text-muted">({{ number_format($followupCount) }})</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ $activeTab === 'converted' ? 'active-tab' : '' }}"
                                        href="{{ request()->fullUrlWithQuery(['tab' => 'converted', 'page' => 1]) }}">
                                        <i class="fas fa-check-circle me-1"></i> Converted to lead <span
                                            class="text-muted">({{ number_format($convertedCount) }})</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ $activeTab === 'rejected' ? 'active-tab' : '' }}"
                                        href="{{ request()->fullUrlWithQuery(['tab' => 'rejected', 'page' => 1]) }}">
                                        <i class="fas fa-times-circle me-1"></i> Trash/Rejected <span
                                            class="text-muted">({{ number_format($rejectedCount) }})</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ $activeTab === 'all' ? 'active-tab' : '' }}"
                                        href="{{ request()->fullUrlWithQuery(['tab' => 'all', 'page' => 1]) }}">
                                        <i class="fas fa-list me-1"></i> All Data <span
                                            class="text-muted">({{ number_format($allCount) }})</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="allData">
                                    <div class="card p-3">
                                        <form class="data-list-form" action="" method="POST">
                                            @csrf
                                            <div>
                                                <label>
                                                    Show
                                                    <select id="lengthSelect" class="form-select form-select-sm"
                                                        style="width: auto; display: inline-block;">
                                                        <option value="10" {{ request('length') == 10 ? 'selected' : '' }}>10
                                                        </option>
                                                        <option value="25" {{ request('length') == 25 ? 'selected' : '' }}>25
                                                        </option>
                                                        <option value="50" {{ request('length') == 50 ? 'selected' : '' }}>50
                                                        </option>
                                                        <option value="100" {{ request('length') == 100 ? 'selected' : '' }}>
                                                            100</option>
                                                        <option value="500" {{ request('length') == 500 ? 'selected' : '' }}>
                                                            500</option>
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
                                                        <th>Campaign</th>
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
                                                        <tr data-id="{{ $row->id }}" data-comment="{{ $row->comment }}">
                                                            <td>
                                                                {{ $loop->iteration }}
                                                            </td>
                                                            <td>
                                                                <div class="d-flex gap-3 align-items-center">
                                                                    <span class="fw-semibold">{{ $row->id }}</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex flex-column">
                                                                    <div class="d-flex align-items-center mb-1">
                                                                        <div class="flex-grow-1">
                                                                            <h6 class="mb-0">{{ $row->name }}
                                                                                @if(isset($row->is_converted) && $row->is_converted == 1)
                                                                                    <span class="badge bg-success ms-1"
                                                                                        style="font-size: 0.65rem;">Converted</span>
                                                                                @endif
                                                                                @if(isset($row->status) && $row->status == 'INTERESTED')
                                                                                    <span class="badge bg-info ms-1"
                                                                                        style="font-size: 0.65rem;">
                                                                                        Interested
                                                                                    </span>
                                                                                @endif
                                                                                @if(isset($row->status) && $row->status == 'NOT PICKED')
                                                                                    <span class="badge bg-danger ms-1"
                                                                                        style="font-size: 0.65rem;">
                                                                                        NOT PICKED
                                                                                    </span>
                                                                                @endif
                                                                                @if(isset($row->status) && $row->status == 'REJECTED')
                                                                                    <span class="badge bg-danger ms-1"
                                                                                        style="font-size: 0.65rem;">
                                                                                        REJECTED
                                                                                    </span>
                                                                                @endif
                                                                            </h6>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="d-flex justify-content-between align-items-center">
                                                                        <div class="d-flex">
                                                                            <a href="tel:{{ $phone }}"
                                                                                class="btn btn-xs btn-soft-light"
                                                                                data-bs-toggle="tooltip" title="Call">
                                                                                <i class="fas fa-phone text-primary"></i>
                                                                            </a>
                                                                            <a href="https://wa.me/91{{ $phone }}"
                                                                                target="_blank"
                                                                                class="btn btn-xs btn-soft-light"
                                                                                data-bs-toggle="tooltip" title="WhatsApp">
                                                                                <i class="fab fa-whatsapp text-success"></i>
                                                                            </a>
                                                                            @if(!$row->is_converted == 1)
                                                                                <button type="button"
                                                                                    class="btn btn-xs btn-soft-light edit-data-btn"
                                                                                    data-id="{{ $row->id }}"
                                                                                    data-bs-toggle="tooltip" title="Edit">
                                                                                    <i class="fas fa-edit text-warning"></i>
                                                                                </button>

                                                                                <button type="button"
                                                                                    class="btn btn-xs btn-soft-light update-status-btn"
                                                                                    data-id="{{ $row->id }}"
                                                                                    data-name="{{ $row->name }}"
                                                                                    data-status="{{ $row->status }}"
                                                                                    data-projects="{{ $row->project_ids }}"
                                                                                    data-converted="{{ $row->is_converted ?? 0 }}">
                                                                                    <i class="fas fa-sync-alt text-info"></i>
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
                                                                                        data-bs-toggle="tooltip" title="Delete Data"
                                                                                        type="button">
                                                                                        <i class="fas fa-trash text-danger"></i>
                                                                                    </button>
                                                                                @endif
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
                                                                    {{ $row->campaign ?? '-' }}
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
                                                                <span class="cust-badge {{ $statusClass }} text-dark">
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
                                                                <div class="d-flex align-items-center justify-content-between">
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
                                                                        <i class="fas fa-comment-alt text-muted"></i>
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
                                                                        <span class="d-block" data-bs-toggle="tooltip"
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

    <script>
        $(document).ready(function () {
            window._allActionOptions = null;
            $(document).on('change', '#actionSelect', function () {
                let val = $(this).val();
                $('#isConverted, #isRejected, #isFollowup, #isUpdateComment').prop('checked', false);
                $('#allFields, #rejectedFields, #followupFields, #updateCommentFields').hide();

                if (val && val.includes('FOLLOWUP')) $('#followupFields').show();
                else if (val && val.includes('CONVERTED')) $('#allFields').show(); 
                else if (val && val.includes('REJECTED')) $('#rejectedFields').show();
            });
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

            window.updateCommentPreview = function () {
                if (!addCommentRemark) return;
                const note = addCommentRemark.value.trim();
                if (note) {
                    commentPreview.textContent = `${getFormattedDate()} - ${note} - ${userName}`;
                    commentPreview.classList.remove('text-secondary');
                    commentPreview.classList.add('text-primary');
                }
                else {
                    commentPreview.textContent = `${getFormattedDate()} - [Your Note] - ${userName}`;
                    commentPreview.classList.remove('text-primary');
                    commentPreview.classList.add('text-secondary');
                }
            }
            if (addCommentRemark) {
                addCommentRemark.addEventListener('input', window.updateCommentPreview);
            }
            $(document).on('click', '.quick-note-btn', function () {
                $('.quick-note-btn').removeClass('active btn-primary text-white').addClass('btn-outline-primary');
                $(this).removeClass('btn-outline-primary').addClass('active btn-primary text-white');

                const noteText = $(this).data('note');
                if (addCommentRemark) {
                    addCommentRemark.value = noteText;
                    window.updateCommentPreview();
                }
            });
            window.getFormattedComment = function () {
                if (!addCommentRemark) return '';
                const note = addCommentRemark.value.trim();
                if (!note) return '';
                return `${getFormattedDate()} - ${note} - ${userName}`;
            };
            $('#addCommentModal').on('show.bs.modal', function () {
                $('.quick-note-btn').removeClass('active btn-primary text-white').addClass('btn-outline-primary');
                if (addCommentRemark) {
                    addCommentRemark.value = '';
                }
                window.updateCommentPreview();
            });
        });
        document.addEventListener('click', function (e) {
            if (e.target.closest('.update-status-btn')) {
                let btn = e.target.closest('.update-status-btn');
                let dataId = btn.getAttribute('data-id');
                let dataName = btn.getAttribute('data-name') || '';
                let status = btn.getAttribute('data-status');
                let projectIds = btn.getAttribute('data-projects');
                let isAlreadyConverted = btn.getAttribute('data-converted') === '1';

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
                }
                else {
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

                const followupStatuses = ['CALL SCHEDULED', 'MEETING SCHEDULED', 'VISIT SCHEDULED', 'VISIT DONE'];
                const statusUpper = (status || '').toUpperCase();

                let rowType = 'new'; 
                if (statusUpper === 'REJECTED') {
                    rowType = 'rejected';
                } else if (followupStatuses.includes(statusUpper)) {
                    rowType = 'followup';
                }

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
                    flasher.warning('This data is already converted to a lead and cannot be modified.');
                    return;
                }
                else if (rowType === 'rejected') {
                    resetAndDisable(isConvertedCheckbox);
                    resetAndDisable(isRejectedCheckbox);
                    resetAndShow(isFollowupCheckbox);
                    resetAndShow(isUpdateCommentCheckbox);
                }
                else if (rowType === 'followup') {
                    resetAndShow(isConvertedCheckbox);
                    resetAndDisable(isRejectedCheckbox);  
                    resetAndShow(isFollowupCheckbox);
                    resetAndShow(isUpdateCommentCheckbox);
                }
                else {
                    resetAndShow(isConvertedCheckbox);
                    resetAndShow(isRejectedCheckbox);
                    resetAndShow(isFollowupCheckbox);
                    resetAndShow(isUpdateCommentCheckbox);
                }

                let actionSelect = document.getElementById('actionSelect');
                if (actionSelect) {
                    // Store all original options if not already stored
                    if (!window._allActionOptions) {
                        window._allActionOptions = Array.from(actionSelect.options).map(opt => ({
                            value: opt.value,
                            text: opt.text
                        }));
                    }

                    actionSelect.innerHTML = '<option value="">-- Select Action --</option>';

                    let prefix = 'NEW_';
                    if (rowType === 'rejected') {
                        prefix = 'REJ_';
                    } else if (rowType === 'followup') {
                        prefix = 'FU_';
                    }

                    window._allActionOptions.forEach(opt => {
                        if (opt.value && opt.value.startsWith(prefix)) {
                            let option = document.createElement('option');
                            option.value = opt.value;
                            option.text = opt.text;
                            actionSelect.appendChild(option);
                        }
                    });
                }

                const modal = new bootstrap.Modal(document.getElementById('statusUpdateModal'));
                modal.show();
            }
        });
       
        function updateDataStatus() {
            const dataId = document.getElementById('dataId').value.trim();
            let selectedAction = document.getElementById('actionSelect').value;

            if (!selectedAction) {
                flasher.warning('Please select an action');
                return;
            }

            let newStatus, comment, remindDate, remindTime, isConverted;

            if (selectedAction === 'NEW_FOLLOWUP' || selectedAction === 'REJ_FOLLOWUP') {
                newStatus = 'CALL SCHEDULED';
                comment = document.getElementById('followupComment').value.trim();
                remindDate = document.getElementById('followupDate').value;
                remindTime = document.getElementById('followupTime').value;
                isConverted = 0;
                if (!comment && !remindDate) { flasher.warning('Enter note or date'); return; }
            }
            else if (selectedAction === 'NEW_CONVERTED' || selectedAction === 'FU_CONVERTED' || selectedAction === 'REJ_CONVERTED') {
                newStatus = document.getElementById('newStatus').value;
                comment = document.getElementById('statusComment').value.trim();
                remindDate = document.getElementById('remindDate').value;
                remindTime = document.getElementById('remindTime').value;
                isConverted = 1;
                if (!newStatus) { flasher.warning('Select a status'); return; }
            }
            else if (selectedAction === 'NEW_REJECTED') {
                newStatus = 'REJECTED';
                comment = document.getElementById('rejectedComment').value.trim();
                remindDate = ''; remindTime = ''; isConverted = 0;
                if (!comment) { flasher.warning('Enter rejection remark'); return; }
            }
            else if (selectedAction === 'FU_NOT_CONVERTED') {
                newStatus = 'PENDING';
                comment = document.getElementById('finalCommentText') ? document.getElementById('finalCommentText').value : document.getElementById('ucRemark').value.trim();
                remindDate = document.getElementById('ucDate').value; remindTime = document.getElementById('ucTime').value; isConverted = 0;
            }
            else if (selectedAction === 'FU_NOT_PICKED') {
                newStatus = 'NOT PICKED';
                comment = document.getElementById('finalCommentText') ? document.getElementById('finalCommentText').value : document.getElementById('ucRemark').value.trim();
                remindDate = document.getElementById('ucDate').value; remindTime = document.getElementById('ucTime').value; isConverted = 0;
            }
            else if (selectedAction === 'FU_INTERESTED') {
                newStatus = 'INTERESTED';
                comment = document.getElementById('finalCommentText') ? document.getElementById('finalCommentText').value : document.getElementById('ucRemark').value.trim();
                remindDate = document.getElementById('ucDate').value; remindTime = document.getElementById('ucTime').value; isConverted = 0;
            }
           

            const payload = { status: newStatus, comment: comment, remind_date: remindDate, remind_time: remindTime, is_converted: isConverted };

            fetch(`/data-center/status/${dataId}`, {
                method: 'PUT',
                headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content, 'Content-Type': 'application/json', 'Accept': 'application/json' },
                body: JSON.stringify(payload)
            })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        flasher.success(data.message || 'Status updated successfully');
                        let redirectUrl = '{{ url("data-center") }}';
                        if (payload.is_converted === 1) {
                            switch (newStatus.toUpperCase()) {
                                case 'PENDING': redirectUrl = '{{ url("lead/pending") }}'; break;
                                case 'PROCESSING': redirectUrl = '{{ url("lead/processing") }}'; break;
                                case 'INTERESTED': redirectUrl = '{{ url("lead/interested") }}'; break;
                                case 'CALL SCHEDULED': redirectUrl = '{{ url("lead/call-scheduled") }}'; break;
                                default: redirectUrl = '{{ url("lead/all-lead") }}';
                            }
                        } else {
                            const statusUpper = newStatus.toUpperCase();
                            if (statusUpper === 'REJECTED') redirectUrl = '{{ url("data-center/data") }}?tab=rejected';
                            else if (['CALL SCHEDULED', 'MEETING SCHEDULED', 'VISIT SCHEDULED', 'VISIT DONE'].includes(statusUpper)) redirectUrl = '{{ url("data-center/data") }}?tab=schedule';
                            else redirectUrl = '{{ url("data-center/data") }}?tab=all';
                        }
                        setTimeout(() => { window.location.href = redirectUrl; }, 800);
                    } else {
                        flasher.error(data.message || 'Failed to update status');
                    }
                }).catch(err => flasher.error('Update failed'));
        }
        function editData(dataId) {
            window.location.href = `/data-center/${dataId}/edit`;
        }

        function exportToExcel() {
            var selectedTab = document.querySelector('.nav-link.active').getAttribute('id').replace('-tab', '');
            window.location.href = `{{ url('data-center/export-excel') }}?tab=${selectedTab}`;
        }

        document.addEventListener('click', function (event) {
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

                                    }
                                    else {
                                        Swal.fire('Error!', data.message, 'error');
                                    }
                                })
                                .catch(error => {
                                    flasher.clear();
                                    Swal.fire('Error!', 'Something went wrong.', 'error');
                                });
                        }
                    });
            }
        });

        function showDataCenterComment(id) {
            fetch(`/data-center/comments/${id}`)
                .then(res => res.json())
                .then(data => {
                    if (!data.success) {
                        flasher.error('Failed to load comments');
                        return;
                    }
                    let html = '';
                    if (data.comments.length === 0) {
                        html = `<tr><td colspan="5" class="text-center">No comments found</td></tr>`;
                    }
                    else {
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
                    flasher.error('Error loading comments');
                });
        }

        function submitDataCenterComment() {
            const dataId = document.getElementById('addCommentDataId').value;
            const remarkInput = document.getElementById('addCommentRemark').value.trim();

            if (!remarkInput) {
                flasher.warning('Please enter comment or select a quick note');
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

                        flasher.success(data.message || 'Comment added successfully');
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
                    }
                    else {
                        flasher.error(data.message || 'Failed to update comment');
                    }
                })
                .catch(err => {
                    flasher.error('Error adding comment');
                });
        }

        document.addEventListener('DOMContentLoaded', function () {
            const isConvertedCheckbox = document.getElementById('isConverted');

            if (isConvertedCheckbox) {
                isConvertedCheckbox.addEventListener('change', function () {
                    if (this.checked) {
                        flasher.info('This lead will be added to New Leads section after update',
                            'Converting Lead');
                    }
                });
            }

        });

        $(document).on('click', '.edit-data-btn', function (e) {
            e.preventDefault();
            let dataId = $(this).data('id');
            let btn = $(this);
            let originalHtml = btn.html();

            btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin text-warning"></i>');

            $.ajax({
                url: `/data-center/${dataId}/edit`,
                type: 'GET',
                dataType: 'json',
                success: function (response) {
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
                            let bgtOption = modal.find('#budget option').filter(function () {
                                return $(this).val() == data.budget || $(this).text().trim() == data.budget;
                            });
                            if (bgtOption.length) {
                                modal.find('#budget').val(bgtOption.val()).trigger('change');
                            }
                            else {
                                modal.find('#budget').val(data.budget).trigger('change');
                            }
                        }
                        else {
                            modal.find('#budget').val('').trigger('change');
                        }

                        if (data.source) {
                            let sourceOption = modal.find('#source option').filter(function () {
                                return $(this).text().trim() == data.source || $(this).val() == data.source;
                            });
                            if (sourceOption.length) {
                                modal.find('#source').val(sourceOption.val()).trigger('change');
                            }
                            else {
                                modal.find('#source').val(data.source).trigger('change');
                            }
                        }
                        else {
                            modal.find('#source').val('').trigger('change');
                        }

                        if (data.state) {
                            modal.find('#state').val(data.state).trigger('change');
                            setTimeout(() => {
                                if (data.city) {
                                    if (modal.find('#city option[value="' + data.city + '"]').length === 0) {
                                        modal.find('#city').append(new Option(data.city, data.city, true, true));
                                    }
                                    modal.find('#city').val(data.city).trigger('change');
                                }
                            }, 1000);
                        }
                        else {
                            modal.find('#state').val('').trigger('change');
                            modal.find('#city').val('').trigger('change');
                        }

                        if (data.property_type) {
                            modal.find('#property_type').val(data.property_type).trigger('change');
                            if (data.property_category) {
                                let catOption = modal.find('#property_category option').filter(function () {
                                    return $(this).text().trim() == data.property_category || $(this).val() == data.property_category;
                                });
                                if (catOption.length) {
                                    modal.find('#property_category').val(catOption.val()).trigger('change');
                                }
                                else {
                                    modal.find('#property_category').append(new Option(data.property_category, data.property_category, true, true)).trigger('change');
                                }

                                if (data.property_sub_category) {
                                    let subOption = modal.find('#property_sub_category option').filter(function () {
                                        return $(this).text().trim() == data.property_sub_category || $(this).val() == data.property_sub_category;
                                    });
                                    if (subOption.length) {
                                        modal.find('#property_sub_category').val(subOption.val()).trigger('change');
                                    }
                                    else {
                                        modal.find('#property_sub_category').append(new Option(data.property_sub_category, data.property_sub_category, true, true)).trigger('change');
                                    }
                                }
                                else {
                                    modal.find('#property_sub_category').val('').trigger('change');
                                }
                            }
                            else {
                                modal.find('#property_category').val('').trigger('change');
                                modal.find('#property_sub_category').val('').trigger('change');
                            }
                        }
                        else {
                            modal.find('#property_type').val('').trigger('change');
                            modal.find('#property_category').val('').trigger('change');
                            modal.find('#property_sub_category').val('').trigger('change');
                        }

                        if (data.project_name) {
                            let projects = data.project_name.split(',').map(s => s.trim());
                            modal.find('#projects').val(projects).trigger('change');
                        }
                        else {
                            modal.find('#projects').val([]).trigger('change');
                        }

                        modal.modal('show');
                    }
                    else {
                        flasher.error('Error: ' + response.message);
                    }
                },
                error: function () {
                    btn.prop('disabled', false).html(originalHtml);
                    flasher.error('Failed to fetch data details.');
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
        setTimeout(function () {
            $('#table_filter').append($('#lengthSelect').closest('div'));
            $("#table_filter").css({
                "display": "flex",
                "gap": "5px"
            })
        }, 2200);
    </script>
@endsection
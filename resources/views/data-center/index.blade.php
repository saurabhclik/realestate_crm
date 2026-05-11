@extends('layouts.app')
@section('title', 'Data Center | Pro-leadexpertz')
@section('content')

@include('modals.data-status-update')
@include('modals.view-data-comment')

<div class="modal fade" id="addCommentModal" tabindex="-1" aria-labelledby="addCommentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="addCommentModalLabel">Add Comment</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="addCommentDataId" value="">
                <div class="mb-3">
                    <label for="addCommentRemark" class="form-label">Comment</label>
                    <textarea class="form-control" id="addCommentRemark" rows="4" placeholder="Enter your comment"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="submitDataCenterComment()">Submit</button>
            </div>
        </div>
    </div>
</div>

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
</style>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <h4 class="mb-0 text-gradient-primary">
                            <i class="fas fa-database me-2"></i>All Data
                        </h4>
                        <span class="cust-badge text-dark bg-soft-primary ms-2">{{ $dataCenters->count() }} Datas</span>
                    </div>
                    <div class="d-flex gap-2">
                        <button id="btnExportExcel" class="shadow btn btn-success btn-sm d-flex align-items-center" data-bs-toggle="tooltip" data-bs-placement="top" title="Export table data to Excel">
                            <i class="fas fa-file-excel me-2"></i> Excel
                        </button>

                        <button id="btnExportPDF" class="shadow btn btn-danger btn-sm d-flex align-items-center" data-bs-toggle="tooltip" data-bs-placement="top" title="Export table data to PDF">
                            <i class="fas fa-file-pdf me-2"></i> PDF
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card p-3">
                    <form class="data-list-form" action="" method="POST">
                        @csrf
                        <div>
                            <label>
                                Show
                                <select id="lengthSelect" class="form-select form-select-sm" style="width: auto; display: inline-block;">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="500">500</option>
                                    <option value="all">All</option>
                                </select>
                                entries
                            </label>
                        </div>
                        <table id="table" class="table-hover table-bordered dt-responsive nowrap w-100">
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
                                @foreach($dataCenters as $row)
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
                                                    <h6 class="mb-0">{{ $row->name }}</h6>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex">
                                                    <a href="tel:{{ $phone }}" class="btn btn-xs btn-soft-light" data-bs-toggle="tooltip" title="Call">
                                                        <i class="fas fa-phone text-primary"></i>
                                                    </a>
                                                    <a href="https://wa.me/91{{ $phone }}" target="_blank" class="btn btn-xs btn-soft-light" data-bs-toggle="tooltip" title="WhatsApp">
                                                        <i class="fab fa-whatsapp text-success"></i>
                                                    </a>

                                                    <a href="{{ route('data-center.edit', $row->id) }}" class="btn btn-xs btn-soft-light" data-bs-toggle="tooltip" title="Edit">
                                                        <i class="fas fa-edit text-warning"></i>
                                                    </a>

                                                    <button type="button" class="btn btn-xs btn-soft-light update-status-btn"
                                                        data-id="{{ $row->id }}"
                                                        data-status="{{ $row->status }}"
                                                        data-projects="{{ $row->project_ids }}">
                                                        <i class="fas fa-sync-alt text-info"></i>
                                                    </button>

                                                    <button type="button" class="btn btn-xs btn-soft-light add-comment-btn"
                                                        data-id="{{ $row->id }}"
                                                        data-bs-toggle="tooltip"
                                                        title="Add Comment">
                                                        <i class="fas fa-comments text-info"></i>
                                                    </button>

                                                    @if(session('user_type') == 'admin')
                                                    <button class="btn btn-xs btn-soft-light delete-data-btn"
                                                        data-data-id="{{ $row->id }}"
                                                        data-data-name="{{ $row->name }}"
                                                        data-bs-toggle="tooltip"
                                                        title="Delete Data" type="button">
                                                        <i class="fas fa-trash text-danger"></i>
                                                    </button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $row->phone }}</td>
                                    <td>
                                        <a href="mailto:{{ $row->email }}" class="text-truncate d-inline-block" style="max-width: 200px;">
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
                                        $status = strtolower(trim($row->status ?? 'pending'));
                                        $statusClass = $status === 'approved' ? 'success' : ($status === 'rejected' || $status === 'reject' ? 'danger' : 'warning');
                                        @endphp
                                        <span class="cust-badge {{ $statusClass }} text-dark">
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
                                                $comment = strtolower(trim(strip_tags($row->comment ?? '')));
                                                $short = \Illuminate\Support\Str::limit($comment, 30);
                                                @endphp
                                                <span class="d-block" data-bs-toggle="tooltip" title="{{ $comment }}">
                                                    {!! $short !!}
                                                </span>
                                                @if(!empty($row->comment))
                                                <a href="javascript:void(0);" onclick="showDataCenterComment('{{ $row->id }}')" class="text-primary small">
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('click', function(e) {
        if (e.target.closest('.update-status-btn')) {

            let btn = e.target.closest('.update-status-btn');

            let dataId = btn.getAttribute('data-id');
            let status = btn.getAttribute('data-status');
            let projectIds = btn.getAttribute('data-projects');

            // console.log("DATA ID FROM BUTTON:", dataId);

            document.getElementById('dataId').value = dataId;
            document.getElementById('newStatus').value = status || '';

            if (projectIds) {
                let ids = projectIds.split(',');
                $('#visitProjects').val(ids).trigger('change');
            } else {
                $('#visitProjects').val(null).trigger('change');
            }

            const modal = new bootstrap.Modal(document.getElementById('statusUpdateModal'));
            modal.show();
        }
    });

    // Show status update modal
    function updateDataStatus() {

        const dataId = document.getElementById('dataId').value.trim();
        const newStatus = document.getElementById('newStatus').value;
        const comment = document.getElementById('comment').value.trim();
        const remindDate = document.getElementById('remindDate').value;
        const remindTime = document.getElementById('remindTime').value;

        const payload = {
            status: newStatus,
            comment: comment,
            remind_date: remindDate,
            remind_time: remindTime,
            is_converted: document.getElementById('isConverted').checked ? 1 : 0
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
                    if (payload.is_converted === 1) {
                        setTimeout(() => {
                            window.location.href = '/lead/all-lead';
                        }, 800);
                    } else {
                        setTimeout(() => {
                            location.reload();
                        }, 500);
                    }

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
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
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
                            <td>${item.created_at ?? '-'}</td>
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
        const remark = document.getElementById('addCommentRemark').value.trim();

        if (!remark) {
            toastr.warning('Please enter comment here');
            return;
        }

        fetch(`/data-center/comments/${dataId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ remark })
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
                    toastr.error(data.message || 'Failed to add comment');
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
                    toastr.info('This lead will be added to New Leads section after update', 'Converting Lead');
                }
            });
        }
    });
</script>

@endsection
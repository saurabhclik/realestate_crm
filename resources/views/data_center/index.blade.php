
@extends('layouts.app')
@section('title', 'Data Center | Pro-leadexpertz')
@section('content')

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
                        <span class="cust-badge text-dark bg-soft-primary ms-2">{{ $dataCenters->count() }} Records</span>
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
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        <div class="d-flex gap-3 align-items-center">
                                            <div class="position-relative d-inline-block text-center">
                                                @if(session('user_type') == 'admin' || session('user_type') == 'team_manager')
                                                <div class="action-item duplicate-item" onclick="editData('{{ $row->id }}')" data-bs-toggle="tooltip" title="Edit Data" style="cursor:pointer;">
                                                    <i class="fas fa-edit"></i>
                                                </div>
                                                @endif
                                            </div>
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
                                                   
                                                    @if(session('user_type') == 'admin')
                                                    <button class="btn btn-xs btn-soft-light delete-data-btn"
                                                        data-data-id="{{ $row->id }}"
                                                        data-data-name="{{ $row->name }}"
                                                        data-bs-toggle="tooltip"
                                                        title="Delete Data">
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
                                        <span class="badge bg-{{ $statusClass }} text-capitalize">
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
                                                <a href="javascript:void(0);" onclick="showComment('{{ $row->id }}')" class="text-primary small">
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
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Data Details Modal -->
<div class="modal fade data-modal" id="dataModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="data-section">
                    <div class="data-section-title">Personal Information</div>
                    <div class="data-detail">
                        <span class="data-label">Name:</span>
                        <span class="data-value" id="modal-name">-</span>
                    </div>
                    <div class="data-detail">
                        <span class="data-label">Phone:</span>
                        <span class="data-value" id="modal-phone">-</span>
                    </div>
                    <div class="data-detail">
                        <span class="data-label">Email:</span>
                        <span class="data-value" id="modal-email">-</span>
                    </div>
                    <div class="data-detail">
                        <span class="data-label">State:</span>
                        <span class="data-value" id="modal-state">-</span>
                    </div>
                    <div class="data-detail">
                        <span class="data-label">City:</span>
                        <span class="data-value" id="modal-city">-</span>
                    </div>
                </div>

                <div class="data-section">
                    <div class="data-section-title">Property Details</div>
                    <div class="data-detail">
                        <span class="data-label">Source:</span>
                        <span class="data-value" id="modal-source">-</span>
                    </div>
                    <div class="data-detail">
                        <span class="data-label">Budget:</span>
                        <span class="data-value" id="modal-budget">-</span>
                    </div>
                    <div class="data-detail">
                        <span class="data-label">Property Type:</span>
                        <span class="data-value" id="modal-property-type">-</span>
                    </div>
                    <div class="data-detail">
                        <span class="data-label">Category:</span>
                        <span class="data-value" id="modal-property-category">-</span>
                    </div>
                    <div class="data-detail">
                        <span class="data-label">Sub Category:</span>
                        <span class="data-value" id="modal-property-sub-category">-</span>
                    </div>
                    <div class="data-detail">
                        <span class="data-label">Project:</span>
                        <span class="data-value" id="modal-project-name">-</span>
                    </div>
                </div>

                <div class="data-section">
                    <div class="data-section-title">Additional Information</div>
                    <div class="data-detail">
                        <span class="data-label">Comment:</span>
                        <span class="data-value" id="modal-comment">-</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Comment Modal -->
<div class="modal fade" id="commentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Full Comment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="fullCommentText">
                <!-- Comment will be displayed here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
// View Data Details Modal
document.addEventListener('click', function(event) {
    if (event.target.closest('.view-data-btn')) {
        const btn = event.target.closest('.view-data-btn');
        document.getElementById('modal-name').textContent = btn.dataset.name || '-';
        document.getElementById('modal-phone').textContent = btn.dataset.phone || '-';
        document.getElementById('modal-email').textContent = btn.dataset.email || '-';
        document.getElementById('modal-state').textContent = btn.dataset.state || '-';
        document.getElementById('modal-city').textContent = btn.dataset.city || '-';
        document.getElementById('modal-source').textContent = btn.dataset.source || '-';
        document.getElementById('modal-budget').textContent = btn.dataset.budget || '-';
        document.getElementById('modal-property-type').textContent = btn.dataset.propertyType || '-';
        document.getElementById('modal-property-category').textContent = btn.dataset.propertyCategory || '-';
        document.getElementById('modal-property-sub-category').textContent = btn.dataset.propertySubCategory || '-';
        document.getElementById('modal-project-name').textContent = btn.dataset.projectName || '-';
        document.getElementById('modal-comment').textContent = btn.dataset.comment || '-';
    }
});

// Show full comment
function showComment(dataId) {
    const row = document.querySelector(`[data-id="${dataId}"]`);
    if (row) {
        const comment = row.dataset.comment || 'No comment available';
        document.getElementById('fullCommentText').textContent = comment;
        const commentModal = new bootstrap.Modal(document.getElementById('commentModal'));
        commentModal.show();
    }
}

// Edit Data
function editData(dataId) {
    // Redirect to edit page if route exists
    window.location.href = `/data-center/${dataId}/edit`;
}

// Delete Data
document.addEventListener('click', function(event) {
    if (event.target.closest('.delete-data-btn')) {
        const btn = event.target.closest('.delete-data-btn');
        const dataId = btn.dataset.dataId;
        const dataName = btn.dataset.dataName;
        
        if (confirm(`Are you sure you want to delete "${dataName}"?`)) {
            // Make delete request
            fetch(`/data-center/${dataId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json'
                }
            }).then(response => {
                if (response.ok) {
                    location.reload();
                } else {
                    alert('Error deleting data');
                }
            });
        }
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
</script>

@endsection
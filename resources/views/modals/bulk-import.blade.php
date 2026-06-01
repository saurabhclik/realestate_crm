<style>
    .dataTables_paginate {
        display: block !important;
    }
    
    .import-preview-table {
        max-height: 400px;
        overflow-y: auto;
    }
    
    .summary-card {
        border-left: 4px solid;
        transition: all 0.3s ease;
    }
    
    .summary-card.total {
        border-left-color: #0d6efd;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    }
    
    .summary-card.valid {
        border-left-color: #198754;
        background: linear-gradient(135deg, #d1e7dd 0%, #a3cfbb 100%);
    }
    
    .summary-card.duplicate {
        border-left-color: #ffc107;
        background: linear-gradient(135deg, #fff3cd 0%, #ffe69e 100%);
    }
    
    .summary-card.invalid {
        border-left-color: #dc3545;
        background: linear-gradient(135deg, #f8d7da 0%, #f1aeb5 100%);
    }
    
    .summary-card.warning {
        border-left-color: #fd7e14;
        background: linear-gradient(135deg, #ffe5d0 0%, #ffcba4 100%);
    }
    
    .summary-number {
        font-size: 2rem;
        font-weight: bold;
        line-height: 1;
    }
    
    .badge-status {
        font-size: 0.7rem;
        padding: 4px 8px;
    }
    
    .badge-valid {
        background-color: #198754;
        color: white;
    }
    
    .badge-duplicate {
        background-color: #ffc107;
        color: #000;
    }
    
    .badge-invalid {
        background-color: #dc3545;
        color: white;
    }
    
    .badge-warning {
        background-color: #fd7e14;
        color: white;
    }
    
    .progress-animated {
        background: linear-gradient(90deg, #0d6efd 0%, #0dcaf0 100%);
        animation: shimmer 2s infinite;
    }
    
    @keyframes shimmer {
        0% { opacity: 0.5; }
        50% { opacity: 1; }
        100% { opacity: 0.5; }
    }
</style>

<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fs-4 fw-bold">
                    <i class="bi bi-cloud-arrow-up me-2"></i> Bulk Import Leads
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body p-4">
                <div id="uploadSection">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0 fw-bold">
                                        <i class="bi bi-file-earmark-arrow-down me-2"></i>Download Template
                                    </h6>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <p class="text-muted">Download our pre-formatted CSV template to ensure proper formatting.</p>
                                    <div class="mt-auto">
                                        <a href="{{ asset('sample.csv') }}" download class="btn btn-outline-primary w-100">
                                            <i class="bi bi-download me-2"></i> Download Sample CSV
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0 fw-bold">
                                        <i class="bi bi-upload me-2"></i>Upload Your File
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <form id="uploadForm" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="csv_file" class="form-label fw-semibold">Select CSV File</label>
                                            <div class="file-upload-wrapper">
                                                <input type="file" name="file" id="csv_file" accept=".csv" class="form-control" required>
                                                <div class="invalid-feedback">Please select a valid CSV file.</div>
                                            </div>
                                        </div>
                                        <div class="upload-preview mt-3 text-center d-none" id="filePreview">
                                            <i class="bi bi-file-earmark-text fs-1 text-primary"></i>
                                            <p class="mb-0 fw-semibold" id="fileName"></p>
                                            <small class="text-muted" id="fileSize"></small>
                                        </div>
                                        <button type="button" class="btn btn-primary w-100 mt-3" onclick="previewImport()">
                                            <i class="bi bi-eye me-2"></i> Preview Import
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4 border-0 shadow-sm">
                        <div class="card-header bg-light">
                            <h6 class="mb-0 fw-bold">
                                <i class="bi bi-table me-2"></i>Required CSV Format
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="text-nowrap">Source</th>
                                            <th class="text-nowrap">Campaign </th>
                                            <th class="text-nowrap">Name <span class="text-danger">*</span></th>
                                            <th class="text-nowrap">Phone No.<span class="text-danger">*</span></th>
                                            <th class="text-nowrap">E-mail</th>
                                            <th class="text-nowrap">Alternative No.</th>
                                            <th class="text-nowrap">Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Website</td>
                                            <td>Summer 2023</td>
                                            <td>John Doe</td>
                                            <td>9899999999</td>
                                            <td>john@example.com</td>
                                            <td>9899999999</td>
                                            <td>Punjab Mohali</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <h6 class="fw-bold">Available Sources:</h6>
                                @if(isset($sources) && $sources->count())
                                    <div class="table-responsive">
                                        <table id="sourcesTable" class="table table-striped table-bordered table-hover mb-0" style="width:100%">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Source Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($sources as $source)
                                                    <tr>
                                                        <td>{{ $source->name }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <p class="text-muted fst-italic">No sources available.</p>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <h6 class="fw-bold">Available Campaigns:</h6>
                                @if(isset($campaigns) && $campaigns->count())
                                    <div class="table-responsive">
                                        <table id="bulkCampaignsTable" class="table table-striped table-bordered table-hover mb-0" style="width:100%">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Campaign Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($campaigns as $campaign)
                                                    <tr>
                                                        <td>{{ $campaign->name }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <p class="text-muted fst-italic">No campaigns available.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div id="previewSection" style="display: none;">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-0">
                            <div class="import-preview-table">
                                <table class="table table-bordered table-hover mb-0" id="previewTable">
                                    <thead class="table-light sticky-top">
                                        <tr>
                                            <th><input type="checkbox" id="selectAll" onchange="toggleSelectAll(this)"></th>
                                            <th>#</th>
                                            <th>Status</th>
                                            <th>Source</th>
                                            <th>Campaign</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Alternative No</th>
                                            <th>Address</th>
                                            <th>Error Message</th>
                                        </tr>
                                    </thead>
                                    <tbody id="previewTableBody">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-outline-secondary" onclick="backToUpload()" id="backBtn">
                    <i class="bi bi-arrow-left me-2"></i> Back
                </button>
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle me-2"></i> Cancel
                </button>
                <button type="button" class="btn btn-primary" id="confirmImportBtn" onclick="confirmImport()" style="display: none;">
                    <i class="bi bi-check-circle me-2"></i> Import Valid Records
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    let previewData = [];
    let selectedRows = [];

    document.getElementById('csv_file').addEventListener('change', function(e) 
    {
        const file = e.target.files[0];
        if (file) 
        {
            document.getElementById('fileName').textContent = file.name;
            document.getElementById('fileSize').textContent = formatFileSize(file.size);
            document.getElementById('filePreview').classList.remove('d-none');
        }
    });

    function formatFileSize(bytes) 
    {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }

    function previewImport() 
    {
        const fileInput = document.getElementById('csv_file');
        const file = fileInput.files[0];
        
        if (!file) 
        {
            flasher.error('Please select a CSV file first');
            return;
        }
        
        const formData = new FormData();
        formData.append('file', file);
        formData.append('_token', '{{ csrf_token() }}');
        Swal.fire({
            title: 'Processing...',
            text: 'Validating your data...',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });
        
        $.ajax({
            url: '{{ route("lead.import.preview") }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) 
            {
                Swal.close();
                if (response.success) 
                {
                    previewData = response.data;
                    renderPreview(response);
                    $('#uploadSection').hide();
                    $('#previewSection').show();
                    $('#confirmImportBtn').show();
                } 
                else 
                {
                    flasher.error(response.message);
                }
            },
            error: function(xhr) 
            {
                Swal.close();
                flasher.error('Error processing file: ' + (xhr.responseJSON?.message || 'Unknown error'));
            }
        });
    }

    function renderPreview(response) 
    {
        const data = response.data;
        const stats = response.stats;
        
        // Update summary
        $('#totalRecords').text(stats.total);
        $('#validRecords').text(stats.valid);
        $('#duplicateRecords').text(stats.duplicate);
        $('#invalidRecords').text(stats.invalid);
        
        // Render table
        let html = '';
        data.forEach((row, index) => {
            let statusBadge = '';
            let statusClass = '';
            
            if (row.status === 'valid') {
                statusBadge = '<span class="badge badge-status badge-valid"><i class="bi bi-check-circle me-1"></i>Valid</span>';
                statusClass = 'table-success';
            } else if (row.status === 'duplicate') {
                statusBadge = '<span class="badge badge-status badge-duplicate"><i class="bi bi-files me-1"></i>Duplicate</span>';
                statusClass = 'table-warning';
            } else {
                statusBadge = '<span class="badge badge-status badge-invalid"><i class="bi bi-x-circle me-1"></i>Invalid</span>';
                statusClass = 'table-danger';
            }
            
            html += `
                <tr class="${statusClass}" data-status="${row.status}">
                    <td class="text-center">
                        <input type="checkbox" class="row-selector" data-index="${index}" 
                            ${row.status === 'valid' ? 'checked' : 'disabled'} 
                            onchange="updateSelectedCount()">
                    </td>
                    <td>${index + 1}</td>
                    <td class="text-center">${statusBadge}</td>
                    <td>${escapeHtml(row.source)}</td>
                    <td>${escapeHtml(row.campaign)}</td>
                    <td>${escapeHtml(row.name)}</td>
                    <td>${escapeHtml(row.phone)}</td>
                    <td>${escapeHtml(row.email)}</td>
                    <td>${escapeHtml(row.alternative_phone)}</td>
                    <td>${escapeHtml(row.address)}</td>
                    <td class="text-danger small">${escapeHtml(row.error_message || '')}</td>
                </tr>
            `;
        });
        
        $('#previewTableBody').html(html);
        updateSelectedCount();
    }

    function escapeHtml(text) 
    {
        if (!text) return '-';
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    function toggleSelectAll(checkbox) 
    {
        const isChecked = checkbox.checked;
        $('.row-selector:not(:disabled)').prop('checked', isChecked);
        updateSelectedCount();
    }

    function updateSelectedCount() 
    {
        selectedRows = [];
        $('.row-selector:checked').each(function() {
            selectedRows.push($(this).data('index'));
        });
        
        const count = selectedRows.length;
        $('#confirmImportBtn').html(`<i class="bi bi-check-circle me-2"></i> Import ${count} Selected Records`);
        
        if (count === 0) {
            $('#confirmImportBtn').prop('disabled', true);
        } else {
            $('#confirmImportBtn').prop('disabled', false);
        }
    }

    function confirmImport() 
    {
        if (selectedRows.length === 0) {
            flasher.warning('Please select at least one record to import');
            return;
        }
        
        const selectedData = selectedRows.map(index => previewData[index]);
        
        Swal.fire({
            title: 'Confirm Import',
            html: `
                <div class="text-start">
                    <p>You are about to import <strong>${selectedRows.length}</strong> record(s).</p>
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle"></i>
                        <strong>Summary:</strong><br>
                        ✓ Valid records: ${selectedData.filter(r => r.status === 'valid').length}<br>
                        ⚠ Duplicate records: ${selectedData.filter(r => r.status === 'duplicate').length}<br>
                        ✗ Invalid records will be skipped automatically.
                    </div>
                    <p class="text-muted small">Do you want to proceed?</p>
                </div>
            `,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#198754',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, Import Now',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) 
            {
                processImport(selectedData);
            }
        });
    }

    function processImport(dataToImport) 
    {
        $('#confirmImportBtn')
            .prop('disabled', true)
            .html(`
                <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                Processing...
            `);
        
        let processed = 0;
        let successCount = 0;
        let failedCount = 0;
        let duplicateCount = 0;
        
        function importBatch(batch) 
        {
            $.ajax({
                url: '{{ route("lead.preview.import.process") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    leads: batch
                },
                success: function(response) 
                {
                    processed += batch.length;
                    successCount += response.success_count || 0;
                    failedCount += response.failed_count || 0;
                    duplicateCount += response.duplicate_count || 0;
                    
                    if (processed < dataToImport.length) 
                    {
                        const nextBatch = dataToImport.slice(processed, processed + 50);
                        importBatch(nextBatch);
                    } 
                    else 
                    {
                        completeImport(successCount, failedCount, duplicateCount);
                    }
                },
                error: function(xhr) 
                {
                    failedCount += batch.length;
                    processed += batch.length;
                    if (processed < dataToImport.length) 
                    {
                        const nextBatch = dataToImport.slice(processed, processed + 50);
                        importBatch(nextBatch);
                    } 
                    else 
                    {
                        completeImport(successCount, failedCount, duplicateCount);
                    }
                }
            });
        }
        
        const firstBatch = dataToImport.slice(0, 50);
        importBatch(firstBatch);
    }

    function completeImport(successCount, failedCount, duplicateCount) 
    {
        Swal.fire({
            title: 'Import Complete!',
            html: `
                <div class="text-start">
                    <div class="alert alert-success">
                        <i class="bi bi-check-circle"></i>
                        <strong>Successfully Imported:</strong> ${successCount} records
                    </div>
                    <div class="alert alert-warning">
                        <i class="bi bi-exclamation-triangle"></i>
                        <strong>Duplicates Skipped:</strong> ${duplicateCount} records
                    </div>
                    <div class="alert alert-danger">
                        <i class="bi bi-x-circle"></i>
                        <strong>Failed to Import:</strong> ${failedCount} records
                    </div>
                </div>
            `,
            icon: successCount > 0 ? 'success' : 'error',
            confirmButtonText: 'Close'
        }).then(() => {
            location.reload();
        });
    }

    function backToUpload() 
    {
        $('#uploadSection').show();
        $('#previewSection').hide();
        $('#confirmImportBtn').hide();
        previewData = [];
        selectedRows = [];
    }
</script>
@if(session('user_type') === 'admin')
<div class="modal fade" id="bulkImportModal" tabindex="-1" aria-labelledby="bulkImportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fs-4 fw-bold" id="bulkImportModalLabel">
                    <i class="bi bi-cloud-arrow-up me-2"></i> Bulk Import Data
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-header bg-light">
                                <h6 class="mb-0 fw-bold">
                                    <i class="bi bi-file-earmark-arrow-down me-2"></i> Download Template
                                </h6>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <p class="text-muted">Download the CSV template for bulk data import.</p>
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
                                    <i class="bi bi-upload me-2"></i> Upload Your File
                                </h6>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('data-center.import.upload') }}" enctype="multipart/form-data" id="dataCenterImportForm">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="dataCenterCsvFile" class="form-label fw-semibold">Select CSV File</label>
                                        <input type="file" name="file" id="dataCenterCsvFile" accept=".csv" class="form-control" required onchange="previewDataCenterFile(this)">
                                        <div class="invalid-feedback">Please select a valid CSV file.</div>
                                    </div>
                                    <div class="upload-preview mt-3 d-none" id="dataCenterFilePreview">
                                        <div class="text-center">
                                            <i class="bi bi-file-earmark-text fs-1 text-primary"></i>
                                            <p class="mb-0 fw-semibold" id="dataCenterFileName"></p>
                                            <small class="text-muted" id="dataCenterFileSize"></small>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle me-2"></i> Cancel
                </button>
                <button type="submit" form="dataCenterImportForm" class="btn btn-primary" id="dataCenterSubmitBtn">
                    <span id="dataCenterSubmitText">Upload & Import</span>
                    <span id="dataCenterSubmitSpinner" class="d-none">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Please wait...
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function previewDataCenterFile(input) {
        var file = input.files[0];
        if (!file) {
            document.getElementById('dataCenterFilePreview').classList.add('d-none');
            return;
        }

        document.getElementById('dataCenterFileName').textContent = file.name;
        document.getElementById('dataCenterFileSize').textContent = Math.round(file.size / 1024) + ' KB';
        document.getElementById('dataCenterFilePreview').classList.remove('d-none');
    }

    document.getElementById('dataCenterImportForm').addEventListener('submit', function() {
        var btn = document.getElementById('dataCenterSubmitBtn');
        var text = document.getElementById('dataCenterSubmitText');
        var spinner = document.getElementById('dataCenterSubmitSpinner');
        btn.disabled = true;
        text.classList.add('d-none');
        spinner.classList.remove('d-none');
    });
</script>
@endif
@extends('layouts.app')
@section('title', 'Data Center Actions | Pro-leadexpertz')
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Data Center Actions<div class="border-bottom border-3 border-warning mb-2 mt-1"
                            style="width:8%;"></div>
                    </h4>
                    {{-- <button class="btn btn-warning btn-sm text-dark" data-bs-toggle="modal" data-bs-target="#addModal">
                        <i class="fas fa-plus me-1"></i> Add Action
                    </button> --}}
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="d-flex align-items-center gap-2">
                                    <span>Show</span>
                                    <select id="lengthSelect" class="form-select form-select-sm" style="width:auto;">
                                        @foreach([10, 25, 50, 100] as $len)
                                            <option value="{{ $len }}" {{ $length == $len ? 'selected' : '' }}>{{ $len }}</option>
                                        @endforeach
                                    </select>
                                    <span>entries</span>
                                </label>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered align-middle w-100">
                                    <thead class="table-light">
                                        <tr>
                                            <th width="50">Seq</th>
                                            <th>Display Name (Checkbox Text)</th>
                                            <th>System Name (Code)</th>
                                            <th>Type</th> <!-- ADD THIS -->

                                            <th>Status</th>
                                            <th width="200">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="actionTableBody">
                                        @foreach($actions as $a)
                                            <tr data-id="{{ $a->id }}" style="cursor:move;"
                                                class="{{ !$a->is_active ? 'table-secondary opacity-75' : '' }}">
                                                <td>{{ $a->seq }}</td>
                                                <td><strong>{{ $a->display_name }}</strong></td>
                                                <td><code>{{ $a->system_name }}</code></td>
                                                <td>
                                                    @if($a->type == 'status')
                                                        <span class="badge bg-info">Status</span>
                                                    @else
                                                        <span class="badge bg-primary">Checkbox</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($a->is_active)
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-wrap gap-1">
                                                        <button class="btn btn-sm btn-outline-warning rename-btn"
                                                            data-id="{{ $a->id }}" data-name="{{ $a->display_name }}">
                                                            <i class="fas fa-i-cursor"></i>
                                                        </button>
                                                        <button
                                                            class="btn btn-sm btn-outline-{{ $a->is_active ? 'danger' : 'success' }} toggle-btn"
                                                            data-id="{{ $a->id }}">
                                                            <i class="fas fa-{{ $a->is_active ? 'ban' : 'check' }}"></i>
                                                        </button>
                                                        <button class="btn btn-sm btn-outline-danger delete-btn"
                                                            data-id="{{ $a->id }}">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-end mt-3">
                                {{ $actions->appends(['length' => $length])->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title">Add Action Checkbox</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Checkbox Text <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="add_display" placeholder="e.g. Mark as Converted Lead">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">System Code <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="add_system" placeholder="e.g. CONVERTED">
                        <div class="form-text">Must be unique. Converts to uppercase automatically.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Type <span class="text-danger">*</span></label>
                        <select class="form-select" id="add_type">
                            <option value="checkbox">Checkbox (Converted, Rejected...)</option>
                            <option value="status">Status Dropdown (Pending, Processing...)</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-warning text-dark" onclick="saveAction()">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Rename Modal -->
    <div class="modal fade" id="renameModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title">Rename Action</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="rename_id">
                    <div class="mb-3">
                        <label class="form-label">New Text <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="rename_name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-warning" onclick="submitRename()">Update</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#lengthSelect').on('change', function () {
                window.location.href = '{{ route("data-center-actions.index") }}?length=' + $(this).val();
            });

            $(document).on('click', '.rename-btn', function () {
                $('#rename_id').val($(this).data('id'));
                $('#rename_name').val($(this).data('name'));
                $('#renameModal').modal('show');
            });

            $(document).on('click', '.toggle-btn', function () {
                if (confirm('Change status?')) window.location.href = '{{ route("data-center-actions.toggle", "") }}/' + $(this).data('id');
            });

            $(document).on('click', '.delete-btn', function () {
                let id = $(this).data('id');
                Swal.fire({ title: 'Delete?', icon: 'warning', showCancelButton: true, confirmButtonColor: '#d33' }).then((r) => {
                    if (r.isConfirmed) {
                        $.ajax({ url: '{{ route("data-center-actions.destroy", "") }}/' + id, method: 'DELETE', data: { _token: '{{ csrf_token() }}' }, success: function () { location.reload(); } });
                    }
                });
            });

            new Sortable(document.getElementById('actionTableBody'), {
                animation: 150,
                onEnd: function () {
                    let order = [];
                    $('#actionTableBody tr').each(function () { order.push($(this).data('id')); });
                    $.ajax({ url: '{{ route("data-center-actions.reorder") }}', type: 'POST', data: { _token: '{{ csrf_token() }}', order: order }, success: function () { location.reload(); } });
                }
            });
        });
        function saveAction() {
            let d = $('#add_display').val().trim();
            let s = $('#add_system').val().trim();
            let t = $('#add_type').val(); // ADD THIS
            if (!d || !s) { flasher.error('Fill all fields'); return; }
            $.ajax({
                url: '{{ route("data-center-actions.store") }}', method: 'POST',
                data: { _token: '{{ csrf_token() }}', display_name: d, system_name: s, type: t }, // ADD type: t
                success: function () { location.reload(); },
                error: function (xhr) { flasher.error(xhr.responseJSON?.error || 'Error'); }
            });
        }

        function submitRename() {
            let id = $('#rename_id').val();
            let name = $('#rename_name').val();
            if (!name) { flasher.error('Enter text'); return; }
            $.ajax({
                url: '{{ route("data-center-actions.rename", "") }}/' + id, method: 'POST',
                data: { _token: '{{ csrf_token() }}', display_name: name },
                success: function (res) { if (res.success) location.reload(); },
                error: function (xhr) { flasher.error(xhr.responseJSON?.error || 'Error'); }
            });
        }
    </script>
@endsection
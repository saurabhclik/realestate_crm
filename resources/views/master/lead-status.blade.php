@extends('layouts.app')

@section('title', 'Lead Status | Pro-leadexpertz')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-12">
                <h4 class="mb-0">Lead Status<div class="border-bottom border-3 border-primary mb-2 mt-1" style="width:8%;"></div></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-12">

                <div class="card">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-title mb-0">Lead Statuses</h4>
                        </div>
                        <div class="mb-3">

                            <label class="d-flex align-items-center gap-2">

                                <span>Show</span>

                                <select id="lengthSelect"
                                    class="form-select form-select-sm"
                                    style="width:auto;">

                                    @foreach([10,25,50,100,500] as $len)

                                        <option value="{{ $len }}"
                                            {{ $length == $len ? 'selected' : '' }}>

                                            {{ $len }}

                                        </option>

                                    @endforeach

                                </select>

                                <span>entries</span>

                            </label>

                        </div>

                        <div class="table-responsive">

                            <table id="table"
                                class="table table-hover table-bordered align-middle w-100">

                                <thead class="table-light">

                                    <tr>
                                        <th>ID</th>
                                        <th>Status Name</th>
                                        <th>Sequence</th>
                                        <th>Status</th>
                                        <th>Used in Leads</th>
                                        <th width="260">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="statusTableBody">
                                    @php
                                        $leadStatusCount = 0;
                                    @endphp
                                    @foreach($statuses as $key => $status)
                                    @php 
                                        $leadStatusCount = $leads->filter(function ($lead) use ($status) 
                                        {
                                            return $lead->status == $status->system_name ||
                                                $lead->conversion_type == $status->system_name;
                                        })->count();
                                    @endphp
                                        <tr data-id="{{ $status->id }}" style="cursor: move;" class="{{ !$status->is_active ? 'table-secondary opacity-75' : '' }}">
                                            <td>{{ $status->id }}</td>
                                            <td>
                                                {{ $status->display_name }}
                                            </td>
                                            <td>
                                                {{ $status->seq }}
                                            </td>
                                            <td>
                                                @if($status->is_active)
                                                    <span class="badge bg-success">
                                                        Active
                                                    </span>
                                                @else
                                                    <span class="badge bg-danger">
                                                        Inactive
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($leadStatusCount > 0)
                                                    <span class="badge bg-info">
                                                        {{ $leadStatusCount }} leads
                                                    </span>
                                                @else
                                                    <span class="text-muted">
                                                        0 leads
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex flex-wrap gap-1">
                                                    <button class="btn btn-sm btn-outline-warning rename-btn"
                                                        data-id="{{ $status->id }}"
                                                        data-name="{{ $status->display_name }}">
                                                        <i class="fas fa-i-cursor"></i>
                                                        Rename
                                                    </button>
                                                    {{-- <button class="btn btn-sm btn-outline-secondary seq-btn"
                                                        data-id="{{ $status->id }}"
                                                        data-seq="{{ $status->seq }}"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#sequenceModal">
                                                        <i class="fas fa-sort-numeric-down"></i>
                                                    </button> --}}
                                                    <button class="btn btn-sm btn-outline-danger toggle-active"
                                                        data-id="{{ $status->id }}">
                                                        <i class="fas fa-ban"></i>
                                                        {{ $status->is_active ? 'Inactive' : 'Activate' }}
                                                    </button>
                                                    <!-- @if($status->used_count == 0)
                                                        <button class="btn btn-sm btn-outline-danger"
                                                            onclick="deleteStatus({{ $status->id }})">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    @endif -->
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-end mt-3">
                            {{ $statuses->appends(['length' => $length])->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="sequenceModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title">
                    <i class="fas fa-sort-numeric-down"></i>
                    Update Sequence
                </h5>
                <button type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="seq_id">
                <div class="mb-3">
                    <label class="form-label">
                        Sequence Number
                    </label>
                    <input type="number"
                        class="form-control"
                        id="seq_value"
                        required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">
                    Cancel
                </button>
                <button type="button"
                    class="btn btn-primary"
                    id="sequenceBtn"
                    onclick="updateSequence()">
                    <span class="btn-text">
                        Update Sequence
                    </span>
                    <span class="spinner-border spinner-border-sm d-none"
                        role="status"></span>
                    <span class="loading-text d-none">
                        Please Wait...
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="renameModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title">
                    <i class="fas fa-i-cursor"></i>
                    Rename Status
                </h5>
                <button type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="rename_id">
                <div class="mb-3">
                    <label class="form-label">
                        New Status Name
                    </label>
                    <input type="text"
                        class="form-control"
                        id="rename_name"
                        required
                        placeholder="Enter new name">
                </div>
            </div>

            <div class="modal-footer">
                <button type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">
                    Cancel
                </button>
                <button type="button"
                    class="btn btn-warning"
                    id="renameBtn"
                    onclick="submitRename()">
                    <span class="btn-text">
                        Rename
                    </span>
                    <span class="spinner-border spinner-border-sm d-none"
                        role="status"></span>
                    <span class="loading-text d-none">
                        Please Wait...
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>

<form id="deleteForm" method="POST" style="display:none;">
    @csrf
    @method('DELETE')
</form>

<script>
    $(document).ready(function () 
    {
        $('#lengthSelect').on('change', function () 
        {
            window.location.href =
                '{{ route("lead-status.index") }}?length=' + $(this).val();

        });

        $('.rename-btn').on('click', function () 
        {
            $('#rename_id').val($(this).data('id'));
            $('#rename_name').val($(this).data('name'));
            $('#renameModal').modal('show');
        });

        $('.seq-btn').on('click', function () 
        {
            $('#seq_id').val($(this).data('id'));
            $('#seq_value').val($(this).data('seq'));
        });

        $('.toggle-active').on('click', function () 
        {
            let id = $(this).data('id');
            if(confirm('Are you sure you want to change status visibility?')) 
            {
                window.location.href =
                    '{{ route("lead-status.toggle", "") }}/' + id;
            }
        });
    });

    function startButtonLoader(buttonId)
    {
        let btn = $('#' + buttonId);
        btn.prop('disabled', true);
        btn.find('.btn-text').addClass('d-none');
        btn.find('.spinner-border').removeClass('d-none');
        btn.find('.loading-text').removeClass('d-none');
    }

    function stopButtonLoader(buttonId)
    {
        let btn = $('#' + buttonId);
        btn.prop('disabled', false);
        btn.find('.btn-text').removeClass('d-none');
        btn.find('.spinner-border').addClass('d-none');
        btn.find('.loading-text').addClass('d-none');
    }

    function submitRename()
    {
        let id   = $('#rename_id').val();
        let name = $('#rename_name').val();
        if(name == '')
        {
            flasher.error('Please enter status name');
            return;
        }
        startButtonLoader('renameBtn');
        $.ajax({
            url: '{{ route("lead-status.rename", "") }}/' + id,
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                display_name: name
            },

            success: function (response) 
            {
                stopButtonLoader('renameBtn');
                if (response.success) 
                {
                    flasher.success('Status renamed successfully');
                    setTimeout(function () 
                    {
                        location.reload();
                    }, 1000);
                }
            },

            error: function (xhr) 
            {
                stopButtonLoader('renameBtn');
                flasher.error(
                    xhr.responseJSON?.error || 'Something went wrong'
                );
            }
        });
    }

    function updateSequence()
    {
        let id  = $('#seq_id').val();
        let seq = $('#seq_value').val();
        startButtonLoader('sequenceBtn');
        $.ajax({
            url: '{{ route("lead-status.update-sequence", "") }}/' + id,
            method: 'PUT',
            data: {
                _token: '{{ csrf_token() }}',
                seq: seq
            },

            success: function (response) 
            {
                stopButtonLoader('sequenceBtn');
                if (response.success) 
                {
                    flasher.success('Sequence updated successfully');
                    setTimeout(function () 
                    {
                        location.reload();
                    }, 1000);
                }
            },
            error: function (xhr) 
            {
                stopButtonLoader('sequenceBtn');
                flasher.error(
                    xhr.responseJSON?.error || 'Something went wrong'
                );

            }

        });
    }

    function deleteStatus(id)
    {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {

            if (result.isConfirmed)
            {
                let form = $('#deleteForm');

                form.attr(
                    'action',
                    '{{ route("lead-status.destroy", "") }}/' + id
                );

                form.submit();
            }

        });
    }

        var el = document.getElementById('statusTableBody');
    var sortable = new Sortable(el, {
        animation: 150,
        onEnd: function (evt) {
            var order = [];
            $('#statusTableBody tr').each(function() {
                order.push($(this).data('id'));
            });
            
            $.ajax({
                url: '{{ route('lead-status.reorder') }}',
                type: 'POST',
                data: { _token: '{{ csrf_token() }}', order: order },
                success: function(res) {
                    flasher.success('Updated');
                    setTimeout(() => location.reload(), 500);
                }
            });
        }
    });
</script>
@endsection
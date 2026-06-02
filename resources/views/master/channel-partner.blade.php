@extends('layouts.app')

@section('title', 'Channel Partner Master | Pro-leadexpertz')

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-12 d-flex justify-content-between align-items-center">

                <h4 class="mb-0">
                    Channel Partner Master
                </h4>

                <button class="btn btn-primary btn-small px-4 py-1 rounded-pill fw-bold text-white shadow-lg add-project"
                    data-bs-toggle="modal"
                    data-bs-target="#channelPartnerModal">

                    <i class="fa fa-plus"></i> Add Channel Partner

                </button>

            </div>
        </div>

        <div class="row">
            <div class="col-12">

                <div class="card">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center mb-4">

                            <h4 class="card-title mb-0">
                                Channel Partner
                            </h4>

                        </div>

                        <div class="mb-3">

                            <label>

                                Show

                                <select id="lengthSelect"
                                    class="form-select form-select-sm"
                                    style="width:auto; display:inline-block;">

                                    @foreach([10,25,50,100,500] as $len)

                                    <option
                                        value="{{ $len }}"
                                        {{ $length == $len ? 'selected' : '' }}>

                                        {{ $len }}

                                    </option>

                                    @endforeach

                                </select>

                                entries

                            </label>

                        </div>

                        <!-- Table -->
                        <div class="table-responsive">

                            <table id="table"
                                class="table table-hover table-bordered dt-responsive nowrap w-100">

                                <thead class="table-light">

                                    <tr>

                                        <th>S.No</th>

                                        <th>Name</th>

                                        <th>Email</th>

                                        <th>Phone</th>

                                        <th>Company</th>

                                        <th>Status</th>

                                        <th width="100">
                                            Action
                                        </th>

                                    </tr>

                                </thead>

                                <tbody>

                                    @if($channelPartners->count())

                                    @foreach($channelPartners as $partner)

                                    <tr>

                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>
                                            {{ $partner->name }}
                                        </td>

                                        <td>
                                            {{ $partner->email }}
                                        </td>

                                        <td>
                                            {{ $partner->phone }}
                                        </td>

                                        <td>
                                            {{ $partner->company_name }}
                                        </td>

                                        <td>

                                            <span class="badge bg-{{ $partner->status == 'active' ? 'success' : 'danger' }}">

                                                {{ ucfirst($partner->status) }}

                                            </span>

                                        </td>

                                        <td>

                                            <button class="btn btn-sm btn-outline-primary edit-btn"

                                                data-id="{{ $partner->id }}"
                                                data-name="{{ $partner->name }}"
                                                data-email="{{ $partner->email }}"
                                                data-phone="{{ $partner->phone }}"
                                                data-company_name="{{ $partner->company_name }}"
                                                data-address="{{ $partner->address }}"
                                                data-gst_number="{{ $partner->gst_number }}"
                                                data-pan_number="{{ $partner->pan_number }}"
                                                data-status="{{ $partner->status }}"

                                                data-action="{{ route('channel.partner.update', $partner->id) }}"

                                                data-bs-toggle="modal"
                                                data-bs-target="#channelPartnerModal">

                                                <i class="fas fa-edit"></i>

                                            </button>

                                        </td>

                                    </tr>

                                    @endforeach

                                    @endif

                                </tbody>

                            </table>

                        </div>

                        <div class="d-flex justify-content-end mt-3">

                            {!! $channelPartners->links('pagination::bootstrap-5') !!}

                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="channelPartnerModal" tabindex="-1" aria-labelledby="channelPartnerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">

            <form method="POST" action="{{ route('channel.partner.store') }}">
                @csrf
                <input type="hidden" name="_method" value="">

                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="channelPartnerModalLabel">
                            Add Channel Partner
                        </h5>

                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Name <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Email
                                </label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Phone
                                </label>
                                <input type="text" name="phone" class="form-control" placeholder="Enter Phone">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Company Name
                                </label>
                                <input type="text" name="company_name" class="form-control" placeholder="Enter Company Name">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">
                                    Address
                                </label>
                                <textarea name="address" class="form-control" rows="3" placeholder="Enter Address"></textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    GST Number
                                </label>
                                <input type="text" name="gst_number" class="form-control" placeholder="Enter GST Number">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    PAN Number
                                </label>
                                <input type="text" name="pan_number" class="form-control" placeholder="Enter PAN Number">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Status
                                </label>
                                <select name="status" class="form-control">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>

                        </div>

                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                            Cancel
                        </button>

                        <button type="submit" class="btn btn-gradient-primary">
                            Save
                        </button>

                    </div>

                </div>

            </form>

        </div>
    </div>
</div>

<script>

    $(document).ready(function() {

        $('.edit-btn').on('click', function() {

            let modal = $('#channelPartnerModal');

            modal.find('form').attr(
                'action',
                $(this).data('action')
            );

            modal.find('input[name=_method]').val('PUT');

            modal.find('input[name=name]').val(
                $(this).data('name')
            );

            modal.find('input[name=email]').val(
                $(this).data('email')
            );

            modal.find('input[name=phone]').val(
                $(this).data('phone')
            );

            modal.find('input[name=company_name]').val(
                $(this).data('company_name')
            );

            modal.find('textarea[name=address]').val(
                $(this).data('address')
            );

            modal.find('input[name=gst_number]').val(
                $(this).data('gst_number')
            );

            modal.find('input[name=pan_number]').val(
                $(this).data('pan_number')
            );

            modal.find('select[name=status]').val(
                $(this).data('status')
            );

            modal.find('.modal-title').text(
                'Edit Channel Partner'
            );

        });

        $('#channelPartnerModal').on('hidden.bs.modal', function() {

            $(this).find('form')[0].reset();

            $(this).find('input[name=_method]').val('');

            $(this).find('.modal-title').text(
                'Add Channel Partner'
            );

            $(this).find('form').attr(
                'action',
                "{{ route('channel.partner.store') }}"
            );

        });

        $('#lengthSelect').on('change', function() {

            let length = $(this).val();

            let url = new URL(window.location.href);

            url.searchParams.set('length', length);

            window.location.href = url.toString();

        });

    });
    
</script>

@endsection
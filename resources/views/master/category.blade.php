@extends('layouts.app')

@section('title', 'Category Master | Pro-leadexpertz')
@section('title', session('software_type') ===
'lead_management' ? 'Product Category |
Pro-leadexpertz' : 'Category | Pro-leadexpertz')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="row mb-3">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Category Master</h4>
                <!-- <button class="btn btn-gradient-primary" data-bs-toggle="modal" data-bs-target="#categoryModal"
                    data-action="{{ route('category.store') }}" data-type="Add" data-modal="Category">
                    <i class="fas fa-plus"></i> Add Category
                </button> -->
                <button class="btn btn-primary btn-small px-4 py-1 rounded-pill fw-bold text-white shadow-lg add-project"
                    data-bs-toggle="modal"
                    data-bs-target="#categoryModal"
                    data-action="{{ route('category.store') }}"
                    data-type="Create"
                    data-modal="Category">
                    <i class="fa fa-plus"></i> Add Category
                </button>
            </div>
        </div>


        <!-- Table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-title mb-0">Category</h4>
                        </div>

                        <!-- Length Dropdown -->
                        <div class="mb-0">
                            <label>
                                Show
                                <select id="lengthSelect" class="form-select form-select-sm" style="width:auto; display:inline-block;">
                                    @foreach([10,25,50,100,500] as $len)
                                    <option value="{{ $len }}" {{ $length == $len ? 'selected' : '' }}>{{ $len }}</option>
                                    @endforeach
                                </select>
                                entries
                            </label>
                        </div>


                        <div class="table-responsive">
                            <table id="table" class="table table-hover table-bordered dt-responsive nowrap w-100">
                                <thead class="table-light">
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th width="100">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($categories->count())
                                    @foreach($categories as $cat)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $cat->name }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary edit-btn"
                                                data-id="{{ $cat->id }}"
                                                data-name="{{ $cat->name }}"
                                                data-action="{{ route('update.category', $cat->id) }}"
                                                data-bs-toggle="modal"
                                                data-bs-target="#categoryModal">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-end mt-3">
                            {!! $categories->links('pagination::bootstrap-5') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @include('modals.category')
</div>

<script>
    $(document).ready(function() {
        $('.edit-btn').on('click', function() {
            let modal = $('#categoryModal');
            modal.find('form').attr('action', $(this).data('action'));
            modal.find('input[name=name]').val($(this).data('name'));
            modal.find('input[name=_method]').val('PUT');
            modal.find('.modal-title').text('Edit Category');
        });
        $('#categoryModal').on('hidden.bs.modal', function() {
            $(this).find('form')[0].reset();
            $(this).find('input[name=_method]').val('');
            $(this).find('.modal-title').text('Add Category');
            $(this).find('form').attr('action', "{{ route('category.store') }}");
        });
    });
</script>
@endsection
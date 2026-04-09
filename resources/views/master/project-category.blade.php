@extends('layouts.app')

@section('title', session('software_type') === 'lead_management' 
? 'Product Category | Pro-leadexpertz' : 'Project Category | Pro-leadexpertz')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">{{ session('software_type') === 'lead_management' ? 'Product Category' : 'Project Category' }}</h4>
                    <button class="btn btn-primary btn-small px-4 py-1 rounded-pill fw-bold text-white shadow-lg add-project"
                        data-bs-toggle="modal"
                        data-bs-target="#Modalbox"
                        data-action="{{ route('project_category.store') }}"
                        data-type="Create"
                        data-modal="Category">
                        <i class="fa fa-plus"></i> Add
                    </button>
                </div>
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
                                        <th>
                                            <a href="{{ request()->fullUrlWithQuery([
                                                'sort' => 'type', 
                                                'direction' => request('direction') === 'asc' ? 'desc' : 'asc'
                                            ]) }}">
                                                Type
                                                @if(request('sort') == 'type')
                                                @if(request('direction') === 'asc')
                                                <i class="fas fa-sort-up"></i>
                                                @else
                                                <i class="fas fa-sort-down"></i>
                                                @endif
                                                @endif
                                            </a>
                                        </th>
                                        <th>
                                            <a href="{{ request()->fullUrlWithQuery([
                                                'sort' => 'name', 
                                                'direction' => request('direction') === 'asc' ? 'desc' : 'asc'
                                            ]) }}">
                                                Name
                                                @if(request('sort') == 'name')
                                                @if(request('direction') === 'asc')
                                                <i class="fas fa-sort-up"></i>
                                                @else
                                                <i class="fas fa-sort-down"></i>
                                                @endif
                                                @endif
                                            </a>
                                        </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($categories->count())
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration + ($categories->currentPage()-1) * $categories->perPage() }}</td>
                                        <td>{{ $category->type }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <button
                                                    class="btn btn-sm btn-outline-primary edit-btn"
                                                    data-id="{{ $category->id }}"
                                                    data-type="{{ $category->type }}"
                                                    data-name="{{ $category->name }}"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#Modalbox"
                                                    data-action="{{ url('project-category/update') }}"
                                                    data-type="Update"
                                                    data-modal="Project">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="4" class="text-center">No categories found.</td>
                                    </tr>
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

    @include('modals.master')
</div>
<script>
    document.getElementById('lengthSelect').addEventListener('change', function() {
        const url = new URL(window.location.href);
        url.searchParams.set('length', this.value);
        window.location.href = url.toString();
    });
</script>
@endsection
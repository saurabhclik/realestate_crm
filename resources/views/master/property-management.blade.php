@extends('layouts.app')

@section('title', 'Property Management | Pro-leadexpertz')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">
                        Property Management
                        <div class="border-bottom border-3 border-primary mb-2 mt-1 w-75"></div>
                    </h4>
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-tabs nav-tabs-custom mb-3" id="propertyTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="property-type-tab" data-bs-toggle="tab" data-bs-target="#property-type" type="button" role="tab">
                            <i class="fas fa-tags me-1"></i> Property Types
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="category-tab" data-bs-toggle="tab" data-bs-target="#category" type="button" role="tab">
                            <i class="fas fa-folder me-1"></i> Categories
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="sub-category-tab" data-bs-toggle="tab" data-bs-target="#sub-category" type="button" role="tab">
                            <i class="fas fa-folder-open me-1"></i> Sub Categories
                        </button>
                    </li>
                </ul>

                <div class="tab-content" id="propertyTabsContent">
                    <!-- Property Types Tab (inv_catg) -->
                    <div class="tab-pane fade show active" id="property-type" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h4 class="card-title mb-0">Property Types</h4>
                                    <button class="btn btn-primary btn-sm px-4 py-1 rounded-pill fw-bold"
                                        data-bs-toggle="modal"
                                        data-bs-target="#propertyTypeModal"
                                        onclick="openPropertyTypeModal('create')">
                                        <i class="fa fa-plus"></i> Add Property Type
                                    </button>
                                </div>

                                <div class="mb-3">
                                    <label>Show
                                        <select id="typeLengthSelect" class="form-select form-select-sm d-inline-block w-auto">
                                            @foreach([10,25,50,100] as $len)
                                            <option value="{{ $len }}" {{ $typeLength == $len ? 'selected' : '' }}>{{ $len }}</option>
                                            @endforeach
                                        </select>
                                        entries
                                    </label>
                                    <div class="float-end">
                                        <input type="text" id="typeSearch" class="form-control form-control-sm" placeholder="Search..." value="{{ request('type_search') }}">
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <thead class="table-light">
                                            <tr>
                                                <th>S.No</th>
                                                <th>
                                                    <a href="javascript:void(0)" onclick="sortTypes('id')">
                                                        ID
                                                        @if(request('type_sort') == 'id')
                                                        <i class="fas fa-sort-{{ request('type_direction') == 'asc' ? 'up' : 'down' }}"></i>
                                                        @endif
                                                    </a>
                                                </th>
                                                <th>
                                                    <a href="javascript:void(0)" onclick="sortTypes('type')">
                                                        Type Name
                                                        @if(request('type_sort') == 'type')
                                                        <i class="fas fa-sort-{{ request('type_direction') == 'asc' ? 'up' : 'down' }}"></i>
                                                        @endif
                                                    </a>
                                                </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="propertyTypesTable">
                                            @include('partial.property-types-table', ['propertyTypes' => $propertyTypes])
                                        </tbody>
                                    </table>
                                </div>
                                <div id="propertyTypesPagination">
                                    {{ $propertyTypes->appends(['type_search' => request('type_search'), 'type_sort' => request('type_sort'), 'type_direction' => request('type_direction')])->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Categories Tab (category table) -->
                    <div class="tab-pane fade" id="category" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h4 class="card-title mb-0">Categories</h4>
                                    <button class="btn btn-primary btn-sm px-4 py-1 rounded-pill fw-bold"
                                        data-bs-toggle="modal"
                                        data-bs-target="#categoryModal"
                                        onclick="openCategoryModal('create')">
                                        <i class="fa fa-plus"></i> Add Category
                                    </button>
                                </div>

                                <div class="mb-3">
                                    <label>Show
                                        <select id="catLengthSelect" class="form-select form-select-sm d-inline-block w-auto">
                                            @foreach([10,25,50,100] as $len)
                                            <option value="{{ $len }}" {{ $catLength == $len ? 'selected' : '' }}>{{ $len }}</option>
                                            @endforeach
                                        </select>
                                        entries
                                    </label>
                                    <div class="float-end">
                                        <input type="text" id="catSearch" class="form-control form-control-sm" placeholder="Search..." value="{{ request('cat_search') }}">
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <thead class="table-light">
                                            <tr>
                                                <th>S.No</th>
                                                <th>
                                                    <a href="javascript:void(0)" onclick="sortCategories('id')">
                                                        ID
                                                        @if(request('cat_sort') == 'id')
                                                        <i class="fas fa-sort-{{ request('cat_direction') == 'asc' ? 'up' : 'down' }}"></i>
                                                        @endif
                                                    </a>
                                                </th>
                                                <th>
                                                    <a href="javascript:void(0)" onclick="sortCategories('name')">
                                                        Category Name
                                                        @if(request('cat_sort') == 'name')
                                                        <i class="fas fa-sort-{{ request('cat_direction') == 'asc' ? 'up' : 'down' }}"></i>
                                                        @endif
                                                    </a>
                                                </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="categoriesTable">
                                            @include('partial.categories-table', ['categories' => $categories])
                                        </tbody>
                                    </table>
                                </div>
                                <div id="categoriesPagination">
                                    {{ $categories->appends(['cat_search' => request('cat_search'), 'cat_sort' => request('cat_sort'), 'cat_direction' => request('cat_direction')])->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sub Categories Tab (inv_subcatg) -->
                    <div class="tab-pane fade" id="sub-category" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h4 class="card-title mb-0">Sub Categories</h4>
                                    <button class="btn btn-primary btn-sm px-4 py-1 rounded-pill fw-bold"
                                        data-bs-toggle="modal"
                                        data-bs-target="#subCategoryModal"
                                        onclick="openSubCategoryModal('create')">
                                        <i class="fa fa-plus"></i> Add Sub Category
                                    </button>
                                </div>

                                <div class="mb-3">
                                    <label>Show
                                        <select id="subLengthSelect" class="form-select form-select-sm d-inline-block w-auto">
                                            @foreach([10,25,50,100] as $len)
                                            <option value="{{ $len }}" {{ $subLength == $len ? 'selected' : '' }}>{{ $len }}</option>
                                            @endforeach
                                        </select>
                                        entries
                                    </label>
                                    <div class="float-end">
                                        <input type="text" id="subSearch" class="form-control form-control-sm" placeholder="Search..." value="{{ request('sub_search') }}">
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <thead class="table-light">
                                            <tr>
                                                <th>S.No</th>
                                                <th>
                                                    <a href="javascript:void(0)" onclick="sortSubCategories('id')">
                                                        ID
                                                        @if(request('sub_sort') == 'id')
                                                        <i class="fas fa-sort-{{ request('sub_direction') == 'asc' ? 'up' : 'down' }}"></i>
                                                        @endif
                                                    </a>
                                                </th>
                                                <th>
                                                    <a href="javascript:void(0)" onclick="sortSubCategories('type')">
                                                        Property Type
                                                        @if(request('sub_sort') == 'type')
                                                        <i class="fas fa-sort-{{ request('sub_direction') == 'asc' ? 'up' : 'down' }}"></i>
                                                        @endif
                                                    </a>
                                                </th>
                                                <th>
                                                    <a href="javascript:void(0)" onclick="sortSubCategories('cat_name')">
                                                        Category Name
                                                        @if(request('sub_sort') == 'cat_name')
                                                        <i class="fas fa-sort-{{ request('sub_direction') == 'asc' ? 'up' : 'down' }}"></i>
                                                        @endif
                                                    </a>
                                                </th>
                                                <th>
                                                    <a href="javascript:void(0)" onclick="sortSubCategories('name')">
                                                        Sub Category Name
                                                        @if(request('sub_sort') == 'name')
                                                        <i class="fas fa-sort-{{ request('sub_direction') == 'asc' ? 'up' : 'down' }}"></i>
                                                        @endif
                                                    </a>
                                                </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="subCategoriesTable">
                                            @include('partial.sub-categories-table', ['subCategories' => $subCategories])
                                        </tbody>
                                    </table>
                                </div>
                                <div id="subCategoriesPagination">
                                    {{ $subCategories->appends(['sub_search' => request('sub_search'), 'sub_sort' => request('sub_sort'), 'sub_direction' => request('sub_direction')])->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Property Type Modal -->
    <div class="modal fade" id="propertyTypeModal" tabindex="-1">
        <div class="modal-dialog">
            <form method="POST" id="propertyTypeForm" action="{{ route('property.type.store') }}">
                @csrf
                <input type="hidden" name="id" id="property_type_id">
                <input type="hidden" name="_method" id="property_type_method" value="POST">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="propertyTypeModalLabel">Add Property Type</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Type Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" id="property_type_name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="propertyTypeSubmitBtn">Create</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Category Modal -->
    <div class="modal fade" id="categoryModal" tabindex="-1">
        <div class="modal-dialog">
            <form method="POST" id="categoryForm" action="{{ route('category.store') }}">
                @csrf
                <input type="hidden" name="id" id="category_id">
                <input type="hidden" name="_method" id="category_method" value="POST">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="categoryModalLabel">Add Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Category Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" id="category_name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="categorySubmitBtn">Create</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Sub Category Modal -->
    <div class="modal fade" id="subCategoryModal" tabindex="-1">
        <div class="modal-dialog">
            <form method="POST" id="subCategoryForm" action="{{ route('property.subcategory.store') }}">
                @csrf
                <input type="hidden" name="id" id="sub_category_id">
                <input type="hidden" name="_method" id="sub_category_method" value="POST">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="subCategoryModalLabel">Add Sub Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Property Type <span class="text-danger">*</span></label>
                            <select class="form-control select2" name="catg_id" id="sub_category_catg_id" required>
                                <option value="">-- Select Property Type --</option>
                                @foreach($propertyTypes as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Sub Category Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" id="sub_category_name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="subCategorySubmitBtn">Create</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// ==================== Property Types ====================
function sortTypes(column) {
    let url = new URL(window.location.href);
    url.searchParams.set('type_sort', column);
    let currentDir = url.searchParams.get('type_direction');
    url.searchParams.set('type_direction', currentDir === 'asc' ? 'desc' : 'asc');
    window.location.href = url.toString();
}

function openPropertyTypeModal(action, data = null) {
    if (action === 'edit' && data) {
        $('#propertyTypeModalLabel').text('Edit Property Type');
        $('#property_type_id').val(data.id);
        $('#property_type_name').val(data.name);
        $('#property_type_method').val('PUT');
        $('#propertyTypeForm').attr('action', '/property-type/update/' + data.id);
        $('#propertyTypeSubmitBtn').text('Update');
    } else {
        $('#propertyTypeModalLabel').text('Add Property Type');
        $('#property_type_id').val('');
        $('#property_type_name').val('');
        $('#property_type_method').val('POST');
        $('#propertyTypeForm').attr('action', '{{ route("property.type.store") }}');
        $('#propertyTypeSubmitBtn').text('Create');
    }
}

$(document).ready(function() {
    // Length change handlers
    $('#typeLengthSelect').change(function() {
        let url = new URL(window.location.href);
        url.searchParams.set('type_length', this.value);
        window.location.href = url.toString();
    });

    $('#catLengthSelect').change(function() {
        let url = new URL(window.location.href);
        url.searchParams.set('cat_length', this.value);
        window.location.href = url.toString();
    });

    $('#subLengthSelect').change(function() {
        let url = new URL(window.location.href);
        url.searchParams.set('sub_length', this.value);
        window.location.href = url.toString();
    });

    // Search handlers
    let typeSearchTimeout;
    $('#typeSearch').on('keyup', function() {
        clearTimeout(typeSearchTimeout);
        typeSearchTimeout = setTimeout(() => {
            let url = new URL(window.location.href);
            url.searchParams.set('type_search', this.value);
            window.location.href = url.toString();
        }, 500);
    });

    let catSearchTimeout;
    $('#catSearch').on('keyup', function() {
        clearTimeout(catSearchTimeout);
        catSearchTimeout = setTimeout(() => {
            let url = new URL(window.location.href);
            url.searchParams.set('cat_search', this.value);
            window.location.href = url.toString();
        }, 500);
    });

    let subSearchTimeout;
    $('#subSearch').on('keyup', function() {
        clearTimeout(subSearchTimeout);
        subSearchTimeout = setTimeout(() => {
            let url = new URL(window.location.href);
            url.searchParams.set('sub_search', this.value);
            window.location.href = url.toString();
        }, 500);
    });
});

// ==================== Categories ====================
function sortCategories(column) {
    let url = new URL(window.location.href);
    url.searchParams.set('cat_sort', column);
    let currentDir = url.searchParams.get('cat_direction');
    url.searchParams.set('cat_direction', currentDir === 'asc' ? 'desc' : 'asc');
    window.location.href = url.toString();
}

function openCategoryModal(action, data = null) {
    if (action === 'edit' && data) {
        $('#categoryModalLabel').text('Edit Category');
        $('#category_id').val(data.id);
        $('#category_name').val(data.name);
        $('#category_method').val('PUT');
        $('#categoryForm').attr('action', '/category/update/' + data.id);
        $('#categorySubmitBtn').text('Update');
    } else {
        $('#categoryModalLabel').text('Add Category');
        $('#category_id').val('');
        $('#category_name').val('');
        $('#category_method').val('POST');
        $('#categoryForm').attr('action', '{{ route("category.store") }}');
        $('#categorySubmitBtn').text('Create');
    }
}

// ==================== Sub Categories ====================
function sortSubCategories(column) {
    let url = new URL(window.location.href);
    url.searchParams.set('sub_sort', column);
    let currentDir = url.searchParams.get('sub_direction');
    url.searchParams.set('sub_direction', currentDir === 'asc' ? 'desc' : 'asc');
    window.location.href = url.toString();
}

function openSubCategoryModal(action, data = null) {
    if (action === 'edit' && data) {
        $('#subCategoryModalLabel').text('Edit Sub Category');
        $('#sub_category_id').val(data.id);
        $('#sub_category_name').val(data.name);
        $('#sub_category_catg_id').val(data.catg_id).trigger('change');
        $('#sub_category_method').val('PUT');
        $('#subCategoryForm').attr('action', '/property-subcategory/update/' + data.id);
        $('#subCategorySubmitBtn').text('Update');
    } else {
        $('#subCategoryModalLabel').text('Add Sub Category');
        $('#sub_category_id').val('');
        $('#sub_category_name').val('');
        $('#sub_category_catg_id').val('').trigger('change');
        $('#sub_category_method').val('POST');
        $('#subCategoryForm').attr('action', '{{ route("property.subcategory.store") }}');
        $('#subCategorySubmitBtn').text('Create');
    }
}
</script>
@endsection
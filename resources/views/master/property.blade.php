@extends('layouts.app')

@section('title', session('software_type') === 'lead_management' ? 'Product Name | Pro-leadexpertz' : 'Property Master | Pro-leadexpertz')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">
                        {{ session('software_type') === 'lead_management' ? 'Manage Product' : 'Property Master' }}
                    </h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">
                                <a href="javascript:void(0);">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">
                                {{ session('software_type') === 'lead_management' ? 'Products' : 'Properties' }}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        @if(session('software_type') !== 'lead_management')
        <div class="row mb-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="GET" action="{{ route('property.name') }}" class="row g-3">
                            <div class="col-md-2">
                                <label class="form-label">From Date</label>
                                <input type="date" name="from_date" class="form-control" value="{{ request('from_date') }}">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">To Date</label>
                                <input type="date" name="to_date" class="form-control" value="{{ request('to_date') }}">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Property Size</label>
                                <select name="size" class="form-select">
                                    <option value="">All Sizes</option>
                                    <option value="3 Marla" {{ request('size') == '3 Marla' ? 'selected' : '' }}>3 Marla</option>
                                    <option value="5 Marla" {{ request('size') == '5 Marla' ? 'selected' : '' }}>5 Marla</option>
                                    <option value="6 Marla" {{ request('size') == '6 Marla' ? 'selected' : '' }}>6 Marla</option>
                                    <option value="8 Marla" {{ request('size') == '8 Marla' ? 'selected' : '' }}>8 Marla</option>
                                    <option value="10 Marla" {{ request('size') == '10 Marla' ? 'selected' : '' }}>10 Marla</option>
                                    <option value="1 Kanal" {{ request('size') == '1 Kanal' ? 'selected' : '' }}>1 Kanal</option>
                                    <option value="250 Gaj" {{ request('size') == '250 Gaj' ? 'selected' : '' }}>250 Gaj</option>
                                    <option value="500 Gaj" {{ request('size') == '500 Gaj' ? 'selected' : '' }}>500 Gaj</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">House Number</label>
                                <input type="text" name="house_number" class="form-control" placeholder="Search House No" value="{{ request('house_number') }}">
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary me-2">Filter</button>
                                <a href="{{ route('property.name') }}" class="btn btn-secondary">Reset</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-title mb-0">
                                {{ session('software_type') === 'lead_management' ? 'Product List' : 'Property List' }}
                            </h4>
                            <button class="btn btn-primary btn-small px-4 py-1 rounded-pill fw-bold text-white shadow-lg add-property"
                                data-bs-toggle="modal"
                                data-bs-target="#Modalbox"
                                data-action="/properties/store"
                                data-type="Create"
                                data-modal="{{ session('software_type') === 'lead_management' ? 'Product' : 'Property' }}">
                                <i class="fa fa-plus"></i>
                                Add {{ session('software_type') === 'lead_management' ? 'Product' : 'Property' }}
                            </button>
                        </div>

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
                                        <th>{{ session('software_type') === 'lead_management' ? 'Product Name' : 'Property Name' }}</th>
                                        @if(session('software_type') !== 'lead_management')
                                        <th>House No</th>
                                        <th>Type</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>Size</th>
                                        <th>Location</th>
                                        <th>Budget</th>
                                        <th>Status</th>
                                        <th>Initial Date</th>
                                        <th>Created Date</th>
                                        <th>Matching Leads</th>
                                        <th>Channel Partners</th>
                                        <th>Images</th>
                                        <th>Actions</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($properties as $property)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="text-wrap" style="max-width: 400px;">{{ $property->property_name }}</td>
                                        @if(session('software_type') !== 'lead_management')
                                        <td>{{ $property->house_number ?? '-' }}</td>
                                        <td>{{ $property->property_type ?? '-' }}</td>
                                        <td>{{ $property->property_category ?? '-' }}</td>
                                        <td>{{ $property->property_sub_category ?? '-' }}</td>
                                        <td>{{ $property->property_size ?? '-' }}</td>
                                        <td>
                                            @if($property->city || $property->state)
                                            {{ $property->city ?? '' }} {{ $property->state ? ', '.$property->state : '' }}
                                            @else
                                            -
                                            @endif
                                        </td>
                                        <td>
                                            @if($property->budget_price)
                                            ₹{{ number_format($property->budget_price) }}
                                            @else
                                            -
                                            @endif
                                        </td>
                                        <td>
                                            @if($property->property_status)
                                            @php
                                                $statusColors = [
                                                'Available' => 'success',
                                                'Hold' => 'warning',
                                                'Procession' => 'info',
                                                'Sold' => 'danger'
                                                ];
                                                $color = $statusColors[$property->property_status] ?? 'secondary';
                                            @endphp
                                            <span class="badge bg-{{ $color }}">{{ $property->property_status }}</span>
                                            @else
                                            -
                                            @endif
                                        </td>
                                        <td>{{ !empty($property->initial_date) ? date('d-m-Y', strtotime($property->initial_date)) : '-' }}</td>
                                        <td>{{ $property->created_date ? date('d-m-Y', strtotime($property->created_date)) : '-' }}</td>
                                        <td>
                                            <a href="{{ url('lead/all-lead?type='.$property->property_type) }}">
                                                <span class="badge bg-info" style="cursor:pointer;">
                                                    {{ $property->leads_count ?? 0 }}
                                                </span>
                                            </a>
                                        </td>
                                        <td>
                                            @if($property->channel_partner_names)
                                            <div class="d-flex flex-wrap gap-1">
                                                @php
                                                    $cpNames = array_filter(array_map('trim', explode(',', $property->channel_partner_names)));
                                                @endphp
                                                @foreach($cpNames as $cpName)
                                                <span class="badge bg-primary">{{ $cpName }}</span>
                                                @endforeach
                                            </div>
                                            @endif
                                            <button class="btn btn-sm btn-info assign-cp-btn mt-2" 
                                                data-id="{{ $property->id }}" 
                                                data-name="{{ $property->property_name }}"
                                                data-bs-toggle="modal" 
                                                data-bs-target="#AssignCPModal">
                                                <i class="fas fa-users"></i> Manage CP
                                            </button>
                                        </td>
                                        <td>
                                            @if($property->gallery_images)
                                            @php
                                                $images = json_decode($property->gallery_images, true);
                                            @endphp
                                            <div class="d-flex flex-wrap gap-1">
                                                @foreach(array_slice($images, 0, 3) as $image)
                                                <img src="{{ url($image) }}" alt="Gallery Image" style="width: 40px; height: 40px; object-fit: cover; border-radius: 4px;">
                                                @endforeach
                                                @if(count($images) > 3)
                                                <span class="badge bg-secondary">+{{ count($images)-3 }}</span>
                                                @endif
                                            </div>
                                            @else
                                            -
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-xs btn-soft-light edit-btn"
                                                    data-id="{{ $property->id }}"
                                                    data-name="{{ $property->property_name }}"
                                                    data-house_number="{{ $property->house_number ?? '' }}"
                                                    data-property_type="{{ $property->property_type ?? '' }}"
                                                    data-property_category="{{ $property->property_category ?? '' }}"
                                                    data-property_sub_category="{{ $property->property_sub_category ?? '' }}"
                                                    data-property_size="{{ $property->property_size ?? '' }}"
                                                    data-state="{{ $property->state ?? '' }}"
                                                    data-city="{{ $property->city ?? '' }}"
                                                    data-address="{{ $property->address ?? '' }}"
                                                    data-budget_price="{{ $property->budget_price ?? '' }}"
                                                    data-property_status="{{ $property->property_status ?? '' }}"
                                                    data-initial_date="{{ $property->initial_date ?? '' }}"
                                                    data-channel-partner-ids="{{ $property->channel_partner_ids ?? '' }}"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#Modalbox"
                                                    data-type="Update"
                                                    data-modal="Property">
                                                    <i class="fas fa-edit text-warning"></i>
                                                </button>
                                                <button class="btn btn-xs btn-soft-light promote-btn"
                                                    data-id="{{ $property->id }}"
                                                    data-name="{{ $property->property_name }}"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#PromoteModal">
                                                    <i class="fas fa-chart-line text-success"></i>
                                                </button>
                                            </div>
                                         </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end mt-3">
                            {!! $properties->links('pagination::bootstrap-5') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="Modalbox" tabindex="-1" aria-labelledby="ModalboxLabel" aria-hidden="true">
            <div class="modal-dialog {{ session('software_type') !== 'lead_management' ? 'modal-xl' : 'modal-md' }}">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white py-3">
                        <h5 class="modal-title fw-bold" id="ModalboxLabel">
                            <i class="fas fa-plus-circle me-2"></i>
                            <span id="modalTitleText"></span>
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form method="POST" id="propertyForm" action="" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="property_id">
                        <input type="hidden" name="_method" id="method_field" value="POST">

                        <div class="modal-body p-4">
                            <div class="col-md-12 mb-4">
                                <label class="form-label fw-semibold">
                                    Channel Partners <span class="text-danger">*</span>
                                </label>

                                <select name="channel_partner_id[]" 
                                        id="property_channel_partner_id" 
                                        class="form-select select2" 
                                        multiple required
                                        data-placeholder="Select Channel Partners">
                                    @foreach($channelPartners as $cp)
                                        <option value="{{ $cp->id }}">
                                            {{ $cp->name }} ({{ $cp->company_name }})
                                        </option>
                                    @endforeach
                                </select>

                                <small class="text-muted">
                                    Start typing to search and select one or more channel partners.
                                </small>
                            </div>
                            <div class="mb-4">
                                <label for="name" class="form-label fw-semibold" id="modal-name">
                                    {{ session('software_type') === 'lead_management' ? 'Product Name' : 'Property Name' }} <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control form-control-lg" name="name" id="name"
                                    placeholder="{{ session('software_type') === 'lead_management' ? 'Enter product name' : 'Enter property name' }}" required>
                            </div>
                            @if(session('software_type') !== 'lead_management')
                            <div class="row g-4">
                                <div class="col-md-4">
                                    <label for="house_number" class="form-label fw-semibold">House/Flat Number</label>
                                    <input type="text" class="form-control" name="house_number" id="house_number"
                                        placeholder="Enter house/flat number">
                                </div>
                                <div class="col-md-4">
                                    <label for="property_type" class="form-label fw-semibold">Type</label>
                                    <select class="form-select" name="property_type" id="property_type">
                                        <option value="">Select Type</option>
                                        @foreach($categoryList as $cat)
                                        <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="property_category" class="form-label fw-semibold">Category</label>
                                    <select class="form-select" name="property_category" id="property_category">
                                        <option value="">Select Category</option>
                                        @foreach($invCatg as $cat)
                                        <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="property_sub_category" class="form-label fw-semibold">Sub Category</label>
                                    <select class="form-select" name="property_sub_category" id="property_sub_category">
                                        <option value="">Select Sub Category</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="property_size" class="form-label fw-semibold">Property Size</label>
                                    <select class="form-select" name="property_size" id="property_size">
                                        <option value="">Select Size</option>
                                        <option value="3 Marla">3 Marla</option>
                                        <option value="5 Marla">5 Marla</option>
                                        <option value="6 Marla">6 Marla</option>
                                        <option value="8 Marla">8 Marla</option>
                                        <option value="10 Marla">10 Marla</option>
                                        <option value="1 Kanal">1 Kanal</option>
                                        <option value="250 Gaj">250 Gaj</option>
                                        <option value="500 Gaj">500 Gaj</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="state" class="form-label fw-semibold">State</label>
                                    <select class="form-select" name="state" id="state">
                                        <option value="">Select State</option>
                                        @php
                                        $states = DB::table('state_district')->select('state')->distinct()->orderBy('state', 'asc')->get();
                                        @endphp
                                        @foreach($states as $state)
                                        <option value="{{ $state->state }}">{{ $state->state }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="city" class="form-label fw-semibold">City</label>
                                    <select class="form-select" name="city" id="city">
                                        <option value="">Select City</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="address" class="form-label fw-semibold">Address</label>
                                    <textarea class="form-control" name="address" id="address" rows="2" placeholder="Enter complete address"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="budget_price" class="form-label fw-semibold">Budget/Price (₹)</label>
                                    <input type="number" class="form-control" name="budget_price" id="budget_price">
                                </div>
                                <div class="col-md-6">
                                    <label for="property_status" class="form-label fw-semibold">Status</label>
                                    <select class="form-select" name="property_status" id="property_status">
                                        <option value="Available">Available</option>
                                        <option value="Hold">Hold</option>
                                        <option value="Procession">Procession</option>
                                        <option value="Sold">Sold</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="initial_date" class="form-label fw-semibold">Initial Date</label>
                                    <input type="date" class="form-control" name="initial_date" id="initial_date">
                                </div>
                                <div class="col-12">
                                    <label for="gallery_images" class="form-label fw-semibold">Gallery Images</label>
                                    <input type="file" class="form-control" name="gallery_images[]" id="gallery_images" multiple accept="image/*">
                                    <div class="form-text text-muted">
                                        <i class="fas fa-info-circle me-1"></i>
                                        You can select multiple images (JPEG, PNG, JPG, GIF)
                                    </div>
                                </div>
                                <div class="col-12" id="imagePreviewContainer" style="display: none;">
                                    <label class="form-label fw-semibold">Preview</label>
                                    <div class="row g-2" id="imagePreview"></div>
                                </div>
                            </div>
                            @endif
                        </div>

                        <div class="modal-footer bg-light py-3">
                            <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">
                                <i class="fas fa-times me-2"></i>Cancel
                            </button>
                            <button type="submit" class="btn btn-primary px-4" id="modal-type">
                                <i class="fas fa-save me-2"></i><span></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="AssignCPModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Manage Channel Partners</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="alert alert-success">
                                    <strong>Property:</strong> <span id="cp_property_name"></span>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <form id="assignCPForm">
                                    @csrf
                                    <input type="hidden" name="property_id" id="assign_property_id">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label class="form-label">Select Channel Partner</label>
                                            <select name="channel_partner_id" id="channel_partner_id" class="form-select" required>
                                                <option value="">Select Channel Partner</option>
                                                @foreach($channelPartners as $cp)
                                                <option value="{{ $cp->id }}">{{ $cp->name }} ({{ $cp->company_name }})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4 d-flex align-items-end">
                                            <button type="submit" class="btn btn-primary">Assign CP</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-12">
                                <h6>Assigned Channel Partners</h6>
                                <div id="assignedCPList"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="PromoteModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Promote Property</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-info">
                            <strong>Property:</strong> <span id="promote_property_name"></span>
                        </div>
                        <form id="addCommentForm" class="mb-4">
                            @csrf
                            <input type="hidden" name="property_id" id="comment_property_id">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">Channel Partner</label>
                                    <select name="channel_partner_id" id="comment_channel_partner_id" class="form-select" required>
                                        <option value="">Select Channel Partner</option>
                                        @foreach($channelPartners as $cp)
                                        <option value="{{ $cp->id }}">{{ $cp->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Platform</label>
                                    <select name="platform" id="platform" class="form-select" required>
                                        <option value="">Select Platform</option>
                                        <option value="Facebook">Facebook</option>
                                        <option value="Instagram">Instagram</option>
                                        <option value="Twitter">Twitter</option>
                                        <option value="LinkedIn">LinkedIn</option>
                                        <option value="WhatsApp">WhatsApp</option>
                                        <option value="Youtube">Youtube</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label">Comment/Review</label>
                                    <textarea name="comment" id="comment" class="form-control" rows="1" placeholder="Enter promoted comment" required></textarea>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <button type="submit" class="btn btn-success">Add Promoted Comment</button>
                                </div>
                            </div>
                        </form>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label">Filter by Platform</label>
                                <select id="filter_platform" class="form-select">
                                    <option value="">All Platforms</option>
                                    <option value="Facebook">Facebook</option>
                                    <option value="Instagram">Instagram</option>
                                    <option value="Twitter">Twitter</option>
                                    <option value="LinkedIn">LinkedIn</option>
                                    <option value="WhatsApp">WhatsApp</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Filter by CP</label>
                                <select id="filter_cp" class="form-select">
                                    <option value="">All Channel Partners</option>
                                    @foreach($channelPartners as $cp)
                                    <option value="{{ $cp->id }}">{{ $cp->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 d-flex align-items-end">
                                <button id="applyCommentFilter" class="btn btn-info">Apply Filter</button>
                            </div>
                        </div>
                        <h6>Promoted Comments History</h6>
                        <div id="promotedCommentsList"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() 
    {
        if (typeof $.fn.select2 !== 'undefined') 
        {
            $('#property_channel_partner_id').select2({
                dropdownParent: $('#Modalbox'),
                width: '100%',
                placeholder: 'Select Channel Partners',
                allowClear: true
            });
        }

        $('.add-property').click(function() 
        {
            resetForm();
            $('#method_field').val('POST');
            $('#propertyForm').attr('action', '/properties/store');
            $('#modalTitleText').text('Add ' + $(this).data('modal'));
            $('#modal-type span').text('Save ' + $(this).data('modal'));
            $('#property_status').val('Available');
            $('#initial_date').val('');
            $('#property_channel_partner_id').val([]).trigger('change');
        });

        $('.edit-btn').click(function(e) 
        {
            e.preventDefault();
            e.stopPropagation();
            resetForm();
            var btn = $(this);
            var propertyId = btn.data('id');
            if (!propertyId) 
            {
                toastr.error('Property ID not found');
                return;
            }
            $('#propertyForm').attr('action', '/properties/update');
            $('#method_field').val('POST');
            $('#property_id').val(propertyId);
            
            $('#name').val(btn.data('name'));
            $('#house_number').val(btn.data('house_number') || '');
            $('#property_type').val(btn.data('property_type') || '');
            $('#property_size').val(btn.data('property_size') || '');
            $('#address').val(btn.data('address') || '');
            $('#budget_price').val(btn.data('budget_price') || '');
            $('#property_status').val(btn.data('property_status') || 'Available');
            $('#initial_date').val(btn.data('initial_date') || '');
            
            var categoryName = btn.data('property_category');
            if (categoryName && categoryName !== '') 
            {
                $('#property_category').val(categoryName);
                loadSubCategoriesByCategoryName(categoryName, btn.data('property_sub_category'));
            }
            
            var selectedState = btn.data('state');
            var selectedCity = btn.data('city');
            if (selectedState && selectedState !== '') 
            {
                $('#state').val(selectedState);
                loadCities(selectedState, selectedCity);
            }
            
            var cpIds = btn.data('channel-partner-ids');
            if (cpIds && cpIds !== '') 
            {
                var ids = cpIds.toString().split(',');
                $('#property_channel_partner_id').val(ids).trigger('change');
            }
            
            $('#modalTitleText').text('Update ' + btn.data('modal'));
            $('#modal-type span').text('Update ' + btn.data('modal'));
        });

        window.loadSubCategoriesByCategoryName = function(categoryName, selectedSubCategory) 
        {
            var categoryId = null;
            @foreach($invCatg as $cat)
                if ('{{ $cat->name }}' == categoryName) 
                {
                    categoryId = {{ $cat->id }};
                }
            @endforeach
            
            if (categoryId) 
            {
                $.ajax({
                    url: '/lead/get-subcategories/' + categoryId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) 
                    {
                        var options = '<option value="">Select Sub Category</option>';
                        $.each(data, function(key, value) 
                        {
                            var selected = (value.name == selectedSubCategory) ? 'selected' : '';
                            options += '<option value="' + value.name + '" ' + selected + '>' + value.name + '</option>';
                        });
                        $('#property_sub_category').html(options);
                    },
                    error: function() 
                    {
                        $('#property_sub_category').html('<option value="">Error loading sub categories</option>');
                    }
                });
            } 
            else 
            {
                $('#property_sub_category').html('<option value="">Select Sub Category</option>');
            }
        };

        $('#property_category').change(function() 
        {
            var categoryName = $(this).val();
            if (!categoryName || categoryName === '') 
            {
                $('#property_sub_category').html('<option value="">Select Sub Category</option>');
                return;
            }
            
            var categoryId = null;
            @foreach($invCatg as $cat)
                if ('{{ $cat->name }}' == categoryName) 
                {
                    categoryId = {{ $cat->id }};
                }
            @endforeach
            
            if (categoryId) 
            {
                $.ajax({
                    url: '/lead/get-subcategories/' + categoryId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) 
                    {
                        var options = '<option value="">Select Sub Category</option>';
                        $.each(data, function(key, value) 
                        {
                            options += '<option value="' + value.name + '">' + value.name + '</option>';
                        });
                        $('#property_sub_category').html(options);
                    },
                    error: function() 
                    {
                        $('#property_sub_category').html('<option value="">Error loading sub categories</option>');
                    }
                });
            } 
            else 
            {
                $('#property_sub_category').html('<option value="">Select Sub Category</option>');
            }
        });

        $('#state').change(function() 
        {
            var state = $(this).val();
            if (state && state !== '') 
            {
                loadCities(state, null);
            } 
            else 
            {
                $('#city').html('<option value="">Select City</option>');
            }
        });

        $('#gallery_images').change(function() 
        {
            previewImages(this);
        });

        $('#lengthSelect').change(function() 
        {
            var url = new URL(window.location.href);
            url.searchParams.set('length', $(this).val());
            window.location.href = url.toString();
        });

        $('.assign-cp-btn').click(function() 
        {
            $('#assign_property_id').val($(this).data('id'));
            $('#cp_property_name').text($(this).data('name'));
            loadAssignedCPs($(this).data('id'));
        });

        $('#assignCPForm').submit(function(e) 
        {
            e.preventDefault();
            $.ajax({
                url: '/properties/assign-cp',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) 
                {
                    if (response.success) 
                    {
                        toastr.success(response.message);
                        $('#channel_partner_id').val('');
                        loadAssignedCPs($('#assign_property_id').val());
                    } 
                    else 
                    {
                        toastr.error(response.message);
                    }
                },
                error: function() 
                {
                    toastr.error('Error assigning channel partner');
                }
            });
        });
        
        $('.promote-btn').click(function() 
        {
            $('#comment_property_id').val($(this).data('id'));
            $('#promote_property_name').text($(this).data('name'));
            loadPromotedComments($(this).data('id'));
        });
        
        $('#addCommentForm').submit(function(e) 
        {
            e.preventDefault();
            $.ajax({
                url: '/properties/add-comment',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) 
                {
                    if (response.success) 
                    {
                        toastr.success(response.message);
                        $('#comment_channel_partner_id').val('');
                        $('#platform').val('');
                        $('#comment').val('');
                        loadPromotedComments($('#comment_property_id').val());
                    } 
                    else 
                    {
                        toastr.error(response.message);
                    }
                },
                error: function() 
                {
                    toastr.error('Error adding comment');
                }
            });
        });

        $('#applyCommentFilter').click(function() 
        {
            loadPromotedComments($('#comment_property_id').val(), $('#filter_platform').val(), $('#filter_cp').val());
        });

        $('#propertyForm').on('submit', function(e) 
        {
            e.preventDefault();
            var formAction = $(this).attr('action');
            var propertyId = $('#property_id').val();
            if (!formAction || formAction === '') 
            {
                toastr.error('Form action URL is missing');
                return;
            }
            
            var formData = new FormData(this);
            var submitBtn = $(this).find('button[type="submit"]');
            var originalText = submitBtn.html();
            
            submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Saving...');
            
            $.ajax({
                url: formAction,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') || '{{ csrf_token() }}'
                },
                success: function(response) 
                {
                    toastr.success('Property saved successfully');
                    $('#Modalbox').modal('hide');
                    setTimeout(function() 
                    { 
                        location.reload(); 
                    }, 1000);
                },
                error: function(xhr) 
                {
                    var errorMsg = 'Error saving property';
                    if (xhr.responseJSON && xhr.responseJSON.message) 
                    {
                        errorMsg = xhr.responseJSON.message;
                    } 
                    else if (xhr.responseJSON && xhr.responseJSON.error) 
                    {
                        errorMsg = xhr.responseJSON.error;
                    }
                    toastr.error(errorMsg);
                },
                complete: function() 
                {
                    submitBtn.prop('disabled', false).html(originalText);
                }
            });
        });
    });

    function resetForm() 
    {
        $('#propertyForm')[0].reset();
        $('#property_id').val('');
        $('#method_field').val('POST');
        $('#imagePreviewContainer').hide();
        $('#imagePreview').empty();
        $('#property_sub_category').html('<option value="">Select Sub Category</option>');
        $('#city').html('<option value="">Select City</option>');
        if (typeof $.fn.select2 !== 'undefined') 
        {
            $('#property_channel_partner_id').val([]).trigger('change');
        }
    }

    function loadCities(state, selectedCity) 
    {
        $.ajax({
            url: '/lead/get-cities/' + encodeURIComponent(state),
            type: 'GET',
            dataType: 'json',
            success: function(data) 
            {
                var options = '<option value="">Select City</option>';
                $.each(data, function(key, value) 
                {
                    var selected = (value.District == selectedCity) ? 'selected' : '';
                    options += '<option value="' + value.District + '" ' + selected + '>' + value.District + '</option>';
                });
                $('#city').html(options);
            },
            error: function() 
            {
                $('#city').html('<option value="">Error loading cities</option>');
            }
        });
    }

    function previewImages(input) 
    {
        var preview = $('#imagePreview');
        preview.empty();
        
        if (input.files && input.files.length > 0) 
        {
            $('#imagePreviewContainer').show();
            for (var i = 0; i < input.files.length; i++) 
            {
                var reader = new FileReader();
                reader.onload = function(e) 
                {
                    preview.append(
                        '<div class="col-md-3 mb-2">' +
                        '<div class="position-relative">' +
                        '<img src="' + e.target.result + '" class="img-fluid rounded" style="height: 100px; width: 100%; object-fit: cover; border: 1px solid #dee2e6;">' +
                        '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="cursor: pointer;" onclick="$(this).closest(\'.col-md-3\').remove(); if($(\'#imagePreview\').children().length === 0) $(\'#imagePreviewContainer\').hide();">×</span>' +
                        '</div>' +
                        '</div>'
                    );
                }
                reader.readAsDataURL(input.files[i]);
            }
        } 
        else 
        {
            $('#imagePreviewContainer').hide();
        }
    }

    function loadAssignedCPs(propertyId) 
    {
        $.ajax({
            url: '/properties/get-assigned-cps/' + propertyId,
            type: 'GET',
            success: function(data) 
            {
                var html = '';
                if (data.length > 0) 
                {
                    html = '<div class="table-responsive"><table class="table table-sm">' +
                        '<thead><tr><th>CP Name</th><th>Company</th><th>Assigned By</th><th>Assigned Date</th><th>Action</th></tr></thead><tbody>';
                    $.each(data, function(key, cp) 
                    {
                        html += '<tr>' +
                            '<td>' + cp.name + '</td>' +
                            '<td>' + cp.company_name + '</td>' +
                            '<td>' + cp.assigned_by_name + '</td>' +
                            '<td>' + cp.created_at + '</td>' +
                            '<td><button class="btn btn-sm btn-danger remove-cp" data-property="' + propertyId + '" data-cp="' + cp.channel_partner_id + '">Remove</button></td>' +
                            '</tr>';
                    });
                    html += '</tbody></table></div>';
                } 
                else 
                {
                    html = '<div class="alert alert-info">No channel partners assigned yet.</div>';
                }
                $('#assignedCPList').html(html);
                
                $('.remove-cp').off('click').on('click', function() 
                {
                    if (confirm('Are you sure you want to remove this channel partner?')) 
                    {
                        var propId = $(this).data('property');
                        var cpId = $(this).data('cp');
                        $.ajax({
                            url: '/properties/remove-cp',
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                property_id: propId,
                                channel_partner_id: cpId
                            },
                            success: function(response) 
                            {
                                if (response.success) 
                                {
                                    toastr.success(response.message);
                                    loadAssignedCPs(propId);
                                } 
                                else 
                                {
                                    toastr.error(response.message);
                                }
                            }
                        });
                    }
                });
            }
        });
    }

    function loadPromotedComments(propertyId, platform, cpId) 
    {
        var url = '/properties/get-comments/' + propertyId;
        var params = [];
        if (platform && platform !== '') params.push('platform=' + platform);
        if (cpId && cpId !== '') params.push('cp_id=' + cpId);
        if (params.length) url += '?' + params.join('&');
        
        $.ajax({
            url: url,
            type: 'GET',
            success: function(data) 
            {
                var html = '';
                if (data.length > 0) 
                {
                    html = '<div class="table-responsive"><table class="table table-sm">' +
                        '<thead><tr><th>Channel Partner</th><th>Platform</th><th>Comment</th><th>Created By</th><th>Date</th></tr></thead><tbody>';
                    $.each(data, function(key, comment) 
                    {
                        html += '<tr>' +
                            '<td>' + comment.cp_name + '</td>' +
                            '<td><span class="badge bg-info">' + comment.platform + '</span></td>' +
                            '<td>' + comment.comment + '</td>' +
                            '<td>' + comment.created_by_name + '</td>' +
                            '<td>' + comment.created_at + '</td>' +
                            '</tr>';
                    });
                    html += '</tbody></table></div>';
                } 
                else 
                {
                    html = '<div class="alert alert-info">No promoted comments found.</div>';
                }
                $('#promotedCommentsList').html(html);
            }
        });
    }
</script>
@endsection

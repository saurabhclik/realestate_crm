<!-- ADD DATA MODAL -->
<div class="modal fade" id="addDataModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-lg">

            <!-- HEADER -->
            <div class="modal-header border-0 text-white"
                style="background: linear-gradient(135deg,#556ee6,#556ee6);">

                <div>
                    <h4 class="modal-title fw-bold mb-1">
                        <i class="fas fa-plus-circle me-2"></i>
                        Add New Data
                    </h4>
                </div>

                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal">
                </button>
            </div>

            <!-- BODY -->
            <div class="modal-body p-4">
                <form method="POST" action="{{ route('data-center.store') }}" class="needs-validation" novalidate>
                    @csrf

                    <!-- BASIC DETAILS -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-light">
                            <h5 class="mb-0 fw-bold">
                                <i class="fas fa-user me-2 text-primary"></i>
                                Basic Details
                            </h5>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <!-- NAME -->
                                <div class="col-md-4 mb-3">
                                    <label for="name">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" id="name" value="{{ old('name') }}" required>
                                    <div class="invalid-feedback">
                                        @error('name')
                                            {{ $message }}
                                        @else
                                            Please enter a name
                                        @enderror
                                    </div>
                                </div>

                                <!-- EMAIL -->
                                <div class="col-md-4 mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        value="{{ old('email') }}">
                                </div>

                                <!-- PHONE -->
                                <div class="col-md-4 mb-3">
                                    <label for="phone">Phone No <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                        name="phone" id="phone" value="{{ old('phone') }}" required>
                                    <div class="invalid-feedback">
                                        @error('phone')
                                            {{ $message }}
                                        @else
                                            Please enter a phone number
                                        @enderror
                                    </div>
                                </div>

                                <!-- ALT NUMBER -->
                                <div class="col-md-4 mb-3">
                                    <label for="alternative phone">Alternative Number</label>
                                    <input type="text" class="form-control" name="alternative_number"
                                        id="alternative_number" value="{{ old('alternative_number') }}">
                                </div>

                                <!-- STATE -->
                                <div class="col-md-4 mb-3">
                                    <label for="state">State</label>
                                    <select class="select2 dropdown-in-modal" name="state" id="state">
                                        <option value="">-- Select State --</option>
                                        @foreach($states as $state)
                                        <option value="{{ $state->state }}">
                                            {{ $state->state }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- CITY -->
                                <div class="col-md-4 mb-3">
                                    <label for="city">City</label>
                                    <select class="select2 dropdown-in-modal" name="city" id="city">
                                        <option value="">-- Select City --</option>
                                        @foreach($cities as $city)
                                        <option value="{{ $city->city }}">
                                            {{ $city->city }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- REQUIREMENTS -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-light">
                            <h5 class="mb-0 fw-bold">
                                <i class="fas fa-clipboard-list me-2 text-success"></i>
                                Requirements
                            </h5>
                        </div>

                        <div class="card-body">
                            <div class="row">

                                <!-- PROPERTY TYPE -->
                                <div class="col-md-4 mb-3">
                                    <label for="property_type">Property Type</label>
                                    <select class="form-select select2 dropdown-in-modal" name="property_type" id="property_type">
                                        <option value="">-- Select Property Type --</option>
                                        @foreach($propertyTypes as $type)
                                        <option value="{{ $type->type }}" {{ old('property_type') === $type->type ? 'selected' : '' }}>
                                            {{ $type->type }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- PROPERTY CATEGORY -->
                                <div class="col-md-4 mb-3">
                                    <label for="property_category">Property Category</label>
                                    <select class="select2 dropdown-in-modal" name="property_category" id="property_category">
                                        <option value="">-- Select Property Category --</option>
                                        @foreach($propertyCategories as $item)
                                        <option value="{{ $item->id }}" {{ old('property_category') == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- SUB CATEGORY -->
                                <div class="col-md-4 mb-3">
                                    <label for="property_sub_category">Property Sub Category</label>
                                    <select class="select2 dropdown-in-modal" name="property_sub_category" id="property_sub_category">
                                        <option value="">-- Select Property Sub Category --</option>
                                        @foreach($subCategories as $sub)
                                        <option value="{{ $sub->id }}" {{ old('property_sub_category') == $sub->id ? 'selected' : '' }}>
                                            {{ $sub->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- PROJECT -->
                                <div class="col-md-4 mb-3">
                                    <label for="projects">Projects</label>
                                    <select class="select2 dropdown-in-modal" name="project_name[]" id="projects" multiple>
                                        <option value="">-- Select Project --</option>
                                        @foreach($projects as $project)
                                        <option value="{{ $project->id }}">
                                            {{ $project->project_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- BUDGET -->
                                <div class="col-md-4 mb-3">
                                    <label for="budget">Budget</label>
                                    <select class="select2 dropdown-in-modal" name="budget" id="budget">
                                        <option value="">Select Budget</option>
                                        <option value="10L-20L" {{ old('budget') == '10L-20L' ? 'selected' : '' }}>
                                            ₹10 Lakh - ₹20 Lakh</option>
                                        <option value="20L-30L" {{ old('budget') == '20L-30L' ? 'selected' : '' }}>
                                            ₹20 Lakh - ₹30 Lakh</option>
                                        <option value="30L-40L" {{ old('budget') == '30L-40L' ? 'selected' : '' }}>
                                            ₹30 Lakh - ₹40 Lakh</option>
                                        <option value="40L-50L" {{ old('budget') == '40L-50L' ? 'selected' : '' }}>
                                            ₹40 Lakh - ₹50 Lakh</option>
                                        <option value="50L-60L" {{ old('budget') == '50L-60L' ? 'selected' : '' }}>
                                            ₹50 Lakh - ₹60 Lakh</option>
                                        <option value="60L-70L" {{ old('budget') == '60L-70L' ? 'selected' : '' }}>
                                            ₹60 Lakh - ₹70 Lakh</option>
                                        <option value="70L-80L" {{ old('budget') == '70L-80L' ? 'selected' : '' }}>
                                            ₹70 Lakh - ₹80 Lakh</option>
                                        <option value="80L-90L" {{ old('budget') == '80L-90L' ? 'selected' : '' }}>
                                            ₹80 Lakh - ₹90 Lakh</option>
                                        <option value="90L-1Cr" {{ old('budget') == '90L-1Cr' ? 'selected' : '' }}>
                                            ₹90 Lakh - ₹1 Crore</option>
                                        <option value="1Cr-1.25Cr"
                                            {{ old('budget') == '1Cr-1.25Cr' ? 'selected' : '' }}>₹1 Crore - ₹1.25
                                            Crore</option>
                                        <option value="1.25Cr-1.5Cr"
                                            {{ old('budget') == '1.25Cr-1.5Cr' ? 'selected' : '' }}>₹1.25 Crore -
                                            ₹1.5 Crore</option>
                                        <option value="1.5Cr-1.75Cr"
                                            {{ old('budget') == '1.5Cr-1.75Cr' ? 'selected' : '' }}>₹1.5 Crore -
                                            ₹1.75 Crore</option>
                                        <option value="1.75Cr-2Cr"
                                            {{ old('budget') == '1.75Cr-2Cr' ? 'selected' : '' }}>₹1.75 Crore - ₹2
                                            Crore</option>
                                        <option value="2Cr-2.25Cr"
                                            {{ old('budget') == '2Cr-2.25Cr' ? 'selected' : '' }}>₹2 Crore - ₹2.25
                                            Crore</option>
                                        <option value="2.25Cr-3Cr"
                                            {{ old('budget') == '2.25Cr-3Cr' ? 'selected' : '' }}>₹2.25 Crore - ₹3
                                            Crore</option>
                                        <option value="3Cr-3.5Cr"
                                            {{ old('budget') == '3Cr-3.5Cr' ? 'selected' : '' }}>₹3 Crore - ₹3.5
                                            Crore</option>
                                        <option value="3.5Cr-5Cr"
                                            {{ old('budget') == '3.5Cr-5Cr' ? 'selected' : '' }}>₹3.5 Crore - ₹5
                                            Crore</option>
                                        <option value="5Cr-10Cr" {{ old('budget') == '5Cr-10Cr' ? 'selected' : '' }}>
                                            ₹5 Crore - ₹10 Crore
                                        </option>
                                    </select>
                                </div>

                                <!-- SOURCE -->
                                <div class="col-md-4 mb-3">
                                    <label for="source">Source</label>
                                    <select class="select2 dropdown-in-modal" name="source" id="source">
                                        <option value="">-- Select Source --</option>
                                        @foreach($sources as $source)
                                        <option value="{{ $source->id }}">
                                            {{ $source->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- COMMENT -->
                                <div class="col-md-12 mb-3">
                                    <label for="comment">Comment:</label>
                                    <textarea id="comment" name="comment" rows="3" placeholder="Type your comment here..."
                                        class="form-control"></textarea>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- FOOTER -->
                    <div class="d-flex justify-content-end gap-2">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                            Cancel
                        </button>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>
                            Save Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var propertyCategoryMap = <?php echo json_encode($propertyCategoryMap ?? []); ?>;
    var propertySubCategoryMap = <?php echo json_encode($propertySubCategoryMap ?? []); ?>;
    var allPropertyCategories = <?php echo json_encode($allPropertyCategories ?? []); ?>;
    var oldPropertyCategory = <?php echo json_encode(old('property_category')); ?>;
    var oldPropertySubCategory = <?php echo json_encode(old('property_sub_category')); ?>;

    function updatePropertyCategoryOptions(selectedType) {
        var options = '<option value="">-- Select Property Category --</option>';
        var categories = selectedType ? propertyCategoryMap[selectedType] || [] : allPropertyCategories;

        categories.forEach(function(category) {
            options += '<option value="' + category.id + '">' + category.name + '</option>';
        });

        $('#property_category').html(options).trigger('change');

        if (oldPropertyCategory) {
            $('#property_category').val(oldPropertyCategory).trigger('change');
            oldPropertyCategory = null;
        }

        if (!oldPropertyCategory && categories.length === 1) {
            $('#property_category').val(categories[0].id).trigger('change');
        }
    }

    function updatePropertySubCategoryOptions(categoryId) {
        var options = '<option value="">-- Select Property Sub Category --</option>';
        var subCategories = categoryId ? propertySubCategoryMap[categoryId] || [] : [];

        if (subCategories.length > 0) {
            subCategories.forEach(function(sub) {
                options += '<option value="' + sub.id + '">' + sub.name + '</option>';
            });
        }

        $('#property_sub_category').html(options).trigger('change');

        if (oldPropertySubCategory && categoryId) {
            $('#property_sub_category').val(oldPropertySubCategory).trigger('change');
            oldPropertySubCategory = null;
        }
    }

    $(document).ready(function() {
        $('.dropdown-in-modal').select2({
            dropdownParent: $('#addDataModal'),
            placeholder: function() {
                return $(this).data('placeholder') || 'Select an option';
            },
            allowClear: true
        });

        $('#property_type').on('change', function() {
            updatePropertyCategoryOptions($(this).val());
        });

        $('#property_category').on('change', function() {
            updatePropertySubCategoryOptions($(this).val());
        });

        updatePropertyCategoryOptions($('#property_type').val());
    });

    $('#state').on('change', function() {
        var selectedState = $(this).val();

        if (selectedState) {
            $('#city').html('<option value="">-- Select City --</option>').trigger('change');
            $.ajax({
                url: '/lead/get-cities/' + encodeURIComponent(selectedState),
                type: 'GET',
                success: function(response) {
                    if (response && response.length > 0) {
                        var options = '<option value="">-- Select City --</option>';
                        response.forEach(function(city) {
                            options += '<option value="' + city.District + '">' + city.District + '</option>';
                        });
                        $('#city').html(options).trigger('change');
                    } else {
                        $('#city').html('<option value="">No cities found</option>').trigger('change');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error loading cities:', error);
                    $('#city').html('<option value="">Error loading cities</option>').trigger('change');
                }
            });
        } else {
            $('#city').html('<option value="">-- Select City --</option>').trigger('change');
        }
    });

    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
</script>
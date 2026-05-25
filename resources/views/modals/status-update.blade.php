@php
    $softwareType = session('software_type', 'real_state');
    $isLeadManagement = $softwareType === 'lead_management';
@endphp
<div class="modal fade" id="statusUpdateModal" tabindex="-1" aria-labelledby="statusUpdateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="statusUpdateModalLabel">Update Lead Status</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="leadId">
                <div class="mb-3">
                    <label for="newStatus" class="form-label">
                        New Status
                    </label>
                    <select class="form-select select2StatusUpdate"
                        id="newStatus"
                        required>
                        <option value="">
                            Select new status
                        </option>
                        @foreach($lead_statuses as $status)
                            @if($status->system_name !== 'BOOKED' && $status->system_name !== 'Cancelled' && $status->system_name !== 'Completed')
                                <option value="{{ $status->system_name }}"
                                    data-system="{{ $status->system_name }}">
                                    {{ $status->display_name }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div id="conversionTypeField" style="display: none;">
                    <div class="mb-3">
                        <label for="conversionType" class="form-label">Conversion Type</label>
                        <select class="select2" id="conversionType">
                            <option value="Completed">Completed</option>
                            <option value="Cancelled">Cancelled</option>
                            <option value="Booked">Booked</option>
                        </select>
                    </div>
                </div>
                <div id="projectSelectionField" style="display: none;">
                    <div class="mb-3">
                        <label for="visitProjects" class="form-label">Select {{ $isLeadManagement ? 'Products' : 'Projects' }} for Visit</label>
                        <select class="form-select select2" id="visitProjects" multiple required>
                            <option value="">--- Select {{ $isLeadManagement ? 'Product(s)' : 'Project(s)' }} ---</option>
                            @foreach ($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                            @endforeach
                            <option value="others">Others</option>
                        </select>
                        <div class="form-text">You can select multiple {{ $isLeadManagement ? 'products' : 'projects' }} for this visit</div>
                    </div>
                    
                    <!-- Other Project Text Field -->
                    <div id="otherProjectField" style="display: none;">
                        <div class="mb-3">
                            <label for="otherProjectName" class="form-label">Other {{ $isLeadManagement ? 'Product' : 'Project' }} Name</label>
                            <input type="text" class="form-control" id="otherProjectName" placeholder="Enter {{ $isLeadManagement ? 'product' : 'project' }} name">
                        </div>
                    </div>
                    
                    <div id="selectedProjectsPreview" class="mt-2" style="display: none;">
                        <label class="form-label">Selected {{ $isLeadManagement ? 'Products' : 'Projects' }}:</label>
                        <div id="selectedProjectsList" class="d-flex flex-wrap gap-2"></div>
                    </div>
                </div>
                
                
                <div id="postSaleOptionField" class="d-none">
                    <div class="mb-3 p-3 border rounded bg-light">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="createPostSale" value="1">
                            <label class="form-check-label fw-bold" for="createPostSale">
                                Add to Post Sale
                            </label>
                            <small class="d-block text-muted">Create a post-sale record for this completed lead</small>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 applicant_div" style="display: none;">
                    <div class="row">
                        <div class="form-group col-md-6 col-lg-6 mb-2">
                            <label for="">{{ $isLeadManagement ? 'Product' : 'Project' }}</label>
                            <select class="form-select" name="prj_id" id="prj_id">
                                <option value="">--- Select {{ $isLeadManagement ? 'Product' : 'Project' }} ---</option>
                                @foreach ($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-lg-6 mb-2">
                            <label for="">{{ $isLeadManagement ? 'Quantity' : 'Size' }}</label>
                            <input type="text" class="form-control" name="prop_size" id="prop_size" placeholder="Enter {{ $isLeadManagement ? 'Quantity' : 'Size' }}">
                        </div>
                        <div class="form-group col-md-6 col-lg-6 mb-2">
                            <label for="">Final Price</label>
                            <input type="text" class="form-control" name="final_price" id="final_price" placeholder="Enter final price">
                        </div>
                        <div class="form-group col-md-6 col-lg-6 mb-2">
                            <label for="">Applicant Name</label>
                            <input type="text" class="form-control" name="app_name" id="app_name" placeholder="Enter applicant name">
                        </div>
                        <div class="form-group col-md-6 col-lg-6 mb-2">
                            <label for="">Applicant Contact</label>
                            <input type="number" class="form-control" name="app_contact" id="app_contact" placeholder="Enter applicant contact">
                        </div>
                        <div class="form-group col-md-6 col-lg-6 mb-2">
                            <label for="">Applicant City</label>
                            <select class="form-select" name="app_city" id="app_city">
                                <option value="">---- Select City ----</option>
                                @foreach ($cities as $city)
                                <option value="{{ $city->District }}">{{ $city->District }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-lg-6 mb-2">
                            <label for="">Applicant DOB</label>
                            <input type="date" class="form-control" name="app_dob" id="app_dob" placeholder="Enter applicant DOB">
                        </div>
                        <div class="form-group col-md-6 col-lg-6 mb-2">
                            <label for="">Applicant DOA</label>
                            <input type="date" class="form-control" name="app_doa" id="app_doa" placeholder="Enter applicant date of anniversary">
                        </div>
                    </div>
                </div>

                <div id="reminderFields">
                    <div class="mb-2">
                        <span class="bg-success badge text-light p-2"><i class="fa fa-info me-2"></i><span class="followUp">Follow Up Date</span></span>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="remindDate" class="form-label">Reminder Date</label>
                            <input type="date" class="form-control" id="remindDate">
                        </div>
                        <div class="col-md-6">
                            <label for="remindTime" class="form-label">Reminder Time</label>
                            <input type="time" class="form-control" id="remindTime">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="statusComment" class="form-label">Remark</label>
                    <textarea class="form-control" id="comment" rows="3" placeholder="Add any additional comments..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="updateLeadStatus()">Update Status</button>
            </div>
        </div>
    </div>
</div>

<style>
    .selected-project-badge {
        background: linear-gradient(45deg, #0d6efd, #0dcaf0);
        color: white;
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 0.8rem;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }

    .selected-project-badge .remove-btn {
        background: none;
        border: none;
        color: white;
        cursor: pointer;
        padding: 0;
        margin-left: 4px;
        font-size: 0.7rem;
    }
</style>

<script>
    $(document).ready(function() 
    {
        $('#visitProjects').on('change', function() 
        {
            var selectedValues = $(this).val() || [];
            if (selectedValues.includes('others')) 
            {
                $('#otherProjectField').show();
                $('#otherProjectName').prop('required', true);
            } 
            else 
            {
                $('#otherProjectField').hide();
                $('#otherProjectName').prop('required', false);
                $('#otherProjectName').val('');
            }
            updateSelectedProjectsPreview();
        });

        $('#newStatus').on('change', function() 
        {
            let status = $(this).val();
            let dateInput = document.getElementById("remindDate");

            let today = new Date().toISOString().split("T")[0];
            dateInput.value = "";

            if (status === "VISIT DONE") 
            {
                dateInput.setAttribute("max", today);
                dateInput.removeAttribute("min");
            } 
            else 
            {
                dateInput.setAttribute("min", today);
                dateInput.removeAttribute("max");
            }
        });

    });

    function updateSelectedProjectsPreview() 
    {
        var selectedProjects = $('#visitProjects').val();
        var previewContainer = $('#selectedProjectsPreview');
        var projectsList = $('#selectedProjectsList');
        var otherProjectName = $('#otherProjectName').val();

        projectsList.empty();

        if (selectedProjects && selectedProjects.length > 0) 
        {
            previewContainer.show();
            
            var hasOthers = selectedProjects.includes('others');
            var regularProjects = selectedProjects.filter(id => id !== 'others');
            
            if (regularProjects.length > 0) 
            {
                $.ajax({
                    url: '{{ route("lead.get-project-names") }}',
                    type: 'POST',
                    data: {
                        project_ids: regularProjects,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) 
                    {
                        if (response.success) 
                        {
                            response.projectNames.forEach(function(projectName, index) 
                            {
                                var projectId = regularProjects[index];
                                var badge = $('<span class="selected-project-badge"></span>');
                                badge.html(projectName +
                                    '<button type="button" class="remove-btn" onclick="removeProjectFromSelection(\'' +
                                    projectId + '\')">×</button>');
                                projectsList.append(badge);
                            });
                            
                            if (hasOthers && otherProjectName) 
                            {
                                var otherBadge = $('<span class="selected-project-badge" style="background: linear-gradient(45deg, #6c757d, #adb5bd);"></span>');
                                otherBadge.html('Others: ' + otherProjectName +
                                    '<button type="button" class="remove-btn" onclick="removeProjectFromSelection(\'others\')">×</button>');
                                projectsList.append(otherBadge);
                            }
                        }
                    },
                    error: function() 
                    {
                        regularProjects.forEach(function(projectId) 
                        {
                            var badge = $('<span class="selected-project-badge"></span>');
                            badge.html('Project ID: ' + projectId +
                                '<button type="button" class="remove-btn" onclick="removeProjectFromSelection(\'' +
                                projectId + '\')">×</button>');
                            projectsList.append(badge);
                        });
                        
                        if (hasOthers && otherProjectName) 
                        {
                            var otherBadge = $('<span class="selected-project-badge" style="background: linear-gradient(45deg, #6c757d, #adb5bd);"></span>');
                            otherBadge.html('Others: ' + otherProjectName +
                                '<button type="button" class="remove-btn" onclick="removeProjectFromSelection(\'others\')">×</button>');
                            projectsList.append(otherBadge);
                        }
                    }
                });
            } 
            else if (hasOthers && otherProjectName) 
            {
                var otherBadge = $('<span class="selected-project-badge" style="background: linear-gradient(45deg, #6c757d, #adb5bd);"></span>');
                otherBadge.html('Others: ' + otherProjectName +
                    '<button type="button" class="remove-btn" onclick="removeProjectFromSelection(\'others\')">×</button>');
                projectsList.append(otherBadge);
            }
        } 
        else 
        {
            previewContainer.hide();
        }
    }

    function removeProjectFromSelection(projectId) 
    {
        var currentValues = $('#visitProjects').val() || [];
        var updatedValues = currentValues.filter(function(id) 
        {
            return id !== projectId;
        });
        
        if (projectId === 'others') 
        {
            $('#otherProjectName').val('');
            $('#otherProjectField').hide();
        }
        
        $('#visitProjects').val(updatedValues).trigger('change');
    }
</script>
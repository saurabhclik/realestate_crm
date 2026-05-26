@php
    $softwareType = session('software_type', 'real_state');
    $isLeadManagement = $softwareType === 'lead_management';
@endphp
<div class="modal fade" id="visitDoneModal" tabindex="-1" aria-labelledby="visitDoneModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="visitDoneModalLabel">Mark Visit Done</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="vd_leadId">

                <div id="vd_projectSelectionField">
                    <div class="mb-3">
                        <label for="vd_visitProjects" class="form-label">Select {{ $isLeadManagement ? 'Products' : 'Projects' }} for Visit</label>
                        <select class="form-select select2" id="vd_visitProjects" multiple>
                            <option value="">{{ $isLeadManagement ? 'Product(s)' : 'Project(s)' }}</option>
                            @foreach ($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                            @endforeach
                            <option value="others">Others</option>
                        </select>
                        <div class="form-text">You can select multiple {{ $isLeadManagement ? 'products' : 'projects' }} for this visit</div>
                    </div>
                    
                    <div id="vd_otherProjectField" style="display: none;">
                        <div class="mb-3">
                            <label for="vd_otherProjectName" class="form-label">Other {{ $isLeadManagement ? 'Product' : 'Project' }} Name</label>
                            <input type="text" class="form-control" id="vd_otherProjectName" name="custom_project_name[]" placeholder="Enter {{ $isLeadManagement ? 'product' : 'project' }} name">
                        </div>
                    </div>
                    
                    <div id="vd_selectedProjectsPreview" class="mt-2" style="display: none;">
                        <label class="form-label">Selected {{ $isLeadManagement ? 'Products' : 'Projects' }}:</label>
                        <div id="vd_selectedProjectsList" class="d-flex flex-wrap gap-2"></div>
                    </div>

                    <div class="row mb-3 mt-3">
                        <div class="col-md-6">
                            <label for="vd_remindDate" class="form-label">Remind Date</label>
                            <input type="date" class="form-control" id="vd_remindDate">
                        </div>
                        <div class="col-md-6">
                            <label for="vd_remindTime" class="form-label"> Remind Time</label>
                            <input type="time" class="form-control" id="vd_remindTime">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="vd_comment" class="form-label">Remark</label>
                        <textarea class="form-control" id="vd_comment" rows="3" placeholder="Add any additional comments..."></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" id="btnSubmitVisitDone" onclick="submitVisitDone()">Save</button>
            </div>
        </div>
    </div>
</div>

<style>
    .vd-selected-project-badge {
        background-color: rgb(52, 195, 143);
        color: white;
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 0.8rem;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }
    .vd-selected-project-badge .remove-btn {
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
    function showVisitDoneModal(leadId) {
        $('#vd_leadId').val(leadId);
        $('#vd_visitProjects').val(null).trigger('change');
        $('#vd_otherProjectName').val('');
        $('#vd_remindDate').val('');
        $('#vd_remindTime').val('');
        $('#vd_comment').val('');
        
        let today = new Date().toISOString().split("T")[0];
        $('#vd_remindDate').attr("min", today);

        $('#visitDoneModal').modal('show');
    }

    $(document).ready(function() {
        $('#vd_visitProjects').on('change', function() {
            var selectedValues = $(this).val() || [];
            if (selectedValues.includes('others')) {
                $('#vd_otherProjectField').show();
                $('#vd_otherProjectName').prop('required', true);
            } else {
                $('#vd_otherProjectField').hide();
                $('#vd_otherProjectName').prop('required', false);
                $('#vd_otherProjectName').val('');
            }
            updateVDSelectedProjectsPreview();
        });
        
        $('#vd_otherProjectName').on('input', function() {
            updateVDSelectedProjectsPreview();
        });
    });

    function updateVDSelectedProjectsPreview() {
        var selectedProjects = $('#vd_visitProjects').val();
        var previewContainer = $('#vd_selectedProjectsPreview');
        var projectsList = $('#vd_selectedProjectsList');
        var otherProjectName = $('#vd_otherProjectName').val();

        projectsList.empty();

        if (selectedProjects && selectedProjects.length > 0) {
            previewContainer.show();
            var hasOthers = selectedProjects.includes('others');
            var regularProjects = selectedProjects.filter(id => id !== 'others');
            
            if (regularProjects.length > 0) {
                $.ajax({
                    url: '{{ route("lead.get-project-names") }}',
                    type: 'POST',
                    data: {
                        project_ids: regularProjects,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            projectsList.empty(); // Clear again to prevent duplicates from rapid input events
                            response.projectNames.forEach(function(projectName, index) {
                                var projectId = regularProjects[index];
                                var badge = $('<span class="vd-selected-project-badge"></span>');
                                badge.html(projectName + '<button type="button" class="remove-btn" onclick="removeVDProject(\'' + projectId + '\')">×</button>');
                                projectsList.append(badge);
                            });
                            
                            if (hasOthers && otherProjectName) {
                                var otherProjectsArray = otherProjectName.split(',').map(s => s.trim()).filter(s => s);
                                otherProjectsArray.forEach(function(opName) {
                                    var otherBadge = $('<span class="vd-selected-project-badge"></span>');
                                    otherBadge.html('Others: ' + opName + '<button type="button" class="remove-btn" onclick="removeVDOtherProject(\'' + opName + '\')">×</button>');
                                    projectsList.append(otherBadge);
                                });
                            }
                        }
                    }
                });
            } else if (hasOthers && otherProjectName) {
                var otherProjectsArray = otherProjectName.split(',').map(s => s.trim()).filter(s => s);
                otherProjectsArray.forEach(function(opName) {
                    var otherBadge = $('<span class="vd-selected-project-badge"></span>');
                    otherBadge.html('Others: ' + opName + '<button type="button" class="remove-btn" onclick="removeVDOtherProject(\'' + opName + '\')">×</button>');
                    projectsList.append(otherBadge);
                });
            }
        } else {
            previewContainer.hide();
        }
    }

    function removeVDProject(projectId) {
        var currentValues = $('#vd_visitProjects').val() || [];
        var updatedValues = currentValues.filter(id => id !== projectId);
        
        if (projectId === 'others') {
            $('#vd_otherProjectName').val('');
            $('#vd_otherProjectField').hide();
        }
        
        $('#vd_visitProjects').val(updatedValues).trigger('change');
    }

    function removeVDOtherProject(opName) {
        var currentText = $('#vd_otherProjectName').val();
        var projectsArray = currentText.split(',').map(s => s.trim()).filter(s => s);
        var updatedArray = projectsArray.filter(name => name !== opName);
        $('#vd_otherProjectName').val(updatedArray.join(', '));
        updateVDSelectedProjectsPreview();
    }

    function submitVisitDone() {
        const visitProjects = $('#vd_visitProjects').val();
        const otherProjectName = $('#vd_otherProjectName').val();

        if (!visitProjects || visitProjects.length === 0) {
            flasher.error('Please select at least one project.');
            return;
        }

        if (visitProjects.includes('others') && (!otherProjectName || otherProjectName.trim() === '')) {
            flasher.error('Please enter the other project name.');
            return;
        }

        const btn = $('#btnSubmitVisitDone');
        btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm"></span> Saving...');

        const formData = {
            _token: '{{ csrf_token() }}',
            leadId: $('#vd_leadId').val(),
            newStatus: 'VISIT DONE',
            visitProjects: visitProjects,
            otherProjectName: otherProjectName,
            remindDate: $('#vd_remindDate').val(),
            remindTime: $('#vd_remindTime').val(),
            comment: $('#vd_comment').val()
        };

        $.ajax({
            url: '{{ route('lead.updateStatus') }}',
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    flasher.success('Visit marked as done successfully!');
                    setTimeout(() => location.reload(), 1000);
                } else {
                    flasher.error(response.message);
                    btn.prop('disabled', false).text('Save');
                }
            },
            error: function(xhr) {
                let errorMsg = 'An error occurred';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMsg = xhr.responseJSON.message;
                } else if (xhr.responseJSON && xhr.responseJSON.errors) {
                    errorMsg = Object.values(xhr.responseJSON.errors)[0][0];
                }
                flasher.error(errorMsg);
                btn.prop('disabled', false).text('Save');
            }
        });
    }
</script>

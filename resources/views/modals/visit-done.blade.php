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
                            <option value="others" data-is-other="1">Others</option>
                        </select>
                        <div class="form-text">You can select multiple {{ $isLeadManagement ? 'products' : 'projects' }} for this visit</div>
                    </div>
                    
                    <div id="vd_otherProjectField" style="display: none;">
                        <div class="mb-3">
                            <label for="vd_otherProjectName" class="form-label">Other {{ $isLeadManagement ? 'Product' : 'Project' }} Name</label>
                            <input type="text" class="form-control" id="vd_otherProjectName" placeholder="Enter {{ $isLeadManagement ? 'product' : 'project' }} name">
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
                            <label for="vd_remindTime" class="form-label">Remind Time</label>
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
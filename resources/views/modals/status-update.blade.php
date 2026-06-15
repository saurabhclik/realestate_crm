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
                            @if($status->system_name !== 'BOOKED' && $status->system_name !== 'Cancelled' && $status->system_name !== 'Completed' && $status->system_name !== 'VISIT DONE')
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
                <button type="button" id="btnRemindMe" class="btn btn-info btn-sm mb-2" style="display: none;">
                    <i class="fa fa-clock-o me-1"></i> Remind Me
                </button>
                <div id="reminderFields" style="display: none;">
                    <div class="mb-2">
                        <span class="bg-success badge text-light p-2"><i class="fa fa-info me-2"></i><span class="followUp">Follow Up Date</span></span>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="remindDate" class="form-label">Reminder Date <span id="reqStarDate" class="text-danger" style="display:none;">*</span></label>
                            <input type="date" class="form-control" id="remindDate">
                        </div>
                        <div class="col-md-6">
                            <label for="remindTime" class="form-label">Reminder Time <span id="reqStarTime" class="text-danger" style="display:none;">*</span></label>
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
<script>
    $(document).ready(function() {
        const mandatoryStatuses = [
            'MEETING SCHEDULED', 
            'WHATSAPP', 
            'CALL SCHEDULED', 
            'VISIT SCHEDULED'
        ];

        $(document).on('change', '#newStatus', function() {
            let status = $(this).val();
            let dateInput = document.getElementById("remindDate");
            let today = new Date().toISOString().split("T")[0];

            $('#reminderFields').stop(true, true);

            dateInput.value = "";
            $('#remindTime').val('');
            dateInput.removeAttribute("min");
            dateInput.removeAttribute("max");

            if (mandatoryStatuses.includes(status)) {
                
                $('#reminderFields').show();
                $('#reqStarDate, #reqStarTime').show();
                $('#btnRemindMe').hide();
                $('#remindDate, #remindTime').prop('required', true);

                if (status === "VISIT DONE") {
                    dateInput.setAttribute("max", today);
                }

            } else {
                
                $('#reminderFields').hide();
                $('#reqStarDate, #reqStarTime').hide();
                $('#btnRemindMe').show();
                $('#remindDate, #remindTime').prop('required', false);
            }
        });

        $('#btnRemindMe').on('click', function() {
            $('#reminderFields').stop(true, true).slideToggle(); 
            
            if ($('#reminderFields').is(':visible')) {
                $('#remindDate, #remindTime').prop('required', true);
                
            } else {
                $('#remindDate, #remindTime').prop('required', false).val('');
            }
        });
    });
</script>
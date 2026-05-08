<div class="modal fade" id="statusUpdateModal" tabindex="-1" aria-labelledby="statusUpdateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="statusUpdateModalLabel">Update Data Status</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="dataId">

                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="isConverted" value="1">
                        <label class="form-check-label" for="isConverted">
                            <strong style="color: #141313;">Mark as Converted Lead</strong>
                        </label>
                    </div>
                </div>

                <div id="allFields" style="display:none;">

                    <div class="mb-3">
                        <label for="newStatus" class="form-label">New Status</label>
                        <select class="select2" id="newStatus" required>
                            <option value="">Select new status</option>
                            <option value="PENDING">Pending</option>
                            <option value="PROCESSING">Processing</option>
                            <option value="INTERESTED">Interested</option>
                            <option value="CALL SCHEDULED">Call Scheduled</option>
                            <option value="WHATSAPP">Whatsapp</option>
                            <option value="MEETING SCHEDULED">Meeting Scheduled</option>
                            <option value="VISIT SCHEDULED">Visit Scheduled</option>
                            <option value="VISIT DONE">Visit Done</option>
                            <option value="WRONG NUMBER">WRONG NUMBER</option>
                            <option value="NOT INTERESTED">NOT INTERESTED</option>
                            <option value="FUTURE LEAD">FUTURE LEAD</option>
                            <option value="NOT PICKED">NOT PICKED</option>
                            <option value="NOT REACHABLE">NOT REACHABLE</option>
                            <option value="LOST">LOST</option>
                            <option value="CHANNEL PARTNER">CHANNEL PARTNER</option>
                            <option value="REJECTED">Rejected</option>
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
                            <label for="visitProjects" class="form-label">Select for Visit</label>
                            <select class="form-select select2" id="visitProjects" multiple required>
                                <option value="">--- Select ---</option>
                                @foreach ($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                                @endforeach
                            </select>
                            <div class="form-text">You can select multiple for this visit</div>
                        </div>
                        <div id="selectedProjectsPreview" class="mt-2" style="display: none;">
                            <label>Select Projects for Visit</label>
                            <div id="selectedProjectsList" class="d-flex flex-wrap gap-2"></div>
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="updateDataStatus()">Update Status</button>
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
    document.addEventListener('DOMContentLoaded', function() {

        const checkbox = document.getElementById('isConverted');
        const fields = document.getElementById('allFields');

        checkbox.addEventListener('change', function() {
            fields.style.display = this.checked ? 'block' : 'none';
        });

    });

    $(document).ready(function() {

        $('#newStatus').on('change', function() {

            let status = $(this).val();
            let dateInput = document.getElementById("remindDate");

            let today = new Date().toISOString().split("T")[0];
            dateInput.value = "";

            //  DATE RULE
            if (status === "VISIT DONE") {
                dateInput.setAttribute("max", today);
                dateInput.removeAttribute("min");
            } else {
                dateInput.setAttribute("min", today);
                dateInput.removeAttribute("max");
            }

            //  RESET UI
            $('#comment').removeClass('border-danger');
            $('#comment').removeAttr('required');
            $('#reminderFields').show();

            //  CONDITION: REJECTED
            if (status === 'REJECTED') {

                // remark mandatory
                $('#comment').attr('required', true);
                $('#comment').addClass('border-danger');

                // hide reminder fields
                $('#reminderFields').hide();

                // optional: clear reminder fields
                $('#remindDate').val('');
                $('#remindTime').val('');
            }
        });

    });
</script>
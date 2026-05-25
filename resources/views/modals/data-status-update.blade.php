<div class="modal fade" id="statusUpdateModal" tabindex="-1" aria-labelledby="statusUpdateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="statusUpdateModalLabel">Update Data Status</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="dataId">
                <input type="hidden" id="currentStatus">
                <input type="hidden" id="modalDataName">

                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="isConverted" value="1">
                        <label class="form-check-label" for="isConverted">
                            <strong style="color: #141313;">Mark as Converted Lead</strong>
                        </label>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="isRejected" value="1">
                        <label class="form-check-label" for="isRejected">
                            <strong style="color: #141313;">Mark as Rejected</strong>
                        </label>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="isFollowup" value="1">
                        <label class="form-check-label" for="isFollowup">
                            <strong style="color: #141313;">Mark as Followup</strong>
                        </label>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="isUpdateComment" value="1">
                        <label class="form-check-label" for="isUpdateComment">
                            <strong style="color: #141313;">Update Comment</strong>
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
                        <textarea class="form-control" id="statusComment" rows="3" placeholder="Add any additional comments..."></textarea>
                    </div>
                </div>

                <div id="rejectedFields" style="display:none;">
                    <!-- Custom Comment Section for Rejected -->
                    <div class="mb-3">
                        <label for="rejectedComment" class="form-label">Rejection Comment / Reason</label>
                        <textarea class="form-control" id="rejectedComment" rows="3" placeholder="Add any additional comments..."></textarea>
                    </div>
                </div>

                <div id="followupFields" style="display:none;">
                    <div class="mb-2">
                        <span class="bg-success badge text-light p-2"><i class="fa fa-info me-2"></i><span>Follow Up Date</span></span>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="followupDate" class="form-label">Reminder Date</label>
                            <input type="date" class="form-control" id="followupDate">
                        </div>
                        <div class="col-md-6">
                            <label for="followupTime" class="form-label">Reminder Time</label>
                            <input type="time" class="form-control" id="followupTime">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="followupComment" class="form-label">Remark</label>
                        <textarea class="form-control" id="followupComment" rows="3" placeholder="Add followup notes..."></textarea>
                    </div>
                </div>

                <div id="updateCommentFields" style="display:none;" class="mt-4">
                    <h6 class="text-primary mb-3 fw-bold d-flex align-items-center gap-2">
                        <i class="fas fa-comment-dots"></i>Comments 
                    </h6>
                    
                    <div class="mb-4">
                        <!-- <label class="form-label fw-bold text-secondary small text-uppercase mb-2" style="font-size: 0.75rem; letter-spacing: 0.5px;">Quick Calling Notes</label> -->
                        <div class="d-flex flex-wrap gap-2" id="quickNotesContainer">
                            <button type="button" class="btn btn-sm quick-note-btn rounded-pill px-3 py-2 fw-semibold shadow-sm" data-note="Not available" style="transition: all 0.2s; background: #f0f4ff; color: #3b82f6; border: 1px solid #bfdbfe;">
                                <i class="fas fa-phone-slash me-1"></i> Not available
                            </button>
                            <button type="button" class="btn btn-sm quick-note-btn rounded-pill px-3 py-2 fw-semibold shadow-sm" data-note="Asked to call tomorrow" style="transition: all 0.2s; background: #f0fbff; color: #0ea5e9; border: 1px solid #bae6fd;">
                                <i class="fas fa-calendar-plus me-1"></i> Asked to call tomorrow
                            </button>
                            <button type="button" class="btn btn-sm quick-note-btn rounded-pill px-3 py-2 fw-semibold shadow-sm" data-note="Interested" style="transition: all 0.2s; background: #f0fff4; color: #22c55e; border: 1px solid #bbf7d0;">
                                <i class="fas fa-thumbs-up me-1"></i> Interested
                            </button>
                            <button type="button" class="btn btn-sm quick-note-btn rounded-pill px-3 py-2 fw-semibold shadow-sm" data-note="Busy" style="transition: all 0.2s; background: #fffaf0; color: #f59e0b; border: 1px solid #fde68a;">
                                <i class="fas fa-user-clock me-1"></i> Busy
                            </button>
                            <button type="button" class="btn btn-sm quick-note-btn rounded-pill px-3 py-2 fw-semibold shadow-sm" data-note="Not picked" style="transition: all 0.2s; background: #fff1f2; color: #f43f5e; border: 1px solid #fecdd3;">
                                <i class="fas fa-phone-slash me-1"></i> Not picked
                            </button>
                            <button type="button" class="btn btn-sm quick-note-btn rounded-pill px-3 py-2 fw-semibold shadow-sm" data-note="Wrong number" style="transition: all 0.2s; background: #f8f9fa; color: #64748b; border: 1px solid #e2e8f0;">
                                <i class="fas fa-times-circle me-1"></i> Wrong number
                            </button>
                            <button type="button" class="btn btn-sm quick-note-btn rounded-pill px-3 py-2 fw-semibold shadow-sm" data-note="Not interested" style="transition: all 0.2s; background: #f3f4f6; color: #475569; border: 1px solid #cbd5e1;">
                                <i class="fas fa-hand-paper me-1"></i> Not interested
                            </button>
                        </div>
                    </div>
                    
                    <div class="mb-2 mt-3">
                        <span class="bg-success badge text-light p-2"><i class="fa fa-info me-2"></i><span>Comment Date</span></span>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="ucDate" class="form-label">Date</label>
                            <input type="date" class="form-control" id="ucDate">
                        </div>
                        <div class="col-md-6">
                            <label for="ucTime" class="form-label">Time</label>
                            <input type="time" class="form-control" id="ucTime">
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="ucRemark" class="form-label fw-bold text-secondary small text-uppercase mb-2" style="font-size: 0.75rem; letter-spacing: 0.5px;">Custom Calling Note</label>
                        <div class="position-relative shadow-sm rounded-3">
                            <textarea class="form-control border-light" id="ucRemark" rows="3" placeholder="Type custom note or select a quick note above..." style="border-radius: 8px; resize: none; font-size: 0.95rem; padding: 12px 15px; border: 1px solid #ced4da; background-color: #fcfcfc;"></textarea>
                        </div>
                    </div>

                    <!-- Live Preview Section -->
                    <div class="p-3 border rounded-3 position-relative" style="border-style: dashed !important; border-color: #a5b4fc !important; background: linear-gradient(to right, #eef2ff, #f8faff); overflow: hidden;">
                        <div class="position-absolute" style="top: -10px; right: -10px; opacity: 0.05; font-size: 5rem;">
                            <i class="fas fa-quote-right text-primary"></i>
                        </div>
                        <small class="text-primary fw-bold d-block mb-2 text-uppercase d-flex align-items-center gap-1" style="font-size: 0.75rem; letter-spacing: 0.5px;">
                            <i class="fas fa-eye"></i> Live Comment Preview
                        </small>
                        <div id="commentPreview" class="text-dark fw-medium" style="font-size: 0.95rem; word-break: break-word; line-height: 1.5;">
                        </div>
                        <input type="hidden" id="finalCommentText" value="">
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
<script>
    document.addEventListener('DOMContentLoaded', function() {

        const checkbox = document.getElementById('isConverted');
        const isRejectedCheckbox = document.getElementById('isRejected');
        const isFollowupCheckbox = document.getElementById('isFollowup');
        const isUpdateCommentCheckbox = document.getElementById('isUpdateComment');

        const fields = document.getElementById('allFields');
        const rejectedFields = document.getElementById('rejectedFields');
        const followupFields = document.getElementById('followupFields');
        const updateCommentFields = document.getElementById('updateCommentFields');

        const allCheckboxes = [checkbox, isRejectedCheckbox, isFollowupCheckbox, isUpdateCommentCheckbox];

        function handleCheckboxChange(changedCheckbox) {
            if (changedCheckbox.checked) {
                // Uncheck others and hide their fields
                allCheckboxes.forEach(cb => {
                    if (cb && cb !== changedCheckbox) {
                        cb.checked = false;
                        cb.closest('.mb-3').style.display = 'none';
                    }
                });

                fields.style.display = 'none';
                rejectedFields.style.display = 'none';
                followupFields.style.display = 'none';
                updateCommentFields.style.display = 'none';

                if (changedCheckbox === checkbox) {
                    fields.style.display = 'block';
                } else if (changedCheckbox === isRejectedCheckbox) {
                    rejectedFields.style.display = 'block';
                } else if (changedCheckbox === isFollowupCheckbox) {
                    followupFields.style.display = 'block';
                } else if (changedCheckbox === isUpdateCommentCheckbox) {
                    updateCommentFields.style.display = 'block';
                }
            } else {
                // Show all checkboxes if none are checked
                allCheckboxes.forEach(cb => {
                    if (cb) {
                        if (window.isRejectedData && (cb === checkbox || cb === isRejectedCheckbox)) {
                            cb.closest('.mb-3').style.display = 'none';
                        } else {
                            cb.closest('.mb-3').style.display = 'block';
                        }
                    }
                });

                fields.style.display = 'none';
                rejectedFields.style.display = 'none';
                followupFields.style.display = 'none';
                updateCommentFields.style.display = 'none';
            }
        }

        if (checkbox) checkbox.addEventListener('change', () => handleCheckboxChange(checkbox));
        if (isRejectedCheckbox) isRejectedCheckbox.addEventListener('change', () => handleCheckboxChange(isRejectedCheckbox));
        if (isFollowupCheckbox) isFollowupCheckbox.addEventListener('change', () => handleCheckboxChange(isFollowupCheckbox));
        if (isUpdateCommentCheckbox) isUpdateCommentCheckbox.addEventListener('change', () => handleCheckboxChange(isUpdateCommentCheckbox));

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
            $('#statusComment').removeClass('border-danger');
            $('#statusComment').removeAttr('required');
            $('#reminderFields').show();

            //  CONDITION: REJECTED
            if (status === 'REJECTED') {

                // remark mandatory
                $('#statusComment').attr('required', true);
                $('#statusComment').addClass('border-danger');

                // hide reminder fields
                $('#reminderFields').hide();

                // optional: clear reminder fields
                $('#remindDate').val('');
                $('#remindTime').val('');
            }
        });

        // Quick Notes Logic
        $('.quick-note-btn').on('click', function() {
            const note = $(this).data('note');
            let currentVal = $('#ucRemark').val();
            if(currentVal) {
                $('#ucRemark').val(currentVal + ' - ' + note);
            } else {
                $('#ucRemark').val(note);
            }
            updatePreview();
        });

        $('#ucRemark').on('input', updatePreview);
        $('#ucDate, #ucTime').on('change', updatePreview);

        function updatePreview() {
            let note = $('#ucRemark').val().trim();
            let dateVal = $('#ucDate').val();
            let timeVal = $('#ucTime').val();
            let dataName = $('#modalDataName').val() || 'User';
            
            let formattedDate = '';
            if (dateVal) {
                let d = new Date(dateVal);
                if (!isNaN(d.getTime())) {
                    let day = String(d.getDate()).padStart(2, '0');
                    let month = String(d.getMonth() + 1).padStart(2, '0');
                    let year = d.getFullYear();
                    formattedDate = `${day}/${month}/${year}`;
                } else {
                    formattedDate = dateVal;
                }
            }

            let formattedTime = '';
            if (timeVal) {
                let [h, m] = timeVal.split(':');
                let hours = parseInt(h);
                let ampm = hours >= 12 ? 'pm' : 'am';
                hours = hours % 12;
                hours = hours ? hours : 12; 
                formattedTime = `${hours}.${m}${ampm}`;
            }

            let datetimeStr = '';
            if (formattedDate) {
                datetimeStr += ` on ${formattedDate}`;
                if (formattedTime) {
                    datetimeStr += ` at ${formattedTime}`;
                }
            }

            let finalStr = '';
            if (note) {
                finalStr = `${dataName} ${note.toLowerCase()}${datetimeStr}`;
            } else {
                finalStr = `${dataName} [note]${datetimeStr}`;
            }

            $('#commentPreview').text(finalStr);
            $('#finalCommentText').val(finalStr);
        }

        // Clean values when status update modal is shown
        $('#statusUpdateModal').on('show.bs.modal', function () {
            $('#isConverted, #isRejected, #isFollowup, #isUpdateComment').prop('checked', false);
            $('.form-check').closest('.mb-3').show();
            $('#allFields, #rejectedFields, #followupFields, #updateCommentFields').hide();
            $('#rejectedComment, #statusComment, #ucRemark, #ucDate, #ucTime, #followupDate, #followupTime, #followupComment').val('');
            updatePreview();
        });

    });
</script>
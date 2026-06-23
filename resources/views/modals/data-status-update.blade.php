<div class="modal fade" id="statusUpdateModal" tabindex="-1" aria-labelledby="statusUpdateModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="statusUpdateModalLabel">Update Data Status</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="dataId">
                <input type="hidden" id="currentStatus">
                <input type="hidden" id="modalDataName">

               
                <!-- DYNAMIC DROPDOWN START HERE -->
                <div class="mb-3">
                    <label for="actionSelect" class="form-label fw-bold">Select Action</label>
                    <select class="form-select" id="actionSelect">
                        <option value="">-- Choose Action --</option>
                        @if(isset($dataCenterActions))
                            @foreach($dataCenterActions as $action)
                                <option value="{{ $action->system_name }}">{{ $action->display_name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <!-- DYNAMIC DROPDOWN END HERE -->
                {{-- @endforeach --}}
                {{-- @endif --}}
                <!-- DYNAMIC CHECKBOXES END HERE -->
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
                            <span class="bg-success badge text-light p-2"><i class="fa fa-info me-2"></i><span
                                    class="followUp">Follow Up Date</span></span>
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
                        <textarea class="form-control" id="statusComment" rows="3"
                            placeholder="Add any additional comments..."></textarea>
                    </div>
                </div>

                <div id="rejectedFields" style="display:none;">
                    <div class="mb-3">
                        <label for="rejectedComment" class="form-label">Rejection Comment / Reason</label>
                        <textarea class="form-control" id="rejectedComment" rows="3"
                            placeholder="Add any additional comments..."></textarea>
                    </div>
                </div>

                <div id="followupFields" style="display:none;">
                    <div class="mb-2">
                        <span class="bg-success badge text-light p-2"><i class="fa fa-info me-2"></i><span>Follow Up
                                Date</span></span>
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
                        <textarea class="form-control" id="followupComment" rows="3"
                            placeholder="Add followup notes..."></textarea>
                    </div>
                </div>

                <div id="updateCommentFields" style="display:none;" class="mt-4">
                    <h6 class="text-primary mb-3 fw-bold d-flex align-items-center gap-2">
                        <i class="fas fa-comment-dots"></i>Comments
                    </h6>

                    <div class="mb-4">
                        <!-- <label class="form-label fw-bold text-secondary small text-uppercase mb-2" style="font-size: 0.75rem; letter-spacing: 0.5px;">Quick Calling Notes</label> -->
                        <div class="d-flex flex-wrap gap-2" id="quickNotesContainer">
                            <button type="button"
                                class="btn btn-sm quick-note-btn rounded-pill px-3 py-2 fw-semibold shadow-sm"
                                data-note="Not available"
                                style="transition: all 0.2s; background: #f0f4ff; color: #3b82f6; border: 1px solid #bfdbfe;">
                                <i class="fas fa-phone-slash me-1"></i> Not available
                            </button>
                            <button type="button"
                                class="btn btn-sm quick-note-btn rounded-pill px-3 py-2 fw-semibold shadow-sm"
                                data-note="Asked to call tomorrow"
                                style="transition: all 0.2s; background: #f0fbff; color: #0ea5e9; border: 1px solid #bae6fd;">
                                <i class="fas fa-calendar-plus me-1"></i> Asked to call tomorrow
                            </button>
                            <button type="button"
                                class="btn btn-sm quick-note-btn rounded-pill px-3 py-2 fw-semibold shadow-sm"
                                data-note="Interested"
                                style="transition: all 0.2s; background: #f0fff4; color: #22c55e; border: 1px solid #bbf7d0;">
                                <i class="fas fa-thumbs-up me-1"></i> Interested
                            </button>
                            <button type="button"
                                class="btn btn-sm quick-note-btn rounded-pill px-3 py-2 fw-semibold shadow-sm"
                                data-note="Busy"
                                style="transition: all 0.2s; background: #fffaf0; color: #f59e0b; border: 1px solid #fde68a;">
                                <i class="fas fa-user-clock me-1"></i> Busy
                            </button>
                            <button type="button"
                                class="btn btn-sm quick-note-btn rounded-pill px-3 py-2 fw-semibold shadow-sm"
                                data-note="Not picked"
                                style="transition: all 0.2s; background: #fff1f2; color: #f43f5e; border: 1px solid #fecdd3;">
                                <i class="fas fa-phone-slash me-1"></i> Not picked
                            </button>
                            <button type="button"
                                class="btn btn-sm quick-note-btn rounded-pill px-3 py-2 fw-semibold shadow-sm"
                                data-note="Wrong number"
                                style="transition: all 0.2s; background: #f8f9fa; color: #64748b; border: 1px solid #e2e8f0;">
                                <i class="fas fa-times-circle me-1"></i> Wrong number
                            </button>
                            <button type="button"
                                class="btn btn-sm quick-note-btn rounded-pill px-3 py-2 fw-semibold shadow-sm"
                                data-note="Not interested"
                                style="transition: all 0.2s; background: #f3f4f6; color: #475569; border: 1px solid #cbd5e1;">
                                <i class="fas fa-hand-paper me-1"></i> Not interested
                            </button>
                        </div>
                    </div>

                    <div class="mb-2 mt-3">
                        <span class="bg-success badge text-light p-2"><i class="fa fa-info me-2"></i><span>Comment
                                Date</span></span>
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
                        <label for="ucRemark" class="form-label fw-bold text-secondary small text-uppercase mb-2"
                            style="font-size: 0.75rem; letter-spacing: 0.5px;">Custom Calling Note</label>
                        <div class="position-relative shadow-sm rounded-3">
                            <textarea class="form-control border-light" id="ucRemark" rows="3"
                                placeholder="Type custom note or select a quick note above..."
                                style="border-radius: 8px; resize: none; font-size: 0.95rem; padding: 12px 15px; border: 1px solid #ced4da; background-color: #fcfcfc;"></textarea>
                        </div>
                    </div>

                    <!-- Live Preview Section -->
                    <div class="p-3 border rounded-3 position-relative"
                        style="border-style: dashed !important; border-color: #a5b4fc !important; background: linear-gradient(to right, #eef2ff, #f8faff); overflow: hidden;">
                        <div class="position-absolute"
                            style="top: -10px; right: -10px; opacity: 0.05; font-size: 5rem;">
                            <i class="fas fa-quote-right text-primary"></i>
                        </div>
                        <small class="text-primary fw-bold d-block mb-2 text-uppercase d-flex align-items-center gap-1"
                            style="font-size: 0.75rem; letter-spacing: 0.5px;">
                            <i class="fas fa-eye"></i> Live Comment Preview
                        </small>
                        <div id="commentPreview" class="text-dark fw-medium"
                            style="font-size: 0.95rem; word-break: break-word; line-height: 1.5;">
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
    document.addEventListener('DOMContentLoaded', function () {
        const fields = document.getElementById('allFields');
        const rejectedFields = document.getElementById('rejectedFields');
        const followupFields = document.getElementById('followupFields');
        const updateCommentFields = document.getElementById('updateCommentFields');

        function hideAllFieldDivs() {
            if (fields) fields.style.display = 'none';
            if (rejectedFields) rejectedFields.style.display = 'none';
            if (followupFields) followupFields.style.display = 'none';
            if (updateCommentFields) updateCommentFields.style.display = 'none';
        }

        // DROPDOWN CHANGE EVENT
        document.getElementById('actionSelect').addEventListener('change', function () {
            let val = this.value;
            hideAllFieldDivs();

            // FOLLOWUP ACTIONS
            if (val === 'NEW_FOLLOWUP' || val === 'REJ_FOLLOWUP') {
                if (followupFields) followupFields.style.display = 'block';
            }
            // CONVERTED ACTIONS
            else if (val === 'NEW_CONVERTED' || val === 'FU_CONVERTED') {
                if (fields) fields.style.display = 'block';
            }
            // REJECTED ACTION
            else if (val === 'NEW_REJECTED') {
                if (rejectedFields) rejectedFields.style.display = 'block';
            }
            // EDIT COMMENT ACTION
            else if (val === 'REJ_EDIT_COMMENT') {
                if (updateCommentFields) updateCommentFields.style.display = 'block';
            }
            // QUICK STATUS CHANGES (Follow-up Tab)
            else if (val === 'FU_NOT_CONVERTED' || val === 'FU_NOT_PICKED' || val === 'FU_INTERESTED') {
                if (updateCommentFields) updateCommentFields.style.display = 'block';
            }
        });
    });

    // ... keep your existing $(document).ready code for quick notes, preview, etc ...

    $(document).ready(function () {
        $('#newStatus').on('change', function () {
            let status = $(this).val();
            let dateInput = document.getElementById("remindDate");
            let today = new Date().toISOString().split("T")[0];
            dateInput.value = "";

            if (status === "VISIT DONE") {
                dateInput.setAttribute("max", today);
                dateInput.removeAttribute("min");
            } else {
                dateInput.setAttribute("min", today);
                dateInput.removeAttribute("max");
            }

            $('#statusComment').removeClass('border-danger').removeAttr('required');
            $('#reminderFields').show();

            if (status === 'REJECTED') {
                $('#statusComment').attr('required', true).addClass('border-danger');
                $('#reminderFields').hide();
                $('#remindDate').val('');
                $('#remindTime').val('');
            }
        });

        $('.quick-note-btn').on('click', function () {
            const note = $(this).data('note');
            let currentVal = $('#ucRemark').val();
            $('#ucRemark').val(currentVal ? currentVal + ' - ' + note : note);
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
                    formattedDate = `${String(d.getDate()).padStart(2, '0')}/${String(d.getMonth() + 1).padStart(2, '0')}/${d.getFullYear()}`;
                } else {
                    formattedDate = dateVal;
                }
            }

            let formattedTime = '';
            if (timeVal) {
                let [h, m] = timeVal.split(':');
                let hours = parseInt(h);
                let ampm = hours >= 12 ? 'pm' : 'am';
                hours = hours % 12 || 12;
                formattedTime = `${hours}.${m}${ampm}`;
            }

            let datetimeStr = '';
            if (formattedDate) {
                datetimeStr += ` on ${formattedDate}`;
                if (formattedTime) datetimeStr += ` at ${formattedTime}`;
            }

            let finalStr = note ? `${dataName} ${note.toLowerCase()}${datetimeStr}` : `${dataName} [note]${datetimeStr}`;
            $('#commentPreview').text(finalStr);
            $('#finalCommentText').val(finalStr);
        }

        $('#statusUpdateModal').on('show.bs.modal', function () {
            $('.dynamic-action-check').prop('checked', false);
            $('.dynamic-action-wrapper').show();

            if (window.isRejectedData) {
                $('.dynamic-action-check').each(function () {
                    if ($(this).val() === 'CONVERTED' || $(this).val() === 'REJECTED') {
                        $(this).closest('.dynamic-action-wrapper').hide();
                    }
                });
            }

            $('#allFields, #rejectedFields, #followupFields, #updateCommentFields').hide();
            $('#rejectedComment, #statusComment, #ucRemark, #ucDate, #ucTime, #followupDate, #followupTime, #followupComment').val('');
            updatePreview();
        });
    });
</script>
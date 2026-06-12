{{-- <style>
    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1000;
        overflow-y: auto;
        padding: 20px;
        display: block;

    }

    .modal-content {
        background: white;
        padding: 20px;
        border-radius: 10px;
        width: 100%;
        max-width: 400px;
        max-height: 90vh;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow-y: auto;
    }

    .modal-title {
        margin-top: 0;
        margin-bottom: 20px;
        color: #333;
    }

    .choices__inner {
        min-height: 45px;
        border-radius: 8px;
        padding: 6px 10px;
        font-size: 14px;
    }

    .choices__list--multiple .choices__item {
        background-color: #0d6efd;
        border: none;
        border-radius: 6px;
        padding: 4px 8px;
    }

    .choices__input {
        font-size: 14px;
    }
</style> --}}

<style>
    .modal-overlay {
        position: fixed;
        inset: 0;
        background: rgba(15, 23, 42, 0.65);
        backdrop-filter: blur(4px);
        z-index: 1050;
        overflow-y: auto;
        padding: 10px;
        display: none;
        animation: fadeIn 0.25s ease;
    }

    /* ===== Modal Card ===== */
    .modal-content {
        background: #ffffff;
        width: 100%;
        max-width: 520px;
        margin: 30px auto;
        border-radius: 22px;
        border: none;
        box-shadow:
            0 10px 30px rgba(0, 0, 0, 0.08),
            0 2px 8px rgba(0, 0, 0, 0.04);

        height: calc(100vh - 60px);
        display: flex;
        flex-direction: column;

        overflow: hidden;
        animation: slideUp 0.3s ease;
    }

    /* ===== Scrollbar ===== */
    .modal-content::-webkit-scrollbar {
        width: 6px;
    }

    .modal-content::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 10px;
    }

    /* ===== Title ===== */
    .modal-title {
        position: sticky;
        top: 0;
        z-index: 20;

        background: #fff;

        padding-top: 10px;
        padding-bottom: 20px;

        margin-bottom: 0;

        text-align: center;
    }

    .modal-title::after {
        content: "";
        width: 60px;
        height: 4px;
        background: #3762b8;
        display: block;
        margin: 10px auto 0;
        border-radius: 20px;
    }

    /* ===== Form Group ===== */
    .form-group {
        margin-bottom: 18px;
    }

    .form-group label {
        font-size: 14px;
        font-weight: 600;
        color: #334155;
        margin-bottom: 8px;
        display: block;
    }

    /* ===== Inputs ===== */
    .form-control,
    .form-select,
    select,
    textarea,
    input {
        width: 100%;
        border-radius: 12px !important;
        border: 1px solid #dbe2ea !important;
        padding: 12px 14px !important;
        font-size: 14px !important;
        background: #f8fafc !important;
        transition: all 0.25s ease;
        box-shadow: none !important;
    }

    .form-control:focus,
    .form-select:focus,
    select:focus,
    textarea:focus,
    input:focus {
        border-color: #2563eb !important;
        background: #fff !important;
        box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12) !important;
    }

    textarea {
        resize: none;
    }

    /* ===== Section Box ===== */
    #reminderFields,
    #conversionFields,
    .applicant_div {
        background: #f8fbff;
        border: 1px solid #e2e8f0;
        border-radius: 18px;
        padding: 18px;
        margin-top: 16px;
    }

    /* ===== Choices Multi Select ===== */
    .choices__inner {
        min-height: 48px;
        border-radius: 12px !important;
        border: 1px solid #dbe2ea !important;
        background: #f8fafc !important;
        padding: 6px 10px !important;
    }

    .choices__list--multiple .choices__item {
        background: linear-gradient(135deg, #2563eb, #3b82f6);
        border: none;
        border-radius: 8px;
        padding: 5px 10px;
        font-size: 13px;
        font-weight: 500;
    }

    .choices__input {
        background: transparent !important;
        font-size: 14px;
    }

    /* ===== Buttons ===== */
    .modal-actions {
        display: flex;
        gap: 12px;
        margin-top: 24px;
    }

    .modal-actions .btn {
        flex: 1;
        border-radius: 12px;
        padding: 12px;
        font-size: 15px;
        font-weight: 600;
        border: none;
        transition: all 0.25s ease;
    }

    .btn-secondary {
        background: #e2e8f0 !important;
        color: #334155 !important;
    }

    .btn-secondary:hover {
        background: #cbd5e1 !important;
        transform: translateY(-1px);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 18px rgba(37, 99, 235, 0.25);
    }

    /* ===== Responsive ===== */
    @media (max-width: 576px) {
        .modal-content {
            padding: 18px;
            border-radius: 18px;
        }

        .modal-title {
            font-size: 20px;
        }

        .modal-actions {
            flex-direction: column;
        }
    }

    /* ===== Animations ===== */
    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes slideUp {
        from {
            transform: translateY(20px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    #statusUpdateForm {
        flex: 1;
        overflow-y: auto;
        overflow-x: hidden;
        padding-right: 20px;
        padding-top: 15px;
        /* padding-left: 35px; */

    }

    .modal-actions {
        position: sticky;
        bottom: 0;
        background: #fff;
        padding-top: 15px;
        padding-bottom: 5px;
        z-index: 20;
    }

    /* SCROLLBAR */
    #statusUpdateForm::-webkit-scrollbar {
        width: 6px;
    }

    #statusUpdateForm::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 10px;
    }

    /* MOBILE */
    @media (max-width:576px) {

        .modal-content {
            height: calc(100vh - 20px);
            margin: 10px auto;
            border-radius: 18px;
        }
    }
</style>
@php
    use Illuminate\Support\Facades\DB;
    $lead_statuses = DB::table('lead_statuses')->get();
@endphp
<div id="statusModal" class="modal-overlay" style="display: none;">
    <div class="modal-content">
        <h3 class="modal-title">Update Status</h3>
        <form id="statusUpdateForm">
            <div class="form-group">
                <label for="statusSelect">New Status:</label>
                <select id="statusSelect" name="newStatus" class="form-control" required>
                    <option value="">Select new status</option>
                        @foreach($lead_statuses as $status)
                        @if($status->system_name !== 'Completed' && $status->system_name !=='BOOKED' && $status->system_name!=='Cancelled' )
                            <option value="{{ $status->system_name }}"
                                data-system="{{ $status->system_name }}">
                                {{ $status->display_name }}
                            </option>
                            @endif
                        @endforeach
                </select>
            </div>
            <div class="form-group col-md-6 col-lg-6 mb-2 mobile-schedule-project">
                <label for="">Project</label>
                @php
                    $projects = DB::table('projects')->select('id', 'project_name')->get();
                @endphp

                <select class="form-control" name="prj_id[]" id="prj_id" multiple>
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                    @endforeach
                </select>
            </div>
            <div id="reminderFields">
                <div class="form-grsoup">
                    <label for="remindDate">Reminder Date  <span class="text-danger">*</span></label>
                    <input type="date" name="remindDate" id="remindDate" class="form-control">
                    <!-- <input type="date" name="remindDate" id="remindDate" class="form-control" max="{{ date('Y-m-d') }}"> -->
                </div>
                <div class="form-group">
                    <label for="remindTime">Reminder Time  <span class="text-danger">*</span></label>
                    <input type="time" name="remindTime" id="remindTime" class="form-control">
                </div>
            </div>
            <div id="conversionFields" style="display: none;">
                <div class="form-group">
                    <label for="conversionType">Conversion Type:</label>
                    <select id="conversionType" name="conversionType" class="form-control">
                        <option value="">Select Conversion Type</option>
                        <!-- <option value="Completed">Completed</option> -->
                        <option value="Cancelled">Cancelled</option>
                        <option value="Booked">Booked</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12 applicant_div" style="display: none;">
                <div class="row">
                    <div class="form-group col-md-6 col-lg-6 mb-2">
                        <label for="">Project</label>
                        @php
                            $projects = DB::table('projects')->select('id', 'project_name')->get();
                        @endphp

                        <select class="form-select" name="prj_id" id="prj_id">
                            <option value="">--- Select Project ---</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6 col-lg-6 mb-2">
                        <label for="">Size</label>
                        <input type="text" class="form-control" name="prop_size" id="prop_size"
                            placeholder="Enter Size">
                    </div>
                    <div class="form-group col-md-6 col-lg-6 mb-2">
                        <label for="">Final Price</label>
                        <input type="text" class="form-control" name="final_price" id="final_price"
                            placeholder="Enter final price">
                    </div>
                    <div class="form-group col-md-6 col-lg-6 mb-2">
                        <label for="">Applicant Name</label>
                        <input type="text" class="form-control" name="app_name" id="app_name"
                            placeholder="Enter applicant name">
                    </div>
                    <div class="form-group col-md-6 col-lg-6 mb-2">
                        <label for="">Applicant Contact</label>
                        <input type="number" class="form-control" name="app_contact" id="app_contact"
                            placeholder="Enter applicant contact">
                    </div>
                    <div class="form-group col-md-6 col-lg-6 mb-2">
                        <label for="">Applicant City</label>
                        @php
                            $cities = DB::table('state_district')->select('District')->get();
                        @endphp

                        <select class="form-select" name="app_city" id="app_city">
                            <option value="">---- Select City ----</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->District }}">{{ $city->District }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6 col-lg-6 mb-2">
                        <label for="">Applicant DOB</label>
                        <input type="date" class="form-control" name="app_dob" id="app_dob"
                            placeholder="Enter applicant DOB">
                    </div>
                    <div class="form-group col-md-6 col-lg-6 mb-2">
                        <label for="">Applicant DOA</label>
                        <input type="date" class="form-control" name="app_doa" id="app_doa"
                            placeholder="Enter applicant date of anniversary">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="statusComment">Comment:</label>
                <textarea id="statusComment" name="comment" class="form-control" placeholder="Add any additional comments"
                    rows="4"></textarea>
            </div>
            <div class="modal-actions mb-5">
                <button type="button" id="cancelStatusUpdate" class="btn btn-secondary text-light">Cancel</button>
                <button type="submit" id="confirmStatusUpdate" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>


<script>
    $(document).ready(function() {

        $('#statusSelect').on('change', function() {

            let status = $('#statusSelect').val();
            let dateInput = $('#remindDate');
            let today = new Date().toISOString().split("T")[0];

            // clear old value
            dateInput.val('');

            if (status === "VISIT DONE") {

                // ✅ restrict future
                dateInput.attr('max', today);
                dateInput.removeAttr('min');

            } else {

                // ✅ allow everything
                dateInput.removeAttr('max');
                dateInput.removeAttr('min');

            }

        });

    });
</script>

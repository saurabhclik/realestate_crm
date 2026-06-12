<style>
    .mis-performance-container {
        padding: 0 10px;
        overflow-y: auto !important;
    }

    .stat-card {
        display: flex;
        flex-direction: column;
        background: white;
        border-radius: 12px;
        padding: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .week-details {
        flex: 1;
        overflow-y: auto;
        max-height: 70vh;
    }

    .daily-data {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .current-week {
        border-left: 4px solid #007bff;
        background: #f8f9ff;
    }

    .stat-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 8px;
    }

    .stat-header h6 {
        margin: 0;
        font-size: 15px;
        font-weight: 600;
        color: #333;
    }

    .progress {
        height: 6px;
        border-radius: 3px;
        background: #f0f0f0;
        margin: 8px 0;
    }

    .progress-bar {
        border-radius: 3px;
    }

    .stat-details {
        display: flex;
        justify-content: space-between;
        gap: 8px;
        flex-wrap: wrap;
    }

    .stat-item {
        text-align: center;
        flex: 1;
        min-width: 70px;
    }

    .stat-item small {
        display: block;
        font-size: 10px;
        color: #666;
        margin-bottom: 2px;
    }

    .stat-item strong {
        font-size: 13px;
        color: #333;
    }

    .daily-card {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 10px;
        margin-bottom: 8px;
        border-left: 3px solid #007bff;
    }

    .daily-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 6px;
    }

    .daily-header strong {
        font-size: 13px;
        color: #333;
    }

    .daily-points {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .point-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 8px;
        background: white;
        border-radius: 6px;
        border: 1px solid #e9ecef;
    }

    .point-info {
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .point-name {
        font-size: 12px;
        color: #333;
        font-weight: 600;
        margin-bottom: 2px;
    }

    .point-target {
        font-size: 10px;
        color: #666;
    }

    .point-values {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .point-achieved {
        font-size: 13px;
        font-weight: 700;
        color: #3661b7;
    }

    .point-separator {
        color: #ccc;
        font-size: 10px;
    }

    .point-total-target {
        font-size: 11px;
        color: #666;
        font-weight: 500;
    }

    .point-percentage {
        font-size: 10px;
        font-weight: 600;
        color: #007bff;
        background: #e3f2fd;
        padding: 2px 6px;
        border-radius: 10px;
    }

    .section-title {
        font-size: 13px;
        font-weight: 600;
        color: #495057;
        margin-bottom: 8px;
    }

    .week-toggle {
        transition: transform 0.3s ease;
        font-size: 11px;
        color: #666;
    }

    /* .badge {
    position: static !important;
     animation: none !important;
} */
</style>
@php
    use Illuminate\Support\Facades\DB;
    $leadStatuses = DB::table('lead_statuses')
        ->where('is_active', 1)
        ->where('system_name', '!=', 'CONVERTED')
        ->orderBy('seq')
        ->get();
    $leadStats = DB::table('leads')
        ->selectRaw("
                                    CASE
                                        WHEN UPPER(status) = 'PENDING'
                                            THEN 'pending_lead'
                                        WHEN UPPER(status) = 'CALL SCHEDULED'
                                            THEN 'call_schedule'
                                        WHEN UPPER(status) = 'VISIT SCHEDULED'
                                            THEN 'visit_schedule'
                                        ELSE LOWER(REPLACE(status,' ','_'))
                                    END as status_key,
                                    COUNT(*) as total
                                ")
        ->groupBy('status_key')
        ->pluck('total', 'status_key');
@endphp
@php
    $user = DB::table('users')->where('id', session('user_id'))->first();

    $userType = $user->role;
    $misFeature = \DB::table('software_features')
        ->where('software_name', 'homeeasycrm')
        ->whereRaw("REPLACE(feature_name, ' ', '') = ?", ['mis_management'])
        ->first();

@endphp
@if($misFeature && $misFeature->status == 'active')

    @if($userType == 'admin')
        <div class="fab-mis-daily-form" role="button" style="
                            position: fixed;
                            bottom: 160px;
                            right: 20px;
                            width: 55px;
                            height: 55px;
                            background: #26be33;
                            border-radius: 50%;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            box-shadow: 0 6px 15px rgba(0,0,0,0.25);
                            z-index: 9999;
                            cursor: pointer;
                         ">
            <a href="{{ url('mobile/mis-form') }}" style="
                                color: #fff;
                                font-size: 22px;
                                text-decoration: none;
                                width: 100%;
                                height: 100%;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                           ">
                <i class="fa fa-chart-line"></i>
            </a>
        </div>
    @endif
@endif
@if($userType != 'admin')
    <div style="display:flex;justify-content:center;align-items:center;gap:10px;margin:10px 0;">

        <button onclick="showDashboard('lead')" id="btnLead"
            style="padding:8px 15px;border-radius:20px;background:#3661b7;color:#fff;border:none;">
            Lead Dashboard
        </button>

        <button onclick="showDashboard('mis')" id="btnMis"
            style="padding:8px 15px;border-radius:20px;background:#fff;color:#000;border:none;">
            MIS Dashboard
        </button>

    </div>
@endif
<div id="leadDashboard" class="lead-management-app">
    <div class="lead-status-tabs">
        <div class="tab-scroll-container">
            @php
                $user = DB::table('users')->where('id', session('user_id'))->first();

                $masterOptions = json_decode($user->master_options ?? '[]', true);
                $isAdmin = $user->role === 'admin';
            @endphp
            @foreach($leadStatuses as $status)
                @php
                    $hasAccess = $isAdmin || in_array($status->route_name, $masterOptions);
                @endphp
                @php
                    $systemName = strtoupper(trim($status->system_name));

                    switch ($systemName) {
                        case 'PENDING':
                        case 'PENDING LEAD':
                            $key = 'pending_lead';
                            break;

                        case 'CALL SCHEDULED':
                            $key = 'call_schedule';
                            break;

                        case 'VISIT SCHEDULED':
                            $key = 'visit_schedule';
                            break;

                        default:
                            $key = strtolower(
                                str_replace(' ', '_', $systemName)
                            );
                            break;
                    }
                @endphp
                {{-- <a href="{{ route($status->mobile_route) }}" class="status-tab">
                    <i class="{{ $status->mobile_icon ?? 'fas fa-circle' }}"></i>
                    <span>{{ $status->display_name }}</span>
                    <span>{{ $leadStats[$key] ?? 0 }}</span>
                </a> --}}
                <a @if($hasAccess) href="{{ route($status->mobile_route) }}" @else href="javascript:void(0)"
                style="pointer-events:none; opacity:0.5; cursor:not-allowed;" @endif class="status-tab">

                    <i class="{{ $status->mobile_icon ?? 'fas fa-circle' }}"></i>

                    <span>{{ $status->display_name }}</span>

                    <span>{{ $leadStats[$key] ?? 0 }}</span>

                    @if(!$hasAccess)
                        <i class="fas fa-lock"></i>
                    @endif
                </a>
            @endforeach
        </div>
    </div>
    @include('mobile.notification')
</div>
<div id="misDashboard" style="display:none;">
    <div class="mis-performance-container">

        @if(isset($misStats['week_wise']) && count($misStats['week_wise']) > 0)

            @foreach($misStats['week_wise'] as $weekData)

                <div class="stat-card mb-5 {{ $weekData['week'] == $misStats['current_week'] ? 'current-week' : '' }}">

                    <div class="stat-header" onclick="toggleWeekDetails({{ $weekData['week'] }})" style="cursor: pointer;">
                        <h6>
                            {{ \Carbon\Carbon::parse($weekData['start_date'])->format('d M') }} -
                            {{ \Carbon\Carbon::parse($weekData['end_date'])->format('d M') }}
                        </h6>

                        <div class="d-flex align-items-center gap-2">
                            <span
                                class="point-percentage text-light {{ $weekData['percentage'] >= 100 ? 'bg-success' : ($weekData['percentage'] >= 80 ? 'bg-warning' : 'bg-danger') }}">
                                {{ $weekData['percentage'] }}%
                            </span>
                            <i class="fas fa-chevron-down week-toggle" id="toggleIcon{{ $weekData['week'] }}"></i>
                        </div>
                    </div>

                    <div class="progress mb-2">
                        <div class="progress-bar {{ $weekData['percentage'] >= 100 ? 'bg-success' : ($weekData['percentage'] >= 80 ? 'bg-warning' : 'bg-danger') }}"
                            style="width: {{ min($weekData['percentage'], 100) }}%">
                        </div>
                    </div>

                    <div class="stat-details">
                        <div class="stat-item">
                            <small>Target</small>
                            <strong>{{ $weekData['target'] }}</strong>
                        </div>

                        <div class="stat-item">
                            <small>Achieved</small>
                            <strong>{{ $weekData['achieved'] }}</strong>
                        </div>

                        <div class="stat-item">
                            <small>Progress</small>
                            <strong>{{ $weekData['percentage'] }}%</strong>
                        </div>
                    </div>
                    <div class="week-details" id="weekDetails{{ $weekData['week'] }}" style="display: none;">
                        <div class="point-breakdown mt-3">
                            @foreach($weekData['point_wise_data'] as $pointName => $pointData)
                                @if($pointData['target'] > 0 || $pointData['achieved'] > 0)
                                    <div class="point-item">
                                        <div class="point-info">
                                            <div class="point-name">{{ $pointName }}</div>
                                            <div class="point-target">
                                                Target: {{ $pointData['target'] }} | Achieved: {{ $pointData['achieved'] }}
                                            </div>
                                        </div>
                                        <div class="point-values">
                                            <span class="point-achieved">{{ $pointData['achieved'] }}</span>
                                            <span class="point-separator">/</span>
                                            <span class="point-total-target">{{ $pointData['target'] }}</span>
                                            <span
                                                class="point-percentage text-light {{ $pointData['percentage'] >= 100 ? 'bg-success' : ($pointData['percentage'] >= 80 ? 'bg-warning' : 'bg-danger') }}">
                                                {{ $pointData['percentage'] }}%
                                            </span>
                                        </div>
                                        @if($pointData['target'] > 0)
                                            <div class="progress mt-1" style="height: 4px;">
                                                <div class="progress-bar {{ $pointData['percentage'] >= 100 ? 'bg-success' : ($pointData['percentage'] >= 80 ? 'bg-warning' : 'bg-danger') }}"
                                                    style="width: {{ min($pointData['percentage'], 100) }}%">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

            @endforeach

        @else
            <div class="alert alert-info text-center">
                No MIS data available.
            </div>
        @endif

    </div>
</div>

<script>
    function showDashboard(type) {
        const btnLead = document.getElementById('btnLead');
        const btnMis = document.getElementById('btnMis');

        if (type === 'mis') {
            document.getElementById('misDashboard').style.display = 'block';
            document.getElementById('leadDashboard').style.display = 'none';

            // ADD THESE TWO LINES HERE:
            document.getElementById('statTotalLeads').style.display = 'none';
            document.getElementById('statPerformance').style.display = 'block';

            if (btnMis && btnLead) {
                btnMis.style.background = '#3661b7';
                btnMis.style.color = '#fff';
                btnLead.style.background = '#e9ecef';
                btnLead.style.color = '#333';
            }
        } else {
            document.getElementById('misDashboard').style.display = 'none';
            document.getElementById('leadDashboard').style.display = 'block';

            // ADD THESE TWO LINES HERE:
            document.getElementById('statTotalLeads').style.display = 'block';
            document.getElementById('statPerformance').style.display = 'none';

            if (btnMis && btnLead) {
                btnLead.style.background = '#3661b7';
                btnLead.style.color = '#fff';
                btnMis.style.background = '#e9ecef';
                btnMis.style.color = '#333';
            }
        }
    }
</script>

<script>
    function toggleWeekDetails(weekNumber) {
        const details = document.getElementById('weekDetails' + weekNumber);
        const icon = document.getElementById('toggleIcon' + weekNumber);

        if (details.style.display === 'none') {
            details.style.display = 'block';
            icon.classList.remove('fa-chevron-down');
            icon.classList.add('fa-chevron-up');
        }
        else {
            details.style.display = 'none';
            icon.classList.remove('fa-chevron-up');
            icon.classList.add('fa-chevron-down');
        }
    }

    function openBottomSheet() {
        document.getElementById('leadSheet').style.bottom = '0';
        document.getElementById('compactName').value = '';
        document.getElementById('compactPhone').value = '';
    }

    function closeBottomSheet() {
        document.getElementById('leadSheet').style.bottom = '-100%';
    }

    document.addEventListener('click', function (event) {
        const bottomSheet = document.getElementById('leadSheet');
        if (event.target === bottomSheet) {
            closeBottomSheet();
        }
    });

    document.querySelector('form').addEventListener('submit', function (e) {
        const submitBtn = document.getElementById('SubmitBtn');
        const submitText = document.getElementById('SubmitText');
        const submitSpinner = document.getElementById('SubmitSpinner');

        submitText.classList.add('d-none');
        submitSpinner.classList.remove('d-none');
        submitBtn.disabled = true;
    });
</script>
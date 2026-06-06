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
<div class="lead-management-app">
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
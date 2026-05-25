@php
    use Illuminate\Support\Facades\DB;
    $leadStatuses = DB::table('lead_statuses')
        ->where('is_active', 1)
        ->where('system_name', '!=', 'CONVERTED')
        ->orderBy('seq')
        ->get();
    $leadStats = DB::table('leads')
        ->selectRaw("LOWER(REPLACE(status,' ', '_')) as status_key, COUNT(*) as total")
        ->groupBy('status_key')
        ->pluck('total', 'status_key');
@endphp


<div class="lead-management-app">
    <div class="lead-status-tabs">
        <div class="tab-scroll-container">

            @foreach($leadStatuses as $status)
                @php
                    $key = strtolower(str_replace(' ', '_', $status->system_name));
                @endphp

                <a href="{{ route($status->mobile_route) }}" class="status-tab">

                    <i class="{{ $status->mobile_icon ?? 'fas fa-circle' }}"></i>

                    <span>{{ $status->display_name }}</span>

                    <span>{{ $leadStats[$key] ?? 0 }}</span>

                </a>
            @endforeach

        </div>
    </div>

    @include('mobile.notification')
</div>
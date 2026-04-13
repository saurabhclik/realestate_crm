@extends('mobile.layouts.app')

@section('title', 'Mobile Dashboard | Pro-leadexpertz')

@section('content')
    <div class="dashboard">
        <header class="header">
            <div class="notification shadow">
                <span class="footer-nav-item notification-item position-absolute" style="top:25px !important; right:127px !important; z-index:999999 !important; cursor: default;">
                    <i class="fa-solid fa-bell position-relative">
                        <span class="notification-badge badge">0</span>
                    </i>
                </span>
            </div>
            <div class="app-logo shadow">
                <img src="{{ asset(Session::get('logo')) }}" alt="Enterprise Portal Logo" width="56" height="100"
                    onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                <i class="fas fa-briefcase" style="display:none;"></i>
            </div>

            <div class="d-flex align-items-center justify-content-center gap-2" id="locationLoader">
                <div class="spinner-border" role="status"></div>
                <span>Fetching location...</span>
            </div>

            <div class="toggle-container d-none" id="attendanceToggleContainer">
                @php
                    $hasActiveAttendance = DB::table('attendance')
                        ->where('user_id', session('user_id'))
                        ->whereNull('end_time')
                        ->exists();
                @endphp
                <input type="checkbox" id="attendanceToggle" class="attendance-toggle-checkbox" {{ $hasActiveAttendance ? 'checked' : '' }}>
                <label for="attendanceToggle" class="toggle-label">
                    <span class="toggle-text">Start</span>
                    <span class="toggle-text">End</span>
                    <span class="toggle-handle"></span>
                </label>
                <input type="hidden" id="latitude" name="latitude">
                <input type="hidden" id="longitude" name="longitude">
            </div>

            <h4>Sales Dashboard</h4>
            <p>Welcome, {{ session('user_name') ?? 'User' }}!</p>
        </header>

        <div class="stats-container">
            <div class="stat" role="region" aria-label="Total leads">
                <a href="{{route('mobile.all-leads')}}">
                    <p>Total Leads</p>
                    <h3>{{ number_format($totalLeads ?? 0, 0) }}</h3>
                </a>
            </div>
            <div class="stat" role="region" aria-label="Total tasks">
                <a href="{{route('mobile.tasks')}}">
                    <p>Total Tasks</p>
                    <h3>{{ number_format($taskStats->total_task ?? 0, 0) }}</h3>
                </a>
            </div>
        </div>

       @include('mobile/partials/lead-management')
    </div>

    <!-- FAB Button with Options Menu -->
    <div class="fab-container">
        <div class="fab" role="button" onclick="toggleOptionsMenu()">
            <i class="fa fa-plus"></i>
        </div>
        
        <div class="fab-options-menu" id="fabOptionsMenu">
            <div class="fab-option" onclick="openQuickLeadSheet()">
                <div class="fab-option-icon">
                    <i class="fa fa-bolt"></i>
                </div>
                <span>Quick Lead</span>
            </div>
            <div class="fab-option" onclick="redirectToAddLead()">
                <div class="fab-option-icon">
                    <i class="fa fa-plus-circle"></i>
                </div>
                <span>Add Lead</span>
            </div>
        </div>
    </div>

    <!-- Bottom Sheet for Quick Lead -->
    <div class="bottom-sheet-quick-lead" id="leadSheet">
        <div class="sheet-header">
            <div class="handle"></div>
            <h5>Add Quick Lead</h5>
            <button type="button" class="btn-close float-end" onclick="closeBottomSheet()"></button>
        </div>
        <form method="POST" action="{{route('mobile.quick-leads')}}" class="p-3" id="quickLeadForm">
            @csrf
            <input type="hidden" name="action" value="quick_lead">
            <div class="form floating-form mb-3">
                <input type="text" name="name" autocomplete="off" required placeholder=" " />
                <label class="label-name">
                    <span class="content">Name</span>
                </label>
            </div>

            <div class="form floating-form mb-3">
                <input type="tel" name="phone" autocomplete="off" required placeholder=" " />
                <label class="label-name">
                    <span class="content">Phone Number</span>
                </label>
            </div>

            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-outline-secondary me-2" onclick="closeBottomSheet()">Close</button>
                <button type="submit" class="btn btn-primary" id="SubmitBtn">
                    <span id="SubmitText">Add Lead</span>
                    <span id="SubmitSpinner" class="d-none">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Please wait...
                    </span>
                </button>
            </div>
        </form>
    </div>
    <div class="fab-overlay" id="fabOverlay" onclick="closeOptionsMenu()"></div>
<style>
    .fab-container 
    {
        position: fixed;
        bottom: 80px;
        right: 20px;
        z-index: 1000;
    }

    .fab-container .fab 
    {
        width: 47px;
        height: 46px;
        background: linear-gradient(135deg, #3762b8 0%, #3762b8 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        transition: all 0.3s ease;
        color: white;
        font-size: 24px;
    }

    .fab-container .fab:hover 
    {
        transform: scale(1.1);
    }

    .fab-options-menu 
    {
        position: absolute;
        bottom: 85px;
        right: 0;
        display: flex;
        flex-direction: column;
        gap: 12px;
        visibility: hidden;
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    .fab-options-menu.show 
    {
        visibility: visible;
        opacity: 1;
        transform: translateY(0);
    }

    .fab-option 
    {
        display: flex;
        align-items: center;
        gap: 12px;
        background: white;
        padding: 10px 18px;
        border-radius: 50px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        cursor: pointer;
        transition: all 0.2s ease;
        white-space: nowrap;
    }

    .fab-option:hover 
    {
        transform: scale(1.05);
        background: #f8f9fa;
    }

    .fab-option-icon 
    {
        width: 32px;
        height: 32px;
        background: linear-gradient(135deg, #3762b8 0%, #3762b8 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 14px;
    }

    .fab-option span 
    {
        font-size: 14px;
        font-weight: 500;
        color: #333;
    }

    .fab-overlay 
    {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.3);
        z-index: 999;
        display: none;
    }

    .fab-overlay.show
    {
        display: block;
    }

    .bottom-sheet-quick-lead 
    {
        position: fixed;
        bottom: -100%;
        left: 0;
        right: 0;
        background: white;
        border-radius: 20px 20px 0 0;
        z-index: 1001;
        transition: bottom 0.3s ease;
        box-shadow: 0 -2px 20px rgba(0, 0, 0, 0.1);
        max-height: 90vh;
        overflow-y: auto;
    }

    .bottom-sheet-quick-lead.show {
        bottom: 0;
    }

    .bottom-sheet-quick-lead .sheet-header 
    {
        padding: 12px 20px;
        border-bottom: 1px solid #eee;
        position: relative;
        text-align: center;
    }

    .bottom-sheet-quick-lead .sheet-header .handle 
    {
        width: 40px;
        height: 4px;
        background: #ddd;
        border-radius: 2px;
        margin: 0 auto 10px;
    }

    .bottom-sheet-quick-lead .sheet-header h5 
    {
        margin: 0;
        display: inline-block;
    }

    .bottom-sheet-quick-lead .sheet-header .btn-close 
    {
        position: absolute;
        right: 15px;
        top: 15px;
        background: transparent;
        border: none;
        font-size: 20px;
        cursor: pointer;
    }

    .floating-form 
    {
        position: relative;
        margin-bottom: 1rem;
    }

    .floating-form input 
    {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 8px;
        outline: none;
        font-size: 16px;
        transition: all 0.3s;
    }

    .floating-form input:focus 
    {
        border-color: #667eea;
    }

    .floating-form .label-name 
    {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        background: white;
        padding: 0 5px;
        transition: 0.3s;
        pointer-events: none;
        color: #999;
    }

    .floating-form input:focus ~ .label-name,
    .floating-form input:not(:placeholder-shown) ~ .label-name 
    {
        top: 0;
        font-size: 12px;
        color: #3762b8;
    }
     /* LEAD MANAGEMENT - GRID 3 IN A ROW (non-scrollable, fixed) */
    .lead-management-app {
      flex-shrink: 0;
      background: white;
      margin: 0 16px 8px 16px;
      border-radius: 28px;
      padding: 8px 0;
      box-shadow: var(--shadow-sm);
    }

    .lead-status-tabs {
      overflow-x: visible !important;
      white-space: normal !important;
      max-height: none;
    }

    .tab-scroll-container {
      display: grid !important;
      grid-template-columns: repeat(4, 1fr) !important;
      gap: 8px !important;
      /* padding: 8px 12px !important; */
    }

    .status-tab {
      display: flex !important;
      flex-direction: column !important;
      align-items: center !important;
      justify-content: center !important;
      text-align: center !important;
      padding: 10px 6px !important;
      background: #f8f9fa !important;
      border-radius: 16px !important;
      white-space: normal !important;
      word-break: break-word !important;
      text-decoration: none !important;
      transition: all 0.2s ease;
      font-weight: 600;
      color: #1e293b;
    }
    .status-tab i {
      font-size: 20px !important;
      margin-bottom: 6px !important;
      color: var(--primary);
    }
    .status-tab span:first-of-type {
      font-size: 11px !important;
      display: block !important;
      font-weight: 500;
    }
    .status-tab span:last-child {
      background: #e2e8f0;
      color: #0f172a;
      border-radius: 30px;
      padding: 2px 8px;
      font-size: 10px;
      font-weight: 700;
      margin-left: 0 !important;
      margin-top: 5px;
      display: inline-block;
    }
    .status-tab:hover {
      background: var(--primary-light);
      transform: translateY(-1px);
    }

    /* Activity filter pills */
    .status-filter-section {
      flex-shrink: 0;
      margin: 0 16px 12px 16px;
    }
    .status-filter-header h4 {
      font-size: 1rem;
      font-weight: 700;
      margin: 0;
    }
    .status-filter-buttons {
      display: flex;
      gap: 12px;
      margin-top: 8px;
    }
    .status-filter-btn {
      background: white;
      border: none;
      padding: 8px 20px;
      border-radius: 40px;
      font-weight: 600;
      font-size: 0.85rem;
      color: #334155;
      box-shadow: var(--shadow-sm);
      transition: all 0.2s;
    }
    .status-filter-btn.active {
      background: var(--primary);
      color: white;
    }

    /* SCROLLABLE ACTIVITIES AREA */
    .scrollable-activities {
      flex: 1;
      overflow-y: auto;
      padding: 0 16px 80px 16px;
      margin-top: 4px;
      scroll-behavior: smooth;
    }

    /* Lead cards inside activities */
    .lead-card {
      background: white;
      border-radius: 24px;
      padding: 16px;
      margin-bottom: 14px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      border-left: 4px solid var(--primary);
    }
    .d-flex {
      display: flex;
    }
    .justify-content-between {
      justify-content: space-between;
    }
    .align-items-start {
      align-items: start;
    }
    .lead-actions {
      display: flex;
      gap: 10px;
    }
    .action-btn {
      background: #eef2ff;
      width: 32px;
      height: 32px;
      border-radius: 30px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      color: var(--primary);
      text-decoration: none;
    }
    .lead-meta-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 8px;
      margin: 12px 0;
      font-size: 0.8rem;
    }
    .meta-label {
      font-weight: 600;
      color: #5b6e8c;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() 
    {
        const oldFab = document.querySelector('.lead-management-app .fab');
        if (oldFab) 
        {
            oldFab.removeAttribute('onclick');
        }
    });

    function toggleOptionsMenu() 
    {
        const menu = document.getElementById('fabOptionsMenu');
        const overlay = document.getElementById('fabOverlay');
        
        if (menu) 
        {
            menu.classList.toggle('show');
        }
        if (overlay) 
        {
            overlay.classList.toggle('show');
        }
    }

    function closeOptionsMenu() 
    {
        const menu = document.getElementById('fabOptionsMenu');
        const overlay = document.getElementById('fabOverlay');
        
        if (menu) menu.classList.remove('show');
        if (overlay) overlay.classList.remove('show');
    }

    function redirectToAddLead() 
    {
        closeOptionsMenu();
        window.location.href = "{{ route('mobile.leads.create') }}";
    }

    function openQuickLeadSheet() 
    {
        closeOptionsMenu(); 
        const sheet = document.getElementById('leadSheet');
        if (sheet) 
        {
            sheet.classList.add('show');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeBottomSheet() 
    {
        const sheet = document.getElementById('leadSheet');
        if (sheet) 
        {
            sheet.classList.remove('show');
            document.body.style.overflow = '';
        }
    }

    document.addEventListener('DOMContentLoaded', function() 
    {
        const quickLeadForm = document.getElementById('quickLeadForm');
        if (quickLeadForm) 
        {
            quickLeadForm.addEventListener('submit', function(e) 
            {
                const submitBtn = document.getElementById('SubmitBtn');
                const submitText = document.getElementById('SubmitText');
                const submitSpinner = document.getElementById('SubmitSpinner');
                
                if (submitBtn && submitText && submitSpinner) 
                {
                    submitBtn.disabled = true;
                    submitText.classList.add('d-none');
                    submitSpinner.classList.remove('d-none');
                }
            });
        }
        document.addEventListener('keydown', function(e) 
        {
            if (e.key === 'Escape') 
            {
                closeBottomSheet();
                closeOptionsMenu();
            }
        });

        const sheet = document.getElementById('leadSheet');
        if (sheet)
        {
            const observer = new MutationObserver(function(mutations) 
            {
                mutations.forEach(function(mutation) 
                {
                    if (mutation.attributeName === 'class') 
                    {
                        if (sheet.classList.contains('show')) 
                        {
                            document.body.style.overflow = 'hidden';
                        } 
                        else 
                        {
                            document.body.style.overflow = '';
                        }
                    }
                });
            });
            observer.observe(sheet, { attributes: true });
        }
    });
    function openBottomSheet() 
    {
        openQuickLeadSheet();
    }
</script>
@endsection

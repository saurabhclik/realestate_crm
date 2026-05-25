@php
    $activeFeatures = session('active_features', []);
    $softwareType = session('software_type', 'real_state');
    $userType = session('user_type');

    $menuAccess = [
        'real_state' => [
            'dashboard',
            'staff_management',
            'master',
            'leads_management',
            'transfer_leads',
            'mis_management',
            'task_management',
            'inventory',
            'post_sale',
            'events',
            'attendance',
            'employee_track',
            'expense_management',
            'reports',
            'settings',
            'data_center',
        ],
        'lead_management' => [
            'dashboard',
            'staff_management',
            'master',
            'leads_management',
            'transfer_leads',
            'mis_management',
            'task_management',
            'post_sale',
            'events',
            'attendance',
            'employee_track',
            'expense_management',
            'reports',
            'settings',
            'data_center',
        ],
        'task_management' => ['dashboard', 'task_management', 'settings', 'reports'],
        'mis_management' => ['dashboard', 'mis_management', 'settings'],
        'exhibition' => ['dashboard', 'exhibition', 'settings'],
    ];

    $currentMenuAccess = $menuAccess[$softwareType] ?? $menuAccess['real_state'];
@endphp

<div class="vertical-menu">
    <div data-simplebar="" class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                @if (in_array('dashboard', $currentMenuAccess))
                    <li>
                        <a
                            href="{{ $softwareType === 'task_management' ? route('task.list') : ($softwareType === 'mis_management' ? route('mis.summary-report') : route('dashboard')) }}">
                            <span>Dashboards</span>
                        </a>
                    </li>
                @endif
                <li>
                    @if ($userType != 'salesman' && $userType != 'post_sale' && $userType != 'reception')
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-user"></i>
                            <span key="t-dashboards">Staff Management</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li>
                                <a href="{{ route('users.create') }}" key="t-tui-calendar">Add users</a>
                            </li>
                            <li>
                                <a href="{{ route('users.index') }}" key="t-user-list">User List</a>
                            </li>
                            {{-- <li>
                            <a href="{{route('promote.list')}}" key="t-full-promote">Promote List</a>
                        </li> --}}
                            @if ($userType == 'admin')
                                <li>
                                    <a href="{{ route('designation.list') }}" key="t-full-designation">Designation
                                        List</a>
                                </li>
                            @endif
                            <li>
                                <a href="{{ route('company.hierarchy') }}" key="t-full-designation">Company
                                    Hierarchy</a>
                            </li>
                        </ul>
                </li>
                @endif
                <li>
                    @if ($userType != 'salesman' && $userType != 'post_sale' && $userType != 'reception')
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-store"></i>
                            <span key="t-ecommerce">Master</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @if (in_array('master', $currentMenuAccess) && ($userType == 'admin' || $userType == 'team_manager'))
                                <li>
                                    <a href="{{ route('category.list') }}" key="t-category">Property Type</a>
                                </li>
                                <li>
                                    <a href="{{ route('project.category') }}" key="t-category">
                                        {{ $softwareType === 'lead_management' ? 'Product Category' : 'Property Category' }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('project.sub_category') }}"
                                        key="t-shops">{{ $softwareType === 'lead_management' ? 'Product Sub Category' : 'Property Sub Category' }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('source.platform') }}" key="t-platform">Source Platform</a>
                                </li>
                                <li>
                                    <a href="{{ route('campaign') }}" key="t-campaign">campaigns</a>
                                </li>
                                <li>
                                    <a href="{{ route('project.name') }}" key="t-project">
                                        {{ $softwareType === 'lead_management' ? 'Name Of Products' : 'Name Of Projects' }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('property.name') }}" key="t-property">
                                        Property Details
                                    </a>
                                </li>
                                @if ($userType == 'admin' && in_array('post_sale', $activeFeatures) && in_array('post_sale', $currentMenuAccess))
                                    <li>
                                        <a href="{{ route('check.list') }}" key="t-check">Check List</a>
                                    </li>
                                @endif

                                @if (in_array('attendance', $currentMenuAccess))
                                    <li>
                                        <a href="{{ route('attendance') }}" key="t-shops">Attendance</a>
                                    </li>
                                @endif
                                @if (in_array('project_detail_page', $activeFeatures))
                                    <li>
                                        <a href="{{ route('inquiry_question') }}" key="t-shops">Inquiry Question</a>
                                    </li>
                                @endif
                                @if ($userType == 'admin')
                                    <li>
                                        <a href="{{ route('integration.settings') }}" key="t-shops">API
                                            Integrations</a>
                                    </li>
                                @endif
                            @endif
                            @if (in_array('mis_management', $activeFeatures) && in_array('mis_management', $currentMenuAccess))
                                <li>
                                    <a href="{{ route('mis.points') }}" key="t-shops">MIS Points</a>
                                </li>
                            @endif
                            @if (in_array('exhibition', $currentMenuAccess))
                                <li>
                                    <a href="{{ route('messaging.templates.create') }}" key="t-shops">Create
                                        Template</a>
                                </li>
                            @endif
                        </ul>
                </li>
                @endif

                @php
                    $dynamicLeadStatuses = DB::table('lead_statuses')
                        ->where('is_active', 1)
                        ->orderBy('seq', 'asc')
                        ->get();

                    $mainStatuses = [
                        'NEW LEAD',
                        'PENDING',
                        'PROCESSING',
                        'INTERESTED',
                        'MEETING SCHEDULED',
                        'CALL SCHEDULED',
                        'VISIT SCHEDULED',
                        'VISIT DONE',
                        'BOOKED',
                        'COMPLETED',
                        'CANCELLED',
                        'FUTURE LEAD',
                    ];

                    $otherStatuses = [
                        'NOT REACHABLE',
                        'WRONG NUMBER',
                        'CHANNEL PARTNER',
                        'NOT INTERESTED',
                        'NOT PICKED',
                        'LOST',
                    ];
                @endphp

                @if (in_array('leads_management', $currentMenuAccess) && $userType != 'post_sale')
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-bitcoin"></i>
                        <span key="t-crypto">Leads Management</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('lead.add') }}">
                                Add Lead
                            </a>
                        </li>
                        @if ($userType == 'admin' || $userType == 'team_manager')
                            <li>
                                <a href="{{ route('lead.allocate') }}">
                                    Allocate Lead
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('lead.unallocated') }}">
                                    Unallocated Lead
                                </a>
                            </li>
                        @endif

                        @if($userType != 'reception')
                            <li>
                                <a href="{{ route('transfer_list.lead') }}">
                                    Transfer Leads
                                </a>
                            </li>
                            @foreach($dynamicLeadStatuses as $status)

                                @php
                                    $routeName = $status->route_name;
                                    $displayName = strtoupper(trim($status->display_name));
                                @endphp

                                @if(
                                    !empty($routeName) &&
                                    in_array($displayName, $mainStatuses)
                                )
                                    <li>
                                        <a href="{{ route($routeName) }}">
                                            {{ ucwords(strtolower($status->display_name)) }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <span>Others Leads</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    @foreach($dynamicLeadStatuses as $status)

                                        @php
                                            $routeName = $status->route_name;
                                            $displayName = strtoupper(trim($status->display_name));
                                        @endphp

                                        @if(
                                            !empty($routeName) &&
                                            in_array($displayName, $otherStatuses)
                                        )
                                            <li>
                                                <a href="{{ route($routeName) }}">
                                                    {{ ucwords(strtolower($status->display_name)) }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('lead.all_lead') }}">
                                    All Lead
                                </a>
                            </li>
                    </ul>
                </li>
                @endif

                @endif

                @if (in_array('transfer_leads', $currentMenuAccess) && ($userType == 'admin' || $userType == 'team_manager' || $userType != 'post_sale') && $userType != 'reception')
                    <li>
                        <a href="javascript:(0);" class="has-arrow waves-effect">
                            <i class='bx bx-transfer-alt'></i>
                            <span key="t-tasks">Transfer Leads</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li>
                                <a href="{{ route('lead.transfer') }}" class="">
                                    <span key="t-projects">Transfer </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('lead.transfer_history') }}" class="">
                                    <span key="t-blog">Transfer History</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if (in_array('mis_management', $currentMenuAccess) &&
                        in_array('mis_management', $activeFeatures) &&
                        ($userType == 'admin' || $userType == 'team_manager' || $userType != 'post_sale') &&  $userType != 'reception')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class='bx bx-line-chart'></i>
                            <span key="t-tasks">MIS Management</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li>
                                <a href="{{ route('mis.targets') }}" class="">Mis Target</a>
                            </li>
                            <li>
                                <a href="{{ route('mis.summary-report') }}" class="">Summary Report</a>
                            </li>
                            <li>
                                <a href="{{ route('mis.daily-report') }}" class="">Daily Report</a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if (in_array('task_management', $currentMenuAccess) && in_array('task_management', $activeFeatures) && $userType != 'reception')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-task"></i>
                            <span key="t-tasks">Task Management</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li>
                                <a href="{{ route('task.create') }}" key="t-create-task">Create Task</a>
                            </li>
                            <li>
                                <a href="{{ route('task.list') }}" key="t-task-list">Task List</a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if (in_array('data_center', $currentMenuAccess) &&
                        ($userType == 'admin' ||
                            $userType == 'salesman' ||
                            $userType == 'team_manager' ||
                            $softwareType == 'task_management'))
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-data"></i>
                            <span>Data Center</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li>
                                <a href="{{ route('data-center.index') }}">All Data</a>
                            </li>
                            <li>
                                <a href="{{ route('data-center.create') }}">Add Data</a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if (in_array('inventory', $currentMenuAccess) && in_array('inventory_management', $activeFeatures) && $userType != 'reception')
                    <li>
                        <a href="{{ route('inventory.index') }}" class="">
                            <i class='bx bx-box'></i>
                            <span key="t-blog">Inventory</span>
                        </a>
                    </li>
                @endif

                @if (in_array('post_sale', $currentMenuAccess) && in_array('post_sale', $activeFeatures) &&$userType != 'reception')
                    <li>
                        <a href="{{ route('post-sale.index') }}" class="">
                            <i class='bx bx-receipt'></i>
                            <span key="t-blog">Post Sale</span>
                        </a>
                    </li>
                @endif
                @if (in_array('post_sale', $currentMenuAccess) && in_array('exhibition', $activeFeatures) && $userType != 'post_sale' && $userType != 'reception')
                    <li>
                        <a href="{{ route('exhibition.index') }}">
                            <i class="bx bx-group"></i>
                            <span>Exhibition Management</span>
                        </a>
                    </li>
                @endif
                @if (in_array('events', $currentMenuAccess) && $userType != 'post_sale' && $userType != 'reception')
                    <li>
                        <a href="{{ route('event.index') }}" class="">
                            <i class="bx bx-briefcase-alt"></i>
                            <span key="t-jobs">Events</span>
                        </a>
                    </li>
                @endif

                @if (in_array('attendance', $currentMenuAccess) && ($userType == 'admin' || $userType == 'team_manager' || $userType != 'reception'))
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-user-circle"></i>
                            <span key="t-authentication">Attendance</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li>
                                <a href="{{ route('attendance.daily') }}" key="t-login">Daily</a>
                            </li>
                            <li>
                                <a href="{{ route('attendance.monthly') }}" key="t-login-2">Monthly</a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if (in_array('employee_track', $currentMenuAccess) &&
                        in_array('employee_tracking', $activeFeatures) &&
                        ($userType == 'admin' || $userType == 'team_manager' || $userType != 'post_sale') &&  $userType != 'reception')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-file"></i>
                            <span key="t-utility">Employee Track</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li>
                                <a href="{{ route('employee.tracking') }}" key="t-starter-page">Tracking</a>
                            </li>
                            <li>
                                <a href="{{ route('employee.timeline') }}" key="t-maintenance">Timeline</a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if (in_array('expense_management', $currentMenuAccess) && in_array('expense_management', $activeFeatures) && $userType != 'reception')
                    <li>
                        <a href="{{ route('expense.index') }}" class="">
                            <i class="bx bx-tone"></i>
                            <span key="t-ui-elements">Expense Management</span>
                        </a>
                    </li>
                @endif
                @if (in_array('reports', $currentMenuAccess) && $userType != 'reception')
                    <li>
                        <a href="{{ route('reports') }}" class="">
                            <i class="bx bx-bar-chart"></i>
                            <span key="t-tables">Reports</span>
                        </a>
                    </li>
                @endif
                @if (in_array('settings', $currentMenuAccess) && $userType != 'reception')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bxs-bar-chart-alt-2"></i>
                            <span key="t-charts">Setting</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @if ($userType == 'admin' || $userType == 'team_manager')
                                <li>
                                    <a href="{{ route('system-configuration.index') }}" key="t-apex-charts">System Confirguration</a>
                                </li>
                            @endif
                            <li>
                                <a href="{{ route('setting.profile') }}" key="t-chartjs-charts">Profile</a>
                            </li>
                            <li>
                                <a key="t-flot-charts"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    style="cursor:pointer;">Logout</a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</div>

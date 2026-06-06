<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterMenusSeeder extends Seeder
{
    public function run(): void
    {
        // ==========================================
        // 1. DEFINE ALLOWED STATUSES
        // ==========================================
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
            'Completed',
            'Cancelled',
            'FUTURE LEAD',
            'WHATSAPP'

        ];

        $otherStatuses = [
            'NOT REACHABLE',
            'WRONG NUMBER',
            'CHANNEL PARTNER',
            'NOT INTERESTED',
            'NOT PICKED',
            'LOST',
        ];

        // Combine them into one list for easy checking
        $allowedStatuses = array_merge($mainStatuses, $otherStatuses);
        $menus = [
            // --- Dashboard ---
            // [
            //     'name' => 'Dashboards',
            //     'route' => 'dashboard',
            //     'category' => 'Dashboard',
            // ],

            // --- Staff Management ---
            [
                'name' => 'Add users',
                'route' => 'users.create',
                'category' => 'Staff',
            ],
            [
                'name' => 'User List',
                'route' => 'users.index',
                'category' => 'Staff',
            ],
            [
                'name' => 'Designation List',
                'route' => 'designation.list',
                'category' => 'Staff',
            ],
            [
                'name' => 'Company Hierarchy',
                'route' => 'company.hierarchy',
                'category' => 'Staff',
            ],

            // --- Master (The items you already had) ---
            [
                'name' => 'Property Type',
                'route' => 'category.list',
                'category' => 'Master',
            ],
            [
                'name' => 'Property Category',
                'route' => 'project.category',
                'category' => 'Master',
            ],
            [
                'name' => 'Property Sub Category',
                'route' => 'project.sub_category',
                'category' => 'Master',
            ],
            [
                'name' => 'Source Platform',
                'route' => 'source.platform',
                'category' => 'Master',
            ],
            [
                'name' => 'Campaigns',
                'route' => 'campaign',
                'category' => 'Master',
            ],
            [
                'name' => 'Name Of Projects',
                'route' => 'project.name',
                'category' => 'Master',
            ],
            [
                'name' => 'Channel Partner Platform',
                'route' => 'channel.partner.platform',
                'category' => 'Master',
            ],
            [
                'name' => 'Property Details',
                'route' => 'property.name',
                'category' => 'Master',
            ],
            [
                'name' => 'Check List',
                'route' => 'check.list',
                'category' => 'Master',
            ],
            [
                'name' => 'Attendance (Master)',
                'route' => 'attendance',
                'category' => 'Master',
            ],
            [
                'name' => 'Inquiry Question',
                'route' => 'inquiry_question',
                'category' => 'Master',
            ],
            [
                'name' => 'MIS Points',
                'route' => 'mis.points',
                'category' => 'Master',
            ],
            [
                'name' => 'Create Template',
                'route' => 'messaging.templates.create',
                'category' => 'Master',
            ],

            // --- Leads Management (Static Links Only) ---
            [
                'name' => 'Add Lead',
                'route' => 'lead.add',
                'category' => 'Leads',
            ],
            [
                'name' => 'Allocate Lead',
                'route' => 'lead.allocate',
                'category' => 'Leads',
            ],
            [
                'name' => 'Unallocated Lead',
                'route' => 'lead.unallocated',
                'category' => 'Leads',
            ],
            [
                'name' => 'Transfer Leads',
                'route' => 'transfer_list.lead',
                'category' => 'Leads',
            ],
            [
                'name' => 'All Lead',
                'route' => 'lead.all_lead',
                'category' => 'Leads',
            ],

            // --- Transfer Leads (Top Level) ---
            [
                'name' => 'Transfer',
                'route' => 'lead.transfer',
                'category' => 'Transfer',
            ],
            [
                'name' => 'Transfer History',
                'route' => 'lead.transfer_history',
                'category' => 'Transfer',
            ],

            // --- MIS Management ---
            [
                'name' => 'Mis Target',
                'route' => 'mis.targets',
                'category' => 'MIS',
            ],
            [
                'name' => 'Summary Report',
                'route' => 'mis.summary-report',
                'category' => 'MIS',
            ],
            [
                'name' => 'Daily Report',
                'route' => 'mis.daily-report',
                'category' => 'MIS',
            ],

            // --- Task Management ---
            [
                'name' => 'Create Task',
                'route' => 'task.create',
                'category' => 'Tasks',
            ],
            [
                'name' => 'Task List',
                'route' => 'task.list',
                'category' => 'Tasks',
            ],

            // --- Data Center ---
            [
                'name' => 'Data Center',
                'route' => 'data-center.index',
                'category' => 'General',
            ],

            // --- Inventory ---
            [
                'name' => 'Inventory',
                'route' => 'inventory.index',
                'category' => 'Inventory',
            ],

            // --- Post Sale ---
            [
                'name' => 'Post Sale',
                'route' => 'post-sale.index',
                'category' => 'Post Sale',
            ],

            // --- Exhibition Management ---
            [
                'name' => 'Exhibition Management',
                'route' => 'exhibition.index',
                'category' => 'Exhibition',
            ],

            // --- Events ---
            [
                'name' => 'Events',
                'route' => 'event.index',
                'category' => 'Events',
            ],

            // --- Attendance (Top Level Menu) ---
            [
                'name' => 'Daily Attendance',
                'route' => 'attendance.daily',
                'category' => 'Attendance',
            ],
            [
                'name' => 'Monthly Attendance',
                'route' => 'attendance.monthly',
                'category' => 'Attendance',
            ],

            // --- Employee Track ---
            [
                'name' => 'Tracking',
                'route' => 'employee.tracking',
                'category' => 'Employee Track',
            ],
            [
                'name' => 'Timeline',
                'route' => 'employee.timeline',
                'category' => 'Employee Track',
            ],

            // --- Expense Management ---
            [
                'name' => 'Expense Management',
                'route' => 'expense.index',
                'category' => 'Expense',
            ],

            // --- Reports ---
            [
                'name' => 'Reports',
                'route' => 'reports',
                'category' => 'Reports',
            ],

            // --- Settings ---
            [
                'name' => 'System Confirguration', // Kept typo as it appears in your HTML
                'route' => 'system-configuration.index',
                'category' => 'Settings',
            ],
            [
                'name' => 'Profile',
                'route' => 'setting.profile',
                'category' => 'Settings',
            ],
        ];

        // ==========================================
        // 3. DYNAMIC MENUS FROM lead_statuses TABLE (FILTERED)
        // ==========================================
        $dynamicLeadStatuses = DB::table('lead_statuses')
            ->where('is_active', 1)
            ->get();

        foreach ($dynamicLeadStatuses as $status) {
            // ONLY ADD if system_name is in the allowed lists
            if (in_array(trim($status->system_name), $allowedStatuses)) {
                $menus[] = [
                    'name' => $status->display_name,
                    'route' => $status->route_name,
                    'category' => 'Leads',
                ];
            }
        }

        foreach ($menus as $menu) {
            // Using 'master_menus' table as we added the column there
            DB::table('master_menus')->updateOrInsert(
                ['route' => $menu['route']],
                [
                    'name' => $menu['name'],
                    'category' => $menu['category'], // Saving the category
                    'updated_at' => now(),
                    'created_at' => now(),
                ]
            );
        }
    }
}

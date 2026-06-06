<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleRoutePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $rolePermissions = [

            // Empty array = access to everything
            'admin' => [],

            'team_manager' => [
                'designation.list',
                'check.list',
                'lead.completed',
                'lead.cancelled'
            ],

            'salesman' => [
                // Add routes to hide/restrict

                'users.create',
                'users.index',
                'designation.list',
                'company.hierarchy',
                'category.list',
                'project.category',
                'project.sub_category',
                'source.platform',
                'campaign',
                'project.name',
                'channel.partner.platform',
                'property.name',
                'check.list',
                'attendance',
                'inquiry_question',
                'mis.points',
                'lead.allocate',
                'lead.unallocated',
                'lead.completed',
                'lead.cancelled',
                'system-configuration.index'
            ],

            'reception' => [
                // Add routes to hide/restrict
                'category.list',
                'project.category',
                'project.sub_category',
                'source.platform',
                'campaign',
                'project.name',
                'channel.partner.platform',
                'property.name',
                'check.list',
                'attendance',
                'inquiry_question',
                'mis.points',
                'users.create',
                'users.index',
                'designation.list',
                'company.hierarchy',
                'lead.allocate',
                'lead.unallocated',
                'transfer_list.lead',
                'lead.processing',
                'lead.interested',
                'lead.call_scheduled',
                'lead.visit_scheduled',
                'lead.visit_done',
                'lead.new',
                'lead.not_reachable',
                'lead.not_picked',
                'lead.lost',
                'lead.channel_partner',
                'lead.wrong_number',
                'lead.not_interested',
                'lead.pending',
                'lead.future',
                'lead.meeting_scheduled',
                'lead.booked',
                'lead.completed',
                'lead.cancelled',
                'lead.transfer',
                'lead.transfer_history',
                'mis.targets',
                'mis.summary-report',
                'mis.daily-report',
                'inventory.index',
                'post-sale.index',
                'exhibition.index',
                'event.index',
                'attendance.daily',
                'attendance.monthly',
                'employee.tracking',
                'employee.timeline',
                'expense.index',
                'reports',
                'system-configuration.index'
            ],

            'task_management' => [
                // Add routes to hide/restrict
                'designation.list',
                'category.list',
                'project.category',
                'project.sub_category',
                'source.platform',
                'campaign',
                'project.name',
                'channel.partner.platform',
                'property.name',
                'check.list',
                'attendance',
                'inquiry_question',
                'lead.allocate',
                'lead.unallocated',
                'lead.completed',
                'lead.cancelled',
                'system-configuration.index'
            ],

            'post_sale' => [
                // Add routes to hide/restrict
                'users.create',
                'users.index',
                'designation.list',
                'company.hierarchy',
                'category.list',
                'project.category',
                'project.sub_category',
                'source.platform',
                'campaign',
                'project.name',
                'channel.partner.platform',
                'property.name',
                'check.list',
                'attendance',
                'inquiry_question',
                'mis.points',
                'lead.add',
                'lead.all_lead',
                'lead.allocate',
                'lead.unallocated',
                'transfer_list.lead',
                'lead.processing',
                'lead.interested',
                'lead.call_scheduled',
                'lead.visit_scheduled',
                'lead.visit_done',
                'lead.new',
                'lead.not_reachable',
                'lead.not_picked',
                'lead.lost',
                'lead.channel_partner',
                'lead.wrong_number',
                'lead.not_interested',
                'lead.pending',
                'lead.future',
                'lead.meeting_scheduled',
                'lead.booked',
                'lead.completed',
                'lead.cancelled',
                'lead.transfer',
                'lead.transfer_history',
                'mis.targets',
                'mis.summary-report',
                'mis.daily-report',
                'exhibition.index',
                'event.index',
                // 'attendance.daily',
                // 'attendance.monthly',
                'employee.tracking',
                'employee.timeline',
                'system-configuration.index'

            ],
        ];

        foreach ($rolePermissions as $roleName => $routes) {

            DB::table('role_mst')
                ->where('role_name', $roleName)
                ->update([
                    'unselected_routes' => json_encode($routes),
                    'updated_date' => now(),
                ]);
        }
    }
}

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
                'check.list'
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
            DB::table('role_mst')->updateOrInsert(
                ['role_name' => $roleName],
                [
                    'unselected_routes' => json_encode($routes),
                    'updated_date' => now(),
                    'created_date' => now(),
                ]
            );
        }

        // Reset all users
        DB::statement("
            UPDATE users
            SET
                is_special = 0,
                master_options = JSON_ARRAY()
        ");

        // Rebuild permissions from role_mst
        DB::statement("
            UPDATE users u
            JOIN (
                SELECT
                    u.id,
                    CONCAT(
                        '[',
                        GROUP_CONCAT(
                            DISTINCT CONCAT('\"', m.route, '\"')
                            ORDER BY m.route
                            SEPARATOR ','
                        ),
                        ']'
                    ) AS permissions_to_save
                FROM users u
                JOIN role_mst r
                    ON r.role_name = u.role
                JOIN master_menus m
                    ON JSON_CONTAINS(
                        COALESCE(r.unselected_routes, '[]'),
                        JSON_QUOTE(m.route)
                    ) = 0
                WHERE
                    u.is_special = 0
                    AND (
                        u.master_options IS NULL
                        OR u.master_options = '[]'
                    )
                GROUP BY u.id
            ) p ON p.id = u.id
            SET
                u.master_options = p.permissions_to_save,
                u.is_special = 1
        ");
    }
}

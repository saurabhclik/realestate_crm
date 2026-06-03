<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterMenusSeeder extends Seeder
{
    public function run(): void
    {
        $menus = [
            [
                'name' => 'Property Type',
                'route' => 'category.list',
            ],
            [
                'name' => 'Property Category',
                'route' => 'project.category',
            ],
            [
                'name' => 'Property Sub Category',
                'route' => 'project.sub_category',
            ],
            [
                'name' => 'Source Platform',
                'route' => 'source.platform',
            ],
            [
                'name' => 'Campaigns',
                'route' => 'campaign',
            ],
            [
                'name' => 'Name Of Projects',
                'route' => 'project.name',
            ],
            [
                'name' => 'Channel Partner Platform',
                'route' => 'channel.partner.platform',
            ],
            [
                'name' => 'Property Details',
                'route' => 'property.name',
            ],
            [
                'name' => 'Check List',
                'route' => 'check.list',
            ],
            [
                'name' => 'Attendance',
                'route' => 'attendance',
            ],
            [
                'name' => 'Inquiry Question',
                'route' => 'inquiry_question',
            ],
            [
                'name' => 'API Integrations',
                'route' => 'integration.settings',
            ],
            [
                'name' => 'MIS Points',
                'route' => 'mis.points',
            ],
            [
                'name' => 'Create Template',
                'route' => 'messaging.templates.create',
            ],
        ];

        foreach ($menus as $menu) {
            DB::table('master_menus')->updateOrInsert(
                ['route' => $menu['route']],
                [
                    'name' => $menu['name'],
                    'updated_at' => now(),
                    'created_at' => now(),
                ]
            );
        }
    }
}

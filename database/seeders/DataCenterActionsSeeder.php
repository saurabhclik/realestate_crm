<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataCenterActionsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('data_center_actions')->truncate(); // Clears old checkbox data

        $time = now();

        $actions = [
            // OPTIONS FOR "NEW DATA" TAB
            ['display_name' => 'Followup', 'system_name' => 'NEW_FOLLOWUP', 'type' => 'new', 'seq' => 1, 'is_active' => 1, 'updated_date' => $time, 'created_at' => $time, 'updated_at' => $time],
            ['display_name' => 'Convert to Lead', 'system_name' => 'NEW_CONVERTED', 'type' => 'new', 'seq' => 2, 'is_active' => 1, 'updated_date' => $time, 'created_at' => $time, 'updated_at' => $time],
            ['display_name' => 'Reject', 'system_name' => 'NEW_REJECTED', 'type' => 'new', 'seq' => 3, 'is_active' => 1, 'updated_date' => $time, 'created_at' => $time, 'updated_at' => $time],

            // OPTIONS FOR "FOLLOW-UP" TAB
            ['display_name' => 'Not Converted', 'system_name' => 'FU_NOT_CONVERTED', 'type' => 'followup', 'seq' => 4, 'is_active' => 1, 'updated_date' => $time, 'created_at' => $time, 'updated_at' => $time],
            ['display_name' => 'Not Picked', 'system_name' => 'FU_NOT_PICKED', 'type' => 'followup', 'seq' => 5, 'is_active' => 1, 'updated_date' => $time, 'created_at' => $time, 'updated_at' => $time],
            ['display_name' => 'Interested', 'system_name' => 'FU_INTERESTED', 'type' => 'followup', 'seq' => 6, 'is_active' => 1, 'updated_date' => $time, 'created_at' => $time, 'updated_at' => $time],
            ['display_name' => 'Convert to Lead', 'system_name' => 'FU_CONVERTED', 'type' => 'followup', 'seq' => 7, 'is_active' => 1, 'updated_date' => $time, 'created_at' => $time, 'updated_at' => $time],

            // OPTIONS FOR "REJECTED" TAB
            ['display_name' => 'Followup', 'system_name' => 'REJ_FOLLOWUP', 'type' => 'rejected', 'seq' => 8, 'is_active' => 1, 'updated_date' => $time, 'created_at' => $time, 'updated_at' => $time],
            ['display_name' => 'Convert to Lead', 'system_name' => 'REJ_CONVERTED', 'type' => 'rejected', 'seq' => 9, 'is_active' => 1, 'updated_date' => $time, 'created_at' => $time, 'updated_at' => $time],
        ];

        DB::table('data_center_actions')->insert($actions);
    }
}
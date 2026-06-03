<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        $this->addIndexIfMissing('leads', 'idx_leads_user_status_date', ['user_id', 'status', 'lead_date']);
        $this->addIndexIfMissing('leads', 'idx_leads_user_remind_status', ['user_id', 'remind_date', 'status']);
        $this->addIndexIfMissing('leads', 'idx_leads_status_date', ['status', 'lead_date']);
        $this->addIndexIfMissing('leads', 'idx_leads_user_allocated', ['user_id', 'is_allocated', 'status']);
        $this->addIndexIfMissing('leads', 'idx_leads_unallocated_owner', ['unallocated_lead', 'is_allocated']);
        $this->addIndexIfMissing('leads', 'idx_leads_birthdays', ['app_dob']);
        $this->addIndexIfMissing('leads', 'idx_leads_anniversaries', ['app_doa']);

        $this->addIndexIfMissing('lead_comments', 'idx_lead_comments_lead_created', ['lead_id', 'created_date']);
        $this->addIndexIfMissing('lead_comments', 'idx_lead_comments_user_created', ['user_id', 'created_date']);
        $this->addIndexIfMissing('lead_comments', 'idx_lead_comments_status_created', ['status', 'created_date']);

        $this->addIndexIfMissing('transfer_leads', 'idx_transfer_leads_to_lead', ['to', 'lead_id']);

        $this->addIndexIfMissing('tasks', 'idx_tasks_status_end_date', ['status', 'end_date']);
        $this->addIndexIfMissing('tasks', 'idx_tasks_created_status', ['created_at', 'status']);
        $this->addIndexIfMissing('task_user', 'idx_task_user_user_task', ['user_id', 'task_id']);
        $this->addIndexIfMissing('task_comment', 'idx_task_comment_task_created', ['task_id', 'created_at']);
    }

    public function down()
    {
        $this->dropIndexIfExists('task_comment', 'idx_task_comment_task_created');
        $this->dropIndexIfExists('task_user', 'idx_task_user_user_task');
        $this->dropIndexIfExists('tasks', 'idx_tasks_created_status');
        $this->dropIndexIfExists('tasks', 'idx_tasks_status_end_date');

        $this->dropIndexIfExists('transfer_leads', 'idx_transfer_leads_to_lead');

        $this->dropIndexIfExists('lead_comments', 'idx_lead_comments_status_created');
        $this->dropIndexIfExists('lead_comments', 'idx_lead_comments_user_created');
        $this->dropIndexIfExists('lead_comments', 'idx_lead_comments_lead_created');

        $this->dropIndexIfExists('leads', 'idx_leads_anniversaries');
        $this->dropIndexIfExists('leads', 'idx_leads_birthdays');
        $this->dropIndexIfExists('leads', 'idx_leads_unallocated_owner');
        $this->dropIndexIfExists('leads', 'idx_leads_user_allocated');
        $this->dropIndexIfExists('leads', 'idx_leads_status_date');
        $this->dropIndexIfExists('leads', 'idx_leads_user_remind_status');
        $this->dropIndexIfExists('leads', 'idx_leads_user_status_date');
    }

    private function addIndexIfMissing(string $table, string $index, array $columns): void
    {
        if (!Schema::hasTable($table) || $this->indexExists($table, $index) || !$this->hasColumns($table, $columns)) {
            return;
        }

        Schema::table($table, function (Blueprint $table) use ($index, $columns) {
            $table->index($columns, $index);
        });
    }

    private function dropIndexIfExists(string $table, string $index): void
    {
        if (!Schema::hasTable($table) || !$this->indexExists($table, $index)) {
            return;
        }

        Schema::table($table, function (Blueprint $table) use ($index) {
            $table->dropIndex($index);
        });
    }

    private function indexExists(string $table, string $index): bool
    {
        $database = DB::getDatabaseName();

        return !empty(DB::select(
            'select 1 from information_schema.statistics where table_schema = ? and table_name = ? and index_name = ? limit 1',
            [$database, $table, $index]
        ));
    }

    private function hasColumns(string $table, array $columns): bool
    {
        foreach ($columns as $column) {
            if (!Schema::hasColumn($table, $column)) {
                return false;
            }
        }

        return true;
    }
};

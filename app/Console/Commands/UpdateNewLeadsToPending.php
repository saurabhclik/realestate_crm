<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class UpdateNewLeadsToPending extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'leads:update-to-pending';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update NEW LEAD status to PENDING after 24 hours';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Starting to update NEW LEADs to PENDING...');
        
        try 
        {
            $updatedCount = DB::table('leads')
                ->where('status', 'NEW LEAD')
                ->where('created_at', '<=', Carbon::now()->subHours(24))
                ->update([
                    'status' => 'PENDING',
                    'last_comment' => 'Status automatically updated from NEW LEAD to PENDING after 24 hours',
                    'updated_at' => Carbon::now()
                ]);
            
            $this->info("Successfully updated {$updatedCount} leads from NEW LEAD to PENDING");
            if ($updatedCount > 0) 
            {
                Log::info("Auto-updated {$updatedCount} leads from NEW LEAD to PENDING status", [
                    'timestamp' => Carbon::now(),
                    'threshold_hours' => 24
                ]);
            }
            
        } 
        catch (\Exception $e) 
        {
            $this->error('Error updating leads: ' . $e->getMessage());
            Log::error('Failed to update NEW LEADs to PENDING', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return 1;
        }
        return 0;
    }
}
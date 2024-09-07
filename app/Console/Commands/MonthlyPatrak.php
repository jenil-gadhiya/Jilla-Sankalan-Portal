<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ExpirePatrak;
use App\Models\PatrakUser;
use Carbon\Carbon;

class MonthlyPatrak extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'renew:monthly_patrak';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Monthly Patrak Expire';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Fetch All ExpirePatrak 
        $fetchAllPreviousPatraks = PatrakUser::all();

        // dd($fetchAllPreviousPatraks);
        foreach ($fetchAllPreviousPatraks as $PreviousPatraks) {

            $startDate = Carbon::now()->startOfMonth();
            $month_name = Carbon::now()->format('F - Y');
            $endDate = Carbon::parse($startDate)->endOfMonth()->toDateString();

            // Check for if already current month patarak was entered 
            $expirepatrak = ExpirePatrak::where('user_id', $PreviousPatraks->user_id)->where('patrak_id', $PreviousPatraks->patrak_id)->where('current_month', $month_name)->count();

            if ($expirepatrak == 0) {

                // Create new Patrak
                $newData = new ExpirePatrak;
                $newData->user_id = $PreviousPatraks->user_id;
                $newData->patrak_id = $PreviousPatraks->patrak_id;
                $newData->current_month = $month_name;
                $newData->start_date = $startDate;
                $newData->end_date = $endDate;
                $newData->save();

            }
        }
        // return Command::SUCCESS;
    }
}
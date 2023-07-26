<?php

namespace App\Console\Commands;

use App\Models\customer;
use Illuminate\Console\Command;

class cCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cCron:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        customer::whereDate( 'created_at', '<=', now()->subDays(30))->delete();
    }
}

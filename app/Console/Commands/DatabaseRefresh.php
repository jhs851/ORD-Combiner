<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class DatabaseRefresh extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh and seed the database. Also deletes the cache.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Artisan::call('migrate:refresh', [
            '--force' => true,
            '--seed' => true,
        ]);

        Artisan::call('cache:clear');

        $this->info('Refreshed.');
    }
}

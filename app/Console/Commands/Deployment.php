<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class Deployment extends Command
{
    protected $signature   = 'lgh:deploy';
    protected $description = 'Application deployment script';

    public function handle() : void
    {
        Artisan::call('down');
        Artisan::call('route:cache');
        Artisan::call('config:cache');
        Artisan::call('view:clear');
        Artisan::call('migrate', ['--force' => true]);
        Artisan::call('auth:clear-resets');
        Artisan::call('storage:link');
        Artisan::call('up');

        $this->info("Deployment complete");
    }
}

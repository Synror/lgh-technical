<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class Installation extends Command
{
    protected $signature   = 'lgh:install';
    protected $description = 'Application installation script';

    public function handle() : void
    {
        Artisan::call('down');
        Artisan::call('migrate', ['--force' => true]);
        Artisan::call('db:seed');
        Artisan::call('route:cache');
        Artisan::call('config:cache');
        Artisan::call('view:clear');
        Artisan::call('storage:link');
        Artisan::call('up');

        $this->info("Installation complete");
    }
}

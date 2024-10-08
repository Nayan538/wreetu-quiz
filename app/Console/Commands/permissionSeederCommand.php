<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class permissionSeederCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permission:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Artisan::call('db:seed', [
            '--class' => 'PermissionMasterTableSeeder'
        ]);

        Artisan::call('db:seed', [
            '--class' => 'PermissionTableSeed'
        ]);

        $this->info('Permissions tables seeded successfully!');
    }
}

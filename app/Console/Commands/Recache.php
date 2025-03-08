<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Recache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Project Cache Refresh';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('filament:optimize-clear');
        $this->call('optimize:clear');
        $this->call('optimize');
        $this->call('filament:optimize');
    }
}

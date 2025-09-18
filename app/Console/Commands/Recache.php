<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;

final class Recache extends Command
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
    public function handle(): void
    {
        $this->call('filament:optimize-clear');
        $this->call('optimize:clear');
        $this->call('optimize');
        $this->call('filament:optimize');
    }
}

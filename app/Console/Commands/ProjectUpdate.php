<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;

final class ProjectUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Project Update';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->call('migrate');
        $this->call('shield:generate', [
            '--all' => true,
            '--panel' => 'admin',
            '--option' => 'policies_and_permissions',
            '--ignore-existing-policies' => true,
        ]);
        $this->call('filament:optimize-clear');
        $this->call('optimize:clear');
    }
}

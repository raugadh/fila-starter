<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;

final class DevIde extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:dev';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate IDE Helpers.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->call('ide-helper:generate');
        $this->call('ide-helper:models', [
            '--nowrite' => true,
            '--write-eloquent-helper' => true,
            '--reset' => true,
        ]);
        $this->call('ide-helper:meta');
    }
}

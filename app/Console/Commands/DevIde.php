<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DevIde extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dev:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate IDE Helpers.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('ide-helper:generate');
        $this->call('ide-helper:models', [
            '--nowrite' => true,
        ]);
        $this->call('ide-helper:meta');

    }
}

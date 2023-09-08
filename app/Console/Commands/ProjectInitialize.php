<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ProjectInitialize extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Project Initialization';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('migrate:fresh', [
            '--force' => true,
        ]);
        $this->call('shield:generate', [
            '--all' => true,
        ]);
        $this->call('db:seed', [
            '--force' => true,
        ]);
        $this->call('optimize:clear');
    }
}

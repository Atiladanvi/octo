<?php

namespace Octo\Console;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'octo:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the octo';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->info("\nOcto Installer");
        $this->info("--------------------\n");

        $this->call('laravel-mail-editor:install');
    }
}

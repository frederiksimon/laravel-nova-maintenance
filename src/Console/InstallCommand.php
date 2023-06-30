<?php

namespace Marshmallow\Maintenance\Console;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mm-maintenance:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the Marshmallow Maintenance package, including config and view.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('vendor:publish', ['--tag' => 'mm-maintenance', '--force' => true]);
        $this->info('Marshmallow Maintenance was installed successfully.');
    }
}

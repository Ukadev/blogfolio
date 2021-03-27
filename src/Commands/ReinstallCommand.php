<?php

namespace Ukadev\Blogfolio\Commands;

use Illuminate\Console\Command;
use phpDocumentor\Reflection\Types\True_;

class ReinstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blogfolio:reinstall';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Blogfolio reinstall command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('## Blogfolio reInstall ##');
        try {
            $this->call('migrate:reset');
            $this->call('blogfolio:install');
        }Catch(\Exception $e){
            $this->info('## ERROR MESSAGE ##');
            $this->info($e->getMessage());
            die;
        }
        return true;
    }
}

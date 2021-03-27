<?php

namespace Ukadev\Blogfolio\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blogfolio:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Blogfolio install command';

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
        $this->info('## Blogfolio Install ##');

        try{
            $this->info('## Installing laravel Breeze for login system ##');
            Artisan::call('breeze:install');
            $this->info('## DONE ##');
            $this->info('## Publishing vendors ##');
            Artisan::call('vendor:publish --all');
            $this->info('## DONE ##');
        }Catch(\Exception $e){
            $this->info('## ERROR MESSAGE ##');
            $this->info($e->getMessage());
            die;
        }

        $content = <<<EOF
<?php
return array(
	'store' => 'database',
	'table' => 'settings',
	'connection' => null,
	'keyColumn' => 'key',
	'valueColumn' => 'value'
);
EOF;
        try {
            $this->info('Overwriting config Settings');
            if(file_exists(base_path() . "/config/settings.php")){
                unlink(base_path() . "/config/settings.php");
            }
            $f = @fopen(base_path() . "/config/settings.php", "w");
            if ($f !== false) {
                fwrite($f, $content);
                fclose($f);
            }
        }Catch(\Exception $e){
            $this->info('Unable to set Settings file: Please set it manually following the next link:');
            $this->info('https://github.com/ukadev/blogfolio/wiki/Generate-Settings-File');
            die;
        }
        $this->info('Migrating database');
        try{
            $this->call('migrate');
            $this->info('Adding default data to the database');
            $this->call('db:seed', ['--class' => 'BlogfolioSeeder']);
            $this->info('Default data inserted successfully');
            $this->info('You can enter the panel browing this url:');
            $this->info(app('url')->to('/').'/panel');
        }Catch(\Exception $e){
            $this->info('## ERROR MESSAGE ##');
            $this->info($e->getMessage());
            die;
        }
        return true;
    }
}

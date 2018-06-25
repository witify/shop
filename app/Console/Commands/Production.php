<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class Production extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'production';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sitemap, cache and optimizations';

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
        Artisan::call("sitemap");
        $this->info('Sitemap created in /public/sitemap.xml');
        Artisan::call("config:cache");
        $this->info('Configurations cached');
        Artisan::call("route:cache");
        $this->info('Routes cached');
    }
}

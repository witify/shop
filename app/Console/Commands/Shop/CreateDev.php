<?php

namespace App\Console\Commands\Shop;

use App\User;
use Illuminate\Console\Command;

class CreateDev extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shop:dev';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates an dev user';

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
        $name = $this->anticipate("Enter the dev's name:", ['God']);
        $email = $this->anticipate("Enter the dev's email:", ['dev@witify.io']);

        User::create([
            'email' => $email,
            'name' => $name,
            'password' => bcrypt('secret'),
            'role' => 'dev',
            'api_token' => str_random(60)
        ]);

        $this->info('Dev account created (' . $email . ')');
    }
}

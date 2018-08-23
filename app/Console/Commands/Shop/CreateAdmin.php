<?php

namespace App\Console\Commands\Shop;

use App\User;
use Illuminate\Console\Command;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shop:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates an admin';

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
        $adminName = $this->anticipate("Enter the administrator's name:", ['Shop Master']);
        $adminEmail = $this->anticipate("Enter the administrator's email:", ['admin@witify.io']);

        User::create([
            'email' => $adminEmail,
            'name' => $adminName,
            'password' => bcrypt('secret'),
            'role' => 'admin',
            'api_token' => str_random(60)
        ]);

        $this->info('Admin account created (' . $adminEmail . ')');
    }
}

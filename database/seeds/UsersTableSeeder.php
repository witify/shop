<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'John Doe (dev)',
            'email' => 'dev@witify.io',
            'password' => bcrypt('secret'),
            'role' => 'dev',
            'api_token' => str_random(60)
        ]);

        User::create([
            'name' => 'John Doe (admin)',
            'email' => 'admin@witify.io',
            'password' => bcrypt('secret'),
            'role' => 'admin',
            'api_token' => str_random(60)
        ]);
        
        User::create([
            'name' => 'John Doe (client)',
            'email' => 'client@witify.io',
            'password' => bcrypt('secret'),
            'role' => 'client',
            'api_token' => str_random(60)
        ]);
    }
}

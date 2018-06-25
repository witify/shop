<?php

use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\ProductCategory::class, 10)->create([
            'parent_id' => 1
        ]);

        factory(\App\ProductCategory::class, 89)->create();

        factory(\App\Product::class, 1000)->create();
    }
}

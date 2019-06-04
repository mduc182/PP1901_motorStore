<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<=10; $i++)
        {
            DB::table('products')->insert(
                [
                    'pdname' => Str::random(10),
                    'plate' => Str::random(10),
                    'color' => Str::random(10),
                    'type' => Str::random(10),
                    'detail' => Str::random(20),
                    'year' => rand(1, 10),
                    'price' => rand(10, 100),
                    'created_at' => date('Y-m-d H-i-s'),
                    'updated_at' => date('Y-m-d H-i-s'),

                ]
            );
        }
    }
}

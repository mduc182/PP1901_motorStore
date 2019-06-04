<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<=5;$i++)
        {
            DB::table('categories')->insert(
                [
                    'catename'=>Str::random(10),
                    'parent_id'=>rand(0,3),

                    'created_at'=>date('Y-m-d H-i-s'),
                    'updated_at'=>date('Y-m-d H-i-s'),

                ]
            );
        }
    }
}

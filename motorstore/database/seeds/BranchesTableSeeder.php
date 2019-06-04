<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BranchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <= 10; $i++) {
            DB::table('branches')->insert(
                [
                    'address' => Str::random(10),
                    'phone' => Str::random(10),
                    'created_at' => date('Y-m-d H-i-s'),
                    'updated_at' => date('Y-m-d H-i-s'),

                ]
            );
        }
    }
}

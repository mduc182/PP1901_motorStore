<?php

use Illuminate\Database\Seeder;

class BranchProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        for ($i = 0; $i <= 5; $i++)
        {
            DB::table('branch_products')->insert(
                [
                    'branch_id' => rand(1, 10),
                    'product_id' => rand(1, 10),
                    'created_at' => date('Y-m-d H-i-s'),
                    'updated_at' => date('Y-m-d H-i-s'),

                ]
            );
        }
    }
}

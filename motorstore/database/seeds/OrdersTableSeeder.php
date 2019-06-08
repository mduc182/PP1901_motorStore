<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            for($i=0;$i<=5;$i++)
            {
                DB::table('orders')->insert(
                    [
                        'address'=>Str::random(10),
                        'salecode'=>Str::random(10),
                        'phone'=>Str::random(10),
                        'user_id'=>rand(1,10),
                        'created_at'=>date('Y-m-d H-i-s'),
                        'updated_at'=>date('Y-m-d H-i-s'),

                    ]
                );
            }
        }
    }
}

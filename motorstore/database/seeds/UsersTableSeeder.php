<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class UsersTableSeeder extends Seeder
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
            DB::table('users')->insert(
            [
               'name'=>Str::random(10),
               'email'=>Str::random(10),
               'password'=>Str::random(10),
                'created_at'=>date('Y-m-d H-i-s'),
                'updated_at'=>date('Y-m-d H-i-s'),

            ]
            );
        }
    }
}

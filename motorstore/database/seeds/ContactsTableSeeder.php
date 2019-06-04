<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <= 5; $i++) {
            DB::table('contacts')->insert(
                [
                    'notes' => Str::random(10),
                    'user_id'=>rand(1,10),

                    'created_at' => date('Y-m-d H-i-s'),
                    'updated_at' => date('Y-m-d H-i-s'),

                ]
            );
        }
    }
}

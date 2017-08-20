<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('emails')->truncate();

        for ($i = 0; $i < 20; $i++) {
            DB::table('emails')->insert([
                'email' => str_random(10) . '@gmail.com'
            ]);
        }
    }
}

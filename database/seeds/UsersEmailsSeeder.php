<?php

use Illuminate\Database\Seeder;

class UsersEmailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++) {
            DB::table('users__emails')->insert([
                'user_id' => random_int(1, 3),
                'email_id' => random_int(1, 20)
            ]);
        }
    }
}

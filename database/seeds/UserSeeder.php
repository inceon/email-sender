<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        User::create( [
            'email' => 'test@gmail.com' ,
            'password' => Hash::make( '111111' ) ,
            'name' => 'Test Name' ,
        ] );

        User::create( [
            'email' => 'angrysome@gmail.com' ,
            'password' => Hash::make( '111111' ) ,
            'name' => 'Angrysome' ,
        ] );

        User::create( [
            'email' => 'angrysome@mail.ru' ,
            'password' => Hash::make( '111111' ) ,
            'name' => 'Lol Kek' ,
        ] );
    }
}

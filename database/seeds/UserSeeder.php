<?php

use App\Email;
use App\Role;
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

        $role_user = Role::where('name', 'User')->first();
        $role_admin = Role::where('name', 'Admin')->first();

        $user = new User();
        $user->email = 'test@gmail.com';
        $user->password = Hash::make( '111111' );
        $user->name = 'Test Name';
        $user->save();
        $user->roles()->attach($role_user);
        $user->emails()->attach(Email::find(random_int(1, 20)));

        $user = new User();
        $user->email = 'angrysome@gmail.com';
        $user->password = Hash::make( '111111' );
        $user->name = 'Angrysome';
        $user->save();
        $user->roles()->attach($role_admin);
        $user->emails()->attach(Email::find(random_int(1, 20)));

        $user = new User();
        $user->email = 'angrysome@mail.ru';
        $user->password = Hash::make( '111111' );
        $user->name = 'Lol Kek';
        $user->save();
        $user->roles()->attach($role_user);
        $user->emails()->attach(Email::find(random_int(1, 20)));
    }
}

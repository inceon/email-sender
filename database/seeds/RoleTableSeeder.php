<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        Role::create( [
            'name' => 'User' ,
            'description' => 'A normal user',
        ] );

        Role::create( [
            'name' => 'Admin' ,
            'description' => 'A admin role',
        ] );
    }
}

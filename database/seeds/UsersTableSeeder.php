<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 1)->create([
            'email' => 'admin@user.com',
            'role' => \App\User::ROLE_ADMIN
        ]);
        factory(\App\User::class, 1)->create([
            'email' => 'user@user.com',
            'role' => \App\User::ROLE_USER
        ]);
    }
}

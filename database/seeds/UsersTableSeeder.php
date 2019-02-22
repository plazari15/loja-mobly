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
        \App\User::create([
            'name' => 'Pedro',
            'email' => 'plazari96@gmail.com',
            'password' => bcrypt('admin'),
            'is_admin' => true
        ]);
    }
}
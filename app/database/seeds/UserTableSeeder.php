<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
            'id' => '1',
            'real_name' => 'mikadamczyk',
            'email' => 'mikadamczyk@gmail.com',
            'password' => Hash::make('admin')
        ));
        User::create(array(
            'id' => '2',
            'real_name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin')
        ));
        User::create(array(
            'id' => '3',
            'real_name' => 'other',
            'email' => 'other@gmail.com',
            'password' => Hash::make('admin')
        ));
    }
}
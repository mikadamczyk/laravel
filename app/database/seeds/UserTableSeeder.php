<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
            'email' => 'mikadamczyk@gmail.com',
            'password' => Hash::make('admin')
        ));
    }
}
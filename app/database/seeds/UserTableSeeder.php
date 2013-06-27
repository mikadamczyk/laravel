<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
            'id' => '1',
            'email' => 'mikadamczyk@gmail.com',
            'password' => Hash::make('admin')
        ));
    }
}
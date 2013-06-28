<?php

class DevicesTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('devices')->delete();

        $devices = array(
            array(
                'id' => '1',
                'name' => 'Device 1',
            ),
            array(
                'id' => '2',
                'name' => 'Device 2',
            ),
            array(
                'id' => '3',
                'name' => 'Device 3',
            ),
        );

        // Uncomment the below to run the seeder
        DB::table('devices')->insert($devices);
    }

}
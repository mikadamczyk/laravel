<?php

class ObjectsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('objects')->delete();

        $objects = array(
                array(
                        'id' => '1',
                        'name' => 'Object 1',
                ),
                array(
                        'id' => '2',
                        'name' => 'Object 2',
                ),
                array(
                        'id' => '3',
                        'name' => 'Object 3',
                ),
        );

        // Uncomment the below to run the seeder
        DB::table('objects')->insert($objects);
    }

}
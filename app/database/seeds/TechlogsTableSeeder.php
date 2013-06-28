<?php

class TechlogsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('techlogs')->delete();

        $techlogs = array(
                array(
                        'id' => '1',
                        'user_id' => '1',
                        'device_id' => '1',
                        'type_id' => '1',
                        'title' => 'Title 1',
                        'description' => 'Description 1',
                        'try_to_fix' => 'Try to fix 1',
                        'remarks' => 'Remarks 1',
                ),
                array(
                        'id' => '2',
                        'user_id' => '2',
                        'device_id' => '2',
                        'type_id' => '2',
                        'title' => 'Title 2',
                        'description' => 'Description 2',
                        'try_to_fix' => 'Try to fix 2',
                        'remarks' => 'Remarks 2',
                ),
                array(
                        'id' => '3',
                        'user_id' => '3',
                        'device_id' => '3',
                        'type_id' => '3',
                        'title' => 'Title 3',
                        'description' => 'Description 3',
                        'try_to_fix' => 'Try to fix 3',
                        'remarks' => 'Remarks 3',
                ),
        );

        // Uncomment the below to run the seeder
        DB::table('techlogs')->insert($techlogs);
    }

}
<?php

class ObslogsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('obslogs')->delete();

        $obslogs = array(
                array(
                        'id' => '1',
                        'user_id' => '1',
                        'object_id' => '1',
                        'program_id' => '1',
                        'telescope_id' => '1',
                        'detector_id' => '1',
                        'filter_id' => '1',
                ),
                array(
                        'id' => '2',
                        'user_id' => '2',
                        'object_id' => '2',
                        'program_id' => '2',
                        'telescope_id' => '2',
                        'detector_id' => '2',
                        'filter_id' => '2',
                ),
                array(
                        'id' => '3',
                        'user_id' => '3',
                        'object_id' => '3',
                        'program_id' => '3',
                        'telescope_id' => '3',
                        'detector_id' => '3',
                        'filter_id' => '3',
                ),
        );

        // Uncomment the below to run the seeder
        DB::table('obslogs')->insert($obslogs);
    }

}
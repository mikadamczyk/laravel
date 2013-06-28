<?php

class DetectorsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('detectors')->delete();

        $detectors = array(
            array(
                'id' => '1',
                'name' => 'Detector 1',
            ),
            array(
                'id' => '2',
                'name' => 'Detector 2',
            ),
            array(
                'id' => '3',
                'name' => 'Detector 3',
            ),                
        );

        // Uncomment the below to run the seeder
        DB::table('detectors')->insert($detectors);
    }

}
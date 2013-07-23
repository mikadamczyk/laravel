<?php

class FlatsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('flats')->delete();

        $flats = array(
                array(
                        'id' => '1',
                        'name' => 'Skyflat',
                ),
                array(
                        'id' => '2',
                        'name' => 'Domeflat',
                ),
                array(
                        'id' => '3',
                        'name' => 'Sky and dome flat',
                ),
        );

        // Uncomment the below to run the seeder
        DB::table('flats')->insert($flats);
    }

}
<?php

class TelescopesTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('telescopes')->delete();

        $telescopes = array(
                array(
                        'id' => '1',
                        'name' => 'Telescope 1',
                ),
                array(
                        'id' => '2',
                        'name' => 'Telescope 2',
                ),
                array(
                        'id' => '3',
                        'name' => 'Telescope 3',
                ),
        );

        // Uncomment the below to run the seeder
        DB::table('telescopes')->insert($telescopes);
    }

}
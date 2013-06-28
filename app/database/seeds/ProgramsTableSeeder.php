<?php

class ProgramsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('programs')->delete();

        $programs = array(
                array(
                        'id' => '1',
                        'name' => 'Program 1',
                ),
                array(
                        'id' => '2',
                        'name' => 'Program 2',
                ),
                array(
                        'id' => '3',
                        'name' => 'Program 3',
                ),
        );

        // Uncomment the below to run the seeder
        DB::table('programs')->insert($programs);
    }

}
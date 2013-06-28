<?php

class FiltersTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('filters')->delete();

        $filters = array(
                array(
                        'id' => '1',
                        'name' => 'Filter 1',
                ),
                array(
                        'id' => '2',
                        'name' => 'Filter 2',
                ),
                array(
                        'id' => '3',
                        'name' => 'Filter 3',
                ),
        );

        // Uncomment the below to run the seeder
        DB::table('filters')->insert($filters);
    }

}
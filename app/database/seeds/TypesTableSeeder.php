<?php

class TypesTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('types')->delete();

        $types = array(
                array(
                        'id' => '1',
                        'name' => 'Type 1',
                ),
                array(
                        'id' => '2',
                        'name' => 'Type 2',
                ),
                array(
                        'id' => '3',
                        'name' => 'Type 3',
                ),
        );

        // Uncomment the below to run the seeder
        DB::table('types')->insert($types);
    }

}
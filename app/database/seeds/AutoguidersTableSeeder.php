<?php

class AutoguidersTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('autoguiders')->delete();

        $autoguiders = array(
                array(
                        'id' => '1',
                        'name' => 'Jac',
                ),
                array(
                        'id' => '2',
                        'name' => 'Max',
                ),
                array(
                        'id' => '3',
                        'name' => 'PHD',
                ),
                array(
                        'id' => '4',
                        'name' => 'Oth',
                ),
                array(
                        'id' => '5',
                        'name' => 'Man',
                ),
                array(
                        'id' => '6',
                        'name' => 'Off',
                ),
        );

        // Uncomment the below to run the seeder
        DB::table('autoguiders')->insert($autoguiders);
    }

}
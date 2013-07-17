<?php

class ConditionsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('conditions')->delete();

        $conditions = array(
                array(
                        'id' => '1',
                        'name' => 'Condition 1',
                ),
                array(
                        'id' => '2',
                        'name' => 'Condition 2',
                ),
                array(
                        'id' => '3',
                        'name' => 'Condition 3',
                ),
        );

        // Uncomment the below to run the seeder
        DB::table('conditions')->insert($conditions);
    }

}
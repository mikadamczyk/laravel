<?php

class MessagesTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('messages')->delete();

        $messages = array(
            array(
                    'user_id' => '1',
                    'title' => 'Lorem Ipsum 1',
                    'description' => 'Description 1',
                    'sticky' => '1',
            ),
            array(
                    'user_id' => '1',
                    'title' => 'Lorem Ipsum 2',
                    'description' => 'Description 2',
                    'sticky' => '0',
            ),
            array(
                    'user_id' => '1',
                    'title' => 'Lorem Ipsum 3',
                    'description' => 'Description 3',
                    'sticky' => '0',
            )
        );

        // Uncomment the below to run the seeder
        DB::table('messages')->insert($messages);
    }

}
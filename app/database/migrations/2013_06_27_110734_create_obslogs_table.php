<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateObslogsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obslogs', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
			$table->integer('object_id');
			$table->integer('program_id');
			$table->integer('telescope_id');
			$table->integer('detector_id');
			$table->integer('filter_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('obslogs');
    }

}

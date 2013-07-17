<?php

use Illuminate\Database\Migrations\Migration;

class CreateConditions extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('conditions', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('deleted');
			$table->integer('hidden');
			$table->string('name');
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
		Schema::drop('conditions');
	}

}
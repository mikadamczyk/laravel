<?php

use Illuminate\Database\Migrations\Migration;

class CreateAutoguidersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('autoguiders', function(Blueprint $table) {
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
            Schema::drop('autoguiders');
	}

}
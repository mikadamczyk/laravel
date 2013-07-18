<?php

use Illuminate\Database\Migrations\Migration;

class AddObshoursToObslog extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	    Schema::table('obslogs', function($table)
	    {
		    $table->integer('obs_hours');
	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	    Schema::table('obslogs', function($table)
	    {
		    $table->dropColumn('obs_hours');
		});
	}

}
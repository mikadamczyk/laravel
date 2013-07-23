<?php

use Illuminate\Database\Migrations\Migration;

class AddSqmToObslogs extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::table('obslogs', function($table)
            {
                $table->string('sqm');
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
                $table->dropColumn('sqm');
            });
	}

}
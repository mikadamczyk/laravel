<?php

use Illuminate\Database\Migrations\Migration;

class AddHalfnightToObslogs extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('obslogs', function($table)
        {
            $table->string('first_half', 100);
            $table->string('second_half', 100);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('obslogs', function($t) {
            $t->dropColumn('first_half');
            $t->dropColumn('second_half');
        });
	}

}
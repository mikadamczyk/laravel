<?php

use Illuminate\Database\Migrations\Migration;

class AddDateToTechlogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('techlogs', function($table)
        {
            $table->string('ed', 100);
            $table->string('jd', 100);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
       Schema::table('techlogs', function($t) {
                $t->dropColumn('ed');
                $t->dropColumn('jd');
        });
	}

}
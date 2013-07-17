<?php

use Illuminate\Database\Migrations\Migration;

class AddDateTechprobToObslogs extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('obslogs', function($table)
        {
            $table->string('ed', 100);
            $table->string('jd', 100);
            $table->string('tech_problem', 50);
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
                $t->dropColumn('ed');
                $t->dropColumn('jd');
                $t->dropColumn('tech_problem');
        });
	}

}
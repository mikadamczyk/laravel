<?php

use Illuminate\Database\Migrations\Migration;

class AddFieldsToObslogs extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::table('obslogs', function($table)
            {
                $table->integer('evening_flat_id');
                $table->integer('morning_flat_id');
                $table->integer('autoguider_id');
                $table->enum('ares', Obslog::$ares);
                $table->string('ut_start');
                $table->string('ut_stop');
                $table->text('comments');
                $table->text('description');
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
                $t->dropColumn('evening_flat_id');
                $t->dropColumn('morning_flat_id');
                $t->dropColumn('autoguider_id');
                $t->dropColumn('ares');
                $t->dropColumn('ut_start');
                $t->dropColumn('ut_stop');
                $t->dropColumn('comments');
                $t->dropColumn('description');
            });
	}

}
<?php

use Illuminate\Database\Migrations\Migration;

class RenameInObslog extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::table('obslogs', function($table)
            {
                $table->renameColumn('first_half', 'first_half_id');
                $table->renameColumn('second_half', 'second_half_id');
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
                $table->renameColumn('first_half_id', 'first_half');
                $table->renameColumn('second_half_id', 'second_half');
            });
	}

}
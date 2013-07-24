<?php

use Illuminate\Database\Migrations\Migration;

class RenameInObslog2 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::table('obslogs', function($table)
            {
                $table->renameColumn('first_half_id', 'firsthalf_id');
                $table->renameColumn('second_half_id', 'secondhalf_id');
                $table->renameColumn('evening_flat_id', 'eveningflat_id');
                $table->renameColumn('morning_flat_id', 'morningflat_id');
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
                $table->renameColumn('firsthalf_id', 'first_half_id');
                $table->renameColumn('secondhalf_id', 'second_half_id');
                $table->renameColumn('eveningflat_id', 'evening_flat_id');
                $table->renameColumn('morningflat_id', 'morning_flat_id');
            });
	}

}
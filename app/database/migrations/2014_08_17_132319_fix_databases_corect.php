<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixDatabasesCorect extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            DB::statement("ALTER TABLE countries RENAME TO areas");
            Schema::table('areas', function($table)
            {
                $table->integer('parent_id')->after('name');
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            DB::statement("ALTER TABLE areas RENAME TO countries");
            Schema::table('areas', function($table)
            {
                $table->dropColumn('parent_id');
            });
	}

}

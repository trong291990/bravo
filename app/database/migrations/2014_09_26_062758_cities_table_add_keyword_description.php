<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CitiesTableAddKeywordDescription extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::table('places',function($t){
                 $t->string('meta_keyword',2047)->nullable()->after('slug');
                 $t->string('meta_description',2047)->nullable()->after('meta_keyword');
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::table('places',function($t){
                $t->dropColumn('meta_keyword');
                $t->dropColumn('meta_description');
            });
	}

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddThumnailColumnToursTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::table('tours',function($t){
                if (!Schema::hasColumn('tours', 'thumbnail'))
                {
                    $t->string('thumbnail')->after('photo'); 
                }
               
            });
            Schema::table('areas',function($t){
               $t->string('meta_description',2047)->after('meta_keyword')->nullable(); 
            });
            DB::statement("ALTER TABLE `areas` CHANGE COLUMN `meta_keyword` `meta_keyword` VARCHAR(2047)  NULL");
            Schema::table('areas',function($t){
                if (!Schema::hasColumn('areas', 'keyword'))
                {
                    $t->dropColumn('keyword');
                }
            });
            DB::statement("ALTER TABLE `tours` CHANGE COLUMN `meta_keyword` `meta_keyword` VARCHAR(2047)  NULL");
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
             Schema::table('tours',function($t){
               $t->dropColumn('thumbnail');
            });
	}

}

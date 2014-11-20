<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThailanRecord extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //DB::statement("INSERT INTO `areas` (name,parent_id,slug,is_on_menu,menu_order) VALUES('ThaiLan',NULL, 'thailan',1,4)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }

}

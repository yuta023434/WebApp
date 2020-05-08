<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnDispFlgToTGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('t_goods', function (Blueprint $table) {
            $table->tinyInteger('disp_flg',1)->default(0)->after('ins_date')->comment('表示フラグ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('t_goods', function (Blueprint $table) {
            //
        });
    }
}

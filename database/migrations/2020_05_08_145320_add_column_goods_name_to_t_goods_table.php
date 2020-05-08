<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnGoodsNameToTGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('t_goods', function (Blueprint $table) {
            $table->string('goods_name',255)->collation('utf8mb4_unicode_ci')->comment('商品名');
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

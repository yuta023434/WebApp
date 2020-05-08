<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnGoodsStockToTGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('t_goods', function (Blueprint $table) {
            $table->integer('goods_stock',255)->default(0)->after('goods_price')->comment('商品個数');
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnGoodsPriceToTGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('t_goods', function (Blueprint $table) {
            $table->integer('goods_price',255)->unique()->after('goods_name')->comment('商品価格');
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

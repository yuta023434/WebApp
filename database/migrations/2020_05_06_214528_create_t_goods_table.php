<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('t_goods'))
        {
            return;
        }

        Schema::create('t_goods', function (Blueprint $table) {
            $table->increments('id')->comment('主キー');
            $table->string('un_id',255)->default(NULL)->collation('utf8mb4_unicode_ci')->comment('ユニークID');
            $table->string('goods_number',255)->default(NULL)->collation('utf8mb4_unicode_ci')->comment('商品番号');
            $table->string('goods_name',255)->default(NULL)->collation('utf8mb4_unicode_ci')->comment('商品名');
            $table->integer('goods_price',255)->default(NULL)->comment('商品価格');
            $table->integer('goods_stock',255)->default(NULL)->comment('商品個数');
            $table->text('intro_txt')->collation('utf8mb4_unicode_ci')->comment('紹介文');
            $table->timestamp('up_date')->default(NULL)->comment('更新日時');
            $table->timestamp('ins_date')->default(NULL)->comment('追加日時');
            $table->tinyInteger('disp_flg')->unsigned()->comment('表示フラグ');
            $table->tinyInteger('delete_flg')->unsigned()->default(0)->comment('削除フラグ');
            $table->engine = 'InnoDB';
            $table->collation = 'utf8mb4_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_goods');
    }
}

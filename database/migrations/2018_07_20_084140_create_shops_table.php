<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('shop_category_id')->comment("商家分类ID");
            $table->string('shop_name')->comment("店铺名称");
            $table->string('shop_img')->comment("店铺图片");
            $table->float('shop_rating')->comment("店铺评分");
            $table->boolean('brand')->comment("是否品牌");
            $table->boolean('on_time')->comment("是否准时送达");
            $table->boolean('feiniao')->comment("是否飞鸟配送");
            $table->boolean('bao')->comment("是否保标记");
            $table->boolean('piao')->comment("是否票标记");
            $table->boolean('zhun')->comment("是否准标记");
            $table->decimal('start_send')->comment("起送金额");
            $table->decimal('send_cost')->comment("配送费");
            $table->string('notice')->comment("店铺公告");
            $table->string('discount')->comment("店铺折扣");
            $table->integer('status')->comment("状态");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}

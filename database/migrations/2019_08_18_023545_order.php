<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('order_number');
            $table->string('code', 191)->nullable();
            $table->enum('payment_method', [1,2,3,4,5,6,7])->unique()->nullable();
            $table->string('subtotal');
            $table->string('tax');
            $table->string('total');
            $table->string('expire_time');
            $table->tinyInteger('payment_status');
            $table->tinyInteger('shipping_status');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('orders');
    }
}

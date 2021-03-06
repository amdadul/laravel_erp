<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('max_sl_no');
            $table->string('order_no');
            $table->unsignedBigInteger('store_id');
            $table->tinyInteger('is_invoice')->default(1)->comment('1=>Invoice Not Created, 2=>Invoice Created');
            $table->foreign('store_id')->references('id')->on('stores');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->double('discount_amount')->nullable()->default(0);
            $table->double('grand_total');
            $table->date('date');
            $table->unsignedBigInteger('area_id')->nullable();
            $table->unsignedBigInteger('territory_id')->nullable();
            $table->unsignedBigInteger('area_employee_id')->nullable();
            $table->unsignedBigInteger('territory_employee_id')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users');
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
        Schema::dropIfExists('sell_orders');
    }
}

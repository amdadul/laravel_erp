<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers_payments', function (Blueprint $table) {
            $table->id();
            $table->string('pr_no')->comment('Payment Receipt No');
            $table->string('manual_pr_no')->nullable();
            $table->integer('max_sl_no');
            $table->unsignedBigInteger('po_no')->nullable();
            $table->foreign('po_no')->references('id')->on('purchases');
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->string('payment_type');
            $table->string('bank_id')->nullable();
            $table->string('cheque_no')->nullable();
            $table->string('cheque_date')->nullable();
            $table->double('amount');
            $table->double('discount')->nullable();
            $table->date('date');
            $table->unsignedBigInteger('payment_by')->nullable();
            $table->foreign('payment_by')->references('id')->on('users');
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
        Schema::dropIfExists('suppliers_payments');
    }
}

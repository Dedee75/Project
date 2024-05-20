<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('paymenttype');
            $table->foreignId('customer_id')->references('id')->on('customers')->constrained();
            $table->integer('totalamount');
            $table->integer('paidamount');
            $table->string('buyername');
            $table->string('buyeremail');
            $table->integer('buyerphone');
            $table->string('deliveryaddress');
            $table->integer('discountamount');
            $table->string('discount');
            $table->string('orderstatus');
            $table->string('uuid');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};

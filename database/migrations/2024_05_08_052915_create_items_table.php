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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('supplier_id')->references('id')->on('suppliers')->constrained();
            $table->integer('salepeice');
            $table->string('date');
            $table->foreignId('staff_id')->references('id')->on('staff')->constrained();
            $table->integer('purchaseprice');
            $table->unsignedInteger('subcategory_id');
            $table->foreign('subcategory_id')->references('id')->on('subcategories');
            $table->unsignedInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->string('description');
            $table->integer('qty');
            $table->string('uuid');
            $table->string('status');
            $table->timestamps();
        });
        Schema::table('items', function (Blueprint $table) {
            $table->index('subcategory_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};

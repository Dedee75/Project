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
        Schema::create('item__photos', function (Blueprint $table) {
            $table->boolean('primaryphoto');
            $table->id();
            $table->string('name');
            $table->foreignId('item_id')->references('id')->on('items')->constrained();
            $table->string('photo');
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
        Schema::dropIfExists('item__photos');
    }
};

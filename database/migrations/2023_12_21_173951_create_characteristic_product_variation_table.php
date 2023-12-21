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
        Schema::create('characteristic_product_variation', function (Blueprint $table) {
            $table->id();
            $table->foreignId('characteristic_id')->constrained();
            $table->foreignId('product_variation_id')->constrained();
            $table->text('option');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characteristic_product_variation');
    }
};

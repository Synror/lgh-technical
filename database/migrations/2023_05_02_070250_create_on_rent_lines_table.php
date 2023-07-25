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
        Schema::create('on_rent_lines', static function (Blueprint $table)
        {
            $table->id();
            $table->foreignId('header_id')->references('id')->on('on_rent')->cascadeOnDelete();
            $table->string('account', 10);
            $table->integer('order_number');
            $table->date('rental_start');
            $table->integer('dispatch_id');
            $table->float('order_value', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('on_rent_lines');
    }
};

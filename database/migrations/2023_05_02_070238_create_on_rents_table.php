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
        Schema::create('on_rent', static function (Blueprint $table)
        {
            $table->id();
            $table->date('gen_date');
            $table->integer('contracts')->default(0);
            $table->integer('quotes')->default(0);
            $table->float('weekly_value', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('on_rent');
    }
};

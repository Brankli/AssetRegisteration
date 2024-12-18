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
        Schema::create('revaluataions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('valuation_id')->constrained('valuations')->onDelete('cascade');
            $table->float('memlc_factor');
            $table->float('currency_factor');
            $table->float('recalculated_cost');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revaluataions');
    }
};

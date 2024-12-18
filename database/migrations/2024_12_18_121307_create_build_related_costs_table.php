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
        Schema::create('build_related_costs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('valuation_id')->constrained('valuations')->onDelete('cascade');
            $table->text('description');
            $table->float('amount');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('build_related_costs');
    }
};

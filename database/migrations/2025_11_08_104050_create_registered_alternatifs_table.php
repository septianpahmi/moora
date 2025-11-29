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
        Schema::create('registered_alternatifs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alternatif_id')->constrained()->cascadeOnDelete();
            $table->foreignId('subkrit_id')->constrained('sub_kriterias')->cascadeOnDelete();
            $table->enum('status',['Pending','Success','Filed'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registered_alternatifs');
    }
};

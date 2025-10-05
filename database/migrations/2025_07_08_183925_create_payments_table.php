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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('kode_payment')->unique();
            $table->string('kode_order');
            $table->date('payment_date');
            $table->decimal('amount', 10, 2);
            $table->enum('method', ['transfer', 'qris', 'cash']);
            $table->enum('status', ['pending', 'paid', 'failed'])->default('pending');
            $table->timestamps();

            // Foreign key
            $table->foreign('kode_order')->references('kode_order')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};

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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('kode_order')->unique();
            $table->string('kode_customer');
            $table->string('kode_service')->nullable();
            $table->boolean('is_custom')->default(false);
            $table->text('custom_request')->nullable();
            $table->date('order_date');
            $table->enum('status', ['pending', 'paid', 'done'])->default('pending');
            $table->text('notes')->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign('kode_customer')->references('kode_customer')->on('customers')->onDelete('cascade');
            $table->foreign('kode_service')->references('kode_service')->on('services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

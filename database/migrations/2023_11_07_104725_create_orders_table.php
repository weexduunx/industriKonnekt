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
            $table->foreignId('buyer_company_id')->constrained('companies');
            $table->foreignId('seller_company_id')->constrained('companies');
            $table->foreignId('product_service_id')->constrained('product_services');
            $table->integer('quantity');
            $table->string('status'); // E.g., "Pending", "In Progress", "Delivered", etc.
            $table->timestamps();
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

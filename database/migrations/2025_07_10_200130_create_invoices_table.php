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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->unique();
            $table->date('invoice_date');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // به users وصل میشه
            $table->enum('invoice_type', ['پرداختی', 'مرجوعی']);
            $table->decimal('discount', 15, 2)->default(0);
            $table->enum('status', ['پرداخت شده', 'پرداخت نشده']);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};

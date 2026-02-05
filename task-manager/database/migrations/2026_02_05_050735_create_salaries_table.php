<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id'); // Links to Employee table
            $table->decimal('amount', 10, 2); // e.g., 5000.00
            $table->date('payment_date'); // Date salary was paid
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('salaries');
    }
};
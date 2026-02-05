<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->integer('department_id'); // Standard integer for department
            $table->string('first_name'); // String field
            $table->string('last_name'); // String field
            $table->string('email')->unique(); // Unique email field
            $table->date('hire_date'); // Date field
            $table->timestamps(); // Adds created_at and updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
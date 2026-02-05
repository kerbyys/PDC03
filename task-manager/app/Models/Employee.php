<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    // Allow mass assignment for these fields
    protected $fillable = [
        'department_id',
        'first_name',
        'last_name',
        'email',
        'hire_date'
    ];
}
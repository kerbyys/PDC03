<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SalaryController;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('employees', EmployeeController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('salaries', SalaryController::class);
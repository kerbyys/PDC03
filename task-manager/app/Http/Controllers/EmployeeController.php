<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse; // 1. Import JsonResponse
use Illuminate\Routing\Controller;

class EmployeeController extends Controller
{
    // READ (ALL) - [GET] /employees
    public function index(): JsonResponse
    {
        return response()->json(Employee::all(), 200);
    }

    // CREATE - [POST] /employees
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'department_id' => 'required|integer',
            'first_name'    => 'required|string',
            'last_name'     => 'required|string',
            'email'         => 'required|email|unique:employees,email',
            'hire_date'     => 'required|date',
        ]);

        $employee = Employee::create($validated);

        return response()->json($employee, 201);
    }

    // READ (ONE) - [GET] /employees/{id}
    public function show(string $id): JsonResponse
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], 404);
        }

        return response()->json($employee, 200);
    }

    // UPDATE - [PUT/PATCH] /employees/{id}
    public function update(Request $request, string $id): JsonResponse
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], 404);
        }

        $employee->update($request->all());

        return response()->json($employee, 200);
    }

    // DELETE - [DELETE] /employees/{id}
    public function destroy(string $id): JsonResponse
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], 404);
        }

        $employee->delete();

        return response()->json(['message' => 'Employee deleted successfully'], 200);
    }
}
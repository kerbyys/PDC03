<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class SalaryController extends Controller
{
    // GET /salaries
    public function index(): JsonResponse
    {
        return response()->json(Salary::all(), 200);
    }

    // POST /salaries
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'employee_id'  => 'required|integer',
            'amount'       => 'required|numeric',
            'payment_date' => 'required|date',
        ]);

        $salary = Salary::create($validated);

        return response()->json($salary, 201);
    }

    // GET /salaries/{id}
    public function show(string $id): JsonResponse
    {
        $salary = Salary::find($id);

        if (!$salary) {
            return response()->json(['message' => 'Salary record not found'], 404);
        }

        return response()->json($salary, 200);
    }

    // PUT /salaries/{id}
    public function update(Request $request, string $id): JsonResponse
    {
        $salary = Salary::find($id);

        if (!$salary) {
            return response()->json(['message' => 'Salary record not found'], 404);
        }

        $salary->update($request->all());

        return response()->json($salary, 200);
    }

    // DELETE /salaries/{id}
    public function destroy(string $id): JsonResponse
    {
        $salary = Salary::find($id);

        if (!$salary) {
            return response()->json(['message' => 'Salary record not found'], 404);
        }

        $salary->delete();

        return response()->json(['message' => 'Salary record deleted successfully'], 200);
    }
}
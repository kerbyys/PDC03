<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class DepartmentController extends Controller
{
    // GET /departments
    public function index(): JsonResponse
    {
        return response()->json(Department::all(), 200);
    }

    // POST /departments
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $department = Department::create($validated);

        return response()->json($department, 201);
    }

    // GET /departments/{id}
    public function show(string $id): JsonResponse
    {
        $department = Department::find($id);

        if (!$department) {
            return response()->json(['message' => 'Department not found'], 404);
        }

        return response()->json($department, 200);
    }

    // PUT /departments/{id}
    public function update(Request $request, string $id): JsonResponse
    {
        $department = Department::find($id);

        if (!$department) {
            return response()->json(['message' => 'Department not found'], 404);
        }

        $department->update($request->all());

        return response()->json($department, 200);
    }

    // DELETE /departments/{id}
    public function destroy(string $id): JsonResponse
    {
        $department = Department::find($id);

        if (!$department) {
            return response()->json(['message' => 'Department not found'], 404);
        }

        $department->delete();

        return response()->json(['message' => 'Department deleted successfully'], 200);
    }
}
<?php

namespace App\Http\Controllers;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        return Activity::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['project_id' => 'required|exists:projects,id', 'name' => 'required']);
        return Activity::create($validated);
    }

    public function show(Activity $activity)
    {
        return $activity;
    }

    public function update(Request $request, Activity $activity)
    {
        $activity->update($request->all());
        return $activity;
    }

    public function destroy(Activity $activity)
    {
        $activity->delete();
        return response()->noContent();
    }
}

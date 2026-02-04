<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return Client::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['company_name' => 'required', 'email' => 'required|email|unique:clients']);
        return Client::create($validated);
    }

    public function show(Client $client)
    {
        return $client->load('projects');
    }

    public function update(Request $request, Client $client)
    {
        $client->update($request->all());
        return $client;
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return response()->noContent();
    }
}

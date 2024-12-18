<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index()
    {
        $assets = Asset::all();

        return response()->json($assets);
    }

    // Create a new asset
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'area' => 'required|numeric',
            'location' => 'nullable',
            'deed_number' => 'required|string',
            'asset_type' => 'required|in:Land,Building',
            'description' => 'nullable|string',
            'cv' => 'nullable|file',
        ]);

        $asset = Asset::create($validated);

        return response()->json(['message' => 'Asset created successfully.', 'data' => $asset], 201);
    }

    // Show a single asset
    public function show($id)
    {
        $asset = Asset::findOrFail($id);

        return response()->json($asset);
    }

    // Update an asset
    public function update(Request $request, $id)
    {
        $asset = Asset::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|string',
            'area' => 'sometimes|numeric',
            'deed_number' => 'sometimes|string',
            'asset_type' => 'sometimes|in:Land,Building',
            'description' => 'nullable|string',
            'cv' => 'nullable|file',
        ]);

        $asset->update($validated);

        return response()->json(['message' => 'Asset updated successfully.', 'data' => $asset]);
    }

    // Delete an asset
    public function destroy($id)
    {
        $asset = Asset::findOrFail($id);
        $asset->delete();

        return response()->json(['message' => 'Asset deleted successfully.']);
    }
}
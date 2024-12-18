<?php

namespace App\Http\Controllers;

use App\Models\Valuation;
use Illuminate\Http\Request;
use App\Models\Asset;
class ValuationController extends Controller
{
    public function index($assetId)
    {
        $asset = Asset::findOrFail($assetId);
        $valuations = $asset->valuations;

        return response()->json($valuations);
    }

    // Create a new valuation
    public function store(Request $request)
    {
        $validated = $request->validate([
            'asset_id' => 'required|exists:assets,id',
            'valuator_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'method' => 'required|in:Income,Market,Cost,lize_office,Local_broker,price_similar_land',
            'description' => 'nullable|string',
        ]);

        $valuation = Valuation::create($validated);

        return response()->json(['message' => 'Valuation created successfully.', 'data' => $valuation], 201);
    }

    // Show a single valuation
    public function show($id)
    {
        $valuation = Valuation::findOrFail($id);

        return response()->json($valuation);
    }

    // Update a valuation
    public function update(Request $request, $id)
    {
        $valuation = Valuation::findOrFail($id);

        $validated = $request->validate([
            'date' => 'sometimes|date',
            'method' => 'sometimes|in:Income,Market,Cost,lize_office,Local_broker,price_similar_land',
            'description' => 'nullable|string',
        ]);

        $valuation->update($validated);

        return response()->json(['message' => 'Valuation updated successfully.', 'data' => $valuation]);
    }

    // Delete a valuation
    public function destroy($id)
    {
        $valuation = Valuation::findOrFail($id);
        $valuation->delete();

        return response()->json(['message' => 'Valuation deleted successfully.']);
    }

}

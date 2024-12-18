<?php

namespace App\Http\Controllers;

use App\Models\BuildRelatedCost;
use Illuminate\Http\Request;
use App\Models\Valuation;

class BuildRelatedCostController extends Controller
{
    public function index($valuationId)
    {
        $valuation = Valuation::findOrFail($valuationId);
        $relatedCosts = $valuation->buildRelatedCosts;

        return response()->json($relatedCosts);
    }

    // Create a new related cost
    public function store(Request $request)
    {
        $validated = $request->validate([
            'valuation_id' => 'required|exists:valuations,id',
            'description' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        $relatedCost = BuildRelatedCost::create($validated);

        return response()->json(['message' => 'Related cost created successfully.', 'data' => $relatedCost], 201);
    }

    // Show a single related cost
    public function show($id)
    {
        $relatedCost = BuildRelatedCost::findOrFail($id);

        return response()->json($relatedCost);
    }

    // Update a related cost
    public function update(Request $request, $id)
    {
        $relatedCost = BuildRelatedCost::findOrFail($id);

        $validated = $request->validate([
            'description' => 'sometimes|string',
            'amount' => 'sometimes|numeric',
        ]);

        $relatedCost->update($validated);

        return response()->json(['message' => 'Related cost updated successfully.', 'data' => $relatedCost]);
    }

    // Delete a related cost
    public function destroy($id)
    {
        $relatedCost = BuildRelatedCost::findOrFail($id);
        $relatedCost->delete();

        return response()->json(['message' => 'Related cost deleted successfully.']);
    }
}
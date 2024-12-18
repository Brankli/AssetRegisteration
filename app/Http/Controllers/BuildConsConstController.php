<?php

namespace App\Http\Controllers;

use App\Models\BuildConsConst;
use Illuminate\Http\Request;
use App\Models\Valuation;

class BuildConsConstController extends Controller
{
    public function index($valuationId)
    {
        $valuation = Valuation::findOrFail($valuationId);
        $constructionCosts = $valuation->buildConsConsts;

        return response()->json($constructionCosts);
    }

    // Create a new construction cost
    public function store(Request $request)
    {
        $validated = $request->validate([
            'valuation_id' => 'required|exists:valuations,id',
            'description' => 'required|string',
            'area' => 'required|numeric',
            'unit_rate' => 'required|numeric',
            'no_of_typical_buildings' => 'required|integer',
            'amount' => 'required|numeric',
        ]);

        $constructionCost = BuildConsConst::create($validated);

        return response()->json(['message' => 'Construction cost created successfully.', 'data' => $constructionCost], 201);
    }

    // Show a single construction cost
    public function show($id)
    {
        $constructionCost = BuildConsConst::findOrFail($id);

        return response()->json($constructionCost);
    }

    // Update a construction cost
    public function update(Request $request, $id)
    {
        $constructionCost = BuildConsConst::findOrFail($id);

        $validated = $request->validate([
            'description' => 'sometimes|string',
            'area' => 'sometimes|numeric',
            'unit_rate' => 'sometimes|numeric',
            'no_of_typical_buildings' => 'sometimes|integer',
            'amount' => 'sometimes|numeric',
        ]);

        $constructionCost->update($validated);

        return response()->json(['message' => 'Construction cost updated successfully.', 'data' => $constructionCost]);
    }

    // Delete a construction cost
    public function destroy($id)
    {
        $constructionCost = BuildConsConst::findOrFail($id);
        $constructionCost->delete();

        return response()->json(['message' => 'Construction cost deleted successfully.']);
    }

}

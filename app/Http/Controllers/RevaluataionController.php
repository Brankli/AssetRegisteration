<?php

namespace App\Http\Controllers;

use App\Models\Revaluataion;
use Illuminate\Http\Request;
use App\Models\Valuation;

class RevaluataionController extends Controller
{
    public function index($valuationId)
    {
        $valuation = Valuation::findOrFail($valuationId);
        $revaluations = $valuation->revaluations;

        return response()->json($revaluations);
    }

    // Create a new revaluation
    public function store(Request $request)
    {
        $validated = $request->validate([
            'valuation_id' => 'required|exists:valuations,id',
            'memlc_factor' => 'required|numeric',
            'currency_factor' => 'required|numeric',
            'recalculated_cost' => 'required|numeric',
        ]);

        $revaluation = Revaluataion::create($validated);

        return response()->json(['message' => 'Revaluation created successfully.', 'data' => $revaluation], 201);
    }

    // Show a single revaluation
    public function show($id)
    {
        $revaluation = Revaluataion::findOrFail($id);

        return response()->json($revaluation);
    }

    // Update a revaluation
    public function update(Request $request, $id)
    {
        $revaluation = Revaluataion::findOrFail($id);

        $validated = $request->validate([
            'memlc_factor' => 'sometimes|numeric',
            'currency_factor' => 'sometimes|numeric',
            'recalculated_cost' => 'sometimes|numeric',
        ]);

        $revaluation->update($validated);

        return response()->json(['message' => 'Revaluation updated successfully.', 'data' => $revaluation]);
    }

    // Delete a revaluation
    public function destroy($id)
    {
        $revaluation = Revaluataion::findOrFail($id);
        $revaluation->delete();

        return response()->json(['message' => 'Revaluation deleted successfully.']);
    }
}

<?php
use App\Http\Controllers\{
    AssetController,
    BuildConsConstController,
    BuildRelatedCostController,
    RevaluataionController,
    ValuationController,
    LoginController
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

// Assets Resource Routes
Route::resource('assets', AssetController::class);

// Valuations Resource Routes
Route::resource('valuations', ValuationController::class);

// Building Construction Costs Resource Routes
Route::resource('build-cons-consts', BuildConsConstController::class);

// Building Related Costs Resource Routes
Route::resource('build-related-costs', BuildRelatedCostController::class);

// Revaluations Resource Routes
Route::resource('revaluations', RevaluataionController::class);
Route::resource('login', LoginController::class)->only(['store', 'destroy']);
Route::post('register', [LoginController::class, 'register'])->name('register');
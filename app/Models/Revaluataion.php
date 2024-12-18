<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Revaluataion extends Model
{
    protected $fillable = [
        'valuation_id', 
        'memlc_factor',
         'currency_factor', 
         'recalculated_cost',
    ];

    // A revaluation belongs to a valuation
    public function valuation()
    {
        return $this->belongsTo(Valuation::class);
    }
}

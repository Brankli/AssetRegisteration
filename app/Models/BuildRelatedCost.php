<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuildRelatedCost extends Model
{
    protected $fillable = [
        'valuation_id', 
        'description', 
        'amount',
    ];

    // A building-related cost belongs to a valuation
    public function valuation()
    {
        return $this->belongsTo(Valuation::class);
    }
}

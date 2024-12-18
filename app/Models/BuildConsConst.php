<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuildConsConst extends Model
{
    protected $fillable = [
        'valuation_id',
         'description', 
         'area', 'unit_rate',
          'no_of_typical_buildings', 
          'amount',
    ];

    // A building construction cost belongs to a valuation
    public function valuation()
    {
        return $this->belongsTo(Valuation::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Valuation extends Model
{
    protected $fillable = [
        'asset_id', 
        'valuator_id', 
        'date', 
        'method', 
        'description',
    ];

    // A valuation belongs to an asset
    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }

    // A valuation belongs to a valuator
    public function valuator()
    {
        return $this->belongsTo(User::class, 'valuator_id');
    }

    // A valuation has many building construction costs
    public function buildConsConsts()
    {
        return $this->hasMany(BuildConsConst::class);
    }

    // A valuation has many building-related costs
    public function buildRelatedCosts()
    {
        return $this->hasMany(BuildRelatedCost::class);
    }

    // A valuation has many revaluations
    public function revaluations()
    {
        return $this->hasMany(Revaluataion::class);
    }
}

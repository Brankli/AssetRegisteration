<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = [
        'name', 
        'user_id', 
        'area',
         'location', 
         'deed_number', 
         'asset_type', 
         'description', 'cv',
    ];

    // An asset belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // An asset can have many valuations
    public function valuations()
    {
        return $this->hasMany(Valuation::class);
    }
}

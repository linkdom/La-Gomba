<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HarvestingPeriod extends Model
{
    use HasFactory;

    protected $fillable = ['from', 'to', 'product_id'];

    /**
     * Get the product associated with the harvesting period.
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}

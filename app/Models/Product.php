<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'subtitle', 'description', 'price', 'image'];

    /**
     * Get the harvesting period associated with the product.
     */
    public function harvestingPeriod()
    {
        return $this->hasOne('App\Models\HarvestingPeriod');
    }

    /**
     * Get the stock amount associated with the product.
     */
    public function stockAmount()
    {
        return $this->hasOne('App\Models\Stock');
    }
}

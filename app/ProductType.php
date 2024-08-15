<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductType extends Model
{
    protected $fillable = [
        'id',
        'name',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class)->with('productType');
    }
}

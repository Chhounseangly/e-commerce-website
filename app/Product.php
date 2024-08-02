<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{

    protected $fillable = ['id', 'name', 'price'];

    //product belong to productType
    public function productType(): BelongsTo
    {
        return $this->belongsTo(ProductType::class);
    }
}

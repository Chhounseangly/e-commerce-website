<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'image',
        'name',
        'price',
        'product_type_id'
    ];

    //product belong to productType
    public function productType(): BelongsTo
    {
        return $this->belongsTo(ProductType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

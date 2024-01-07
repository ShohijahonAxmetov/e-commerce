<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariationImage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'path',
    ];

    public function productVariations(): \Illuminate\Database\Eloquent\Relations\belongsToMany
    {
        return $this->belongsToMany(ProductVariation::class, 'product_variation_image_pivot');
    }
}

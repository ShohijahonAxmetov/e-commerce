<?php

namespace App\Models\Product;

use App\Models\Attribute\Attribute;
use App\Models\Characteristic\Characteristic;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariation extends Model
{
    use HasFactory, HasTranslations, SoftDeletes;

    protected $fillable = [
        'product_id',
        'name',
        'desc',
        'price',
        'for_search',
    ];

    public array $translatable = [
        'name',
        'desc'
    ];

    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function images(): \Illuminate\Database\Eloquent\Relations\belongsToMany
    {
        return $this->belongsToMany(ProductVariationImage::class, 'product_variation_image_pivot');
    }

    public function characteristics(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Characteristic::class)->withPivot('option');
    }

    public function attributes(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Attribute::class)->withPivot('option');
    }
}

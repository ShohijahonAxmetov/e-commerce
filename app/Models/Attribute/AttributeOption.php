<?php

namespace App\Models\Attribute;

use App\Models\Product\ProductVariation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class AttributeOption extends Model
{
    use HasFactory, HasTranslations, SoftDeletes;

    protected $fillable = [
        'attribute_id',
        'name',
        'for_search',
    ];
    public array $translatable = [
        'name',
    ];

    public function attribute(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Attribute::class);
    }

    public function productVariations(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(ProductVariation::class);
    }
}

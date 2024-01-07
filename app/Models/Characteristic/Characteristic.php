<?php

namespace App\Models\Characteristic;

use App\Models\Product\ProductVariation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class Characteristic extends Model
{
    use HasFactory, HasTranslations, SoftDeletes;

    protected $fillable = [
        'characteristic_group_id',
        'name',
        'desc',
        'for_search',
    ];
    public array $translatable = [
        'name',
        'desc'
    ];

    public function group(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CharacteristicGroup::class);
    }

    public function productVariations(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(ProductVariation::class)->withPivot('option');
    }
}

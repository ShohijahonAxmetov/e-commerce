<?php

namespace App\Models\Characteristic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class CharacteristicGroup extends Model
{
    use HasFactory, HasTranslations, SoftDeletes;

    protected $fillable = [
        'name',
        'desc',
        'for_search',
    ];
    public array $translatable = [
        'name',
        'desc'
    ];

    public function characteristics(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Characteristic::class);
    }
}

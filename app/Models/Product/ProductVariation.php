<?php

namespace App\Models\Product;

use App\Models\Characteristic\Characteristic;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    use HasFactory;

    public function characteristics()
    {
        return $this->belongsToMany(Characteristic::class)->withPivot('option');
    }
}

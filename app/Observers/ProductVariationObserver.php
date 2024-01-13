<?php

namespace App\Observers;

use App\Models\Product\ProductVariation;

class ProductVariationObserver
{
    /**
     * Handle the ProductVariation "created" event.
     */
    public function created(ProductVariation $productVariation): void
    {
        $forSearch = null;
        if ($productVariation->getTranslation('name', 'ru') !== '') $forSearch .= $productVariation->getTranslation('name', 'ru');
        if ($productVariation->getTranslation('desc', 'ru') !== '') $forSearch .= ' '.$productVariation->getTranslation('desc', 'ru');

        $productVariation->update([
            'for_search' => $forSearch
        ]);
    }

    /**
     * Handle the ProductVariation "updated" event.
     */
    public function updated(ProductVariation $productVariation): void
    {
        //
    }

    /**
     * Handle the ProductVariation "deleted" event.
     */
    public function deleted(ProductVariation $productVariation): void
    {
        //
    }

    /**
     * Handle the ProductVariation "restored" event.
     */
    public function restored(ProductVariation $productVariation): void
    {
        //
    }

    /**
     * Handle the ProductVariation "force deleted" event.
     */
    public function forceDeleted(ProductVariation $productVariation): void
    {
        //
    }
}

<?php

namespace App\Traits;

use App\Models\Category;

trait CategoryTrait {
    function recursiveDelete(Category $category): void
    {
        if (isset($category->children[0])) {
            foreach ($category->children as $child) {
                $this->recursiveDelete($child);
            }
        }
        $category->delete();
    }
}

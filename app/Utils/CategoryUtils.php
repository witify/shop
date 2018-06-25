<?php

namespace App\Utils;

use App\ProductCategory;
use Illuminate\Support\Collection;


class CategoryUtils {

    /**
     * Find the ancestry of a category
     *
     * @param Collection $categories : This must contain a descendent tree of all categories starting from the main and unique Products category (id = 1)
     * @param ProductCategory $category
     * @return void
     */
    public static function findAncestry(Collection $categories, ProductCategory $category) : Collection
    {
        $ancestry = collect();
        $ancestry->push($categories->first());
        self::findAncestryRecursive($ancestry, $category);
        return $ancestry;
    }
    
    private static function findAncestryRecursive(Collection &$ancestry, ProductCategory $category) : bool
    {
        foreach($ancestry->last()->children as $child) {
            if ($child->id === $category->id) {
                $ancestry->push($child);
                return true;
            }

            $ancestry->push($child);
            if (self::findAncestryRecursive($ancestry, $category)) {
                return true;
            }

            $ancestry->pop();
        }

        return false;
    }
    
}

<?php

namespace App\Model;

use Exception;

trait Sortable {

    /**
     * Order the query according to the query parameters
     *
     * @param Query $query
     * @param string $word
     * @return Query
     */
    public function scopeSort($query)
    {
        if (request()->has('sort_field') && request()->has('sort_order')) {
            $sortField = request()->sort_field;

            // Special case for translatable fields
            if (property_exists($this, 'translatable') && in_array($sortField, $this->translatable)) {
                $sortField = $sortField . '->' . app()->getLocale();
            }

            return $query->orderBy($sortField, request()->sort_order);
        }
        
        return $query;
    }
}

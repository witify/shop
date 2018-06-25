<?php

namespace App\Model;

use Exception;

trait Searchable {

    /**
     * Validate the class attributes
     */
    private function searchableValidation()
    {
        if (! property_exists($this, 'searchableFields')) {
            throw new Exception('A searchable model must have a searchableFields attribute.');
        }

        if (! is_array($this->searchableFields)) {
            throw new Exception('searchableFields attribute must be an array.');
        }
    }

    /**
     * Search all objects matching a given word
     *
     * @param Query $query
     * @param string $word
     * @return Query
     */
    public function scopeSearch($query)
    {
        if (! request()->has('search')) {
            return $query;
        }

        $this->searchableValidation();
        $query = $this->query();
        foreach ($this->searchableFields as $field) {
            $searchTerm = addslashes(strtolower(request()->search));
            $query->orWhereRaw("LOWER({$field}) LIKE '%{$searchTerm}%'");
        }
        
        return $query;
    }
}

<?php

namespace App\Presenters;

use InvalidArgumentException;
use Laracasts\Presenter\Presenter;
use Illuminate\Support\Collection;

class PagePresenter extends Presenter {

    /** 
     * Returns all the sections
     * 
     * @return Collection
     */
    public function allSections() : Collection
    {
        return $this->sectionMapLocales(collect($this->sections));
    }

    /**
     * Returns a specific section by its id
     * 
     * @param string $id
     * @return Collection
     */
    public function section(string $id) : string
    {
        return $this->sectionMapLocales($this->getSectionWithId($id))->first()->content;
    }

    /**
     * Find and return the section having a given id
     *
     * @param string $id
     * @return Collection
     */
    private function getSectionWithId(string $id)
    {
        $collection = collect($this->sections)->where('id', $id);
        if ($collection->isEmpty()) {
            throw new InvalidArgumentException("Page section with id '" . $id . "' does not exist.");
        }

        return $collection;
    }

    /** 
     * Return a collection of the section with translated content
     * 
     * @param Collection $collection
     * @return Collection
     */
    private function sectionMapLocales(Collection $collection) : Collection
    {
        return $collection->map(function($item) {
            $content = ($item['type'] === 'picture' ? $item['value'] : translate($item['content']));
            return (object) [
                'id' => $item['id'],
                'name' => $item['name'],
                'type' => $item['type'],
                'content' => $content
            ];
        });
    }

    /**
     * Return the translated seo attribute from its key
     *
     * @param string $key
     * @return string
     */
    public function seoAttribute(string $key)
    {
        if (array_key_exists($key, $this->seo)) {
            return translate($this->seo[$key]);
        }

        return null;
    }
}

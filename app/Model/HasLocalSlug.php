<?php

namespace App\Model;

use Illuminate\Support\Collection;


trait HasLocalSlug {

    public static function bootHasLocalSlug()
    {
        static::creating(function($model) {
            $model->generateSlug();
        });

        static::updating(function($model) {
            $model->generateSlug();
        });
    }

    protected function generateSlugFrom()
    {
        return 'name';
    }

    public function generateSlug()
    {
        $slugs = [];

        foreach(config('app.locales') as $locale => $language) {
            $slugs[$locale] = str_slug($this->getTranslation('name', $locale));

            // Make it unique
            while ($this::query()->where('slug->' . $locale, $slugs[$locale])->count() != 0) {
                $slug = $slugs[$locale];

                // Get all after last '-' (count)
                $count = substr($slug, strrpos($slug, '-') + 1);

                $prefix = $slug;

                if (is_numeric($count)) {
                    $count = (int) $count;
                    $count++;
                    
                    // Get all before last '-' (prefix)
                    $prefix = explode('-', $slug);
                    array_pop($prefix);
                    $prefix = implode('-', $prefix);
                } else {
                    $count = 1;
                }

                $slugs[$locale] = $prefix . "-" . $count;
            }
        }

        $this->setTranslations('slug', $slugs);
    }
}

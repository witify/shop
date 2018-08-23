<?php

namespace App;

use App\Model\HasImages;
use App\Model\Sortable;
use App\Model\Searchable;
use App\Presenters\PagePresenter;
use Spatie\Translatable\HasTranslations;
use Laracasts\Presenter\PresentableTrait;
use Illuminate\Database\Eloquent\Model;
use App\Model\Interfaces\IsPage;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class Page extends Model implements IsPage
{
    use Cachable;
    use HasImages;
    use Sortable;
    use Searchable;
    use HasTranslations;
    use PresentableTrait;

    protected $presenter = PagePresenter::class;

    protected $fillable = [
        'title',
        'slug',
        'name',
        'sections',
        'seo',
        'parent_id'
    ];

    protected $translatable = [
        'title',
        'slug'
    ];

    protected $casts = [
        'title' => 'array',
        'slug' => 'array',
        'seo' => 'array',
        'sections' => 'array'
    ];

    protected $searchableFields = [
        'title',
        'name'
    ];

    protected $imageStoragePath = 'page';

    /**
     * Returns the homepage Page
     *
     * @return Page
     */
    static public function homepage()
    {
        $query = self::query();
        foreach (config('app.locales') as $key => $locale) {
            $query->orWhere('slug->' . $key, 'home');
        }
        return $query->first();
    }

    /**
     * Slug mutator
     *
     * @param array $slugs
     * @return void
     */
    public function setSlugAttribute($slugs)
    {
        $this->attributes['slug'] = collect($slugs)->map(function($slug) {
            return str_slug($slug);
        });
    }

    /**
     * Returns the URL of the page
     *
     * @param string $locale (optional)
     * @return String
     */
    public function url(string $locale = null) : string
    {
        $locale = $locale ?? app()->getLocale();
        
        if ($this->isHomepage()) {
            return '/' . $locale;
        }

        $url = '/' . $locale . '/';

        $parent = $this->parent;
        while($parent !== null) {
            $url .= $parent->getTranslation('slug', $locale) . '/';
            $parent = $parent->parent;
        }
        
        return $url . $this->getTranslation('slug', $locale);
    }

    /**
     * Check if page is homepage
     *
     * @return boolean
     */
    public function isHomepage()
    {
        return in_array('home', $this->getTranslations('slug'));
    }

    /**
     * Check if this page is currenly visited
     *
     * @return boolean
     */
    public function isCurrent()
    {
        return str_is('*' . $this->url(), url()->current());
    }

    public function children()
    {
        return $this->hasMany(Page::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Page::class, 'parent_id');
    }
}

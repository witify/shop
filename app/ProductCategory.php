<?php

namespace App;

use App\Model\HasLocalSlug;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Model\Interfaces\IsPage;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class ProductCategory extends Model implements IsPage
{
    use Cachable;
    use HasLocalSlug;
    use HasTranslations;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'category_id'
    ];

    protected $translatable = [
        'name',
        'slug',
        'description',
    ];

    protected $appends = [
        'url'
    ];

    /*
    |--------------------------------------------------------------------------
    | Attributes
    |--------------------------------------------------------------------------
	*/
	
	public function getUrlAttribute()
	{
		return $this->url();
    }

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */
    
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function parent()
    {
        return $this->belongsTo(ProductCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(ProductCategory::class, 'parent_id')->with('children');
    }

    /*
    |--------------------------------------------------------------------------
    | IsPage implementation
    |--------------------------------------------------------------------------
    */

    public function url(string $locale = null) : string
    {
        $locale = $locale ?? app()->getLocale();
        return "/" . $locale . "/shop/" . $this->getTranslation('slug', $locale);
    }
}

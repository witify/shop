<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Model\HasLocalSlug;
use Spatie\Translatable\HasTranslations;
use Witify\LaravelCart\Contracts\Buyable;
use App\Model\Interfaces\IsPage;

class Product extends Model implements Buyable, IsPage
{
    use HasLocalSlug;
    use HasTranslations;

    protected $fillable = [
        'name', 
        'slug',
        'description', 
        'price',
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

    protected $casts = [
        'price' => 'double',
        'options' => 'array'
    ];

    /*
    |--------------------------------------------------------------------------
    | Attributes
    |--------------------------------------------------------------------------
	*/
	
	public function getUrlAttribute()
	{
		return $this->url(app()->getLocale());
    }
    
    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */
    
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    /*
    |--------------------------------------------------------------------------
    | Buyable implementation
    |--------------------------------------------------------------------------
    */

    public function getBuyableIdentifier($options = [])
    {
        return $this->id;
    }

    public function getBuyableDescription($options = [])
    {
        return $this->name;
    }

    public function getBuyablePrice($options = [])
    {
        $price = $this->price;
        foreach($options as $key => $option) {
            if (array_key_exists($key, $this->options) && array_key_exists($option, $this->options[$key])) {
                $price += $this->options[$key][$option]['price_impact'];
            }
        }
        return $price;
    }

    /*
    |--------------------------------------------------------------------------
    | IsPage implementation
    |--------------------------------------------------------------------------
    */

    public function url(string $locale = null) : string
    {
        $locale = $locale ?? app()->getLocale();
        return "/" . $locale . "/shop/" . $this->category->getTranslation('slug', $locale) . "/" . $this->getTranslation('slug', $locale);
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class TvSeries extends Model 
{

    use HasTranslations;
    
    
    public $translatable = ['detail','keyword','description'];

    /**
     * Convert the model instance to an array.
     *
     * @return array
     */
    public function toArray()
    {
      $attributes = parent::toArray();
      
      foreach ($this->getTranslatableAttributes() as $name) {
          $attributes[$name] = $this->getTranslation($name, app()->getLocale());
      }
      
      return $attributes;
    }


    protected $fillable = [
      'title',
      'keyword',
      'description',
      'tmdb',
      'tmdb_id',
      'thumbnail',
      'poster',
      'genre_id',
      'detail',
      'rating',
      'maturity_rating',
      'featured',
      'type'
    ];

    public function seasons() {
      return $this->hasMany('App\Season', 'tv_series_id');
    }

    public function wishlist()
    {
      return $this->hasMany('App\Wishlist');
    }

    public function homeslide()
    {
      return $this->hasMany('App\HomeSlider', 'tv_series_id');
    }

    public function menus()
    {
      return $this->hasMany('App\MenuVideo');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use CyrildeWit\EloquentViewable\Viewable;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;

class Movie extends Model implements ViewableContract
{
    use HasTranslations;

    use Viewable;

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
      'fetch_by',
      'keyword',
      'description',
      'tmdb_id',
      'duration',
      'thumbnail',
      'poster',
      'tmdb',
      'director_id',
      'actor_id',
      'supporting_actor',
      'genre_id',
      'trailer_url',
      'detail',
      'rating',
      'maturity_rating',
      'subtitle',
      'subtitle_list',
      'subtitle_files',
      'publish_year',
      'released',
      'featured',
      'series',
      'a_language',
      'audio_files',
      'type'
    ];

    public function genre() {
      return $this->belongsTo('App\Genre');
    }

    public function movie_series() {
      return $this->hasMany('App\MovieSeries', 'movie_id');
    }

    public function wishlist()
    {
      return $this->hasMany('App\Wishlist');
    }

    public function video_link()
    {
      return $this->hasOne('App\Videolink');
    }

    public function menus()
    {
      return $this->hasMany('App\MenuVideo');
    }

    public function subtitles()
    {
      return $this->hasMany('App\Subtitles','m_t_id');
    }
}

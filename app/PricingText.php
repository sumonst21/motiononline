<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class PricingText extends Model
{

  use HasTranslations;

  public $translatable = ['value'];

  public function toArray()
  {
    $attributes = parent::toArray();

    foreach ($this->getTranslatableAttributes() as $name) {
        $attributes[$name] = $this->getTranslation($name, app()->getLocale());
    }

    return $attributes;
  }

  protected $fillable = [
    'key',
    'value'
  ];
}

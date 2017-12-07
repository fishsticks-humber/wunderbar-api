<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $primaryKey = 'google_places_id';

    protected $fillable = ['google_places_id', 'yelp_id'];

    public function bookmarks()
    {
        return $this->hasMany('\App\Bookmark');
    }

    public function reviews()
    {
        return $this->hasMany('\App\Review');
    }

    public function photos()
    {
        return $this->hasMany('\App\Photo');
    }
}

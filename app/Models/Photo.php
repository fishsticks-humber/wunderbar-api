<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['user_id', 'restaurant_id', 'review_id', "file", 'isAvatar'];

    public function restaurant()
    {
        return $this->belongsTo('\App\Restaurant', 'google_places_id');
    }

    public function user()
    {
        return $this->belongsTo('\App\User');
    }

    public function review()
    {
        return $this->belongsTo('\App\Review');
    }
}

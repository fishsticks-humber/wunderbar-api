<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['user_id', 'restaurant_id', 'review_text'];

    public function restaurant()
    {
        return $this->belongsTo('\App\Restaurant', 'google_places_id');
    }

    public function user()
    {
        return $this->belongsTo('\App\User');
    }

    public function photos()
    {
        return $this->hasMany('\App\Photo');
    }
}

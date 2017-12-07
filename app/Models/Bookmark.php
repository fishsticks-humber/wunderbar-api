<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $fillable = ['board_id', 'restaurant_id'];

    public function restaurant()
    {
        return $this->belongsTo('\App\Restaurant', 'google_places_id');
    }
    public function board()
    {
        return $this->belongsTo('\App\Board');
    }
}

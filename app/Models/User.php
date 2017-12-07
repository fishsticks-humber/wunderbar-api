<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['google_key', 'facebook_key', 'first_name', 'last_name', 'e-mail', 'password', 'uber_id'];

    public function boards()
    {
        return $this->hasMany('\App\Board');
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

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $primaryKey = 'google_places_id';
    private $restaurantName, $imageLink, $category, $address, $phone, $price;

    /**
     * Restaurant constructor.
     * @param $restaurantName
     * @param $imageLink
     * @param $category
     * @param $address
     * @param $phone
     * @param $price
     */
    public function __construct($restaurantName, $imageLink, $category, $address, $phone, $price)
    {
        parent::__construct();
        $this->restaurantName = $restaurantName;
        $this->imageLink = $imageLink;
        $this->category = $category;
        $this->address = $address;
        $this->phone = $phone;
        $this->price = $price;
    }


    /**
     * @return mixed
     */
    public function getRestaurantName()
    {
        return $this->restaurantName;
    }

    /**
     * @param mixed $restaurantName
     */
    public function setRestaurantName($restaurantName)
    {
        $this->restaurantName = $restaurantName;
    }

    /**
     * @return mixed
     */
    public function getImageLink()
    {
        return $this->imageLink;
    }

    /**
     * @param mixed $imageLink
     */
    public function setImageLink($imageLink)
    {
        $this->imageLink = $imageLink;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }



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

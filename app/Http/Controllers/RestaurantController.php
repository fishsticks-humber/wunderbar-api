<?php
/**
 * Created by PhpStorm.
 * User: antonkovunov
 * Date: 2017-12-11
 * Time: 11:56 AM
 */

namespace App\Http\Controllers;


use App\Restaurant;
use GuzzleHttp\Psr7\Request;

class RestaurantController
{
    private $yelpController, $googlePlacesController;

    /**
     * RestaurantController constructor.
     * @param $yelpController
     * @param $googlePlacesController
     */
    public function __construct()
    {
        $this->yelpController = new YelpController();
        $this->googlePlacesController = new GooglePlacesController();
    }


    public function index()
    {
        return Restaurant::all();
    }

    public function show(Restaurant $restaurant)
    {
        $restaurantInfo = json_decode($this->yelpController->getRestaurant($restaurant->getAttribute('yelp_id')), true);

        return $restaurant;
    }

    public function store(Request $request)
    {
        $restaurant = restaurant::create($request->all());

        return response()->json($restaurant, 201);
    }

    public function update(Request $request, Restaurant $restaurant)
    {
        $restaurant->update($request->all());

        return response()->json($restaurant, 200);
    }

    public function delete(Restaurant $restaurant)
    {
        $restaurant->delete();

        return response()->json(null, 204);
    }

}
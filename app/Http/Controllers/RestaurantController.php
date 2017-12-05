<?php

namespace App\Http\Controllers;

/**
 * Class RestaurantController
 * @package App\Http\Controllers
 *
 * The restaurant controller handles all the requests to get restaurants, pubs and bars
 *
 */
class RestaurantController extends Controller
{

    private $google;
    private $yelp;

    public function __construct()
    {
        $this->google = new GooglePlacesController();
        $this->yelp = new YelpController();
    }

    /**
     * Returns the details of the restaurant with the given id
     *
     * @param $id string
     * @return array
     */
    public function get($id)
    {
        return $this->google->getDetails($id);
        // TODO should get details from yelp as well and combine it(transform) into one json and send back the details
    }

    /**
     * @param $id
     */
    public function getReviews($id)
    {

    }

    /**
     * Search for a restaurant according to a location
     *
     * @param $latitude
     * @param $longitude
     * @param null $type can be restaurant, cafe or bar
     * @return array
     */
    public function searchByLocation($latitude, $longitude, $type = null)
    {
        return \GuzzleHttp\json_decode("response:'search by name'");
    }

    /**
     * @param $name
     * @return mixed
     */
    public function searchByName($name)
    {
        return \GuzzleHttp\json_decode("response:'search by name'");
    }
}

<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

/**
 * Class GooglePlacesController
 * @package App\Http\Controllers
 *
 * The GooglePlacesController handles all the requests and responses
 * to Google Places API
 */
class GooglePlacesController extends Controller
{
    const BASE_URL = "https://maps.googleapis.com/maps/api/place/";
    const PLACE_SEARCH_ENDPOINT = "nearbysearch/json";
    const PLACE_DETAILS_ENDPOINT = "details/json";

    // google place types
    const RESTAURANT = "restaurant";
    const BAR = "bar";
    const CAFE = "cafe";

    private $client;
    private $apiKey;

    public function __construct()
    {
        $this->apiKey = env('GOOGLE_PLACES_API_KEY');
        $this->client = new Client(['base_uri' => GooglePlacesController::BASE_URL]);
    }

    /**
     * Search a particular area in Google Places
     *
     * @see https://developers.google.com/places/web-service/search
     *
     * @param $latitude string
     * @param $longitude string
     * @param null $type string
     * @return array associative array of json response
     **/
    public function search($latitude, $longitude, $type = NULL)
    {
        $location = $latitude . ',' . $longitude;
        $response = NULL;

        if ($type != NULL) {
            $response = $this->client->request(
                'GET',
                GooglePlacesController::PLACE_SEARCH_ENDPOINT,
                [
                    'query' => [
                        'location' => $location,
                        'radius' => '10000',
                        'type' => $type,
                        'key' => $this->apiKey
                    ]
                ]
            );
        } else {
            $response = $this->client->request(
                'GET',
                GooglePlacesController::PLACE_SEARCH_ENDPOINT,
                [
                    'query' => [
                        'location' => $location,
                        'radius' => '10000',
                        'key' => $this->apiKey
                    ]
                ]
            );
        }

        return json_decode($response->getBody(), true);
    }

    /**
     * Gets the details of a place from Google Places
     *
     * @see https://developers.google.com/places/web-service/details
     *
     * @param $placeId
     * @return array
     */
    public function getDetails($placeId)
    {
        $response = $this->client->request(
            'GET',
            GooglePlacesController::PLACE_DETAILS_ENDPOINT,
            [
                'query' => [
                    'placeid' => $placeId,
                    'key' => $this->apiKey,
                ]
            ]
        );

        return json_decode($response->getBody(), true);
    }
}

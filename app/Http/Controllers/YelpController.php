<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Symfony\Component\Finder\Exception\AccessDeniedException;

/**
 * Class YelpController
 * @package App\Http\Controllers
 *
 * The Yelp Controller handles all the calls and authorization with the Yelp API
 */
class YelpController extends Controller
{

    const BASE_URL = "https://api.yelp.com/";
    const SEARCH_ENDPOINT = "v3/businesses/search";
    const BUSINESS_ENDPOINT = "v3/businesses";
    const AUTHORIZATION_ENDPOINT = "https://api.yelp.com/oauth2/token";

    private $client;
    private $clientId;
    private $clientSecret;
    private $accessToken;

    /**
     * YelpController constructor.
     * Constructs the YelpController as a Data Access Object
     */
    public function __construct()
    {
        // create an guzzle client to get accesstoken
        $authorizationClient = new Client([
            'base_uri' => YelpController::AUTHORIZATION_ENDPOINT
        ]);
        $this->clientId = env('YELP_CLIENT_ID');
        $this->clientSecret = env('YELP_CLIENT_SECRET');

        // send the post request to get the access token
        $response = $authorizationClient->request('POST', '', [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret
            ]
        ]);

        // if the request is successful then get the access token otherwise don't create controller
        if ($response->getStatusCode() == 200) {
            $this->accessToken = json_decode($response->getBody(), true)['access_token'];
        } else {
            throw new AccessDeniedException();
        }

        /**
         * create guzzle client with base url and access token which will
         * be used throughout this class for calling the api
         */
        $this->client = new Client([
            'base_uri' => YelpController::BASE_URL,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->accessToken
            ]

        ]);
    }

    /**
     * This method calls the yelp api to search for restaurants according to the supplied parameters
     *
     * @see https://www.yelp.ca/developers/documentation/v3/business_search
     *
     * @param array $params Associative array containing the search options
     * @return array
     */
    public function searchRestaurants(array $params = [])
    {
        $response = $this->client->request(
            'GET',
            YelpController::SEARCH_ENDPOINT,
            ['query' => $params]
        );

        return json_decode($response->getBody(), true);
    }


    /**
     * This method gets the yelp business associated with the supplied id
     *
     * @see https://www.yelp.ca/developers/documentation/v3/business
     *
     * @param $id yelp id of the restaurant
     * @return array
     */
    public function getRestaurant($id)
    {
        $endpoint = YelpController::BUSINESS_ENDPOINT . '/' . $id;
        $response = $this->client->request(
            'GET',
            $endpoint
        );
        return json_decode($response->getBody(), true);
    }

    /**
     * This method gets the yelp reviews associated with the supplied restaurant
     *
     * @see https://www.yelp.ca/developers/documentation/v3/business_reviews
     *
     * @param $id The id of the restaurant
     * @return array
     */
    public function getReviews($id)
    {
        $endpoint = YelpController::BUSINESS_ENDPOINT . '/' . $id . '/reviews';
        $response = $this->client->request(
            'GET',
            $endpoint
        );
        return json_decode($response->getBody(), true);
    }

}

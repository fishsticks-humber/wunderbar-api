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

    const BASE_URL = "https://api.yelp.com/v3";
    const SEARCH_ENDPOINT = "/businesses/search";
    const BUSINESS_ENDPOINT = "/businesses/";
    const AUTHORIZATION_ENDPOINT = "https://api.yelp.com/oauth2/token";

    private $client;
    private $clientId;
    private $clientSecret;
    private $accessToken;

    public function __construct()
    {
        // create an guzzle client to get accesstoken
        $authorizationClient = new Client([
            'base_uri' => YelpController::AUTHORIZATION_ENDPOINT
        ]);
        $this->clientId = $_ENV['YELP_CLIENT_ID'];
        $this->clientSecret = $_ENV['YELP_CLIENT_SECRET'];

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

        // create client with base url and access token
    }
}

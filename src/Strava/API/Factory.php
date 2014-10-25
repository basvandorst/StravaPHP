<?php
namespace Strava\API;

use Strava\API\OAuth as OAuthClient;
use Strava\API\Client as APIClient;
use Strava\API\Service\REST as ServiceREST;
use Pest;

// TODO: let the factory do the job..
class Factory {
    /**
     * Strava V3 endpoint
     * @var string 
     */
    private static $endpoint = 'https://www.strava.com/api/v3';
    
    /**
     * Return a new instance of the OAuth Client
     * 
     * @param string $client_id
     * @param string $client_secret
     * @param string $redirect_uri
     * @return Strava\API\OAuth
     */
    public function getOAuthClient($client_id, $client_secret, $redirect_uri) {
        $parameters = array(
            'clientId'     => $client_id,
            'clientSecret' => $client_secret,
            'redirectUri'  => $redirect_uri
        );
        
        $OAuthClient = new OAuthClient($parameters);
        return $OAuthClient;
    }
    
    /**
     * Return a new instance of the API Client
     * 
     * @param string $token
     * @return Strava\API\Client
     */
    public function getAPIClient($token) {
        $adapter = new Pest(self::$endpoint);
        $service = new ServiceREST($token, $adapter);
        
        $APIClient = new APIClient($service);
        
        return $APIClient;
    }
}

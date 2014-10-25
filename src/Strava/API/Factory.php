<?php
namespace Strava\API;

use Pest;

/**
 * Factory class
 * 
 * @author Bas van Dorst
 * @package StravaPHP
 */
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
     * @return OAuth
     */
    public function getOAuthClient($client_id, $client_secret, $redirect_uri) {
        $parameters = array(
            'clientId'     => $client_id,
            'clientSecret' => $client_secret,
            'redirectUri'  => $redirect_uri
        );
        $OAuthClient = new OAuth($parameters);
        
        return $OAuthClient;
    }
    
    /**
     * Return a new instance of the API Client
     * 
     * @param string $token
     * @return Client
     */
    public function getAPIClient($token) {
        $adapter = new Pest(self::$endpoint);
        $service = new Service\REST($token, $adapter);
        
        $APIClient = new Client($service);
        
        return $APIClient;
    }
}

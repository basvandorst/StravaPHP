<?php
namespace Strava\API;

use Strava\API\OAuth as OAuthClient;
use Strava\API\Client as APIClient;
use Strava\API\Service\REST as ServiceREST;
use Strava\API\Adapter\REST\Pest as AdapterPest;

// TODO: let the factory do the job..
class Factory {
    
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
        $adapter = new AdapterPest();
        $service = new ServiceREST($token, $adapter);
        
        $APIClient = new APIClient($service);
        
        return new $APIClient;
    }
}

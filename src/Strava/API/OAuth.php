<?php
namespace Strava\API;

use League\OAuth2\Client\Entity\User;
use League\OAuth2\Client\Token\AccessToken as AccessToken;
use League\OAuth2\Client\Provider\AbstractProvider as AbstractProvider;

/**
 * Strava OAuth
 * The Strava implementation of the OAuth client
 * 
 * @see: https://github.com/thephpleague/oauth2-client
 * @author Bas van Dorst
 */
class OAuth extends AbstractProvider
{

    public $scopes = array('write');
    public $responseType = 'json';
    
    /**
     * @see AbstractProvider::__construct
     * @param array $options
     */
    public function __construct($options)
    {
        parent::__construct($options);
        $this->headers = array(
            'Authorization' => 'Bearer'
        );
    }
    
    /**
     * @see AbstractProvider::urlAuthorize
     */
    public function urlAuthorize()
    {
        return 'https://www.strava.com/oauth/authorize';
    }

    /**
     * @see AbstractProvider::urlAuthorize
     */
    public function urlAccessToken()
    {
        return 'https://www.strava.com/oauth/token';
    }

    /**
     * @see AbstractProvider::urlUserDetails
     */
    public function urlUserDetails(AccessToken $token)
    {
        return 'https://www.strava.com/api/v3/athlete/?access_token='.$token;
    }

    /**
     * @see AbstractProvider::userDetails
     */
    public function userDetails($response, AccessToken $token)
    {
        $user = new User;

        $user->exchangeArray(array(
            'uid' => $response->id,
            'name' => implode(" ", array($response->firstname, $response->lastname)),
            'firstName' => $response->firstname,
            'lastName' => $response->lastname,
            'email' => $response->email,
            'location' => $response->country,
            'imageUrl' => $response->profile,
            'gender' => $response->sex,
        ));

        return $user;
    }

    /**
     * @see AbstractProvider::userUid
     */
    public function userUid($response, AccessToken $token)
    {
        return $response->id;
    }

    /**
     * @see AbstractProvider::userUid
     */
    public function userEmail($response, AccessToken $token)
    {
        return isset($response->email) && $response->email ? $response->email : null;
    }

    /**
     * @see AbstractProvider::userScreenName
     */
    public function userScreenName($response, AccessToken $token)
    {
        return implode(" ", array($response->firstname, $response->lastname));
    }
}
<?php

namespace Strava\API;

/**
 * Factory class
 *
 * @author Bas van Dorst
 * @package StravaPHP
 */
class Factory
{
    /**
     * Strava V3 endpoint
     */
    private static string $endpoint = 'https://www.strava.com/api/v3/';

    /**
     * Return a new instance of the OAuth Client
     *
     * @param string $client_id
     * @param string $client_secret
     * @param string $redirect_uri
     * @return OAuth
     */
    public function getOAuthClient(string $client_id, string $client_secret, string $redirect_uri): OAuth
    {
        $options = [
            'clientId' => $client_id,
            'clientSecret' => $client_secret,
            'redirectUri' => $redirect_uri
        ];
        return new OAuth($options);
    }

    /**
     * Return a new instance of the API Client
     *
     * @param string $token
     * @return Client
     */
    public function getAPIClient(string $token): Client
    {
        $adapter = new \GuzzleHttp\Client(['base_uri' => self::$endpoint]);
        $service = new Service\REST($token, $adapter);

        return new Client($service);
    }
}

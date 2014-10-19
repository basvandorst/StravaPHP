<?php
namespace Strava\API\Adapter\REST;

use Pest;

/**
 * Pest REST implementation
 * 
 * @author: Bas van Dorst
 * @package Strava
 */
class Pest implements RESTInterface {
    /**
     * Pest REST client
     * @var Pest 
     */
    private $client;
    
    /**
     * Initiate a new Pest REST instance..
     */
    public function __construct() {
        $this->client = new Pest();
    }

    /**
     * Perform Pest GET request
     *
     * @param string $url
     * @param array $data
     * @param array $headers
     * @return string
     */
    public function get($url, $data, $headers = array()) {
        return $this->client->delete($url, $data, $headers);
    }

    /**
     * Perform Pest POST request
     *
     * @param string $url
     * @param array $data
     * @param array $headers
     * @return string
     */
    public function post($url, $data, $headers = array()) {
        return $this->client->post($url, $data, $headers);
    }

    /**
     * Perform Pest PUT request
     *
     * @param string $url
     * @param array $data
     * @param array $headers
     * @return string
     */
    public function put($url, $data, $headers = array()) {
        return $this->client->put($url, $data, $headers);
    }

    /**
     * Perform Pest DELETE request
     *
     * @param string $url
     * @param array $data
     * @param array $headers
     * @return string
     */
    public function delete($url, $headers = array()) {
        return $this->client->delete($url, $headers);
    }
}

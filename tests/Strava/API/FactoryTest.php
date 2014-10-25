<?php
/**
 * Test...
 * 
 * @see Strava\API\Factory
 * @author Bas van Dorst
 * @package StravaPHP
 */
class FactoryTest extends PHPUnit_Framework_TestCase
{    
    public function testGetOAuthInstance() {
        $factory = new Strava\API\Factory();
        $client = $factory->getOAuthClient(123,'TOKEN','URL');
        $this->assertInstanceOf('Strava\API\OAuth', $client);
    }
    
    public function testGetAPIClientInstance() {
        $factory = new Strava\API\Factory();
        $client = $factory->getAPIClient('TOKEN');
        $this->assertInstanceOf('Strava\API\Client', $client);
    }
}
<?php
/**
 * Test...
 * 
 * @see Strava\API\Service\REST
 * @author Bas van Dorst
 * @package StravaPHPPHP
 */
class RESTTest extends PHPUnit_Framework_TestCase
{
    public function testGetAthlete() {
        $service = new Strava\API\Service\Stub();
        $output = $service->getAthlete(1234);
        $this->assertTrue(is_array($output));
    }
}
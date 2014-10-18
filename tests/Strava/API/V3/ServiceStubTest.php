<?php
use Strava\API\V3\ServiceException;

class ServiceStubTest extends PHPUnit_Framework_TestCase
{
    protected function setUp ()
    {
        parent::setUp();
    }
    
    public function testGetStreamsSegment() {
        $service = new Strava\API\V3\ServiceStub();
        $output = $service->getStreamsSegment(1234, 'test', null, null);
        $this->assertTrue(true); // dummy scrut
    }
}
    

<?php
use Respect\Validation\Exceptions\ValidationException;
use Strava\API\ServiceException;

/**
 * Happy flow testing..
 */
class ClientTest extends PHPUnit_Framework_TestCase
{    
    private function getServiceMock() {
        $serviceMock = $this->getMockBuilder('Strava\API\ServiceStub')
            ->disableOriginalConstructor()
            ->getMock();
        return $serviceMock;
    }
    
    function testGetStreamsSegmentValidRequest()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getStreamsSegment')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $segment = $client->getStreamsSegment(1234,'test');
        
        $this->assertEquals('output', $segment);
    }

}
    
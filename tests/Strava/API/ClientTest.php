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
    
    
    public function testGetAthlete() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthlete')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getAthlete(1234);
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetAthleteClubs() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthleteClubs')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getAthleteClubs();
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetAthleteActivities() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthleteActivities')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getAthleteActivities();
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetAthleteFriends() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthleteFriends')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getAthleteFriends();
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetAthleteFollowers() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthleteFollowers')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getAthleteFollowers();
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetAthleteBothFollowing() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthleteBothFollowing')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getAthleteBothFollowing(1234);
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetAthleteKom() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthleteKom')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getAthleteKom(1234);
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetAthleteStarredSegments() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthleteStarredSegments')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getAthleteStarredSegments();
        
        $this->assertEquals('output', $output);
    }
    
    public function testUpdateAthlete() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('updateActivity')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->updateActivity('Xyz','ABC','The Netherlands','M',83.00);
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetActivity() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getActivity')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getActivity(1234);
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetActivityComments() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getActivityComments')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getActivityComments(1234);
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetActivityKudos() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getActivityKudos')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getActivityKudos(1234);
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetActivityPhotos() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getActivityPhotos')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getActivityPhotos(1234);
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetActivityZones() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getActivityZones')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getActivityZones(1234);
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetActivityLaps() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getActivityLaps')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getActivityLaps(1234);
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetActivityUploadStatus() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getActivityUploadStatus')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getActivityUploadStatus(1234);
        
        $this->assertEquals('output', $output);
    }
    
    public function testCreateActivity() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('createActivity')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->createActivity('cycling ride','cycling','20140101',100);
        
        $this->assertEquals('output', $output);
    }
    
    public function testUploadActivity() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('uploadActivity')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->uploadActivity("abc23487fsdfds");
        
        $this->assertEquals('output', $output);
    }
    
    public function testUpdateActivity() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('updateActivity')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->updateActivity('test');
        
        $this->assertEquals('output', $output);
    }
    
    public function testDeleteActivity() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('deleteActivity')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->deleteActivity(1234);
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetGear() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getGear')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getGear(1234);
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetClub() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getClub')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getClub(1234);
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetClubMembers() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getClubMembers')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getClubMembers(1234);
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetClubActivities() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getClubActivities')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getClubActivities(1234);
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetSegment() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getSegment')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getSegment(1234);
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetSegmentLeaderboard() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getSegmentLeaderboard')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getSegmentLeaderboard(1234);
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetSegmentExplorer() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getSegmentExplorer')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getSegmentExplorer("lng.lat");
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetSegmentEffort() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getSegmentEffort')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getSegmentEffort(1234);
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetStreamsActivity() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getStreamsActivity')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getStreamsActivity(1234,'abc');
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetStreamsEffort() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getStreamsEffort')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getStreamsEffort(1234,'abc');
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetStreamsSegment() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getStreamsSegment')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getStreamsSegment(1234,'abc');
        
        $this->assertEquals('output', $output);
    }

}
    
<?php
use Strava\API\Service\Exception as ServiceException;

/**
 * Test...
 * 
 * @see Strava\API\Client
 * @author Bas van Dorst
 * @package StravaPHP
 */
class ClientTest extends PHPUnit_Framework_TestCase
{    
    private function getServiceMock() {
        $serviceMock = $this->getMockBuilder('Strava\API\Service\Stub')
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
    
    public function testGetAthleteException() {
        $this->setExpectedException('Strava\API\Exception');
        
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthlete')
           ->will($this->throwException(new ServiceException));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getAthlete(1234);
    }
    
    public function testGetAthleteClubs() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthleteClubs')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getAthleteClubs();
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetAthleteClubsException() {
        $this->setExpectedException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthleteClubs')
           ->will($this->throwException(new ServiceException));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getAthleteClubs();
    }
    
    public function testGetAthleteActivities() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthleteActivities')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getAthleteActivities();
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetAthleteActivitiesException() {
        $this->setExpectedException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthleteActivities')
           ->will($this->throwException(new ServiceException));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getAthleteActivities();
    }
    
    public function testGetAthleteFriends() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthleteFriends')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getAthleteFriends();
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetAthleteFriendsException() {
        $this->setExpectedException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthleteFriends')
           ->will($this->throwException(new ServiceException));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getAthleteFriends();
    }
    
    public function testGetAthleteFollowers() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthleteFollowers')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getAthleteFollowers();
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetAthleteFollowersException() {
        $this->setExpectedException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthleteFollowers')
           ->will($this->throwException(new ServiceException));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getAthleteFollowers();
    }
    
    public function testGetAthleteBothFollowing() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthleteBothFollowing')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getAthleteBothFollowing(1234);
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetAthleteBothFollowingException() {
        $this->setExpectedException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthleteBothFollowing')
           ->will($this->throwException(new ServiceException));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getAthleteBothFollowing(1234);
    }

    
    public function testGetAthleteKom() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthleteKom')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getAthleteKom(1234);
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetAthleteKomException() {
        $this->setExpectedException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthleteKom')
           ->will($this->throwException(new ServiceException));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getAthleteKom(1234);
    }
    
    
    public function testGetAthleteStarredSegments() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthleteStarredSegments')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getAthleteStarredSegments();
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetAthleteStarredSegmentsException() {
        $this->setExpectedException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthleteStarredSegments')
           ->will($this->throwException(new ServiceException));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getAthleteStarredSegments();
    }
    
    public function testUpdateAthlete() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('updateAthlete')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->updateAthlete('Xyz','ABC','The Netherlands','M',83.00);
        
        $this->assertEquals('output', $output);
    }
    
        public function testUpdateAthleteException() {
        $this->setExpectedException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('updateAthlete')
           ->will($this->throwException(new ServiceException));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->updateAthlete('Xyz','ABC','The Netherlands','M',83.00);
    }
    
    public function testGetActivity() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getActivity')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getActivity(1234);
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetActivityException() {
        $this->setExpectedException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getActivity')
           ->will($this->throwException(new ServiceException));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getActivity(1234);
    }
    
    public function testGetActivityComments() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getActivityComments')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getActivityComments(1234);
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetActivityCommentsException() {
        $this->setExpectedException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getActivityComments')
           ->will($this->throwException(new ServiceException));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getActivityComments(1234);
    }
    
    public function testGetActivityKudos() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getActivityKudos')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getActivityKudos(1234);
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetActivityKudosException() {
        $this->setExpectedException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getActivityKudos')
           ->will($this->throwException(new ServiceException));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getActivityKudos(1234);
    }
    
    public function testGetActivityPhotos() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getActivityPhotos')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getActivityPhotos(1234);
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetActivityPhotosException() {
        $this->setExpectedException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getActivityPhotos')
           ->will($this->throwException(new ServiceException));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getActivityPhotos(1234);
    }
    
    public function testGetActivityZones() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getActivityZones')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getActivityZones(1234);
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetActivityZonesException() {
        $this->setExpectedException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getActivityZones')
           ->will($this->throwException(new ServiceException));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getActivityZones(1234);
    }
    
    public function testGetActivityLaps() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getActivityLaps')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getActivityLaps(1234);
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetActivityLapsException() {
        $this->setExpectedException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getActivityLaps')
           ->will($this->throwException(new ServiceException));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getActivityLaps(1234);
    }
    
    public function testGetActivityUploadStatus() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getActivityUploadStatus')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getActivityUploadStatus(1234);
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetActivityUploadStatusException() {
        $this->setExpectedException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getActivityUploadStatus')
           ->will($this->throwException(new ServiceException));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getActivityUploadStatus(1234);
    }
    
    public function testCreateActivity() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('createActivity')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->createActivity('cycling ride','cycling','20140101',100);
        
        $this->assertEquals('output', $output);
    }
    
    public function testCreateActivityException() {
        $this->setExpectedException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('createActivity')
           ->will($this->throwException(new ServiceException));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->createActivity('cycling ride','cycling','20140101',100);
    }
    
    public function testUploadActivity() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('uploadActivity')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->uploadActivity("abc23487fsdfds");
        
        $this->assertEquals('output', $output);
    }
    
    public function testUploadActivityException() {
        $this->setExpectedException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('uploadActivity')
           ->will($this->throwException(new ServiceException));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->uploadActivity("abc23487fsdfds");
    }
    
    public function testUpdateActivity() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('updateActivity')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->updateActivity('test');
        
        $this->assertEquals('output', $output);
    }
    
    public function testUpdateActivityException() {
        $this->setExpectedException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('updateActivity')
           ->will($this->throwException(new ServiceException));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->updateActivity('test');
    }
    
    public function testDeleteActivity() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('deleteActivity')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->deleteActivity(1234);
        
        $this->assertEquals('output', $output);
    }
    
    public function testDeleteActivityException() {
        $this->setExpectedException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('deleteActivity')
           ->will($this->throwException(new ServiceException));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->deleteActivity(1234);
    }

    
    public function testGetGear() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getGear')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getGear(1234);
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetGearException() {
        $this->setExpectedException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getGear')
           ->will($this->throwException(new ServiceException));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getGear(1234);
    }
    
    public function testGetClub() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getClub')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getClub(1234);
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetClubException() {
        $this->setExpectedException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getClub')
           ->will($this->throwException(new ServiceException));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getClub(1234);
    }
    
    public function testGetClubMembers() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getClubMembers')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getClubMembers(1234);
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetClubMembersException() {
        $this->setExpectedException('Strava\API\Exception');
        
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getClubMembers')
           ->will($this->throwException(new ServiceException));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getClubMembers(1234);
    }
    
    public function testGetClubActivities() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getClubActivities')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getClubActivities(1234);
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetClubActivitiesException() {
        $this->setExpectedException('Strava\API\Exception');
        
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getClubActivities')
           ->will($this->throwException(new ServiceException));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getClubActivities(1234);
    }
    
    public function testGetSegment() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getSegment')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getSegment(1234);
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetSegmentException() {
        $this->setExpectedException('Strava\API\Exception');
        
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getSegment')
           ->will($this->throwException(new ServiceException));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getSegment(1234);
    }
    
    public function testGetSegmentLeaderboard() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getSegmentLeaderboard')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getSegmentLeaderboard(1234);
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetSegmentLeaderboardException() {
        $this->setExpectedException('Strava\API\Exception');
        
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getSegmentLeaderboard')
           ->will($this->throwException(new ServiceException));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getSegmentLeaderboard(1234);
    }
    
    public function testGetSegmentExplorer() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getSegmentExplorer')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getSegmentExplorer("lng.lat");
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetSegmentExplorerException() {
        $this->setExpectedException('Strava\API\Exception');
        
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getSegmentExplorer')
           ->will($this->throwException(new ServiceException));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getSegmentExplorer("lng.lat");
    }
    
    public function testGetSegmentEffort() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getSegmentEffort')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getSegmentEffort(1234);
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetSegmentEffortException() {
        $this->setExpectedException('Strava\API\Exception');
        
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getSegmentEffort')
           ->will($this->throwException(new ServiceException));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getSegmentEffort(1234);
    }
    
    public function testGetStreamsActivity() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getStreamsActivity')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getStreamsActivity(1234,'abc');
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetStreamsActivityException() {
        $this->setExpectedException('Strava\API\Exception');
        
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getStreamsActivity')
           ->will($this->throwException(new ServiceException));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getStreamsActivity(1234,'abc');
    }
    
    public function testGetStreamsEffort() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getStreamsEffort')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getStreamsEffort(1234,'abc');
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetStreamsEffortException() {
        $this->setExpectedException('Strava\API\Exception');
        
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getStreamsEffort')
           ->will($this->throwException(new ServiceException));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getStreamsEffort(1234,'abc');
    }
    
    public function testGetStreamsSegment() {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getStreamsSegment')
           ->will($this->returnValue('output'));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getStreamsSegment(1234,'abc');
        
        $this->assertEquals('output', $output);
    }
    
    public function testGetStreamsSegmentException() {
        $this->setExpectedException('Strava\API\Exception');
        
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getStreamsSegment')
           ->will($this->throwException(new ServiceException));
         
        $client = new Strava\API\Client($serviceMock);
        $output = $client->getStreamsSegment(1234,'abc');
    }

}
    
<?php
/**
 * Test...
 * 
 * @see Strava\API\Service\REST
 * @author Bas van Dorst
 * @package StravaPHP
 */
class RESTTest extends PHPUnit_Framework_TestCase
{
    private function getPestMock() {
        $pestMock = $this->getMockBuilder('Pest')
            ->disableOriginalConstructor()
            ->getMock();
        return $pestMock;
    }
    
    public function testGetAthlete() {
        $pestMock = $this->getPestMock();
        $pestMock->expects($this->once())->method('get')
           ->with($this->equalTo('/athlete'))
           ->will($this->returnValue('{"response": 1}'));
        
        $service = new Strava\API\Service\REST('TOKEN',  $pestMock);
        $output = $service->getAthlete();
        $this->assertArrayHasKey('response', $output);
    }
    
    public function testGetAthleteWithId() {
        $pestMock = $this->getPestMock();
        $pestMock->expects($this->once())->method('get')
           ->with($this->equalTo('/athletes/1234'))
           ->will($this->returnValue('{"response": 1}'));
        
        $service = new Strava\API\Service\REST('TOKEN',  $pestMock);
        $output = $service->getAthlete(1234);
        $this->assertArrayHasKey('response', $output);
    }
    
    public function testGetAthleteClubs() {
        $pestMock = $this->getPestMock();
        $pestMock->expects($this->once())->method('get')
           ->with($this->equalTo('/athlete/clubs'))
           ->will($this->returnValue('{"response": 1}'));
        
        $service = new Strava\API\Service\REST('TOKEN',  $pestMock);
        $output = $service->getAthleteClubs();
        $this->assertArrayHasKey('response', $output);
    }
    
    public function testGetAthleteActivities() {
        $pestMock = $this->getPestMock();
        $pestMock->expects($this->once())->method('get')
           ->with($this->equalTo('/athlete/activities'))
           ->will($this->returnValue('{"response": 1}'));
        
        $service = new Strava\API\Service\REST('TOKEN',  $pestMock);
        $output = $service->getAthleteActivities();
        $this->assertArrayHasKey('response', $output);
    }
    
    public function testGetAthleteFriends() {
        $pestMock = $this->getPestMock();
        $pestMock->expects($this->once())->method('get')
           ->with($this->equalTo('/athlete/friends'))
           ->will($this->returnValue('{"response": 1}'));
        
        $service = new Strava\API\Service\REST('TOKEN',  $pestMock);
        $output = $service->getAthleteFriends();
        $this->assertArrayHasKey('response', $output);
    }
    
    public function testGetAthleteFriendsWithId() {
        $pestMock = $this->getPestMock();
        $pestMock->expects($this->once())->method('get')
           ->with($this->equalTo('/athletes/1234/friends'))
           ->will($this->returnValue('{"response": 1}'));
        
        $service = new Strava\API\Service\REST('TOKEN',  $pestMock);
        $output = $service->getAthleteFriends(1234);
        $this->assertArrayHasKey('response', $output);
    }
    
    public function testGetAthleteFollowers() {
        $pestMock = $this->getPestMock();
        $pestMock->expects($this->once())->method('get')
           ->with($this->equalTo('/athlete/followers'))
           ->will($this->returnValue('{"response": 1}'));
        
        $service = new Strava\API\Service\REST('TOKEN',  $pestMock);
        $output = $service->getAthleteFollowers();
        $this->assertArrayHasKey('response', $output);
    }
    
    public function testGetAthleteFollowersWithId() {
        $pestMock = $this->getPestMock();
        $pestMock->expects($this->once())->method('get')
           ->with($this->equalTo('/athletes/1234/followers'))
           ->will($this->returnValue('{"response": 1}'));
        
        $service = new Strava\API\Service\REST('TOKEN',  $pestMock);
        $output = $service->getAthleteFollowers(1234);
        $this->assertArrayHasKey('response', $output);
    }
    
    public function testGetAthleteBothFollowing() {
        $pestMock = $this->getPestMock();
        $pestMock->expects($this->once())->method('get')
           ->with($this->equalTo('/athletes/1234/both-following'))
           ->will($this->returnValue('{"response": 1}'));
        
        $service = new Strava\API\Service\REST('TOKEN',  $pestMock);
        $output = $service->getAthleteBothFollowing(1234);
        $this->assertArrayHasKey('response', $output);
    }
    
    public function testGetAthleteKOM() {
        $pestMock = $this->getPestMock();
        $pestMock->expects($this->once())->method('get')
           ->with($this->equalTo('/athletes/1234/koms'))
           ->will($this->returnValue('{"response": 1}'));
        
        $service = new Strava\API\Service\REST('TOKEN',  $pestMock);
        $output = $service->getAthleteKom(1234);
        $this->assertArrayHasKey('response', $output);
    }
    
    public function testGetAthleteStarredSegments() {
        $pestMock = $this->getPestMock();
        $pestMock->expects($this->once())->method('get')
           ->with($this->equalTo('/segments/starred'))
           ->will($this->returnValue('{"response": 1}'));
        
        $service = new Strava\API\Service\REST('TOKEN',  $pestMock);
        $output = $service->getAthleteStarredSegments();
        $this->assertArrayHasKey('response', $output);
    }
    
    public function testGetAthleteStarredSegmentsWithId() {
        $pestMock = $this->getPestMock();
        $pestMock->expects($this->once())->method('get')
           ->with($this->equalTo('/athletes/1234/segments/starred'))
           ->will($this->returnValue('{"response": 1}'));
        
        $service = new Strava\API\Service\REST('TOKEN',  $pestMock);
        $output = $service->getAthleteStarredSegments(1234);
        $this->assertArrayHasKey('response', $output);
    }
    
    public function testUpdateAthlete() {
        $parameters = array(
            'city' => 'Xyz',
            'state' => 'ABC',
            'country' => 'The Netherlands',
            'sex' => 'M',
            'weight' => 83.00,
        );
        
        $pestMock = $this->getPestMock();
        $pestMock->expects($this->once())->method('put')
           ->with($this->equalTo('/athlete'),$this->equalTo($parameters))
           ->will($this->returnValue('{"response": 1}'));
        
        $service = new Strava\API\Service\REST('TOKEN',  $pestMock);
        $output = $service->updateAthlete('Xyz','ABC','The Netherlands','M',83.00);
        $this->assertArrayHasKey('response', $output);
    }
    
    public function testGetActivity() {
        $pestMock = $this->getPestMock();
        $pestMock->expects($this->once())->method('get')
           ->with($this->equalTo('/activities/1234'))
           ->will($this->returnValue('{"response": 1}'));
        
        $service = new Strava\API\Service\REST('TOKEN',  $pestMock);
        $output = $service->getActivity(1234);
        $this->assertArrayHasKey('response', $output);
    }
    
    public function testGetActivityComments() {
        $pestMock = $this->getPestMock();
        $pestMock->expects($this->once())->method('get')
           ->with($this->equalTo('/activities/1234/comments'))
           ->will($this->returnValue('{"response": 1}'));
        
        $service = new Strava\API\Service\REST('TOKEN',  $pestMock);
        $output = $service->getActivityComments(1234);
        $this->assertArrayHasKey('response', $output);
    }
    
    public function testGetActivityKudos() {
        $pestMock = $this->getPestMock();
        $pestMock->expects($this->once())->method('get')
           ->with($this->equalTo('/activities/1234/kudos'))
           ->will($this->returnValue('{"response": 1}'));
        
        $service = new Strava\API\Service\REST('TOKEN',  $pestMock);
        $output = $service->getActivityKudos(1234);
        $this->assertArrayHasKey('response', $output);
    }
    
    public function testGetActivityPhotos() {
        $pestMock = $this->getPestMock();
        $pestMock->expects($this->once())->method('get')
           ->with($this->equalTo('/activities/1234/photos'))
           ->will($this->returnValue('{"response": 1}'));
        
        $service = new Strava\API\Service\REST('TOKEN',  $pestMock);
        $output = $service->getActivityPhotos(1234);
        $this->assertArrayHasKey('response', $output);
    }
    
    public function testGetActivityZones() {
        $pestMock = $this->getPestMock();
        $pestMock->expects($this->once())->method('get')
           ->with($this->equalTo('/activities/1234/zones'))
           ->will($this->returnValue('{"response": 1}'));
        
        $service = new Strava\API\Service\REST('TOKEN',  $pestMock);
        $output = $service->getActivityZones(1234);
        $this->assertArrayHasKey('response', $output);
    }
    
    public function testGetActivityLaps() {
        $pestMock = $this->getPestMock();
        $pestMock->expects($this->once())->method('get')
           ->with($this->equalTo('/activities/1234/laps'))
           ->will($this->returnValue('{"response": 1}'));
        
        $service = new Strava\API\Service\REST('TOKEN',  $pestMock);
        $output = $service->getActivityLaps(1234);
        $this->assertArrayHasKey('response', $output);
    }
    
    public function testGetActivityUploadStatus() {
        $pestMock = $this->getPestMock();
        $pestMock->expects($this->once())->method('get')
           ->with($this->equalTo('/uploads/1234'))
           ->will($this->returnValue('{"response": 1}'));
        
        $service = new Strava\API\Service\REST('TOKEN',  $pestMock);
        $output = $service->getActivityUploadStatus(1234);
        $this->assertArrayHasKey('response', $output);
    }
    
    public function testCreateActivity() {
        $pestMock = $this->getPestMock();
        $pestMock->expects($this->once())->method('post')
           ->with($this->equalTo('/activities'))
           ->will($this->returnValue('{"response": 1}'));
        
        $service = new Strava\API\Service\REST('TOKEN',  $pestMock);
        $output = $service->createActivity('test','test','20130101',100);
        $this->assertArrayHasKey('response', $output);
    }
    
    public function testUploadActivity() {
        $pestMock = $this->getPestMock();
        $pestMock->expects($this->once())->method('post')
           ->with($this->equalTo('/uploads'))
           ->will($this->returnValue('{"response": 1}'));
        
        $service = new Strava\API\Service\REST('TOKEN',  $pestMock);
        $output = $service->uploadActivity('file');
        $this->assertArrayHasKey('response', $output);
    }
    
    public function testUpdateActivity() {
        $pestMock = $this->getPestMock();
        $pestMock->expects($this->once())->method('put')
           ->with($this->equalTo('/activities/1234'))
           ->will($this->returnValue('{"response": 1}'));
        
        $service = new Strava\API\Service\REST('TOKEN',  $pestMock);
        $output = $service->updateActivity(1234,'test');
        $this->assertArrayHasKey('response', $output);
    }
    
    public function testDeleteActivity() {
        $pestMock = $this->getPestMock();
        $pestMock->expects($this->once())->method('delete')
           ->with($this->equalTo('/activities/1234'))
           ->will($this->returnValue('{"response": 1}'));
        
        $service = new Strava\API\Service\REST('TOKEN',  $pestMock);
        $output = $service->deleteActivity(1234);
        $this->assertArrayHasKey('response', $output);
    }
    
    public function testGetGear() {
        $pestMock = $this->getPestMock();
        $pestMock->expects($this->once())->method('get')
           ->with($this->equalTo('/gear/1234'))
           ->will($this->returnValue('{"response": 1}'));
        
        $service = new Strava\API\Service\REST('TOKEN',  $pestMock);
        $output = $service->getGear(1234);
        $this->assertArrayHasKey('response', $output);
    }
    
    public function testGetClub() {
        $pestMock = $this->getPestMock();
        $pestMock->expects($this->once())->method('get')
           ->with($this->equalTo('/clubs/1234'))
           ->will($this->returnValue('{"response": 1}'));
        
        $service = new Strava\API\Service\REST('TOKEN',  $pestMock);
        $output = $service->getClub(1234);
        $this->assertArrayHasKey('response', $output);
    }
    
    public function testGetClubMembers() {
        $pestMock = $this->getPestMock();
        $pestMock->expects($this->once())->method('get')
           ->with($this->equalTo('/clubs/1234/members'))
           ->will($this->returnValue('{"response": 1}'));
        
        $service = new Strava\API\Service\REST('TOKEN',  $pestMock);
        $output = $service->getClubMembers(1234);
        $this->assertArrayHasKey('response', $output);
    }
    
    public function testGetClubActivities() {
        $pestMock = $this->getPestMock();
        $pestMock->expects($this->once())->method('get')
           ->with($this->equalTo('/clubs/1234/activities'))
           ->will($this->returnValue('{"response": 1}'));
        
        $service = new Strava\API\Service\REST('TOKEN',  $pestMock);
        $output = $service->getClubActivities(1234);
        $this->assertArrayHasKey('response', $output);
    }
    
    public function testGetSegment() {
        $pestMock = $this->getPestMock();
        $pestMock->expects($this->once())->method('get')
           ->with($this->equalTo('/segments/1234'))
           ->will($this->returnValue('{"response": 1}'));
        
        $service = new Strava\API\Service\REST('TOKEN',  $pestMock);
        $output = $service->getSegment(1234);
        $this->assertArrayHasKey('response', $output);
    }
    
    public function testGetSegmentLeaderboard() {
        $pestMock = $this->getPestMock();
        $pestMock->expects($this->once())->method('get')
           ->with($this->equalTo('/segments/1234/leaderboard'))
           ->will($this->returnValue('{"response": 1}'));
        
        $service = new Strava\API\Service\REST('TOKEN',  $pestMock);
        $output = $service->getSegmentLeaderboard(1234);
        $this->assertArrayHasKey('response', $output);
    }
    
    public function testGetSegmentExplorer() {
        $pestMock = $this->getPestMock();
        $pestMock->expects($this->once())->method('get')
           ->with($this->equalTo('/segments/explore'))
           ->will($this->returnValue('{"response": 1}'));
        
        $service = new Strava\API\Service\REST('TOKEN',  $pestMock);
        $output = $service->getSegmentExplorer('37.821362,-122.505373,37.842038,-122.465977');
        $this->assertArrayHasKey('response', $output);
    }
    
    public function testGetSegmentEffort() {
        $pestMock = $this->getPestMock();
        $pestMock->expects($this->once())->method('get')
           ->with($this->equalTo('/segments/1234/all_efforts'))
           ->will($this->returnValue('{"response": 1}'));
        
        $service = new Strava\API\Service\REST('TOKEN',  $pestMock);
        $output = $service->getSegmentEffort(1234);
        $this->assertArrayHasKey('response', $output);
    }
    
    public function testGetStreamsActivity() {
        $pestMock = $this->getPestMock();
        $pestMock->expects($this->once())->method('get')
           ->with($this->equalTo('/activities/1234/streams/latlng'))
           ->will($this->returnValue('{"response": 1}'));
        
        $service = new Strava\API\Service\REST('TOKEN',  $pestMock);
        $output = $service->getStreamsActivity(1234,'latlng');
        $this->assertArrayHasKey('response', $output);
    }
    
    public function testGetStreamsEffort() {
        $pestMock = $this->getPestMock();
        $pestMock->expects($this->once())->method('get')
           ->with($this->equalTo('/segment_efforts/1234/streams/latlng'))
           ->will($this->returnValue('{"response": 1}'));
        
        $service = new Strava\API\Service\REST('TOKEN',  $pestMock);
        $output = $service->getStreamsEffort(1234,'latlng');
        $this->assertArrayHasKey('response', $output);
    }
    
    public function testGetStreamsSegment() {
        $pestMock = $this->getPestMock();
        $pestMock->expects($this->once())->method('get')
           ->with($this->equalTo('/segments/1234/streams/latlng'))
           ->will($this->returnValue('{"response": 1}'));
        
        $service = new Strava\API\Service\REST('TOKEN',  $pestMock);
        $output = $service->getStreamsSegment(1234,'latlng');
        $this->assertArrayHasKey('response', $output);
    }
}
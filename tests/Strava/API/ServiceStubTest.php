<?php
use Strava\API\ServiceException;

class ServiceStubTest extends PHPUnit_Framework_TestCase
{
    protected function setUp ()
    {
        parent::setUp();
    }
    
    public function testGetAthlete() {
        $service = new Strava\API\ServiceStub();
        $output = $service->getAthlete(1234);
        $this->assertTrue(is_array($output));
    }
    
    public function testGetAthleteClubs() {
        $service = new Strava\API\ServiceStub();
        $output = $service->getAthleteClubs();
        $this->assertTrue(is_array($output));
    }
    
    public function testGetAthleteActivities() {
        $service = new Strava\API\ServiceStub();
        $output = $service->getAthleteActivities();
        $this->assertTrue(is_array($output));
    }
    
    public function testGetAthleteFriends() {
        $service = new Strava\API\ServiceStub();
        $output = $service->getAthleteFriends();
        $this->assertTrue(is_array($output));
    }
    
    public function testGetAthleteFollowers() {
        $service = new Strava\API\ServiceStub();
        $output = $service->getAthleteFollowers();
        $this->assertTrue(is_array($output));
    }
    
    public function testGetAthleteBothFollowing() {
        $service = new Strava\API\ServiceStub();
        $output = $service->getAthleteBothFollowing(1234);
        $this->assertTrue(is_array($output));
    }
    
    public function testGetAthleteKom() {
        $service = new Strava\API\ServiceStub();
        $output = $service->getAthleteKom(1234);
        $this->assertTrue(is_array($output));
    }
    
    public function testGetAthleteStarredSegments() {
        $service = new Strava\API\ServiceStub();
        $output = $service->getAthleteStarredSegments();
        $this->assertTrue(is_array($output));
    }
    
    public function testUpdateAthlete() {
        $service = new Strava\API\ServiceStub();
        $output = $service->updateActivity('Xyz','ABC','The Netherlands','M',83.00);
        $this->assertTrue(is_array($output));
    }
    
    public function testGetActivity() {
        $service = new Strava\API\ServiceStub();
        $output = $service->getActivity(1234);
        $this->assertTrue(is_array($output));
    }
    
    public function testGetActivityComments() {
        $service = new Strava\API\ServiceStub();
        $output = $service->getActivityComments(1234);
        $this->assertTrue(is_array($output));
    }
    
    public function testGetActivityKudos() {
        $service = new Strava\API\ServiceStub();
        $output = $service->getActivityKudos(1234);
        $this->assertTrue(is_array($output));
    }
    
    public function testGetActivityPhotos() {
        $service = new Strava\API\ServiceStub();
        $output = $service->getActivityPhotos(1234);
        $this->assertTrue(is_array($output));
    }
    
    public function testGetActivityZones() {
        $service = new Strava\API\ServiceStub();
        $output = $service->getActivityZones(1234);
        $this->assertTrue(is_array($output));
    }
    
    public function testGetActivityLaps() {
        $service = new Strava\API\ServiceStub();
        $output = $service->getActivityLaps(1234);
        $this->assertTrue(is_array($output));
    }
    
    public function testGetActivityUploadStatus() {
        $service = new Strava\API\ServiceStub();
        $output = $service->getActivityUploadStatus(1234);
        $this->assertTrue(is_array($output));
    }
    
    public function testCreateActivity() {
        $service = new Strava\API\ServiceStub();
        $output = $service->createActivity('cycling ride','cycling','20140101',100);
        $this->assertTrue(is_array($output));
    }
    
    public function testUploadActivity() {
        $service = new Strava\API\ServiceStub();
        $output = $service->uploadActivity("abc23487fsdfds");
        $this->assertTrue(is_array($output));
    }
    
    public function testUpdateActivity() {
        $service = new Strava\API\ServiceStub();
        $output = $service->updateActivity('test');
        $this->assertTrue(is_array($output));
    }
    
    public function testDeleteActivity() {
        $service = new Strava\API\ServiceStub();
        $output = $service->deleteActivity(1234);
        $this->assertTrue(is_array($output));
    }
    
    public function testGetGear() {
        $service = new Strava\API\ServiceStub();
        $output = $service->getGear(1234);
        $this->assertTrue(is_array($output));
    }
    
    public function testGetClub() {
        $service = new Strava\API\ServiceStub();
        $output = $service->getClub(1234);
        $this->assertTrue(is_array($output));
    }
    
    public function testGetClubMembers() {
        $service = new Strava\API\ServiceStub();
        $output = $service->getClubMembers(1234);
        $this->assertTrue(is_array($output));
    }
    
    public function testGetClubActivities() {
        $service = new Strava\API\ServiceStub();
        $output = $service->getClubActivities(1234);
        $this->assertTrue(is_array($output));
    }
    
    public function testGetSegment() {
        $service = new Strava\API\ServiceStub();
        $output = $service->getSegment(1234);
        $this->assertTrue(is_array($output));
    }
    
    public function testGetSegmentLeaderboard() {
        $service = new Strava\API\ServiceStub();
        $output = $service->getSegmentLeaderboard(1234);
        $this->assertTrue(is_array($output));
    }
    
    public function testGetSegmentExplorer() {
        $service = new Strava\API\ServiceStub();
        $output = $service->getSegmentExplorer("lng.lat");
        $this->assertTrue(is_array($output));
    }
    
    public function testGetSegmentEffort() {
        $service = new Strava\API\ServiceStub();
        $output = $service->getSegmentEffort(1234);
        $this->assertTrue(is_array($output));
    }
    
    public function testGetStreamsActivity() {
        $service = new Strava\API\ServiceStub();
        $output = $service->getStreamsActivity(1234,'abc');
        $this->assertTrue(is_array($output));
    }
    
    public function testGetStreamsEffort() {
        $service = new Strava\API\ServiceStub();
        $output = $service->getStreamsEffort(1234,'abc');
        $this->assertTrue(is_array($output));
    }
    
    public function testGetStreamsSegment() {
        $service = new Strava\API\ServiceStub();
        $output = $service->getStreamsSegment(1234,'abc');
        $this->assertTrue(is_array($output));
    }
}
    

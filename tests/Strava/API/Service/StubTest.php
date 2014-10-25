<?php
/**
 * Test...
 * 
 * @see Strava\API\Service\Stub
 * @author Bas van Dorst
 * @package StravaPHP
 */
class StubTest extends PHPUnit_Framework_TestCase
{
    public function testGetAthlete() {
        $service = new Strava\API\Service\Stub();
        $output = $service->getAthlete(1234);
        $this->assertTrue(is_array($output));
    }
    
    public function testGetAthleteClubs() {
        $service = new Strava\API\Service\Stub();
        $output = $service->getAthleteClubs();
        $this->assertTrue(is_array($output));
    }
    
    public function testGetAthleteActivities() {
        $service = new Strava\API\Service\Stub();
        $output = $service->getAthleteActivities();
        $this->assertTrue(is_array($output));
    }
    
    public function testGetAthleteFriends() {
        $service = new Strava\API\Service\Stub();
        $output = $service->getAthleteFriends();
        $this->assertTrue(is_array($output));
    }
    
    public function testGetAthleteFollowers() {
        $service = new Strava\API\Service\Stub();
        $output = $service->getAthleteFollowers();
        $this->assertTrue(is_array($output));
    }
    
    public function testGetAthleteBothFollowing() {
        $service = new Strava\API\Service\Stub();
        $output = $service->getAthleteBothFollowing(1234);
        $this->assertTrue(is_array($output));
    }
    
    public function testGetAthleteKom() {
        $service = new Strava\API\Service\Stub();
        $output = $service->getAthleteKom(1234);
        $this->assertTrue(is_array($output));
    }
    
    public function testGetAthleteStarredSegments() {
        $service = new Strava\API\Service\Stub();
        $output = $service->getAthleteStarredSegments();
        $this->assertTrue(is_array($output));
    }
    
    public function testUpdateAthlete() {
        $service = new Strava\API\Service\Stub();
        $output = $service->updateAthlete('Xyz','ABC','The Netherlands','M',83.00);
        $this->assertTrue(is_array($output));
    }
    
    public function testGetActivity() {
        $service = new Strava\API\Service\Stub();
        $output = $service->getActivity(1234);
        $this->assertTrue(is_array($output));
    }
    
    public function testGetActivityComments() {
        $service = new Strava\API\Service\Stub();
        $output = $service->getActivityComments(1234);
        $this->assertTrue(is_array($output));
    }
    
    public function testGetActivityKudos() {
        $service = new Strava\API\Service\Stub();
        $output = $service->getActivityKudos(1234);
        $this->assertTrue(is_array($output));
    }
    
    public function testGetActivityPhotos() {
        $service = new Strava\API\Service\Stub();
        $output = $service->getActivityPhotos(1234);
        $this->assertTrue(is_array($output));
    }
    
    public function testGetActivityZones() {
        $service = new Strava\API\Service\Stub();
        $output = $service->getActivityZones(1234);
        $this->assertTrue(is_array($output));
    }
    
    public function testGetActivityLaps() {
        $service = new Strava\API\Service\Stub();
        $output = $service->getActivityLaps(1234);
        $this->assertTrue(is_array($output));
    }
    
    public function testGetActivityUploadStatus() {
        $service = new Strava\API\Service\Stub();
        $output = $service->getActivityUploadStatus(1234);
        $this->assertTrue(is_array($output));
    }
    
    public function testCreateActivity() {
        $service = new Strava\API\Service\Stub();
        $output = $service->createActivity('cycling ride','cycling','20140101',100);
        $this->assertTrue(is_array($output));
    }
    
    public function testUploadActivity() {
        $service = new Strava\API\Service\Stub();
        $output = $service->uploadActivity("abc23487fsdfds");
        $this->assertTrue(is_array($output));
    }
    
    public function testUpdateActivity() {
        $service = new Strava\API\Service\Stub();
        $output = $service->updateActivity('test');
        $this->assertTrue(is_array($output));
    }
    
    public function testDeleteActivity() {
        $service = new Strava\API\Service\Stub();
        $output = $service->deleteActivity(1234);
        $this->assertTrue(is_array($output));
    }
    
    public function testGetGear() {
        $service = new Strava\API\Service\Stub();
        $output = $service->getGear(1234);
        $this->assertTrue(is_array($output));
    }
    
    public function testGetClub() {
        $service = new Strava\API\Service\Stub();
        $output = $service->getClub(1234);
        $this->assertTrue(is_array($output));
    }
    
    public function testGetClubMembers() {
        $service = new Strava\API\Service\Stub();
        $output = $service->getClubMembers(1234);
        $this->assertTrue(is_array($output));
    }
    
    public function testGetClubActivities() {
        $service = new Strava\API\Service\Stub();
        $output = $service->getClubActivities(1234);
        $this->assertTrue(is_array($output));
    }
    
    public function testGetSegment() {
        $service = new Strava\API\Service\Stub();
        $output = $service->getSegment(1234);
        $this->assertTrue(is_array($output));
    }
    
    public function testGetSegmentLeaderboard() {
        $service = new Strava\API\Service\Stub();
        $output = $service->getSegmentLeaderboard(1234);
        $this->assertTrue(is_array($output));
    }
    
    public function testGetSegmentExplorer() {
        $service = new Strava\API\Service\Stub();
        $output = $service->getSegmentExplorer("lng.lat");
        $this->assertTrue(is_array($output));
    }
    
    public function testGetSegmentEffort() {
        $service = new Strava\API\Service\Stub();
        $output = $service->getSegmentEffort(1234);
        $this->assertTrue(is_array($output));
    }
    
    public function testGetStreamsActivity() {
        $service = new Strava\API\Service\Stub();
        $output = $service->getStreamsActivity(1234,'abc');
        $this->assertTrue(is_array($output));
    }
    
    public function testGetStreamsEffort() {
        $service = new Strava\API\Service\Stub();
        $output = $service->getStreamsEffort(1234,'abc');
        $this->assertTrue(is_array($output));
    }
    
    public function testGetStreamsSegment() {
        $service = new Strava\API\Service\Stub();
        $output = $service->getStreamsSegment(1234,'abc');
        $this->assertTrue(is_array($output));
    }
}
    

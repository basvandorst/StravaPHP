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
}
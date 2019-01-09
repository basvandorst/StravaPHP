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
    /**
     * @return PHPUnit_Framework_MockObject_MockObject|\GuzzleHttp\Client
     */
    private function getRestMock()
    {
        $restMock = $this->getMockBuilder('\GuzzleHttp\Client')
            ->disableOriginalConstructor()
            ->getMock();
        return $restMock;
    }

    public function testGetAthlete()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('get')
            ->with($this->equalTo('/athlete'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->getAthlete();
        $this->assertArrayHasKey('response', $output);
    }

    public function testGetAthleteWithId()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('get')
            ->with($this->equalTo('/athletes/1234'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->getAthlete(1234);
        $this->assertArrayHasKey('response', $output);
    }

    public function testGetStats()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('get')
            ->with($this->equalTo('/athletes/1234/stats'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->getAthleteStats(1234);
        $this->assertArrayHasKey('response', $output);
    }

    public function testGetRoutes()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('get')
            ->with($this->equalTo('/athletes/1234/routes'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->getAthleteRoutes(1234);
        $this->assertArrayHasKey('response', $output);
    }

    public function testGetAthleteClubs()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('get')
            ->with($this->equalTo('/athlete/clubs'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->getAthleteClubs();
        $this->assertArrayHasKey('response', $output);
    }

    public function testGetAthleteActivities()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('get')
            ->with($this->equalTo('/athlete/activities'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->getAthleteActivities();
        $this->assertArrayHasKey('response', $output);
    }

    public function testGetAthleteFriends()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('get')
            ->with($this->equalTo('/athlete/friends'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->getAthleteFriends();
        $this->assertArrayHasKey('response', $output);
    }

    public function testGetAthleteFriendsWithId()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('get')
            ->with($this->equalTo('/athletes/1234/friends'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->getAthleteFriends(1234);
        $this->assertArrayHasKey('response', $output);
    }

    public function testGetAthleteFollowers()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('get')
            ->with($this->equalTo('/athlete/followers'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->getAthleteFollowers();
        $this->assertArrayHasKey('response', $output);
    }

    public function testGetAthleteFollowersWithId()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('get')
            ->with($this->equalTo('/athletes/1234/followers'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->getAthleteFollowers(1234);
        $this->assertArrayHasKey('response', $output);
    }

    public function testGetAthleteBothFollowing()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('get')
            ->with($this->equalTo('/athletes/1234/both-following'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->getAthleteBothFollowing(1234);
        $this->assertArrayHasKey('response', $output);
    }

    public function testGetAthleteKOM()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('get')
            ->with($this->equalTo('/athletes/1234/koms'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->getAthleteKom(1234);
        $this->assertArrayHasKey('response', $output);
    }

    public function testGetAthleteZones()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('get')
            ->with($this->equalTo('/athlete/zones'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->getAthleteZones();
        $this->assertArrayHasKey('response', $output);
    }

    public function testGetAthleteStarredSegments()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('get')
            ->with($this->equalTo('/segments/starred'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->getAthleteStarredSegments();
        $this->assertArrayHasKey('response', $output);
    }

    public function testGetAthleteStarredSegmentsWithId()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('get')
            ->with($this->equalTo('/athletes/1234/segments/starred'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->getAthleteStarredSegments(1234);
        $this->assertArrayHasKey('response', $output);
    }

    public function testUpdateAthlete()
    {
        $parameters = array(
            'city' => 'Xyz',
            'state' => 'ABC',
            'country' => 'The Netherlands',
            'sex' => 'M',
            'weight' => 83.00,
        );

        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('put')
            ->with($this->equalTo('/athlete'), $this->equalTo($parameters))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->updateAthlete('Xyz', 'ABC', 'The Netherlands', 'M', 83.00);
        $this->assertArrayHasKey('response', $output);
    }

    public function testGetActivity()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('get')
            ->with($this->equalTo('/activities/1234'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->getActivity(1234);
        $this->assertArrayHasKey('response', $output);
    }

    public function testGetActivityComments()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('get')
            ->with($this->equalTo('/activities/1234/comments'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->getActivityComments(1234);
        $this->assertArrayHasKey('response', $output);
    }

    public function testGetActivityKudos()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('get')
            ->with($this->equalTo('/activities/1234/kudos'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->getActivityKudos(1234);
        $this->assertArrayHasKey('response', $output);
    }

    public function testGetActivityPhotos()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('get')
            ->with($this->equalTo('/activities/1234/photos'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->getActivityPhotos(1234);
        $this->assertArrayHasKey('response', $output);
    }

    public function testGetActivityZones()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('get')
            ->with($this->equalTo('/activities/1234/zones'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->getActivityZones(1234);
        $this->assertArrayHasKey('response', $output);
    }

    public function testGetActivityLaps()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('get')
            ->with($this->equalTo('/activities/1234/laps'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->getActivityLaps(1234);
        $this->assertArrayHasKey('response', $output);
    }

    public function testGetActivityUploadStatus()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('get')
            ->with($this->equalTo('/uploads/1234'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->getActivityUploadStatus(1234);
        $this->assertArrayHasKey('response', $output);
    }

    public function testCreateActivity()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('post')
            ->with($this->equalTo('/activities'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->createActivity('test', 'test', '20130101', 100);
        $this->assertArrayHasKey('response', $output);
    }

    public function testUploadActivity()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('post')
            ->with($this->equalTo('/uploads'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->uploadActivity('file');
        $this->assertArrayHasKey('response', $output);
    }

    public function testUpdateActivity()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('put')
            ->with($this->equalTo('/activities/1234'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->updateActivity(1234, 'test');
        $this->assertArrayHasKey('response', $output);
    }

    public function testDeleteActivity()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('delete')
            ->with($this->equalTo('/activities/1234'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->deleteActivity(1234);
        $this->assertArrayHasKey('response', $output);
    }

    public function testGetGear()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('get')
            ->with($this->equalTo('/gear/1234'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->getGear(1234);
        $this->assertArrayHasKey('response', $output);
    }

    public function testGetClub()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('get')
            ->with($this->equalTo('/clubs/1234'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->getClub(1234);
        $this->assertArrayHasKey('response', $output);
    }

    public function testGetClubMembers()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('get')
            ->with($this->equalTo('/clubs/1234/members'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->getClubMembers(1234);
        $this->assertArrayHasKey('response', $output);
    }

    public function testGetClubActivities()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('get')
            ->with($this->equalTo('/clubs/1234/activities'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->getClubActivities(1234);
        $this->assertArrayHasKey('response', $output);
    }

    public function testGetClubAnnouncements()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('get')
            ->with($this->equalTo('/clubs/1234/announcements'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->getClubAnnouncements(1234);
        $this->assertArrayHasKey('response', $output);
    }

    public function testGetClubGroupEvents()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('get')
            ->with($this->equalTo('/clubs/1234/group_events'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->getClubGroupEvents(1234);
        $this->assertArrayHasKey('response', $output);
    }

    public function testJoinClub()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('post')
            ->with($this->equalTo('/clubs/1234/join'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->joinClub(1234);
        $this->assertArrayHasKey('response', $output);
    }

    public function testLeaveClub()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('post')
            ->with($this->equalTo('/clubs/1234/leave'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->leaveClub(1234);
        $this->assertArrayHasKey('response', $output);
    }

    public function testGetRoute()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('get')
            ->with($this->equalTo('/routes/1234'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->getRoute(1234);
        $this->assertArrayHasKey('response', $output);
    }

    public function testGetSegment()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('get')
            ->with($this->equalTo('/segments/1234'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->getSegment(1234);
        $this->assertArrayHasKey('response', $output);
    }

    public function testGetSegmentLeaderboard()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('get')
            ->with($this->equalTo('/segments/1234/leaderboard'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->getSegmentLeaderboard(1234);
        $this->assertArrayHasKey('response', $output);
    }

    public function testGetSegmentExplorer()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('get')
            ->with($this->equalTo('/segments/explore'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->getSegmentExplorer('37.821362,-122.505373,37.842038,-122.465977');
        $this->assertArrayHasKey('response', $output);
    }

    public function testGetSegmentEffort()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('get')
            ->with($this->equalTo('/segments/1234/all_efforts'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->getSegmentEffort(1234);
        $this->assertArrayHasKey('response', $output);
    }

    public function testGetStreamsActivity()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('get')
            ->with($this->equalTo('/activities/1234/streams/latlng'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->getStreamsActivity(1234, 'latlng');
        $this->assertArrayHasKey('response', $output);
    }

    public function testGetStreamsEffort()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('get')
            ->with($this->equalTo('/segment_efforts/1234/streams/latlng'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->getStreamsEffort(1234, 'latlng');
        $this->assertArrayHasKey('response', $output);
    }

    public function testGetStreamsSegment()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('get')
            ->with($this->equalTo('/segments/1234/streams/latlng'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->getStreamsSegment(1234, 'latlng');
        $this->assertArrayHasKey('response', $output);
    }

    public function testGetStreamsRoute()
    {
        $restMock = $this->getRestMock();
        $restMock->expects($this->once())->method('get')
            ->with($this->equalTo('/routes/1234/streams'))
            ->will($this->returnValue('{"response": 1}'));

        $service = new Strava\API\Service\REST('TOKEN', $restMock);
        $output = $service->getStreamsRoute(1234);
        $this->assertArrayHasKey('response', $output);
    }
}

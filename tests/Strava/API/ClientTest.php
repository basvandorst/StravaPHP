<?php

use Strava\API\Service\Exception as ServiceException;
use Tests\Support\TestCase;

/**
 * Test...
 *
 * @see Strava\API\Client
 * @author Bas van Dorst
 * @package StravaPHP
 */
class ClientTest extends TestCase
{
    /**
     * @return PHPUnit_Framework_MockObject_MockObject|\Strava\API\Service\Stub
     */
    private function getServiceMock()
    {
        $serviceMock = $this->getMockBuilder('Strava\API\Service\Stub')
            ->disableOriginalConstructor()
            ->getMock();
        return $serviceMock;
    }

    public function testGetAthlete()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthlete')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->getAthlete(1234);

        $this->assertEquals('output', $output);
    }

    public function testGetAthleteException()
    {
        $this->expectException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthlete')
            ->will($this->throwException(new ServiceException));

        $client = new Strava\API\Client($serviceMock);
        $client->getAthlete(1234);
    }

    public function testGetAthleteStats()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthleteStats')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->getAthleteStats(1234);

        $this->assertEquals('output', $output);
    }

    public function testGetAthleteRoutes()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthleteRoutes')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->getAthleteRoutes(1234);

        $this->assertEquals('output', $output);
    }

    public function testGetAthleteClubs()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthleteClubs')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->getAthleteClubs();

        $this->assertEquals('output', $output);
    }

    public function testGetAthleteClubsException()
    {
        $this->expectException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthleteClubs')
            ->will($this->throwException(new ServiceException));

        $client = new Strava\API\Client($serviceMock);
        $client->getAthleteClubs();
    }

    public function testGetAthleteActivities()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthleteActivities')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->getAthleteActivities();

        $this->assertEquals('output', $output);
    }

    public function testGetAthleteActivitiesException()
    {
        $this->expectException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthleteActivities')
            ->will($this->throwException(new ServiceException));

        $client = new Strava\API\Client($serviceMock);
        $client->getAthleteActivities();
    }

    public function testGetAthleteFriends()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthleteFriends')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->getAthleteFriends();

        $this->assertEquals('output', $output);
    }

    public function testGetAthleteFriendsException()
    {
        $this->expectException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthleteFriends')
            ->will($this->throwException(new ServiceException));

        $client = new Strava\API\Client($serviceMock);
        $client->getAthleteFriends();
    }

    public function testGetAthleteFollowers()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthleteFollowers')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->getAthleteFollowers();

        $this->assertEquals('output', $output);
    }

    public function testGetAthleteFollowersException()
    {
        $this->expectException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthleteFollowers')
            ->will($this->throwException(new ServiceException));

        $client = new Strava\API\Client($serviceMock);
        $client->getAthleteFollowers();
    }

    public function testGetAthleteBothFollowing()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthleteBothFollowing')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->getAthleteBothFollowing(1234);

        $this->assertEquals('output', $output);
    }

    public function testGetAthleteBothFollowingException()
    {
        $this->expectException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthleteBothFollowing')
            ->will($this->throwException(new ServiceException));

        $client = new Strava\API\Client($serviceMock);
        $client->getAthleteBothFollowing(1234);
    }

    public function testGetAthleteKom()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthleteKom')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->getAthleteKom(1234);

        $this->assertEquals('output', $output);
    }

    public function testGetAthleteKomException()
    {
        $this->expectException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthleteKom')
            ->will($this->throwException(new ServiceException));

        $client = new Strava\API\Client($serviceMock);
        $client->getAthleteKom(1234);
    }


    public function testGetAthleteZones()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthleteZones')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->getAthleteZones();

        $this->assertEquals('output', $output);
    }

    public function testGetAthleteZonesException()
    {
        $this->expectException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthleteZones')
            ->will($this->throwException(new ServiceException));

        $client = new Strava\API\Client($serviceMock);
        $client->getAthleteZones();
    }

    public function testGetAthleteStarredSegments()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthleteStarredSegments')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->getAthleteStarredSegments();

        $this->assertEquals('output', $output);
    }

    public function testGetAthleteStarredSegmentsException()
    {
        $this->expectException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getAthleteStarredSegments')
            ->will($this->throwException(new ServiceException));

        $client = new Strava\API\Client($serviceMock);
        $client->getAthleteStarredSegments();
    }

    public function testUpdateAthlete()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('updateAthlete')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->updateAthlete('Xyz', 'ABC', 'The Netherlands', 'M', 83.00);

        $this->assertEquals('output', $output);
    }

    public function testUpdateAthleteException()
    {
        $this->expectException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('updateAthlete')
            ->will($this->throwException(new ServiceException));

        $client = new Strava\API\Client($serviceMock);
        $client->updateAthlete('Xyz', 'ABC', 'The Netherlands', 'M', 83.00);
    }

    public function testGetActivity()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getActivity')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->getActivity(1234);

        $this->assertEquals('output', $output);
    }

    public function testGetActivityException()
    {
        $this->expectException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getActivity')
            ->will($this->throwException(new ServiceException));

        $client = new Strava\API\Client($serviceMock);
        $client->getActivity(1234);
    }

    public function testGetActivityComments()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getActivityComments')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->getActivityComments(1234);

        $this->assertEquals('output', $output);
    }

    public function testGetActivityCommentsException()
    {
        $this->expectException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getActivityComments')
            ->will($this->throwException(new ServiceException));

        $client = new Strava\API\Client($serviceMock);
        $client->getActivityComments(1234);
    }

    public function testGetActivityKudos()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getActivityKudos')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->getActivityKudos(1234);

        $this->assertEquals('output', $output);
    }

    public function testGetActivityKudosException()
    {
        $this->expectException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getActivityKudos')
            ->will($this->throwException(new ServiceException));

        $client = new Strava\API\Client($serviceMock);
        $client->getActivityKudos(1234);
    }

    public function testGetActivityPhotos()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getActivityPhotos')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->getActivityPhotos(1234);

        $this->assertEquals('output', $output);
    }

    public function testGetActivityPhotosException()
    {
        $this->expectException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getActivityPhotos')
            ->will($this->throwException(new ServiceException));

        $client = new Strava\API\Client($serviceMock);
        $client->getActivityPhotos(1234);
    }

    public function testGetActivityZones()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getActivityZones')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->getActivityZones(1234);

        $this->assertEquals('output', $output);
    }

    public function testGetActivityZonesException()
    {
        $this->expectException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getActivityZones')
            ->will($this->throwException(new ServiceException));

        $client = new Strava\API\Client($serviceMock);
        $client->getActivityZones(1234);
    }

    public function testGetActivityLaps()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getActivityLaps')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->getActivityLaps(1234);

        $this->assertEquals('output', $output);
    }

    public function testGetActivityLapsException()
    {
        $this->expectException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getActivityLaps')
            ->will($this->throwException(new ServiceException));

        $client = new Strava\API\Client($serviceMock);
        $client->getActivityLaps(1234);
    }

    public function testGetActivityUploadStatus()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getActivityUploadStatus')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->getActivityUploadStatus(1234);

        $this->assertEquals('output', $output);
    }

    public function testGetActivityUploadStatusException()
    {
        $this->expectException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getActivityUploadStatus')
            ->will($this->throwException(new ServiceException));

        $client = new Strava\API\Client($serviceMock);
        $client->getActivityUploadStatus(1234);
    }

    public function testCreateActivity()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('createActivity')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->createActivity('cycling ride', 'cycling', '20140101', 100);

        $this->assertEquals('output', $output);
    }

    public function testCreateActivityException()
    {
        $this->expectException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('createActivity')
            ->will($this->throwException(new ServiceException));

        $client = new Strava\API\Client($serviceMock);
        $client->createActivity('cycling ride', 'cycling', '20140101', 100);
    }

    public function testUploadActivity()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('uploadActivity')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->uploadActivity("abc23487fsdfds");

        $this->assertEquals('output', $output);
    }

    public function testUploadActivityException()
    {
        $this->expectException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('uploadActivity')
            ->will($this->throwException(new ServiceException));

        $client = new Strava\API\Client($serviceMock);
        $client->uploadActivity("abc23487fsdfds");
    }

    public function testUpdateActivity()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('updateActivity')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->updateActivity(123);

        $this->assertEquals('output', $output);
    }

    public function testUpdateActivityException()
    {
        $this->expectException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('updateActivity')
            ->will($this->throwException(new ServiceException));

        $client = new Strava\API\Client($serviceMock);
        $client->updateActivity(123);
    }

    public function testDeleteActivity()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('deleteActivity')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->deleteActivity(1234);

        $this->assertEquals('output', $output);
    }

    public function testDeleteActivityException()
    {
        $this->expectException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('deleteActivity')
            ->will($this->throwException(new ServiceException));

        $client = new Strava\API\Client($serviceMock);
        $client->deleteActivity(1234);
    }

    public function testGetGear()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getGear')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->getGear(1234);

        $this->assertEquals('output', $output);
    }

    public function testGetGearException()
    {
        $this->expectException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getGear')
            ->will($this->throwException(new ServiceException));

        $client = new Strava\API\Client($serviceMock);
        $client->getGear(1234);
    }

    public function testGetClub()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getClub')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->getClub(1234);

        $this->assertEquals('output', $output);
    }

    public function testGetClubException()
    {
        $this->expectException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getClub')
            ->will($this->throwException(new ServiceException));

        $client = new Strava\API\Client($serviceMock);
        $client->getClub(1234);
    }

    public function testGetClubMembers()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getClubMembers')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->getClubMembers(1234);

        $this->assertEquals('output', $output);
    }

    public function testGetClubMembersException()
    {
        $this->expectException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getClubMembers')
            ->will($this->throwException(new ServiceException));

        $client = new Strava\API\Client($serviceMock);
        $client->getClubMembers(1234);
    }

    public function testGetClubActivities()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getClubActivities')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->getClubActivities(1234);

        $this->assertEquals('output', $output);
    }

    public function testGetClubActivitiesException()
    {
        $this->expectException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getClubActivities')
            ->will($this->throwException(new ServiceException));

        $client = new Strava\API\Client($serviceMock);
        $client->getClubActivities(1234);
    }

    public function testGetClubAnnouncements()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getClubAnnouncements')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->getClubAnnouncements(1234);

        $this->assertEquals('output', $output);
    }

    public function testGetClubAnnouncementsException()
    {
        $this->expectException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getClubAnnouncements')
            ->will($this->throwException(new ServiceException));

        $client = new Strava\API\Client($serviceMock);
        $client->getClubAnnouncements(1234);
    }

    public function testGetClubGroupEvents()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getClubGroupEvents')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->getClubGroupEvents(1234);

        $this->assertEquals('output', $output);
    }

    public function testGetClubGroupEventsException()
    {
        $this->expectException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getClubGroupEvents')
            ->will($this->throwException(new ServiceException));

        $client = new Strava\API\Client($serviceMock);
        $client->getClubGroupEvents(1234);
    }

    public function testJoinClub()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('joinClub')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->joinClub(1234);

        $this->assertEquals('output', $output);
    }

    public function testJoinClubException()
    {
        $this->expectException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('joinClub')
            ->will($this->throwException(new ServiceException));

        $client = new Strava\API\Client($serviceMock);
        $client->joinClub(1234);
    }

    public function testLeaveClub()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('leaveClub')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->leaveClub(1234);

        $this->assertEquals('output', $output);
    }

    public function testLeaveClubException()
    {
        $this->expectException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('leaveClub')
            ->will($this->throwException(new ServiceException));

        $client = new Strava\API\Client($serviceMock);
        $client->leaveClub(1234);
    }

    public function testGetRoute()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getRoute')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->getRoute(1234);

        $this->assertEquals('output', $output);
    }

    public function testGetRouteException()
    {
        $this->expectException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getRoute')
            ->will($this->throwException(new ServiceException));

        $client = new Strava\API\Client($serviceMock);
        $client->getRoute(1234);
    }

    public function testGetSegment()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getSegment')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->getSegment(1234);

        $this->assertEquals('output', $output);
    }

    public function testGetSegmentException()
    {
        $this->expectException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getSegment')
            ->will($this->throwException(new ServiceException));

        $client = new Strava\API\Client($serviceMock);
        $client->getSegment(1234);
    }

    public function testGetSegmentLeaderboard()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getSegmentLeaderboard')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->getSegmentLeaderboard(1234);

        $this->assertEquals('output', $output);
    }

    public function testGetSegmentLeaderboardException()
    {
        $this->expectException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getSegmentLeaderboard')
            ->will($this->throwException(new ServiceException));

        $client = new Strava\API\Client($serviceMock);
        $client->getSegmentLeaderboard(1234);
    }

    public function testGetSegmentExplorer()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getSegmentExplorer')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->getSegmentExplorer("lng.lat");

        $this->assertEquals('output', $output);
    }

    public function testGetSegmentExplorerException()
    {
        $this->expectException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getSegmentExplorer')
            ->will($this->throwException(new ServiceException));

        $client = new Strava\API\Client($serviceMock);
        $client->getSegmentExplorer("lng.lat");
    }

    public function testGetSegmentEffort()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getSegmentEffort')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->getSegmentEffort(1234);

        $this->assertEquals('output', $output);
    }

    public function testGetSegmentEffortException()
    {
        $this->expectException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getSegmentEffort')
            ->will($this->throwException(new ServiceException));

        $client = new Strava\API\Client($serviceMock);
        $client->getSegmentEffort(1234);
    }

    public function testGetStreamsActivity()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getStreamsActivity')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->getStreamsActivity(1234, 'abc');

        $this->assertEquals('output', $output);
    }

    public function testGetStreamsActivityException()
    {
        $this->expectException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getStreamsActivity')
            ->will($this->throwException(new ServiceException));

        $client = new Strava\API\Client($serviceMock);
        $client->getStreamsActivity(1234, 'abc');
    }

    public function testGetStreamsEffort()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getStreamsEffort')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->getStreamsEffort(1234, 'abc');

        $this->assertEquals('output', $output);
    }

    public function testGetStreamsEffortException()
    {
        $this->expectException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getStreamsEffort')
            ->will($this->throwException(new ServiceException));

        $client = new Strava\API\Client($serviceMock);
        $client->getStreamsEffort(1234, 'abc');
    }

    public function testGetStreamsSegment()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getStreamsSegment')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->getStreamsSegment(1234, 'abc');

        $this->assertEquals('output', $output);
    }

    public function testGetStreamsSegmentException()
    {
        $this->expectException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getStreamsSegment')
            ->will($this->throwException(new ServiceException));

        $client = new Strava\API\Client($serviceMock);
        $client->getStreamsSegment(1234, 'abc');
    }

    public function testGetStreamsRoute()
    {
        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getStreamsRoute')
            ->will($this->returnValue('output'));

        $client = new Strava\API\Client($serviceMock);
        $output = $client->getStreamsRoute(1234);

        $this->assertEquals('output', $output);
    }

    public function testGetStreamsRouteException()
    {
        $this->expectException('Strava\API\Exception');

        $serviceMock = $this->getServiceMock();
        $serviceMock->expects($this->once())->method('getStreamsRoute')
            ->will($this->throwException(new ServiceException));

        $client = new Strava\API\Client($serviceMock);
        $client->getStreamsRoute(1234);
    }

}

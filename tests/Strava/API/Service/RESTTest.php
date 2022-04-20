<?php

namespace Strava\API\Service {

    use GuzzleHttp\Psr7\Response;
    use Tests\Support\TestCase;

    function curl_file_create()
    {
        return 'toto';
    }


    /**
     * Test...
     *
     * @see Strava\API\Service\REST
     * @author Bas van Dorst
     * @package StravaPHP
     */
    class RESTTest extends TestCase
    {
        const TOKEN = 'TOKEN';

        /**
         * @return \PHPUnit_Framework_MockObject_MockObject|\GuzzleHttp\Client
         */
        private function getRestMock()
        {
            $restMock = $this->getMockBuilder('\GuzzleHttp\Client')
                ->disableOriginalConstructor()
                ->setMethods(['request'])
                ->getMock();
            return $restMock;
        }

        public function testGetAthlete()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('GET'), $this->equalTo('athlete'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->getAthlete();
            $outputWithVerbosity = $serviceWithVerbosity->getAthlete();

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testGetAthleteWithId()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('GET'), $this->equalTo('athletes/1234'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->getAthlete(1234);
            $outputWithVerbosity = $serviceWithVerbosity->getAthlete(1234);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);

            $this->assertArrayHasKey('response', $output);
        }

        public function testGetStats()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('GET'), $this->equalTo('athletes/1234/stats'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->getAthleteStats(1234);
            $outputWithVerbosity = $serviceWithVerbosity->getAthleteStats(1234);

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testGetRoutes()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('GET'), $this->equalTo('athletes/1234/routes'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->getAthleteRoutes(1234);
            $outputWithVerbosity = $serviceWithVerbosity->getAthleteRoutes(1234);

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testGetAthleteClubs()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('GET'), $this->equalTo('athlete/clubs'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->getAthleteClubs();
            $outputWithVerbosity = $serviceWithVerbosity->getAthleteClubs();

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testGetAthleteActivities()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('GET'), $this->equalTo('athlete/activities'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->getAthleteActivities();
            $outputWithVerbosity = $serviceWithVerbosity->getAthleteActivities();

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testGetAthleteFriends()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('GET'), $this->equalTo('athlete/friends'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->getAthleteFriends();
            $outputWithVerbosity = $serviceWithVerbosity->getAthleteFriends();

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testGetAthleteFriendsWithId()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('GET'), $this->equalTo('athletes/1234/friends'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->getAthleteFriends(1234);
            $outputWithVerbosity = $serviceWithVerbosity->getAthleteFriends(1234);

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testGetAthleteFollowers()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('GET'), $this->equalTo('athlete/followers'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->getAthleteFollowers();
            $outputWithVerbosity = $serviceWithVerbosity->getAthleteFollowers();

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testGetAthleteFollowersWithId()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('GET'), $this->equalTo('athletes/1234/followers'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->getAthleteFollowers(1234);
            $outputWithVerbosity = $serviceWithVerbosity->getAthleteFollowers(1234);

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testGetAthleteBothFollowing()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('GET'), $this->equalTo('athletes/1234/both-following'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->getAthleteBothFollowing(1234);
            $outputWithVerbosity = $serviceWithVerbosity->getAthleteBothFollowing(1234);

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testGetAthleteKOM()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('GET'), $this->equalTo('athletes/1234/koms'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->getAthleteKom(1234);
            $outputWithVerbosity = $serviceWithVerbosity->getAthleteKom(1234);

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testGetAthleteZones()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('GET'), $this->equalTo('athlete/zones'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->getAthleteZones();
            $outputWithVerbosity = $serviceWithVerbosity->getAthleteZones();

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testGetAthleteStarredSegments()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('GET'), $this->equalTo('segments/starred'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->getAthleteStarredSegments();
            $outputWithVerbosity = $serviceWithVerbosity->getAthleteStarredSegments();

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testGetAthleteStarredSegmentsWithId()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('GET'), $this->equalTo('athletes/1234/segments/starred'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->getAthleteStarredSegments(1234);
            $outputWithVerbosity = $serviceWithVerbosity->getAthleteStarredSegments(1234);

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testUpdateAthlete()
        {
            $parameters = array(
                'query' => [
                    'city' => 'Xyz',
                    'state' => 'ABC',
                    'country' => 'The Netherlands',
                    'sex' => 'M',
                    'weight' => 83.00,
                    'access_token' => static::TOKEN
                ]
            );

            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('PUT'), $this->equalTo('athlete'), $this->equalTo($parameters))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->updateAthlete('Xyz', 'ABC', 'The Netherlands', 'M', 83.00);
$outputWithVerbosity = $serviceWithVerbosity->updateAthlete('Xyz', 'ABC', 'The Netherlands', 'M', 83.00);




          $this->assertArrayHasKey('body', $outputWithVerbosity);
          $this->assertArrayHasKey('headers', $outputWithVerbosity);
          $this->assertArrayHasKey('status', $outputWithVerbosity);
          $this->assertArrayHasKey('success', $outputWithVerbosity);$this->assertArrayHasKey('response', $output);
        }

        public function testGetActivity()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('GET'), $this->equalTo('activities/1234'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->getActivity(1234);
            $outputWithVerbosity = $serviceWithVerbosity->getActivity(1234);

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testGetActivityComments()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('GET'), $this->equalTo('activities/1234/comments'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->getActivityComments(1234);
            $outputWithVerbosity = $serviceWithVerbosity->getActivityComments(1234);

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testGetActivityKudos()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('GET'), $this->equalTo('activities/1234/kudos'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->getActivityKudos(1234);
            $outputWithVerbosity = $serviceWithVerbosity->getActivityKudos(1234);

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testGetActivityPhotos()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('GET'), $this->equalTo('activities/1234/photos'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->getActivityPhotos(1234);
            $outputWithVerbosity = $serviceWithVerbosity->getActivityPhotos(1234);

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testGetActivityZones()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('GET'), $this->equalTo('activities/1234/zones'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->getActivityZones(1234);
            $outputWithVerbosity = $serviceWithVerbosity->getActivityZones(1234);

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testGetActivityLaps()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('GET'), $this->equalTo('activities/1234/laps'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->getActivityLaps(1234);
            $outputWithVerbosity = $serviceWithVerbosity->getActivityLaps(1234);

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testGetActivityUploadStatus()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('GET'), $this->equalTo('uploads/1234'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->getActivityUploadStatus(1234);
            $outputWithVerbosity = $serviceWithVerbosity->getActivityUploadStatus(1234);

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testCreateActivity()
        {
            $parameters['query'] = [
                'name' => 'test',
                'type' => 'test',
                'start_date_local' => '20130101',
                'elapsed_time' => 100,
                'description' => null,
                'distance' => null,
                'private' => null,
                'trainer' => null,
                'access_token' => static::TOKEN,
            ];
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('POST'), $this->equalTo('activities'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->createActivity('test', 'test', '20130101', 100);
            $outputWithVerbosity = $serviceWithVerbosity->createActivity('test', 'test', '20130101', 100);

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testUploadActivity()
        {
            $parameters['query'] = [
                'activity_type' => null,
                'name' => null,
                'description' => null,
                'private' => null,
                'trainer' => null,
                'commute' => null,
                'data_type' => null,
                'external_id' => null,
                'file' => curl_file_create('file'),
                'file_hack' => '@' . ltrim('file', '@'),
                'access_token' => static::TOKEN,
            ];

            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('POST'), $this->equalTo('uploads'), $parameters)
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->uploadActivity('file');
            $outputWithVerbosity = $serviceWithVerbosity->uploadActivity('file');

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testUpdateActivity()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('PUT'), $this->equalTo('activities/1234'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->updateActivity(1234, 'test');
            $outputWithVerbosity = $serviceWithVerbosity->updateActivity(1234, 'test');

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testDeleteActivity()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('DELETE'), $this->equalTo('activities/1234'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->deleteActivity(1234);
            $outputWithVerbosity = $serviceWithVerbosity->deleteActivity(1234);

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testGetGear()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('GET'), $this->equalTo('gear/1234'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->getGear(1234);
            $outputWithVerbosity = $serviceWithVerbosity->getGear(1234);

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testGetClub()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('GET'), $this->equalTo('clubs/1234'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->getClub(1234);
            $outputWithVerbosity = $serviceWithVerbosity->getClub(1234);

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testGetClubMembers()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('GET'), $this->equalTo('clubs/1234/members'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->getClubMembers(1234);
            $outputWithVerbosity = $serviceWithVerbosity->getClubMembers(1234);

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testGetClubActivities()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('GET'), $this->equalTo('clubs/1234/activities'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->getClubActivities(1234);
            $outputWithVerbosity = $serviceWithVerbosity->getClubActivities(1234);

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testGetClubAnnouncements()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('GET'), $this->equalTo('clubs/1234/announcements'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->getClubAnnouncements(1234);
            $outputWithVerbosity = $serviceWithVerbosity->getClubAnnouncements(1234);

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testGetClubGroupEvents()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('GET'), $this->equalTo('clubs/1234/group_events'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->getClubGroupEvents(1234);
            $outputWithVerbosity = $serviceWithVerbosity->getClubGroupEvents(1234);

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testJoinClub()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('POST'), $this->equalTo('clubs/1234/join'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->joinClub(1234);
            $outputWithVerbosity = $serviceWithVerbosity->joinClub(1234);

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testLeaveClub()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('POST'), $this->equalTo('clubs/1234/leave'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->leaveClub(1234);
            $outputWithVerbosity = $serviceWithVerbosity->leaveClub(1234);

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testGetRoute()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('GET'), $this->equalTo('routes/1234'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->getRoute(1234);
            $outputWithVerbosity = $serviceWithVerbosity->getRoute(1234);

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        /**
         * Disabled until the string workaround for these methods can be fixed.
         *
        public function testGetRouteAsGPX()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->once())->method('request')
                ->with($this->equalTo('GET'), $this->equalTo('routes/1234/export_gpx'))
                ->will($this->returnValue('<?xml version="1.0" encoding="UTF-8"?><gpx creator="StravaGPX"/>'));

            $service = new \Strava\API\Service\REST('TOKEN', $restMock);
            $output = $service->getRouteAsGPX(1234);
            $this->assertIsString($output);
        }

        public function testGetRouteAsTCX()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->once())->method('request')
                ->with($this->equalTo('GET'), $this->equalTo('routes/1234/export_tcx'))
                ->will($this->returnValue(new Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><TrainingCenterDatabase/>')));

            $service = new \Strava\API\Service\REST('TOKEN', $restMock);
            $output = $service->getRouteAsTCX(1234);
            $this->assertIsString($output);
        }
         *
         */

        public function testGetSegment()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('GET'), $this->equalTo('segments/1234'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->getSegment(1234);
            $outputWithVerbosity = $serviceWithVerbosity->getSegment(1234);

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testGetSegmentLeaderboard()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('GET'), $this->equalTo('segments/1234/leaderboard'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->getSegmentLeaderboard(1234);
            $outputWithVerbosity = $serviceWithVerbosity->getSegmentLeaderboard(1234);

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testGetSegmentExplorer()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('GET'), $this->equalTo('segments/explore'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->getSegmentExplorer('37.821362,-122.505373,37.842038,-122.465977');
            $outputWithVerbosity = $serviceWithVerbosity->getSegmentExplorer('37.821362,-122.505373,37.842038,-122.465977');

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testGetSegmentEffort()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('GET'), $this->equalTo('segments/1234/all_efforts'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->getSegmentEffort(1234);
            $outputWithVerbosity = $serviceWithVerbosity->getSegmentEffort(1234);

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testGetStreamsActivity()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('GET'), $this->equalTo('activities/1234/streams/latlng'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->getStreamsActivity(1234, 'latlng');
            $outputWithVerbosity = $serviceWithVerbosity->getStreamsActivity(1234, 'latlng');

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testGetStreamsEffort()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('GET'), $this->equalTo('segment_efforts/1234/streams/latlng'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->getStreamsEffort(1234, 'latlng');
            $outputWithVerbosity = $serviceWithVerbosity->getStreamsEffort(1234, 'latlng');

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testGetStreamsSegment()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('GET'), $this->equalTo('segments/1234/streams/latlng'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->getStreamsSegment(1234, 'latlng');
            $outputWithVerbosity = $serviceWithVerbosity->getStreamsSegment(1234, 'latlng');

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }

        public function testGetStreamsRoute()
        {
            $restMock = $this->getRestMock();
            $restMock->expects($this->exactly(2))->method('request')
                ->with($this->equalTo('GET'), $this->equalTo('routes/1234/streams'))
                ->will($this->returnValue(new Response(200, [], '{"response": 1}')));

            $service = new \Strava\API\Service\REST(static::TOKEN, $restMock);
            $serviceWithVerbosity = new \Strava\API\Service\REST(static::TOKEN, $restMock, 1);

            $output = $service->getStreamsRoute(1234);
            $outputWithVerbosity = $serviceWithVerbosity->getStreamsRoute(1234);

            $this->assertArrayHasKey('response', $output);

            $this->assertArrayHasKey('body', $outputWithVerbosity);
            $this->assertArrayHasKey('headers', $outputWithVerbosity);
            $this->assertArrayHasKey('status', $outputWithVerbosity);
            $this->assertArrayHasKey('success', $outputWithVerbosity);
        }
    }
}
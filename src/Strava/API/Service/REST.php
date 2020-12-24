<?php

namespace Strava\API\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

/**
 * Strava REST Service
 *
 * @author Bas van Dorst
 * @package StravaPHP
 */
class REST implements ServiceInterface
{
    /**
     * REST adapter
     * @var Client
     */
    protected $adapter;

    /**
     * Application token
     * @var string
     */
    protected $token;

    /**
     * Specifies the verbosity of the HTTP response
     * 0 = basic, just body
     * 1 = enhanced, [body, headers, status]
     * @var int
     */
    protected $responseVerbosity;

    /**
     * Initiate this REST service with the application token, a instance
     * of the REST adapter (Guzzle) and a level of verbosity for the response.
     *
     * @param string $token
     * @param Client $adapter
     * @param int $responseVerbosity
     */
    public function __construct($token, Client $adapter, $responseVerbosity = 0)
    {
        if (is_object($token) && method_exists($token, 'getToken')) {
            $token = $token->getToken();
        }
        $this->token = $token;
        $this->adapter = $adapter;
        $this->responseVerbosity = $responseVerbosity;
    }

    protected function getToken()
    {
        return $this->token;
    }

    /**
     * Get a request result.
     * Returns an array with a response body or and error code => reason.
     * @param Response $response
     * @return array|mixed
     */
    protected function getResult($response)
    {
        $status = $response->getStatusCode();

        $expandedResponse = [];

        $expandedResponse['headers'] = $response->getHeaders();
        $expandedResponse['body'] = json_decode($response->getBody(), JSON_PRETTY_PRINT);
        $expandedResponse['success'] = $status == 200 || $status == 201;
        $expandedResponse['status'] = $status;

        return $expandedResponse;
    }

    /**
     * Get an API request response and handle possible exceptions.
     *
     * @param string $method
     * @param string $path
     * @param array $parameters
     *
     * @return array|mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function getResponse($method, $path, $parameters)
    {
        try {
            $response = $this->adapter->request($method, $path, $parameters);
            return $this->getResult($response);
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getAthlete($id = null)
    {
        $path = 'athlete';
        if (isset($id) && $id !== null) {
            $path = 'athletes/' . $id;
        }
        $parameters['query'] = ['access_token' => $this->getToken()];

        $response = $this->getResponse('GET', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response["body"];

        return $response;
    }

    public function getAthleteStats($id)
    {
        $path = 'athletes/' . $id . '/stats';
        $parameters['query'] = ['access_token' => $this->getToken()];
        $response = $this->getResponse('GET', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function getAthleteRoutes($id, $type = null, $after = null, $page = null, $per_page = null)
    {
        $path = 'athletes/' . $id . '/routes';
        $parameters['query'] = [
            'type' => $type,
            'after' => $after,
            'page' => $page,
            'per_page' => $per_page,
            'access_token' => $this->getToken(),
        ];
        $response = $this->getResponse('GET', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function getAthleteClubs()
    {
        $path = 'athlete/clubs';
        $parameters['query'] = ['access_token' => $this->getToken()];
        $response = $this->getResponse('GET', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function getAthleteActivities($before = null, $after = null, $page = null, $per_page = null)
    {
        $path = 'athlete/activities';
        $parameters['query'] = [
            'before' => $before,
            'after' => $after,
            'page' => $page,
            'per_page' => $per_page,
            'access_token' => $this->getToken(),
        ];
        $response = $this->getResponse('GET', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function getAthleteFriends($id = null, $page = null, $per_page = null)
    {
        $path = 'athlete/friends';
        if (isset($id) && $id !== null) {
            $path = 'athletes/' . $id . '/friends';
        }
        $parameters['query'] = [
            'page' => $page,
            'per_page' => $per_page,
            'access_token' => $this->getToken(),
        ];
        $response = $this->getResponse('GET', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function getAthleteFollowers($id = null, $page = null, $per_page = null)
    {
        $path = 'athlete/followers';
        if (isset($id) && $id !== null) {
            $path = 'athletes/' . $id . '/followers';
        }
        $parameters['query'] = [
            'page' => $page,
            'per_page' => $per_page,
            'access_token' => $this->getToken(),
        ];
        $response = $this->getResponse('GET', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function getAthleteBothFollowing($id, $page = null, $per_page = null)
    {
        $path = 'athletes/' . $id . '/both-following';
        $parameters['query'] = [
            'page' => $page,
            'per_page' => $per_page,
            'access_token' => $this->getToken(),
        ];
        $response = $this->getResponse('GET', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function getAthleteKom($id, $page = null, $per_page = null)
    {
        $path = 'athletes/' . $id . '/koms';
        $parameters['query'] = [
            'page' => $page,
            'per_page' => $per_page,
            'access_token' => $this->getToken(),
        ];
        $response = $this->getResponse('GET', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function getAthleteZones()
    {
        $path = 'athlete/zones';
        $parameters['query'] = ['access_token' => $this->getToken()];
        $response = $this->getResponse('GET', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function getAthleteStarredSegments($id = null, $page = null, $per_page = null)
    {
        $path = 'segments/starred';
        if (isset($id) && $id !== null) {
            $path = 'athletes/' . $id . '/segments/starred';
            // ...wrong in Strava documentation
        }
        $parameters['query'] = [
            'page' => $page,
            'per_page' => $per_page,
            'access_token' => $this->getToken(),
        ];
        $response = $this->getResponse('GET', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function updateAthlete($city, $state, $country, $sex, $weight)
    {
        $path = 'athlete';
        $parameters['query'] = [
            'city' => $city,
            'state' => $state,
            'country' => $country,
            'sex' => $sex,
            'weight' => $weight,
            'access_token' => $this->getToken(),
        ];
        $response = $this->getResponse('PUT', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function getActivity($id, $include_all_efforts = null)
    {
        $path = 'activities/' . $id;
        $parameters['query'] = [
            'include_all_efforts' => $include_all_efforts,
            'access_token' => $this->getToken(),
        ];
        $response = $this->getResponse('GET', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function getActivityComments($id, $markdown = null, $page = null, $per_page = null)
    {
        $path = 'activities/' . $id . '/comments';
        $parameters['query'] = [
            'markdown' => $markdown,
            'page' => $page,
            'per_page' => $per_page,
            'access_token' => $this->getToken(),
        ];
        $response = $this->getResponse('GET', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function getActivityKudos($id, $page = null, $per_page = null)
    {
        $path = 'activities/' . $id . '/kudos';
        $parameters['query'] = [
            'page' => $page,
            'per_page' => $per_page,
            'access_token' => $this->getToken(),
        ];
        $response = $this->getResponse('GET', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function getActivityPhotos($id, $size = 2048, $photo_sources = 'true')
    {
        $path = 'activities/' . $id . '/photos';
        $parameters['query'] = [
            'size' => $size,
            'photo_sources' => $photo_sources,
            'access_token' => $this->getToken(),
        ];
        $response = $this->getResponse('GET', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function getActivityZones($id)
    {
        $path = 'activities/' . $id . '/zones';
        $parameters['query'] = ['access_token' => $this->getToken()];
        $response = $this->getResponse('GET', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function getActivityLaps($id)
    {
        $path = 'activities/' . $id . '/laps';
        $parameters['query'] = ['access_token' => $this->getToken()];
        $response = $this->getResponse('GET', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function getActivityUploadStatus($id)
    {
        $path = 'uploads/' . $id;
        $parameters['query'] = ['access_token' => $this->getToken()];
        $response = $this->getResponse('GET', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function createActivity($name, $type, $start_date_local, $elapsed_time, $description = null, $distance = null, $private = null, $trainer = null)
    {
        $path = 'activities';
        $parameters['query'] = [
            'name' => $name,
            'type' => $type,
            'start_date_local' => $start_date_local,
            'elapsed_time' => $elapsed_time,
            'description' => $description,
            'distance' => $distance,
            'private' => $private,
            'trainer' => $trainer,
            'access_token' => $this->getToken(),
        ];
        $response = $this->getResponse('POST', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function uploadActivity($file, $activity_type = null, $name = null, $description = null, $private = null, $trainer = null, $commute = null, $data_type = null, $external_id = null)
    {
        $path = 'uploads';
        $parameters['query'] = [
            'activity_type' => $activity_type,
            'name' => $name,
            'description' => $description,
            'private' => $private,
            'trainer' => $trainer,
            'commute' => $commute,
            'data_type' => $data_type,
            'external_id' => $external_id,
            'file' => curl_file_create($file),
            'file_hack' => '@' . ltrim($file, '@'),
            'access_token' => $this->getToken(),
        ];
        $response = $this->getResponse('POST', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function updateActivity($id, $name = null, $type = null, $private = false, $commute = false, $trainer = false, $gear_id = null, $description = null)
    {
        $path = 'activities/' . $id;
        $parameters['query'] = [
            'name' => $name,
            'type' => $type,
            'private' => $private,
            'commute' => $commute,
            'trainer' => $trainer,
            'gear_id' => $gear_id,
            'description' => $description,
            'access_token' => $this->getToken(),
        ];
        $response = $this->getResponse('PUT', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function deleteActivity($id)
    {
        $path = 'activities/' . $id;
        $parameters['query'] = ['access_token' => $this->getToken()];
        $response = $this->getResponse('DELETE', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function getGear($id)
    {
        $path = 'gear/' . $id;
        $parameters['query'] = ['access_token' => $this->getToken()];
        $response = $this->getResponse('GET', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function getClub($id)
    {
        $path = 'clubs/' . $id;
        $parameters['query'] = ['access_token' => $this->getToken()];
        $response = $this->getResponse('GET', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function getClubMembers($id, $page = null, $per_page = null)
    {
        $path = 'clubs/' . $id . '/members';
        $parameters['query'] = [
            'page' => $page,
            'per_page' => $per_page,
            'access_token' => $this->getToken(),
        ];
        $response = $this->getResponse('GET', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function getClubActivities($id, $page = null, $per_page = null)
    {
        $path = 'clubs/' . $id . '/activities';
        $parameters['query'] = [
            'page' => $page,
            'per_page' => $per_page,
            'access_token' => $this->getToken(),
        ];
        $response = $this->getResponse('GET', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function getClubAnnouncements($id)
    {
        $path = 'clubs/' . $id . '/announcements';
        $parameters['query'] = ['access_token' => $this->getToken()];
        $response = $this->getResponse('GET', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function getClubGroupEvents($id)
    {
        $path = 'clubs/' . $id . '/group_events';
        $parameters['query'] = ['access_token' => $this->getToken()];
        $response = $this->getResponse('GET', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function joinClub($id)
    {
        $path = 'clubs/' . $id . '/join';
        $parameters['query'] = ['access_token' => $this->getToken()];
        $response = $this->getResponse('POST', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function leaveClub($id)
    {
        $path = 'clubs/' . $id . '/leave';
        $parameters['query'] = ['access_token' => $this->getToken()];
        $response = $this->getResponse('POST', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function getRoute($id)
    {
        $path = 'routes/' . $id;
        $parameters['query'] = ['access_token' => $this->getToken()];
        $response = $this->getResponse('GET', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function getRouteAsGPX($id)
    {
        $path = 'routes/' . $id . '/export_gpx';
        $parameters['query'] = ['access_token' => $this->getToken()];
        $response = $this->getResponse('GET', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function getRouteAsTCX($id)
    {
        $path = 'routes/' . $id . '/export_tcx';
        $parameters['query'] = ['access_token' => $this->getToken()];
        $response = $this->getResponse('GET', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function getSegment($id)
    {
        $path = 'segments/' . $id;
        $parameters['query'] = ['access_token' => $this->getToken()];
        $response = $this->getResponse('GET', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function getSegmentLeaderboard($id, $gender = null, $age_group = null, $weight_class = null, $following = null, $club_id = null, $date_range = null, $context_entries = null, $page = null, $per_page = null)
    {
        $path = 'segments/' . $id . '/leaderboard';
        $parameters['query'] = [
            'gender' => $gender,
            'age_group' => $age_group,
            'weight_class' => $weight_class,
            'following' => $following,
            'club_id' => $club_id,
            'date_range' => $date_range,
            'context_entries' => $context_entries,
            'page' => $page,
            'per_page' => $per_page,
            'access_token' => $this->getToken(),
        ];
        $response = $this->getResponse('GET', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function getSegmentExplorer($bounds, $activity_type = 'riding', $min_cat = null, $max_cat = null)
    {
        $path = 'segments/explore';
        $parameters['query'] = [
            'bounds' => $bounds,
            'activity_type' => $activity_type,
            'min_cat' => $min_cat,
            'max_cat' => $max_cat,
            'access_token' => $this->getToken(),
        ];
        $response = $this->getResponse('GET', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function getSegmentEffort($id, $athlete_id = null, $start_date_local = null, $end_date_local = null, $page = null, $per_page = null)
    {
        $path = 'segments/' . $id . '/all_efforts';
        $parameters['query'] = [
            'athlete_id' => $athlete_id,
            'start_date_local' => $start_date_local,
            'end_date_local' => $end_date_local,
            'page' => $page,
            'per_page' => $per_page,
            'access_token' => $this->getToken(),
        ];
        $response = $this->getResponse('GET', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function getStreamsActivity($id, $types, $resolution = null, $series_type = 'distance')
    {
        $path = 'activities/' . $id . '/streams/' . $types;
        $parameters['query'] = [
            'resolution' => $resolution,
            'series_type' => $series_type,
            'access_token' => $this->getToken(),
        ];
        $response = $this->getResponse('GET', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function getStreamsEffort($id, $types, $resolution = null, $series_type = 'distance')
    {
        $path = 'segment_efforts/' . $id . '/streams/' . $types;
        $parameters['query'] = [
            'resolution' => $resolution,
            'series_type' => $series_type,
            'access_token' => $this->getToken(),
        ];
        $response = $this->getResponse('GET', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function getStreamsSegment($id, $types, $resolution = null, $series_type = 'distance')
    {
        $path = 'segments/' . $id . '/streams/' . $types;
        $parameters['query'] = [
            'resolution' => $resolution,
            'series_type' => $series_type,
            'access_token' => $this->getToken(),
        ];
        $response = $this->getResponse('GET', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

    public function getStreamsRoute($id)
    {
        $path = 'routes/' . $id . '/streams';
        $parameters['query'] = ['access_token' => $this->getToken()];
        $response = $this->getResponse('GET', $path, $parameters);

        if ($this->responseVerbosity == 0)
            return $response['body'];
        return $response;
    }

}

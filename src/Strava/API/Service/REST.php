<?php

namespace Strava\API\Service;

use \GuzzleHttp\Client;

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
    private $token = null;

    /**
     * Initiate this REST service with the application token and a instance
     * of the REST adapter (Guzzle).
     *
     * @param string $token
     * @param Client $adapter
     */
    public function __construct($token, Client $adapter)
    {
        $this->token = $token;
        $this->adapter = $adapter;
    }

    private function getToken()
    {
        return $this->token;
    }

    /**
     * Get a request result.
     * Returns an array with a response body or and error code => reason.
     * @param $response
     * @return array|mixed
     */
    public function getResult($response)
    {
        $status = $response->getStatusCode;
        if ($status == 200) {
            return json_decode($response->getBody());
        } else {
            return [$status => $response->getReasonPhrase()];
        }
    }

    public function getAthlete($id = null)
    {
        $path = '/athlete';
        if (isset($id) && $id !== null) {
            $path = '/athletes/' . $id;
        }
        $parameters = ['access_token' => $this->getToken()];
        $response = $this->adapter->request('GET', $path, $parameters);
        return $this->getResult($response);
    }

    public function getAthleteStats($id)
    {
        $path = '/athletes/' . $id . '/stats';
        $parameters = ['access_token' => $this->getToken()];
        $response = $this->adapter->request('GET', $path, $parameters);
        return $this->getResult($response);
    }

    public function getAthleteRoutes($id, $type = null, $after = null, $page = null, $per_page = null)
    {
        $path = '/athletes/' . $id . '/routes';
        $parameters = [
            'type' => $type,
            'after' => $after,
            'page' => $page,
            'per_page' => $per_page,
            'access_token' => $this->getToken(),
        ];
        $response = $this->adapter->request('GET', $path, $parameters);
        return $this->getResult($response);
    }

    public function getAthleteClubs()
    {
        $path = '/athlete/clubs';
        $parameters = ['access_token' => $this->getToken()];
        $response = $this->adapter->request('GET', $path, $parameters);
        return $this->getResult($response);
    }

    public function getAthleteActivities($before = null, $after = null, $page = null, $per_page = null)
    {
        $path = '/athlete/activities';
        $parameters = [
            'before' => $before,
            'after' => $after,
            'page' => $page,
            'per_page' => $per_page,
            'access_token' => $this->getToken(),
        ];
        $response = $this->adapter->request('GET', $path, $parameters);
        return $this->getResult($response);
    }

    public function getAthleteFriends($id = null, $page = null, $per_page = null)
    {
        $path = '/athlete/friends';
        if (isset($id) && $id !== null) {
            $path = '/athletes/' . $id . '/friends';
        }
        $parameters = [
            'page' => $page,
            'per_page' => $per_page,
            'access_token' => $this->getToken(),
        ];
        $response = $this->adapter->request('GET', $path, $parameters);
        return $this->getResult($response);
    }

    public function getAthleteFollowers($id = null, $page = null, $per_page = null)
    {
        $path = '/athlete/followers';
        if (isset($id) && $id !== null) {
            $path = '/athletes/' . $id . '/followers';
        }
        $parameters = [
            'page' => $page,
            'per_page' => $per_page,
            'access_token' => $this->getToken(),
        ];
        $response = $this->adapter->request('GET', $path, $parameters);
        return $this->getResult($response);
    }

    public function getAthleteBothFollowing($id, $page = null, $per_page = null)
    {
        $path = '/athletes/' . $id . '/both-following';
        $parameters = [
            'page' => $page,
            'per_page' => $per_page,
            'access_token' => $this->getToken(),
        ];
        $response = $this->adapter->request('GET', $path, $parameters);
        return $this->getResult($response);
    }

    public function getAthleteKom($id, $page = null, $per_page = null)
    {
        $path = '/athletes/' . $id . '/koms';
        $parameters = [
            'page' => $page,
            'per_page' => $per_page,
            'access_token' => $this->getToken(),
        ];
        $response = $this->adapter->request('GET', $path, $parameters);
        return $this->getResult($response);
    }

    public function getAthleteZones()
    {
        $path = '/athlete/zones';
        $parameters = ['access_token' => $this->getToken()];
        $response = $this->adapter->request('GET', $path, $parameters);
        return $this->getResult($response);
    }

    public function getAthleteStarredSegments($id = null, $page = null, $per_page = null)
    {
        $path = '/segments/starred';
        if (isset($id) && $id !== null) {
            $path = '/athletes/' . $id . '/segments/starred';
            // ...wrong in Strava documentation
        }
        $parameters = [
            'page' => $page,
            'per_page' => $per_page,
            'access_token' => $this->getToken(),
        ];
        $response = $this->adapter->request('GET', $path, $parameters);
        return $this->getResult($response);
    }

    public function updateAthlete($city, $state, $country, $sex, $weight)
    {
        $path = '/athlete';
        $parameters = [
            'city' => $city,
            'state' => $state,
            'country' => $country,
            'sex' => $sex,
            'weight' => $weight,
            'access_token' => $this->getToken(),
        ];
        $response = $this->adapter->request('PUT', $path, $parameters);
        return $this->getResult($response);
    }

    public function getActivityFollowing($before = null, $page = null, $per_page = null)
    {
        $path = '/activities/following';
        $parameters = [
            'before' => $before,
            'page' => $page,
            'per_page' => $per_page,
            'access_token' => $this->getToken(),
        ];
        $response = $this->adapter->request('GET', $path, $parameters);
        return $this->getResult($response);
    }

    public function getActivity($id, $include_all_efforts = null)
    {
        $path = '/activities/' . $id;
        $parameters = [
            'include_all_efforts' => $include_all_efforts,
            'access_token' => $this->getToken(),
        ];
        $response = $this->adapter->request('GET', $path, $parameters);
        return $this->getResult($response);
    }

    public function getActivityComments($id, $markdown = null, $page = null, $per_page = null)
    {
        $path = '/activities/' . $id . '/comments';
        $parameters = [
            'markdown' => $markdown,
            'page' => $page,
            'per_page' => $per_page,
            'access_token' => $this->getToken(),
        ];
        $response = $this->adapter->request('GET', $path, $parameters);
        return $this->getResult($response);
    }

    public function getActivityKudos($id, $page = null, $per_page = null)
    {
        $path = '/activities/' . $id . '/kudos';
        $parameters = [
            'page' => $page,
            'per_page' => $per_page,
            'access_token' => $this->getToken(),
        ];
        $response = $this->adapter->request('GET', $path, $parameters);
        return $this->getResult($response);
    }

    public function getActivityPhotos($id, $size = 2048, $photo_sources = 'true')
    {
        $path = '/activities/' . $id . '/photos';
        $parameters = [
            'size' => $size,
            'photo_sources' => $photo_sources,
            'access_token' => $this->getToken(),
        ];
        $response = $this->adapter->request('GET', $path, $parameters);
        return $this->getResult($response);
    }

    public function getActivityZones($id)
    {
        $path = '/activities/' . $id . '/zones';
        $parameters = ['access_token' => $this->getToken()];
        $response = $this->adapter->request('GET', $path, $parameters);
        return $this->getResult($response);
    }

    public function getActivityLaps($id)
    {
        $path = '/activities/' . $id . '/laps';
        $parameters = ['access_token' => $this->getToken()];
        $response = $this->adapter->request('GET', $path, $parameters);
        return $this->getResult($response);
    }

    public function getActivityUploadStatus($id)
    {
        $path = '/uploads/' . $id;
        $parameters = ['access_token' => $this->getToken()];
        $response = $this->adapter->request('GET', $path, $parameters);
        return $this->getResult($response);
    }

    public function createActivity($name, $type, $start_date_local, $elapsed_time, $description = null, $distance = null, $private = null, $trainer = null)
    {
        $path = '/activities';
        $parameters = [
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
        $response = $this->adapter->request('POST', $path, $parameters);
        return $this->getResult($response);
    }

    public function uploadActivity($file, $activity_type = null, $name = null, $description = null, $private = null, $trainer = null, $commute = null, $data_type = null, $external_id = null)
    {
        $path = '/uploads';
        $parameters = [
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
        $response = $this->adapter->request('POST', $path, $parameters);
        return $this->getResult($response);
    }

    public function updateActivity($id, $name = null, $type = null, $private = false, $commute = false, $trainer = false, $gear_id = null, $description = null)
    {
        $path = '/activities/' . $id;
        $parameters = [
            'name' => $name,
            'type' => $type,
            'private' => $private,
            'commute' => $commute,
            'trainer' => $trainer,
            'gear_id' => $gear_id,
            'description' => $description,
            'access_token' => $this->getToken(),
        ];
        $response = $this->adapter->request('PUT', $path, $parameters);
        return $this->getResult($response);
    }

    public function deleteActivity($id)
    {
        $path = '/activities/' . $id;
        $parameters = ['access_token' => $this->getToken()];
        $response = $this->adapter->request('DELETE', $path, $parameters);
        return $this->getResult($response);
    }

    public function getGear($id)
    {
        $path = '/gear/' . $id;
        $parameters = ['access_token' => $this->getToken()];
        $response = $this->adapter->request('GET', $path, $parameters);
        return $this->getResult($response);
    }

    public function getClub($id)
    {
        $path = '/clubs/' . $id;
        $parameters = ['access_token' => $this->getToken()];
        $response = $this->adapter->request('GET', $path, $parameters);
        return $this->getResult($response);
    }

    public function getClubMembers($id, $page = null, $per_page = null)
    {
        $path = '/clubs/' . $id . '/members';
        $parameters = [
            'page' => $page,
            'per_page' => $per_page,
            'access_token' => $this->getToken(),
        ];
        $response = $this->adapter->request('GET', $path, $parameters);
        return $this->getResult($response);
    }

    public function getClubActivities($id, $page = null, $per_page = null)
    {
        $path = '/clubs/' . $id . '/activities';
        $parameters = [
            'page' => $page,
            'per_page' => $per_page,
            'access_token' => $this->getToken(),
        ];
        $response = $this->adapter->request('GET', $path, $parameters);
        return $this->getResult($response);
    }

    public function getClubAnnouncements($id)
    {
        $path = '/clubs/' . $id . '/announcements';
        $parameters = ['access_token' => $this->getToken()];
        $response = $this->adapter->request('GET', $path, $parameters);
        return $this->getResult($response);
    }

    public function getClubGroupEvents($id)
    {
        $path = '/clubs/' . $id . '/group_events';
        $parameters = ['access_token' => $this->getToken()];
        $response = $this->adapter->request('GET', $path, $parameters);
        return $this->getResult($response);
    }

    public function joinClub($id)
    {
        $path = '/clubs/' . $id . '/join';
        $parameters = ['access_token' => $this->getToken()];
        $response = $this->adapter->request('POST', $path, $parameters);
        return $this->getResult($response);
    }

    public function leaveClub($id)
    {
        $path = '/clubs/' . $id . '/leave';
        $parameters = ['access_token' => $this->getToken()];
        $response = $this->adapter->request('POST', $path, $parameters);
        return $this->getResult($response);
    }

    public function getRoute($id)
    {
        $path = '/routes/' . $id;
        $parameters = ['access_token' => $this->getToken()];
        $response = $this->adapter->request('GET', $path, $parameters);
        return $this->getResult($response);
    }

    public function getSegment($id)
    {
        $path = '/segments/' . $id;
        $parameters = ['access_token' => $this->getToken()];
        $response = $this->adapter->request('GET', $path, $parameters);
        return $this->getResult($response);
    }

    public function getSegmentLeaderboard($id, $gender = null, $age_group = null, $weight_class = null, $following = null, $club_id = null, $date_range = null, $context_entries = null, $page = null, $per_page = null)
    {
        $path = '/segments/' . $id . '/leaderboard';
        $parameters = [
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
        $response = $this->adapter->request('GET', $path, $parameters);
        return $this->getResult($response);
    }

    public function getSegmentExplorer($bounds, $activity_type = 'riding', $min_cat = null, $max_cat = null)
    {
        $path = '/segments/explore';
        $parameters = [
            'bounds' => $bounds,
            'activity_type' => $activity_type,
            'min_cat' => $min_cat,
            'max_cat' => $max_cat,
            'access_token' => $this->getToken(),
        ];
        $response = $this->adapter->request('GET', $path, $parameters);
        return $this->getResult($response);
    }

    public function getSegmentEffort($id, $athlete_id = null, $start_date_local = null, $end_date_local = null, $page = null, $per_page = null)
    {
        $path = '/segments/' . $id . '/all_efforts';
        $parameters = [
            'athlete_id' => $athlete_id,
            'start_date_local' => $start_date_local,
            'end_date_local' => $end_date_local,
            'page' => $page,
            'per_page' => $per_page,
            'access_token' => $this->getToken(),
        ];
        $response = $this->adapter->request('GET', $path, $parameters);
        return $this->getResult($response);
    }

    public function getStreamsActivity($id, $types, $resolution = null, $series_type = 'distance')
    {
        $path = '/activities/' . $id . '/streams/' . $types;
        $parameters = [
            'resolution' => $resolution,
            'series_type' => $series_type,
            'access_token' => $this->getToken(),
        ];
        $response = $this->adapter->request('GET', $path, $parameters);
        return $this->getResult($response);
    }

    public function getStreamsEffort($id, $types, $resolution = null, $series_type = 'distance')
    {
        $path = '/segment_efforts/' . $id . '/streams/' . $types;
        $parameters = [
            'resolution' => $resolution,
            'series_type' => $series_type,
            'access_token' => $this->getToken(),
        ];
        $response = $this->adapter->request('GET', $path, $parameters);
        return $this->getResult($response);
    }

    public function getStreamsSegment($id, $types, $resolution = null, $series_type = 'distance')
    {
        $path = '/segments/' . $id . '/streams/' . $types;
        $parameters = [
            'resolution' => $resolution,
            'series_type' => $series_type,
            'access_token' => $this->getToken(),
        ];
        $response = $this->adapter->request('GET', $path, $parameters);
        return $this->getResult($response);
    }

    public function getStreamsRoute($id)
    {
        $path = '/routes/' . $id . '/streams';
        $parameters = ['access_token' => $this->getToken()];
        $response = $this->adapter->request('GET', $path, $parameters);
        return $this->getResult($response);
    }

}

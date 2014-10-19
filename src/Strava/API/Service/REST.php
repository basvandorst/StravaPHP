<?php
namespace Strava\API\Service;

/**
 * Strava REST Service
 * 
 * @author: Bas van Dorst
 * @package Strava
 */
class REST implements ServiceInterface {
    
    /**
     * Strava V3 endpoint
     * @var string 
     */
    private static $endpoint = 'https://www.strava.com/api/v3';
    
    /**
     * REST adapter
     * @var Strava\API\Adapter\REST\RestInterface
     */
    protected $adapter;
    
    /**
     * Application token
     * @var string
     */
    private $token = null;
    
    /**
     * Inititate the client with the application token
     * 
     * @param string $token
     */
    public function __construct($token, $adapter) {
        $this->token = $token;
        $this->adapter = $adapter;
    }
    
    private function getHeaders() {
        return array('Authorization: Bearer '.$this->token);
    }
    
    public function getAthlete($id = null) {
        // todo more
        $parameters = array();
        $result = $this->client->get(self::$endpoint.'/athlete', $parameters, $this->getHeaders());
        return $this->format($result);
    }
    
    public function getAthleteClubs() {
        $parameters = array();
        $result = $this->client->get(self::$endpoint.'/athlete/clubs', $parameters, $this->getHeaders());
        return $this->format($result);
    }
    
    public function getAthleteActivities($before = null, $after = null, $page = null, $per_page = null) {
        $parameters = array(
            'before' => $before,
            'after' => $after,
            'page' => $page,
            'per_page' => $per_page,
        );
        $result = $this->client->get(self::$endpoint.'/athlete/activities', $parameters, $this->getHeaders());
        return $this->format($result);
    }
    public function getAthleteFriends($id = null, $page = null, $per_page = null) {}
    public function getAthleteFollowers($id = null, $page = null, $per_page = null) {}
    public function getAthleteBothFollowing($id, $page = null, $per_page = null) {}
    public function getAthleteKom($id, $page = null, $per_page = null) {}
    public function getAthleteStarredSegments($id = null, $page = null, $per_page = null) {}
    public function updateAthlete($city, $state, $country, $sex, $weight) {
        $parameters = array(
            'city' => $city,
            'state' => $state,
            'country' => $country,
            'sex' => $sex,
            'weight' => $weight,
        );
        $result = $this->client->put(self::$endpoint.'/athlete', $parameters, $this->getHeaders());
        return $this->format($result);
    }
    public function getActivity($id, $include_all_efforts = null) {}
    public function getActivityComments($id, $markdown = null, $page = null, $per_page = null) {}
    public function getActivityKudos($id, $page = null, $per_page = null) {}
    public function getActivityPhotos($id) {}
    public function getActivityZones($id) {}
    public function getActivityLaps($id) {}
    public function getActivityUploadStatus($id) {}
    public function createActivity($name, $type, $start_date_local, $elapsed_time, $description = null, $distance = null) {}
    public function uploadActivity($file, $activity_type = null, $name = null, $description = null, $private = null, $trainer = null, $data_type = null, $external_id = null) {}
    public function updateActivity($name = null, $type = null, $private = false, $commute = false, $trainer = false, $gear_id = null, $description = null) {}
    public function deleteActivity($id) {}
    public function getGear($id) {
        $parameters = array(
            'id' => $id,
        );
        $result = $this->client->get(self::$endpoint.'/gear/'.$id, $parameters, $this->getHeaders());
        return json_decode($result,true);
    }
    public function getClub($id) {
        $parameters = array();
        $result = $this->client->get(self::$endpoint.'/clubs/'.$id, $parameters, $this->getHeaders());
        return $this->format($result);
    }
    public function getClubMembers($id, $page = null, $per_page  = null) {
        $parameters = array(
            'id' => $id,
            'page' => $page,
            'per_page' => $per_page,
        );
        $result = $this->client->get(self::$endpoint.'/clubs/'.$id.'/members', $parameters, $this->getHeaders());
        return $this->format($result);
    }
    public function getClubActivities($id, $page = null, $per_page  = null) {
        $parameters = array(
                'id' => $id,
                'page' => $page,
                'per_page' => $per_page,
        );
        $result = $this->client->get(self::$endpoint.'/clubs/'.$id.'/activities', $parameters, $this->getHeaders());
        return $this->format($result);
    }
    public function getSegment($id) {}
    public function getSegmentLeaderboard($id, $gender = null, $age_group = null, $weight_class = null, $following = null, $club_id = null, $date_range = null, $page = null, $per_page = null) {}
    public function getSegmentExplorer($bounds, $activity_type = 'riding', $min_cat = null, $max_cat = null) {}
    public function getSegmentEffort($id, $athlete_id = null, $start_date_local = null, $end_date_local = null, $page = null, $per_page = null) {}
    public function getStreamsActivity($id, $types, $resolution = 'all', $series_type = 'distance') {}
    public function getStreamsEffort($id, $types, $resolution = 'all', $series_type = 'distance') {}
    public function getStreamsSegment($id, $types, $resolution = 'all', $series_type = 'distance') {}
    
    /**
     * @param string $result
     */
    private function format($result) {
        return json_decode($result,true);
    }
}
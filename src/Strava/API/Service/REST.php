<?php
namespace Strava\API\Service;

use Pest;

/**
 * Strava REST Service
 * 
 * @author Bas van Dorst
 * @package StravaPHP
 */
class REST implements ServiceInterface {    
    /**
     * REST adapter
     * @var Pest
     */
    protected $adapter;
    
    /**
     * Application token
     * @var string
     */
    private $token = null;
    
    /**
     * Inititate the client with the application token and REST adapter
     * 
     * @param type $token
     * @param Pest $adapter
     */
    public function __construct($token, Pest $adapter) {
        $this->token = $token;
        $this->adapter = $adapter;
    }
    
    private function getHeaders() {
        return array('Authorization: Bearer '.$this->token);
    }
    
    public function getAthlete($id = null) 
    {
        $path = '/athlete';
        if(isset($id) && $id !== null) {
            $path = '/athletes/'.$id;
        }
        $result = $this->adapter->get($path, array(), $this->getHeaders());
        return $this->format($result);
    }
    
    public function getAthleteClubs() 
    {
        $path = '/athlete/clubs';
        $result = $this->adapter->get($path, array(), $this->getHeaders());
        return $this->format($result);
    }
    
    public function getAthleteActivities($before = null, $after = null, $page = null, $per_page = null) 
    {
        $path = '/athlete/activities';
        $parameters = array(
            'before' => $before,
            'after' => $after,
            'page' => $page,
            'per_page' => $per_page,
        );
        $result = $this->adapter->get($path, $parameters, $this->getHeaders());
        return $this->format($result);
    }
    
    public function getAthleteFriends($id = null, $page = null, $per_page = null) 
    {    
        $path = '/athlete/friends';
        if(isset($id) && $id !== null) {
            $path = '/athletes/'.$id.'/friends';
        }
        
        $parameters = array(
            'page' => $page,
            'per_page' => $per_page,
        );
        $result = $this->adapter->get($path, $parameters, $this->getHeaders());
        return $this->format($result);
    }
    
    public function getAthleteFollowers($id = null, $page = null, $per_page = null) 
    {
        $path = '/athlete/followers';
        if(isset($id) && $id !== null) {
            $path = '/athletes/'.$id.'/followers';
        }
        
        $parameters = array(
            'page' => $page,
            'per_page' => $per_page,
        );
        $result = $this->adapter->get($path, $parameters, $this->getHeaders());
        return $this->format($result);
    }
    
    public function getAthleteBothFollowing($id, $page = null, $per_page = null) 
    {
        $path = '/athletes/'.$id.'/both-following';
        
        $parameters = array(
            'page' => $page,
            'per_page' => $per_page,
        );
        $result = $this->adapter->get($path, $parameters, $this->getHeaders());
        return $this->format($result);
    }
    
    public function getAthleteKom($id, $page = null, $per_page = null) 
    {
        $path = '/athletes/'.$id.'/koms';
        
        $parameters = array(
            'page' => $page,
            'per_page' => $per_page,
        );
        $result = $this->adapter->get($path, $parameters, $this->getHeaders());
        return $this->format($result);
    }
    
    public function getAthleteStarredSegments($id = null, $page = null, $per_page = null) 
    {
        $path = '/segments/starred';
        if(isset($id) && $id !== null) {
            $path = '/athletes/'.$id.'/segments/starred';
            // wrong in Strava documentation
        }
        
        $parameters = array(
            'page' => $page,
            'per_page' => $per_page,
        );
        $result = $this->adapter->get($path, $parameters, $this->getHeaders());
        return $this->format($result);
    }
    
    public function updateAthlete($city, $state, $country, $sex, $weight) 
    {
        $path = '/athlete';
        $parameters = array(
            'city' => $city,
            'state' => $state,
            'country' => $country,
            'sex' => $sex,
            'weight' => $weight,
        );
        $result = $this->adapter->put($path, $parameters, $this->getHeaders());
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
    
    public function getGear($id) 
    {
        $path = '/gear';
        $parameters = array(
            'id' => $id,
        );
        $result = $this->adapter->get($path, $parameters, $this->getHeaders());
        return $this->format($result);
    }
    
    public function getClub($id) 
    {
        $path = '/clubs'.$id;
        $result = $this->adapter->get($path, array(), $this->getHeaders());
        return $this->format($result);
    }
    
    public function getClubMembers($id, $page = null, $per_page  = null) 
    {
        $path = '/clubs/'.$id.'/members';
        $parameters = array(
            'id' => $id,
            'page' => $page,
            'per_page' => $per_page,
        );
        $result = $this->adapter->get($path, $parameters, $this->getHeaders());
        return $this->format($result);
    }
    
    public function getClubActivities($id, $page = null, $per_page  = null) 
    {
        $path = '/clubs/'.$id.'/activities';
        $parameters = array(
                'id' => $id,
                'page' => $page,
                'per_page' => $per_page,
        );
        $result = $this->adapter->get($path, $parameters, $this->getHeaders());
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
     * Convert the JSON output to an array
     * @param string $result
     */
    private function format($result) {
        return json_decode($result,true);
    }
}
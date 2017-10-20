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
     * Inititate this REST servcie with the application token and a instance 
     * of the REST adapter (Pest)
     * 
     * @param string $token
     * @param Pest $adapter
     */
    public function __construct($token, Pest $adapter) {
        $this->token = $token;
        $this->adapter = $adapter;
    }
    
    private function getHeaders() {
        return array('Authorization: Bearer '.$this->token);
    }
    
    public function getAthlete($id = null) {
        $path = '/athlete';
        if(isset($id) && $id !== null) {
            $path = '/athletes/'.$id;
        }
        $result = $this->adapter->get($path, array(), $this->getHeaders());
        return $this->format($result);
    }
    
    public function getAthleteStats($id) {
        $path = '/athletes/'.$id.'/stats';
        $result = $this->adapter->get($path, array(), $this->getHeaders());
        return $this->format($result);
    }

    public function getAthleteClubs() {
        $path = '/athlete/clubs';
        $result = $this->adapter->get($path, array(), $this->getHeaders());
        return $this->format($result);
    }
    
    public function getAthleteActivities($before = null, $after = null, $page = null, $per_page = null) {
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
    
    public function getAthleteFriends($id = null, $page = null, $per_page = null) {    
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
    
    public function getAthleteFollowers($id = null, $page = null, $per_page = null) {
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
    
    public function getAthleteBothFollowing($id, $page = null, $per_page = null) {
        $path = '/athletes/'.$id.'/both-following';
        
        $parameters = array(
            'page' => $page,
            'per_page' => $per_page,
        );
        $result = $this->adapter->get($path, $parameters, $this->getHeaders());
        return $this->format($result);
    }
    
    public function getAthleteKom($id, $page = null, $per_page = null) {
        $path = '/athletes/'.$id.'/koms';
        
        $parameters = array(
            'page' => $page,
            'per_page' => $per_page,
        );
        $result = $this->adapter->get($path, $parameters, $this->getHeaders());
        return $this->format($result);
    }
    
    public function getAthleteStarredSegments($id = null, $page = null, $per_page = null) {
        $path = '/segments/starred';
        if(isset($id) && $id !== null) {
            $path = '/athletes/'.$id.'/segments/starred';
            // ...wrong in Strava documentation
        }
        
        $parameters = array(
            'page' => $page,
            'per_page' => $per_page,
        );
        $result = $this->adapter->get($path, $parameters, $this->getHeaders());
        return $this->format($result);
    }
    
    public function updateAthlete($city, $state, $country, $sex, $weight) {
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
    
    public function getActivityFollowing($before = null, $page = null, $per_page = null) {
        $path = '/activities/following';
        $parameters = array(
            'before' => $before,
            'page' => $page,
            'per_page' => $per_page
        );
        $result = $this->adapter->get($path, $parameters, $this->getHeaders());
        return $this->format($result);        
    }
    
    public function getActivity($id, $include_all_efforts = null) {
        $path = '/activities/'.$id;
        $parameters = array(
            'include_all_efforts' => $include_all_efforts,
        );
        $result = $this->adapter->get($path, $parameters, $this->getHeaders());
        return $this->format($result);
    }
       
    public function getActivityComments($id, $markdown = null, $page = null, $per_page = null) {
        $path = '/activities/'.$id.'/comments';
        $parameters = array(
            'markdown' => $markdown,
            'page' => $page,
            'per_page' => $per_page
        );
        $result = $this->adapter->get($path, $parameters, $this->getHeaders());
        return $this->format($result);
    }
    
    public function getActivityKudos($id, $page = null, $per_page = null) {
        $path = '/activities/'.$id.'/kudos';
        $parameters = array(
            'page' => $page,
            'per_page' => $per_page
        );
        $result = $this->adapter->get($path, $parameters, $this->getHeaders());
        return $this->format($result);
    }
    
    public function getActivityPhotos($id, $size = 2048, $photo_sources = 'true') {
        $path = '/activities/'.$id.'/photos';
        $parameters = array(
            'size' => $size,
            'photo_sources' => $photo_sources,
        );
        $result = $this->adapter->get($path, $parameters, $this->getHeaders());
        return $this->format($result);
    }
    
    public function getActivityZones($id) {
        $path = '/activities/'.$id.'/zones';
        $result = $this->adapter->get($path, array(), $this->getHeaders());
        return $this->format($result);
    }
    
    public function getActivityLaps($id) {
        $path = '/activities/'.$id.'/laps';
        $result = $this->adapter->get($path, array(), $this->getHeaders());
        return $this->format($result);
    }
    
    public function getActivityUploadStatus($id) {
        $path = '/uploads/'.$id;
        $result = $this->adapter->get($path, array(), $this->getHeaders());
        return $this->format($result);
    }
    
    public function createActivity($name, $type, $start_date_local, $elapsed_time, $description = null, $distance = null) {
        $path = '/activities';
        $parameters = array(
            'name' => $name,
            'type' => $type,
            'start_date_local' => $start_date_local,
            'elapsed_time' => $elapsed_time,
            'description' => $description,
            'distance' => $distance,
        );
        $result = $this->adapter->post($path, $parameters, $this->getHeaders());
        return $this->format($result);
    }
    
    public function uploadActivity($file, $activity_type = null, $name = null, $description = null, $private = null, $trainer = null, $commute = null, $data_type = null, $external_id = null) {
        $path = '/uploads';
        $parameters = array(
            'activity_type' => $activity_type,
            'name' => $name,
            'description' => $description,
            'private' => $private,
            'trainer' => $trainer,
            'commute' => $commute,
            'data_type' => $data_type,
            'external_id' => $external_id,
            'file' => '@'.ltrim($file, '@'),
        );
        $result = $this->adapter->post($path, $parameters, $this->getHeaders());
        return $this->format($result);
    }
    
    public function updateActivity($id, $name = null, $type = null, $private = false, $commute = false, $trainer = false, $gear_id = null, $description = null) {
        $path = '/activities/'.$id;
        $parameters = array(
            'name' => $name,
            'type' => $type,
            'private' => $private   ,
            'commute' => $commute,
            'trainer' => $trainer,
            'gear_id' => $gear_id,
            'description' => $description,
        );
        $result = $this->adapter->put($path, $parameters, $this->getHeaders());
        return $this->format($result);
    }
    
    public function deleteActivity($id) {
        $path = '/activities/'.$id;
        $result = $this->adapter->delete($path, $this->getHeaders());
        return $this->format($result);
    }
    
    public function getGear($id) {
        $path = '/gear/'.$id;
        $result = $this->adapter->get($path, array(), $this->getHeaders());
        return $this->format($result);
    }
    
    public function getClub($id) {
        $path = '/clubs/'.$id;
        $result = $this->adapter->get($path, array(), $this->getHeaders());
        return $this->format($result);
    }
    
    public function getClubMembers($id, $page = null, $per_page  = null) {
        $path = '/clubs/'.$id.'/members';
        $parameters = array(
            'page' => $page,
            'per_page' => $per_page,
        );
        $result = $this->adapter->get($path, $parameters, $this->getHeaders());
        return $this->format($result);
    }
    
    public function getClubActivities($id, $page = null, $per_page  = null) {
        $path = '/clubs/'.$id.'/activities';
        $parameters = array(
            'page' => $page,
            'per_page' => $per_page,
        );
        $result = $this->adapter->get($path, $parameters, $this->getHeaders());
        return $this->format($result);
    }

    public function getClubAnnouncements($id) {
        $path = '/clubs/'.$id.'/announcements';
        $result = $this->adapter->get($path, array(), $this->getHeaders());
        return $this->format($result);
    }

    public function getClubGroupEvents($id) {
        $path = '/clubs/'.$id.'/group_events';
        $result = $this->adapter->get($path, array(), $this->getHeaders());
        return $this->format($result);
    }

    public function joinClub($id) {
        $path = '/clubs/'.$id.'/join';
        $result = $this->adapter->post($path, array(), $this->getHeaders());
        return $this->format($result);
    }

    public function leaveClub($id) {
        $path = '/clubs/'.$id.'/leave';
        $result = $this->adapter->post($path, array(), $this->getHeaders());
        return $this->format($result);
    }

    public function getSegment($id) {
        $path = '/segments/'.$id;
        $result = $this->adapter->get($path, array(), $this->getHeaders());
        return $this->format($result);
    }
    
    public function getSegmentLeaderboard($id, $gender = null, $age_group = null, $weight_class = null, $following = null, $club_id = null, $date_range = null, $context_entries = null, $page = null, $per_page = null) {
        $path = '/segments/'.$id.'/leaderboard';
        $parameters = array(
            'id' => $gender,
            'age_group' => $age_group,
            'weight_class' => $weight_class,
            'following' => $following,
            'club_id' => $club_id,
            'date_range' => $date_range,
            'context_entries' => $context_entries,
            'page' => $page,
            'per_page' => $per_page
        );
        
        $result = $this->adapter->get($path, $parameters, $this->getHeaders());
        return $this->format($result);
    }
    
    public function getSegmentExplorer($bounds, $activity_type = 'riding', $min_cat = null, $max_cat = null) {
        $path = '/segments/explore';
        $parameters = array(
            'bounds' => $bounds,
            'activity_type' => $activity_type,
            'min_cat' => $min_cat,
            'max_cat' => $max_cat
        );
        
        $result = $this->adapter->get($path, $parameters, $this->getHeaders());
        return $this->format($result);
    }
    
    public function getSegmentEffort($id, $athlete_id = null, $start_date_local = null, $end_date_local = null, $page = null, $per_page = null) {
        $path = '/segments/'.$id.'/all_efforts';
        $parameters = array(
            'athlete_id' => $athlete_id,
            'start_date_local' => $start_date_local,
            'end_date_local' => $end_date_local,
            'page' => $page,
            'per_page' => $per_page
        );
        
        $result = $this->adapter->get($path, $parameters, $this->getHeaders());
        return $this->format($result);
    }
    
    public function getStreamsActivity($id, $types, $resolution = null, $series_type = 'distance') {
        $path = '/activities/'.$id.'/streams/'.$types;
        $parameters = array(
            'resolution' => $resolution,
            'series_type' => $series_type
        );
        
        $result = $this->adapter->get($path, $parameters, $this->getHeaders());
        return $this->format($result);
    }
    
    public function getStreamsEffort($id, $types, $resolution = null, $series_type = 'distance') {
        $path = '/segment_efforts/'.$id.'/streams/'.$types;
        $parameters = array(
            'resolution' => $resolution,
            'series_type' => $series_type
        );
        
        $result = $this->adapter->get($path, $parameters, $this->getHeaders());
        return $this->format($result);
    }
    
    public function getStreamsSegment($id, $types, $resolution = null, $series_type = 'distance') {
        $path = '/segments/'.$id.'/streams/'.$types;
        $parameters = array(
            'resolution' => $resolution,
            'series_type' => $series_type
        );
        
        $result = $this->adapter->get($path, $parameters, $this->getHeaders());
        return $this->format($result);
    }
    
    /**
     * Convert the JSON output to an array
     * @param string $result
     */
    private function format($result) {
        return json_decode($result,true);
    }
}

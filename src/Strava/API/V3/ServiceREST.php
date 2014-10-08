<?php
namespace Strava\API\V3;

use Pest;
use Exception;

/**
 * Strava REST Service
 * The client validates the parameters and makes the call to the Strava API
 * 
 * @author: Bas van Dorst
 * @package Strava
 */
class ServiceREST implements IService {
    
    private static $endpoint = 'https://www.strava.com/api/v3';
    
    protected $client;
    
    private $token = null;
    
    public function __construct($token) {
        $this->token = $token;
        $this->client = new Pest(self::$endpoint);
    }
    
    private function getHeaders() {
        return array('Authorization: Bearer '.$this->token);
    }
    
    public function getAthlete() {
        $parameters = array();
        $result = $this->client->get('/athlete', $parameters, $this->getHeaders());
        return json_decode($result,true);
    }
    public function getAthleteActivities($before = null, $after = null, $page = null, $per_page = null) {
        $parameters = array(
            'before' => $before,
            'after' => $after,
            'page' => $page,
            'per_page' => $per_page,
        );
        $result = $this->client->get('/athlete/activities', $parameters, $this->getHeaders());
        return json_decode($result,true);
    }
    public function getAthleteFriends(){}
    public function getAthleteFollowers(){}
    public function getAthleteBothFollowing(){}
    public function getAthleteKom(){}
    public function getAthleteStarredSegments(){}
    public function getAthleteClubs(){}
    public function updateAthlete(){}
    
    public function getActivity(){}
    public function getActivityComments(){}
    public function getActivityKudos(){}
    public function getActivityPhotos(){}
    public function getActivityZones(){}
    public function getActivityLaps(){}
    public function getActivityUploadStatus(){}
    
    public function createActivity(){}
    public function updateActivity(){}
    public function uploadActivity(){}
    public function deleteActivity(){}
    
    public function getGear($id) {
        try {
            $parameters = array(
                'id' => $id,
            );
            $result = $this->client->get('/gear/'.$id, $parameters, $this->getHeaders());
            return json_decode($result,true);
        } catch(Exception $e) {
            throw new ServiceException($e->getMessage());
        }
    }
    
    public function getClub($id){}
    public function getClubMembers($id, $page, $per_page){}
    public function getClubActivities($id, $page, $per_page){}
    
    public function getSegment($id){}
    public function getSegmentEffort($id, $athlete_id, $start_date_local, $end_date_local, $page, $per_page){}
    public function getSegmentLeaderboard($id, $gender, $age_group, $weight_class, $following, $club_id, $date_range, $page, $per_page){}
    public function getSegmentExplorer($bounds, $activity_type, $min_cat, $max_cat){}

    public function getStreamsActivity($id, $types, $resolution, $series_type){}
    public function getStreamsEffort($id, $types, $resolution, $series_type){}
    public function getStreamsSegment($id, $types, $resolution, $series_type) {
        try {
            $thing = $this->client->get('/gear/g138727');
        } catch(Exception $e) {
            throw new ServiceException($e->getMessage());
        }
    }    
}
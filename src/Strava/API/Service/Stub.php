<?php
namespace Strava\API\Service;

/**
 * Strava stub Service
 * 
 * @author Bas van Dorst
 * @package StravaPHP
 */
class Stub implements ServiceInterface {
    public function getAthlete($id = null) {
        $json = '{ "id": 227615, "resource_state": 2, "firstname": "John", "lastname": "Applestrava", "profile_medium": "http://pics.com/227615/medium.jpg", "profile": "http://pics.com/227615/large.jpg", "city": "San Francisco", "state": "CA", "country": "United States", "sex": "M", "friend": null, "follower": "accepted", "premium": true, "created_at": "2011-03-19T21:59:57Z", "updated_at": "2013-09-05T16:46:54Z", "approve_followers": false }';
        return $this->format($json);
    }
    
    public function getAthleteClubs() {
        $json = '[ { "id": 1, "resource_state": 2, "name": "Team Strava Cycling", "profile_medium": "http://pics.com/clubs/1/medium.jpg", "profile": "http://pics.com/clubs/1/large.jpg" } ]';
        return $this->format($json);
    }
    
    public function getAthleteActivities($before = null, $after = null, $page = null, $per_page = null) {
        $json = '{"response": 1}';
        return $this->format($json);
    }
    
    public function getAthleteFriends($id = null, $page = null, $per_page = null) {
        $json = '{"response": 1}';
        return $this->format($json);
    }
    
    public function getAthleteFollowers($id = null, $page = null, $per_page = null) {
        $json = '{"response": 1}';
        return $this->format($json);
    }
    
    public function getAthleteBothFollowing($id, $page = null, $per_page = null) {
        $json = '{"response": 1}';
        return $this->format($json);
    }
    
    public function getAthleteKom($id, $page = null, $per_page = null) {
        $json = '{"response": 1}';
        return $this->format($json);
    }
    
    public function getAthleteStarredSegments($id = null, $page = null, $per_page = null) {
        $json = '{"response": 1}';
        return $this->format($json);
    }
    
    public function updateAthlete($city, $state, $country, $sex, $weight) {
        $json = '{"response": 1}';
        return $this->format($json);
    }
    
    public function getActivity($id, $include_all_efforts = null) {
        $json = '{"response": 1}';
        return $this->format($json);
    }
    
    public function getActivityComments($id, $markdown = null, $page = null, $per_page = null) {
        $json = '{"response": 1}';
        return $this->format($json);
    }
    
    public function getActivityKudos($id, $page = null, $per_page = null) {
        $json = '{"response": 1}';
        return $this->format($json);
    }
    
    public function getActivityPhotos($id) {
        $json = '{"response": 1}';
        return $this->format($json);
    }
    
    public function getActivityZones($id) {
        $json = '{"response": 1}';
        return $this->format($json);
    }
    
    public function getActivityLaps($id) {
        $json = '{"response": 1}';
        return $this->format($json);
    }
    
    public function getActivityUploadStatus($id) {
        $json = '{"response": 1}';
        return $this->format($json);
    }
    
    public function createActivity($name, $type, $start_date_local, $elapsed_time, $description = null, $distance = null) {
        $json = '{"response": 1}';
        return $this->format($json);
    }
    
    public function uploadActivity($file, $activity_type = null, $name = null, $description = null, $private = null, $trainer = null, $data_type = null, $external_id = null) {
        $json = '{"response": 1}';
        return $this->format($json);
    }
    
    public function updateActivity($id, $name = null, $type = null, $private = false, $commute = false, $trainer = false, $gear_id = null, $description = null) {
        $json = '{"response": 1}';
        return $this->format($json);
    }
    
    public function deleteActivity($id) {
        $json = '{"response": 1}';
        return $this->format($json);
    }
    
    public function getGear($id) {
        $json = '{"response": 1}';
        return $this->format($json);
    }
    
    public function getClub($id) {
        $json = '{"response": 1}';
        return $this->format($json);
    }
    
    public function getClubMembers($id, $page = null, $per_page  = null) {
        $json = '{"response": 1}';
        return $this->format($json);
    }
    
    public function getClubActivities($id, $page = null, $per_page  = null) {
        $json = '{"response": 1}';
        return $this->format($json);
    }
    
    public function getSegment($id) {
        $json = '{"response": 1}';
        return $this->format($json);
    }
    
    public function getSegmentLeaderboard($id, $gender = null, $age_group = null, $weight_class = null, $following = null, $club_id = null, $date_range = null, $page = null, $per_page = null) {
        $json = '{"response": 1}';
        return $this->format($json);
    }
    
    public function getSegmentExplorer($bounds, $activity_type = 'riding', $min_cat = null, $max_cat = null) {
        $json = '{"response": 1}';
        return $this->format($json);
    }
    
    public function getSegmentEffort($id, $athlete_id = null, $start_date_local = null, $end_date_local = null, $page = null, $per_page = null) {
        $json = '{"response": 1}';
        return $this->format($json);
    }
    
    public function getStreamsActivity($id, $types, $resolution = 'all', $series_type = 'distance') {
        $json = '{"response": 1}';
        return $this->format($json);
    }
    
    public function getStreamsEffort($id, $types, $resolution = 'all', $series_type = 'distance') {
        $json = '{"response": 1}';
        return $this->format($json);
    }
    
    public function getStreamsSegment($id, $types, $resolution = 'all', $series_type = 'distance') {
        $json = '{"response": 1}';
        return $this->format($json);
    }
    
    /**
     * @param string $result
     */
    private function format($result) {
        return json_decode($result,true);
    }
}
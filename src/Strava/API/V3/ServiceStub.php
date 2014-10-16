<?php
namespace Strava\API\V3;

/**
 * Strava stub Service
 * The client validates the parameters and makes the call to the Strava API
 * 
 * @author: Bas van Dorst
 * @package Strava
 */
class ServiceStub implements IService {
    public function createActivity() {
        
    }

    public function deleteActivity() {
        
    }

    public function getActivity() {
        
    }

    public function getActivityComments() {
        
    }

    public function getActivityKudos() {
        
    }

    public function getActivityLaps() {
        
    }

    public function getActivityPhotos() {
        
    }

    public function getActivityUploadStatus() {
        
    }

    public function getActivityZones() {
        
    }

    public function getAthlete() {
        $json =  '{ "id": 227615, "resource_state": 3, "firstname": "John", "lastname": "Applestrava", "profile_medium": "http://pics.com/227615/medium.jpg", "profile": "http://pics.com/227615/large.jpg", "city": "San Francisco", "state": "California", "country": "United States", "sex": "M", "friend": null, "follower": null, "premium": true, "created_at": "2008-01-01T17:44:00Z", "updated_at": "2013-09-04T20:00:50Z", "follower_count": 273, "friend_count": 19, "mutual_friend_count": 0, "date_preference": "%m/%d/%Y", "measurement_preference": "feet", "email": "john@applestrava.com", "ftp": 280, "clubs": [ { "id": 1, "resource_state": 2, "name": "Team Strava Cycling", "profile_medium": "http://pics.com/clubs/1/medium.jpg", "profile": "http://pics.com/clubs/1/large.jpg" } ], "bikes": [ { "id": "b105763", "primary": false, "name": "Cannondale TT", "distance": 476612.9, "resource_state": 2 }, { "id": "b105762", "primary": true, "name": "Masi", "distance": 9000578.2, "resource_state": 2 } ], "shoes": [ { "id": "g1", "primary": true, "name": "Running Shoes", "distance": 67492.9, "resource_state": 2 } ] }';
        return json_decode($json,true);
    }

    public function getAthleteActivities($before, $after, $page, $per_page) {
        
    }

    public function getAthleteBothFollowing() {
        
    }

    public function getAthleteClubs() {
        
    }

    public function getAthleteFollowers() {
        
    }

    public function getAthleteFriends() {
        
    }

    public function getAthleteKom() {
        
    }

    public function getAthleteStarredSegments() {
        
    }

    public function getClub($id) {
        
    }

    public function getClubActivities($id, $page, $per_page) {
        
    }

    public function getClubMembers($id, $page, $per_page) {
        
    }

    public function getGear($id) {
        
    }

    public function getSegment($id) {
        
    }

    public function getSegmentEffort($id, $athlete_id, $start_date_local, $end_date_local, $page, $per_page) {
        
    }

    public function getSegmentExplorer($bounds, $activity_type, $min_cat, $max_cat) {
        
    }

    public function getSegmentLeaderboard($id, $gender, $age_group, $weight_class, $following, $club_id, $date_range, $page, $per_page) {
        
    }

    public function getStreamsActivity($id, $types, $resolution, $series_type) {
        
    }

    public function getStreamsEffort($id, $types, $resolution, $series_type) {
        
    }

    public function getStreamsSegment($id, $types, $resolution, $series_type) {
        $json = '{ "type": "latlng", "data": [ [ 38.603734, -122.864112 ], [ 38.608798, -122.867714 ], [ 38.604691, -122.88178 ], [ 38.611249, -122.890977 ], [ 38.634357, -122.874144 ], [ 38.62268, -122.872756 ], [ 38.611205, -122.870848 ], [ 38.603579, -122.863891 ] ], "series_type": "distance", "original_size": 512, "resolution": "low" }';
        return json_decode($json,true);
        
    }

    public function updateActivity() {
        
    }

    public function updateAthlete() {
        
    }

    public function uploadActivity() {
        
    }

}
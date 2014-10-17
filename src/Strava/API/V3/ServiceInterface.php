<?php
namespace Strava\API\V3;

/**
 * Service interace. 
 * Just to make sure we can trust the method signatures of all the 
 * service classes.
 * 
 * @author: Bas van Dorst
 * @package Strava
 */
interface ServiceInterface {
    public function getAthlete($id = null);
    public function getAthleteClubs();
    public function getAthleteActivities($before = null, $after = null, $page = null, $per_page = null);
    public function getAthleteFriends($id = null, $page = null, $per_page = null);
    public function getAthleteFollowers($id = null, $page = null, $per_page = null);
    public function getAthleteBothFollowing($id, $page = null, $per_page = null);
    public function getAthleteKom($id, $page = null, $per_page = null);
    public function getAthleteStarredSegments($id = null, $page = null, $per_page = null);
    public function updateAthlete($city, $state, $country, $sex, $weight);
    public function getActivity($id, $include_all_efforts = null);
    public function getActivityComments($id, $markdown = null, $page = null, $per_page = null);
    public function getActivityKudos($id, $page = null, $per_page = null);
    public function getActivityPhotos($id);
    public function getActivityZones($id);
    public function getActivityLaps($id);
    public function getActivityUploadStatus($id);
    public function createActivity($name, $type, $start_date_local, $elapsed_time, $description = null, $distance = null);
    public function uploadActivity($file, $activity_type = null, $name = null, $description = null, $private = null, $trainer = null, $data_type = null, $external_id = null);
    public function updateActivity($name = null, $type = null, $private = false, $commute = false, $trainer = false, $gear_id = null, $description = null);
    public function deleteActivity($id);
    public function getGear($id);
    public function getClub($id);
    public function getClubMembers($id, $page = null, $per_page  = null);
    public function getClubActivities($id, $page = null, $per_page  = null);
    public function getSegment($id);
    public function getSegmentLeaderboard($id, $gender = null, $age_group = null, $weight_class = null, $following = null, $club_id = null, $date_range = null, $page = null, $per_page = null);
    public function getSegmentExplorer($bounds, $activity_type = 'riding', $min_cat = null, $max_cat = null);
    public function getSegmentEffort($id, $athlete_id = null, $start_date_local = null, $end_date_local = null, $page = null, $per_page = null);
    public function getStreamsActivity($id, $types, $resolution = 'all', $series_type = 'distance');
    public function getStreamsEffort($id, $types, $resolution = 'all', $series_type = 'distance');
    public function getStreamsSegment($id, $types, $resolution = 'all', $series_type = 'distance');
}
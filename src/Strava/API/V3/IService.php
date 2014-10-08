<?php
namespace Strava\API\V3;

interface IService {
    
    public function getAthlete();
    public function getAthleteActivities($before, $after, $page, $per_page);
    public function getAthleteFriends();
    public function getAthleteFollowers();
    public function getAthleteBothFollowing();
    public function getAthleteKom();
    public function getAthleteStarredSegments();
    public function getAthleteClubs();
    public function updateAthlete();
    
    public function getActivity();
    public function getActivityComments();
    public function getActivityKudos();
    public function getActivityPhotos();
    public function getActivityZones();
    public function getActivityLaps();
    public function getActivityUploadStatus();
    
    public function createActivity();
    public function updateActivity();
    public function uploadActivity();
    public function deleteActivity();
    
    public function getGear($id);
    
    public function getClub($id);
    public function getClubMembers($id, $page, $per_page);
    public function getClubActivities($id, $page, $per_page);
    
    public function getSegment($id);
    public function getSegmentEffort($id, $athlete_id, $start_date_local, $end_date_local, $page, $per_page);
    public function getSegmentLeaderboard($id, $gender, $age_group, $weight_class, $following, $club_id, $date_range, $page, $per_page);
    public function getSegmentExplorer($bounds, $activity_type, $min_cat, $max_cat);

    public function getStreamsActivity($id, $types, $resolution, $series_type);
    public function getStreamsEffort($id, $types, $resolution, $series_type);
    public function getStreamsSegment($id, $types, $resolution, $series_type);
}
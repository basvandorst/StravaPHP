<?php

namespace Strava\API\Service;

use GuzzleHttp\Exception\ClientException;

/**
 * Service interface.
 * Just to make sure we can trust the method signatures of all the
 * service classes.
 *
 * @author Bas van Dorst
 * @package StravaPHP
 */
interface ServiceInterface
{
    /**
     * @param int $id
     */
    public function getAthlete($id = null);

    /**
     * Retrieve athlete stats
     *
     * Only available for the authenticated athlete.
     *
     * @link    https://strava.github.io/api/v3/athlete/#stats
     * @param int $id
     * @return  array
     * @throws  ClientException
     */
    public function getAthleteStats($id);

    /**
     * @param int $id
     * @param string $type
     * @param int $after
     * @param int $page
     * @param int $per_page
     */
    public function getAthleteRoutes($id, $type = null, $after = null, $page = null, $per_page = null);

    public function getAthleteClubs();

    /**
     * @param string $before
     * @param string $after
     * @param int $page
     * @param int $per_page
     */
    public function getAthleteActivities($before = null, $after = null, $page = null, $per_page = null);

    /**
     * @param int $id
     * @param int $page
     * @param int $per_page
     */
    public function getAthleteFriends($id = null, $page = null, $per_page = null);

    /**
     * @param int $id
     * @param int $page
     * @param int $per_page
     */
    public function getAthleteFollowers($id = null, $page = null, $per_page = null);

    /**
     * @param int $id
     * @param int $page
     * @param int $per_page
     */
    public function getAthleteBothFollowing($id, $page = null, $per_page = null);

    /**
     * @param int $id
     * @param int $page
     * @param int $per_page
     */
    public function getAthleteKom($id, $page = null, $per_page = null);

    public function getAthleteZones();

    /**
     * @param int $id
     * @param int $page
     * @param int $per_page
     */
    public function getAthleteStarredSegments($id = null, $page = null, $per_page = null);

    /**
     * @param string $city
     * @param string $state
     * @param string $country
     * @param string $sex
     * @param double $weight
     */
    public function updateAthlete($city, $state, $country, $sex, $weight);

    /**
     * @param int $id
     * @param boolean $include_all_efforts
     */
    public function getActivity($id, $include_all_efforts = null);

    /**
     * @param int $id
     * @param boolean $markdown
     * @param int $page
     * @param int $per_page
     */
    public function getActivityComments($id, $markdown = null, $page = null, $per_page = null);

    /**
     * @param int $id
     * @param int $page
     * @param int $per_page
     */
    public function getActivityKudos($id, $page = null, $per_page = null);

    /**
     * @param int $id
     * @param int $size
     * @param string $photo_sources
     */
    public function getActivityPhotos($id, $size = 2048, $photo_sources = 'true');

    /**
     * @param int $id
     */
    public function getActivityZones($id);

    /**
     * @param int $id
     */
    public function getActivityLaps($id);

    /**
     * @param int $id
     */
    public function getActivityUploadStatus($id);

    /**
     * @param string $name
     * @param string $type
     * @param string $start_date_local
     * @param int $elapsed_time
     * @param string $description
     * @param double $distance
     * @param int $private
     * @param int $trainer
     */
    public function createActivity($name, $type, $start_date_local, $elapsed_time, $description = null, $distance = null, $private = null, $trainer = null);

    /**
     * @param string $file
     * @param string $activity_type
     * @param string $name
     * @param string $description
     * @param int $private
     * @param int $trainer
     * @param int $commute
     * @param string $data_type
     * @param string $external_id
     */
    public function uploadActivity($file, $activity_type = null, $name = null, $description = null, $private = null, $trainer = null, $commute = null, $data_type = null, $external_id = null);

    /**
     * @param int $id
     * @param string $name
     * @param string $type
     * @param bool $private
     * @param bool $commute
     * @param bool $trainer
     * @param string $gear_id
     * @param string $description
     */
    public function updateActivity($id, $name = null, $type = null, $private = false, $commute = false, $trainer = false, $gear_id = null, $description = null);

    /**
     * @param int $id
     */
    public function deleteActivity($id);

    /**
     * @param int $id
     */
    public function getGear($id);

    /**
     * @param int $id
     */
    public function getClub($id);

    /**
     * @param int $id
     * @param int $page
     * @param int $per_page
     */
    public function getClubMembers($id, $page = null, $per_page = null);

    /**
     * @param int $id
     * @param int $page
     * @param int $per_page
     */
    public function getClubActivities($id, $page = null, $per_page = null);

    /**
     * @param int $id
     */
    public function getClubAnnouncements($id);

    /**
     * @param int $id
     */
    public function getClubGroupEvents($id);

    /**
     * @param int $id
     */
    public function joinClub($id);

    /**
     * @param int $id
     */
    public function leaveClub($id);

    /**
     * @param int $id
     */
    public function getRoute($id);

    /**
     * @param $id
     */
    public function getRouteAsGPX($id);

    /**
     * @param $id
     */
    public function getRouteAsTCX($id);

    /**
     * @param int $id
     */
    public function getSegment($id);

    /**
     * @param string $gender
     * @param string $age_group
     * @param string $weight_class
     * @param boolean $following
     * @param int $club_id
     * @param string $date_range
     * @param int $page
     * @param int $per_page
     * @param int $id
     */
    public function getSegmentLeaderboard($id, $gender = null, $age_group = null, $weight_class = null, $following = null, $club_id = null, $date_range = null, $context_entries = null, $page = null, $per_page = null);

    /**
     * @param string $bounds
     * @param int $min_cat
     * @param int $max_cat
     */
    public function getSegmentExplorer($bounds, $activity_type = 'riding', $min_cat = null, $max_cat = null);

    /**
     * @param int $id
     * @param int $athlete_id
     * @param string $start_date_local
     * @param string $end_date_local
     * @param int $page
     * @param int $per_page
     */
    public function getSegmentEffort($id, $athlete_id = null, $start_date_local = null, $end_date_local = null, $page = null, $per_page = null);

    /**
     * @param int $id
     * @param string $types
     */
    public function getStreamsActivity($id, $types, $resolution = null, $series_type = 'distance');

    /**
     * @param int $id
     * @param string $types
     */
    public function getStreamsEffort($id, $types, $resolution = null, $series_type = 'distance');

    /**
     * @param int $id
     * @param string $types
     */
    public function getStreamsSegment($id, $types, $resolution = null, $series_type = 'distance');

    /**
     * @param int $id
     */
    public function getStreamsRoute($id);
}

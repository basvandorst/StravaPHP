<?php

namespace Strava\API\Service;

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
     * @param int|null $id
     */
    public function getAthlete(int $id = null);

    /**
     * Retrieve athlete stats
     *
     * Only available for the authenticated athlete.
     *
     * @link    https://strava.github.io/api/v3/athlete/#stats
     * @param int $id
     * @throws  Exception
     */
    public function getAthleteStats(int $id);

    /**
     * @param int $id
     * @param string|null $type
     * @param int|null $after
     * @param int|null $page
     * @param int|null $per_page
     */
    public function getAthleteRoutes(int $id, string $type = null, int $after = null, int $page = null, int $per_page = null);

    public function getAthleteClubs();

    /**
     * @param string|null $before
     * @param string|null $after
     * @param int|null $page
     * @param int|null $per_page
     */
    public function getAthleteActivities(string $before = null, string $after = null, int $page = null, int $per_page = null);

    /**
     * @param int|null $id
     * @param int|null $page
     * @param int|null $per_page
     */
    public function getAthleteFriends(int $id = null, int $page = null, int $per_page = null);

    /**
     * @param int|null $id
     * @param int|null $page
     * @param int|null $per_page
     */
    public function getAthleteFollowers(int $id = null, int $page = null, int $per_page = null);

    /**
     * @param int $id
     * @param int|null $page
     * @param int|null $per_page
     */
    public function getAthleteBothFollowing(int $id, int $page = null, int $per_page = null);

    /**
     * @param int $id
     * @param int|null $page
     * @param int|null $per_page
     */
    public function getAthleteKom(int $id, int $page = null, int $per_page = null);

    public function getAthleteZones();

    /**
     * @param int|null $id
     * @param int|null $page
     * @param int|null $per_page
     */
    public function getAthleteStarredSegments(int $id = null, int $page = null, int $per_page = null);

    /**
     * @param string $city
     * @param string $state
     * @param string $country
     * @param string $sex
     * @param float $weight
     */
    public function updateAthlete(string $city, string $state, string $country, string $sex, float $weight);

    /**
     * @param int $id
     * @param boolean|null $include_all_efforts
     */
    public function getActivity(int $id, bool $include_all_efforts = null);

    /**
     * @param int $id
     * @param boolean|null $markdown
     * @param int|null $page
     * @param int|null $per_page
     */
    public function getActivityComments(int $id, bool $markdown = null, int $page = null, int $per_page = null);

    /**
     * @param int $id
     * @param int|null $page
     * @param int|null $per_page
     */
    public function getActivityKudos(int $id, int $page = null, int $per_page = null);

    /**
     * @param int $id
     * @param int $size
     * @param string $photo_sources
     */
    public function getActivityPhotos(int $id, int $size = 2048, string $photo_sources = 'true');

    /**
     * @param int $id
     */
    public function getActivityZones(int $id);

    /**
     * @param int $id
     */
    public function getActivityLaps(int $id);

    /**
     * @param int $id
     */
    public function getActivityUploadStatus(int $id);

    /**
     * @param string $name
     * @param string $type
     * @param string $start_date_local
     * @param int $elapsed_time
     * @param string|null $description
     * @param float|null $distance
     * @param int|null $private
     * @param int|null $trainer
     */
    public function createActivity(string $name, string $type, string $start_date_local, int $elapsed_time, string $description = null, float $distance = null, int $private = null, int $trainer = null);

    /**
     * @param string $file
     * @param string|null $activity_type
     * @param string|null $name
     * @param string|null $description
     * @param int|null $private
     * @param int|null $trainer
     * @param int|null $commute
     * @param string|null $data_type
     * @param string|null $external_id
     */
    public function uploadActivity(string $file, string $activity_type = null, string $name = null, string $description = null, int $private = null, int $trainer = null, int $commute = null, string $data_type = null, string $external_id = null);

    /**
     * @param int $id
     * @param string|null $name
     * @param string|null $type
     * @param bool $private
     * @param bool $commute
     * @param bool $trainer
     * @param string|null $gear_id
     * @param string|null $description
     */
    public function updateActivity(int $id, string $name = null, string $type = null, bool $private = false, bool $commute = false, bool $trainer = false, string $gear_id = null, string $description = null);

    /**
     * @param int $id
     */
    public function deleteActivity(int $id);

    /**
     * @param int $id
     */
    public function getGear(int $id);

    /**
     * @param int $id
     */
    public function getClub(int $id);

    /**
     * @param int $id
     * @param int|null $page
     * @param int|null $per_page
     */
    public function getClubMembers(int $id, int $page = null, int $per_page = null);

    /**
     * @param int $id
     * @param int|null $page
     * @param int|null $per_page
     */
    public function getClubActivities(int $id, int $page = null, int $per_page = null);

    /**
     * @param int $id
     */
    public function getClubAnnouncements(int $id);

    /**
     * @param int $id
     */
    public function getClubGroupEvents(int $id);

    /**
     * @param int $id
     */
    public function joinClub(int $id);

    /**
     * @param int $id
     */
    public function leaveClub(int $id);

    /**
     * @param int $id
     */
    public function getRoute(int $id);

    /**
     * @param int $id
     */
    public function getRouteAsGPX(int $id);

    /**
     * @param int $id
     */
    public function getRouteAsTCX(int $id);

    /**
     * @param int $id
     */
    public function getSegment(int $id);

    /**
     * @TODO: is the "segments/ID/leaderboard" endpoint still available?
     *
     * @param int $id
     * @param string|null $gender
     * @param string|null $age_group
     * @param null $weight_class
     * @param null $following
     * @param null $club_id
     * @param null $date_range
     * @param null $context_entries
     * @param null $page
     * @param null $per_page
     */
    public function getSegmentLeaderboard(int $id, string $gender = null, string $age_group = null, $weight_class = null, $following = null, $club_id = null, $date_range = null, $context_entries = null, $page = null, $per_page = null);

    /**
     * @param string $bounds
     * @param string $activity_type
     * @param int|null $min_cat
     * @param int|null $max_cat
     */
    public function getSegmentExplorer(string $bounds, string $activity_type = 'riding', int $min_cat = null, int $max_cat = null);

    /**
     * @param int $id
     * @param int|null $athlete_id
     * @param string|null $start_date_local
     * @param string|null $end_date_local
     * @param int|null $page
     * @param int|null $per_page
     */
    public function getSegmentEffort(int $id, int $athlete_id = null, string $start_date_local = null, string $end_date_local = null, int $page = null, int $per_page = null);

    /**
     * @param int $id
     * @param string $types
     * @param null $resolution
     * @param string $series_type
     */
    public function getStreamsActivity(int $id, string $types, $resolution = null, string $series_type = 'distance');

    /**
     * @param int $id
     * @param string $types
     * @param null $resolution
     * @param string $series_type
     */
    public function getStreamsEffort(int $id, string $types, $resolution = null, string $series_type = 'distance');

    /**
     * @param int $id
     * @param string $types
     * @param null $resolution
     * @param string $series_type
     */
    public function getStreamsSegment(int $id, string $types, $resolution = null, string $series_type = 'distance');

    /**
     * @param int $id
     */
    public function getStreamsRoute(int $id);
}

<?php

namespace Strava\API\Service;

/**
 * Strava stub Service
 *
 * @author Bas van Dorst
 * @package StravaPHP
 */
class Stub implements ServiceInterface
{
    public function getAthlete(int $id = null)
    {
        $json = '{ "id": 227615, "resource_state": 2, "firstname": "John", "lastname": "Applestrava", "profile_medium": "http://pics.com/227615/medium.jpg", "profile": "http://pics.com/227615/large.jpg", "city": "San Francisco", "state": "CA", "country": "United States", "sex": "M", "friend": null, "follower": "accepted", "premium": true, "created_at": "2011-03-19T21:59:57Z", "updated_at": "2013-09-05T16:46:54Z", "approve_followers": false }';
        return $this->format($json);
    }

    public function getAthleteStats(int $id)
    {
        $json = '[ { "biggest_ride_distance": 175454.0, "biggest_climb_elevation_gain": 1882.6999999999998, "recent_ride_totals": { "count": 3, "distance": 12054.900146484375, "moving_time": 2190, "elapsed_time": 2331, "elevation_gain": 36.0, "achievement_count": 0 }, "recent_run_totals": { "count": 23, "distance": 195948.40002441406, "moving_time": 65513, "elapsed_time": 75232, "elevation_gain": 2934.3999996185303, "achievement_count": 46 }, "recent_swim_totals": { "count": 2, "distance": 1117.2000122070312, "moving_time": 1744, "elapsed_time": 1942, "elevation_gain": 0.0, "achievement_count": 0 }, "ytd_ride_totals": { "count": 134, "distance": 4927252, "moving_time": 659982, "elapsed_time": 892644, "elevation_gain": 49940 }, "ytd_run_totals": { "count": 111, "distance": 917100, "moving_time": 272501, "elapsed_time": 328059, "elevation_gain": 7558 }, "ytd_swim_totals": { "count": 8, "distance": 10372, "moving_time": 8784, "elapsed_time": 11123, "elevation_gain": 0 }, "all_ride_totals": { "count": 375, "distance": 15760015, "moving_time": 2155741, "elapsed_time": 2684286, "elevation_gain": 189238 }, "all_run_totals": { "count": 272, "distance": 2269557, "moving_time": 673678, "elapsed_time": 812095, "elevation_gain": 23780 }, "all_swim_totals": { "count": 8, "distance": 10372, "moving_time": 8784, "elapsed_time": 11123, "elevation_gain": 0} } ]';
        return $this->format($json);
    }

    public function getAthleteRoutes(int $id, string $type = null, int $after = null, int $page = null, int $per_page = null)
    {
        $json = '[{"athlete":{"id":19,"resource_state":2},"id":743064,"resource_state":2,"description":"","distance":17781.6,"elevation_gain":207.8}]';
        return $this->format($json);
    }

    public function getAthleteClubs()
    {
        $json = '[ { "id": 1, "resource_state": 2, "name": "Team Strava Cycling", "profile_medium": "http://pics.com/clubs/1/medium.jpg", "profile": "http://pics.com/clubs/1/large.jpg" } ]';
        return $this->format($json);
    }

    public function getAthleteActivities(string $before = null, string $after = null, int $page = null, int $per_page = null)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getAthleteFriends(int $id = null, int $page = null, int $per_page = null)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getAthleteFollowers(int $id = null, int $page = null, int $per_page = null)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getAthleteBothFollowing(int $id, int $page = null, int $per_page = null)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getAthleteKom(int $id, int $page = null, int $per_page = null)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getAthleteZones()
    {
        $json = '{"heart_rate":{"custom_zones":false,"zones":[{"min":0,"max":115},{"min":115,"max":152},{"min":152,"max":171},{"min":171,"max":190},{"min":190,"max":-1}]},"power":{"zones":[{"min":0,"max":180},{"min":181,"max":246},{"min":247,"max":295},{"min":296,"max":344},{"min":345,"max":393},{"min":394,"max":492},{"min":493,"max":-1}]}}';
        return $this->format($json);
    }

    public function getAthleteStarredSegments(int $id = null, int $page = null, int $per_page = null)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function updateAthlete(string $city, string $state, string $country, string $sex, float $weight)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getActivityFollowing($before = null, $page = null, $per_page = null)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getActivity(int $id, bool $include_all_efforts = null)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getActivityComments(int $id, bool $markdown = null, int $page = null, int $per_page = null)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getActivityKudos(int $id, int $page = null, int $per_page = null)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getActivityPhotos(int $id, int $size = 2048, string $photo_sources = 'true')
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getActivityZones(int $id)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getActivityLaps(int $id)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getActivityUploadStatus(int $id)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function createActivity(string $name, string $type, string $start_date_local, int $elapsed_time, string $description = null, float $distance = null, int $private = null, int $trainer = null)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function uploadActivity(string $file, string $activity_type = null, string $name = null, string $description = null, int $private = null, int $trainer = null, int $commute = null, string $data_type = null, string $external_id = null)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function updateActivity(int $id, string $name = null, string $type = null, bool $private = false, bool $commute = false, bool $trainer = false, string $gear_id = null, string $description = null)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function deleteActivity(int $id)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getGear(int $id)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getClub(int $id)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getClubMembers(int $id, int $page = null, int $per_page = null)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getClubActivities(int $id, int $page = null, int $per_page = null)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getClubAnnouncements(int $id)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getClubGroupEvents(int $id)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function joinClub(int $id)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function leaveClub(int $id)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getRoute(int $id)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getRouteAsGPX(int $id)
    {
        $gpx = '<?xml version="1.0" encoding="UTF-8"?><gpx creator="StravaGPX"/>';
        return $gpx;
    }

    public function getRouteAsTCX(int $id)
    {
        $tcx = '<?xml version="1.0" encoding="UTF-8"?><TrainingCenterDatabase/>';
        return $tcx;
    }

    public function getSegment(int $id)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getSegmentLeaderboard(int $id, string $gender = null, string $age_group = null, $weight_class = null, $following = null, $club_id = null, $date_range = null, $context_entries = null, $page = null, $per_page = null)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getSegmentExplorer(string $bounds, string $activity_type = 'riding', int $min_cat = null, int $max_cat = null)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getSegmentEffort(int $id, int $athlete_id = null, string $start_date_local = null, string $end_date_local = null, int $page = null, int $per_page = null)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getStreamsActivity(int $id, string $types, $resolution = null, string $series_type = 'distance')
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getStreamsEffort(int $id, string $types, $resolution = null, string $series_type = 'distance')
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getStreamsSegment(int $id, string $types, $resolution = null, string $series_type = 'distance')
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getStreamsRoute(int $id)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    /**
     * @param string $result
     */
    private function format($result)
    {
        return json_decode($result, true);
    }
}

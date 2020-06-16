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
    public function getAthlete($id = null)
    {
        $json = '{ "id": 227615, "resource_state": 2, "firstname": "John", "lastname": "Applestrava", "profile_medium": "http://pics.com/227615/medium.jpg", "profile": "http://pics.com/227615/large.jpg", "city": "San Francisco", "state": "CA", "country": "United States", "sex": "M", "friend": null, "follower": "accepted", "premium": true, "created_at": "2011-03-19T21:59:57Z", "updated_at": "2013-09-05T16:46:54Z", "approve_followers": false }';
        return $this->format($json);
    }

    public function getAthleteStats($id)
    {
        $json = '[ { "biggest_ride_distance": 175454.0, "biggest_climb_elevation_gain": 1882.6999999999998, "recent_ride_totals": { "count": 3, "distance": 12054.900146484375, "moving_time": 2190, "elapsed_time": 2331, "elevation_gain": 36.0, "achievement_count": 0 }, "recent_run_totals": { "count": 23, "distance": 195948.40002441406, "moving_time": 65513, "elapsed_time": 75232, "elevation_gain": 2934.3999996185303, "achievement_count": 46 }, "recent_swim_totals": { "count": 2, "distance": 1117.2000122070312, "moving_time": 1744, "elapsed_time": 1942, "elevation_gain": 0.0, "achievement_count": 0 }, "ytd_ride_totals": { "count": 134, "distance": 4927252, "moving_time": 659982, "elapsed_time": 892644, "elevation_gain": 49940 }, "ytd_run_totals": { "count": 111, "distance": 917100, "moving_time": 272501, "elapsed_time": 328059, "elevation_gain": 7558 }, "ytd_swim_totals": { "count": 8, "distance": 10372, "moving_time": 8784, "elapsed_time": 11123, "elevation_gain": 0 }, "all_ride_totals": { "count": 375, "distance": 15760015, "moving_time": 2155741, "elapsed_time": 2684286, "elevation_gain": 189238 }, "all_run_totals": { "count": 272, "distance": 2269557, "moving_time": 673678, "elapsed_time": 812095, "elevation_gain": 23780 }, "all_swim_totals": { "count": 8, "distance": 10372, "moving_time": 8784, "elapsed_time": 11123, "elevation_gain": 0} } ]';
        return $this->format($json);
    }

    public function getAthleteRoutes($id, $type = null, $after = null, $page = null, $per_page = null)
    {
        $json = '[{"athlete":{"id":19,"resource_state":2},"id":743064,"resource_state":2,"description":"","distance":17781.6,"elevation_gain":207.8}]';
        return $this->format($json);
    }

    public function getAthleteClubs()
    {
        $json = '[ { "id": 1, "resource_state": 2, "name": "Team Strava Cycling", "profile_medium": "http://pics.com/clubs/1/medium.jpg", "profile": "http://pics.com/clubs/1/large.jpg" } ]';
        return $this->format($json);
    }

    public function getAthleteActivities($before = null, $after = null, $page = null, $per_page = null)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getAthleteFriends($id = null, $page = null, $per_page = null)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getAthleteFollowers($id = null, $page = null, $per_page = null)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getAthleteBothFollowing($id, $page = null, $per_page = null)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getAthleteKom($id, $page = null, $per_page = null)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getAthleteZones()
    {
        $json = '{"heart_rate":{"custom_zones":false,"zones":[{"min":0,"max":115},{"min":115,"max":152},{"min":152,"max":171},{"min":171,"max":190},{"min":190,"max":-1}]},"power":{"zones":[{"min":0,"max":180},{"min":181,"max":246},{"min":247,"max":295},{"min":296,"max":344},{"min":345,"max":393},{"min":394,"max":492},{"min":493,"max":-1}]}}';
        return $this->format($json);
    }

    public function getAthleteStarredSegments($id = null, $page = null, $per_page = null)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function updateAthlete($city, $state, $country, $sex, $weight)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getActivityFollowing($before = null, $page = null, $per_page = null)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getActivity($id, $include_all_efforts = null)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getActivityComments($id, $markdown = null, $page = null, $per_page = null)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getActivityKudos($id, $page = null, $per_page = null)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getActivityPhotos($id, $size = 2048, $photo_sources = 'true')
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getActivityZones($id)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getActivityLaps($id)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getActivityUploadStatus($id)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function createActivity($name, $type, $start_date_local, $elapsed_time, $description = null, $distance = null, $private = null, $trainer = null)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function uploadActivity($file, $activity_type = null, $name = null, $description = null, $private = null, $trainer = null, $commute = null, $data_type = null, $external_id = null)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function updateActivity($id, $name = null, $type = null, $private = false, $commute = false, $trainer = false, $gear_id = null, $description = null)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function deleteActivity($id)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getGear($id)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getClub($id)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getClubMembers($id, $page = null, $per_page = null)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getClubActivities($id, $page = null, $per_page = null)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getClubAnnouncements($id)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getClubGroupEvents($id)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function joinClub($id)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function leaveClub($id)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getRoute($id)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getSegment($id)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getSegmentLeaderboard($id, $gender = null, $age_group = null, $weight_class = null, $following = null, $club_id = null, $date_range = null, $context_entries = null, $page = null, $per_page = null)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getSegmentExplorer($bounds, $activity_type = 'riding', $min_cat = null, $max_cat = null)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getSegmentEffort($id, $athlete_id = null, $start_date_local = null, $end_date_local = null, $page = null, $per_page = null)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getStreamsActivity($id, $types, $resolution = null, $series_type = 'distance')
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getStreamsEffort($id, $types, $resolution = null, $series_type = 'distance')
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getStreamsSegment($id, $types, $resolution = null, $series_type = 'distance')
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    public function getStreamsRoute($id)
    {
        $json = '{"response": 1}';
        return $this->format($json);
    }

    /**
     * @param string $result
     * @return mixed
     */
    private function format($result)
    {
        return json_decode($result, true);
    }
}

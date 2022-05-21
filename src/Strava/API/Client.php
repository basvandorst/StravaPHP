<?php

namespace Strava\API;

use Strava\API\Service\ServiceInterface;
use Strava\API\Exception as ClientException;
use Strava\API\Service\Exception as ServiceException;

/**
 * Strava API Client
 *
 * @author Bas van Dorst
 * @package StravaPHP
 */
class Client
{
    /**
     * @var ServiceInterface
     */
    protected ServiceInterface $service;

    /**
     * Initiate this class with a subclass of ServiceInterface. There are two
     * service subclasses available:
     * - Service\REST: Service which makes calls to the live Strava API
     * - Service\Stub: Service stub for test purposes (unit tests)
     *
     */
    public function __construct(ServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * Retrieve current athlete
     *
     * @link    https://strava.github.io/api/v3/athlete/#get-details,
     *          https://strava.github.io/api/v3/athlete/#get-another-details
     * @param ?int $id
     * @return  array
     * @throws  Exception
     */
    public function getAthlete(int $id = null): array
    {
        try {
            return $this->service->getAthlete($id);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

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
    public function getAthleteStats(int $id): array
    {
        try {
            return $this->service->getAthleteStats($id);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

    /**
     * Retrieve athlete routes
     *
     * @link    https://strava.github.io/api/v3/routes/#list
     * @param int $id
     * @param string|null $type
     * @param int|null $after
     * @param int|null $page
     * @param int|null $per_page
     * @return  array
     * @throws Exception
     */
    public function getAthleteRoutes(int $id, string $type = null, int $after = null, int $page = null, int $per_page = null): array
    {
        try {
            return $this->service->getAthleteRoutes($id, $type, $after, $page, $per_page);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

    /**
     * List athlete clubs
     *
     * @link    https://strava.github.io/api/v3/clubs/#get-athletes
     * @return  array
     * @throws  Exception
     */
    public function getAthleteClubs(): array
    {
        try {
            return $this->service->getAthleteClubs();
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

    /**
     * List athlete activities
     *
     * @link    https://strava.github.io/api/v3/activities/#get-activities
     * @param string|null $before
     * @param string|null $after
     * @param int|null $page
     * @param int|null $per_page
     * @return  array
     * @throws  Exception
     */
    public function getAthleteActivities(string $before = null, string $after = null, int $page = null, int $per_page = null): array
    {
        try {
            return $this->service->getAthleteActivities($before, $after, $page, $per_page);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

    /**
     * List athlete friends
     *
     * @link    https://strava.github.io/api/v3/follow/#friends
     * @param int|null $id
     * @param int|null $page
     * @param int|null $per_page
     * @return  array
     * @throws  Exception
     */
    public function getAthleteFriends(int $id = null, int $page = null, int $per_page = null): array
    {
        try {
            return $this->service->getAthleteFriends($id, $page, $per_page);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

    /**
     * List athlete followers
     *
     * @link    https://strava.github.io/api/v3/follow/#followers
     * @param int|null $id
     * @param int|null $page
     * @param int|null $per_page
     * @return  array
     * @throws  Exception
     */
    public function getAthleteFollowers(int $id = null, int $page = null, int $per_page = null): array
    {
        try {
            return $this->service->getAthleteFollowers($id, $page, $per_page);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

    /**
     * List both following
     *
     * @link    https://strava.github.io/api/v3/follow/#both
     * @param int $id
     * @param int|null $page
     * @param int|null $per_page
     * @return  array
     * @throws  Exception
     */
    public function getAthleteBothFollowing($id, int $page = null, int $per_page = null): array
    {
        try {
            return $this->service->getAthleteBothFollowing($id, $page, $per_page);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

    /**
     * List athlete K/QOMs/CRs
     *
     * @link    https://strava.github.io/api/v3/athlete/#koms
     * @param int $id
     * @param int|null $page
     * @param int|null $per_page
     * @return  array
     * @throws  Exception
     */
    public function getAthleteKom(int $id, int $page = null, int $per_page = null): array
    {
        try {
            return $this->service->getAthleteKom($id, $page, $per_page);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

    /**
     * List athlete zones
     *
     * @link    https://strava.github.io/api/v3/athlete/#zones
     * @return  array
     * @throws  Exception
     */
    public function getAthleteZones(): array
    {
        try {
            return $this->service->getAthleteZones();
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }


    /**
     * List starred segment
     *
     * @link    https://strava.github.io/api/v3/segments/#starred
     * @param int|null $id
     * @param int|null $page
     * @param int|null $per_page
     * @return  array
     * @throws  Exception
     */
    public function getAthleteStarredSegments(int $id = null, int $page = null, int $per_page = null): array
    {
        try {
            return $this->service->getAthleteStarredSegments($id, $page, $per_page);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

    /**
     * Update current athlete
     *
     * @link    https://strava.github.io/api/v3/athlete/#update
     * @param string $city
     * @param string $state
     * @param string $country
     * @param string $sex
     * @param float $weight
     * @return  array
     * @throws  Exception
     */
    public function updateAthlete(string $city, string $state, string $country, string $sex, float $weight): array
    {
        try {
            return $this->service->updateAthlete($city, $state, $country, $sex, $weight);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

    /**
     * Retrieve an activity
     *
     * @link    https://strava.github.io/api/v3/athlete/#get-details,
     *          https://strava.github.io/api/v3/athlete/#get-another-details
     * @param int $id
     * @param boolean|null $include_all_efforts
     * @return  array
     * @throws  Exception
     */
    public function getActivity(int $id, bool $include_all_efforts = null): array
    {
        try {
            return $this->service->getActivity($id, $include_all_efforts);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

    /**
     * List activity comments
     *
     * @link    https://strava.github.io/api/v3/comments/#list
     * @param int $id
     * @param boolean|null $markdown
     * @param int|null $page
     * @param int|null $per_page
     * @return  array
     * @throws  Exception
     */
    public function getActivityComments(int $id, bool $markdown = null, int $page = null, int $per_page = null): array
    {
        try {
            return $this->service->getActivityComments($id, $markdown, $page, $per_page);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

    /**
     * List activity kudoers
     *
     * @link    https://strava.github.io/api/v3/kudos/#list
     * @param int $id
     * @param int|null $page
     * @param int|null $per_page
     * @return  array
     * @throws  Exception
     */
    public function getActivityKudos(int $id, int $page = null, int $per_page = null): array
    {
        try {
            return $this->service->getActivityKudos($id, $page, $per_page);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

    /**
     * List activity photos
     *
     * @link    https://strava.github.io/api/v3/photos/#list
     * @param int $id
     * @param int $size In pixels.
     * @param string $photo_sources Must be "true".
     * @return  array
     * @throws  Exception
     */
    public function getActivityPhotos(int $id, int $size = 2048, string $photo_sources = 'true'): array
    {
        try {
            return $this->service->getActivityPhotos($id, $size, $photo_sources);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

    /**
     * List activity zones
     *
     * @link    https://strava.github.io/api/v3/activities/#zones
     * @param int $id
     * @return  array
     * @throws  Exception
     */
    public function getActivityZones(int $id): array
    {
        try {
            return $this->service->getActivityZones($id);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

    /**
     * List activity laps
     *
     * @link    https://strava.github.io/api/v3/activities/#laps
     * @param int $id
     * @return  array
     * @throws  Exception
     */
    public function getActivityLaps(int $id): array
    {
        try {
            return $this->service->getActivityLaps($id);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

    /**
     * Check upload status
     *
     * @link    https://strava.github.io/api/v3/uploads/#get-status
     * @param int $id
     * @return  array
     * @throws  Exception
     */
    public function getActivityUploadStatus(int $id): array
    {
        try {
            return $this->service->getActivityUploadStatus($id);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

    /**
     * Create an activity
     *
     * @link    https://strava.github.io/api/v3/activities/#create
     * @param string $name
     * @param string $type
     * @param string $start_date_local
     * @param int $elapsed_time
     * @param string|null $description
     * @param float|null $distance
     * @param int|null $private
     * @param int|null $trainer
     * @return  array
     * @throws  Exception
     */
    public function createActivity(string $name, string $type, string $start_date_local, int $elapsed_time, string $description = null, float $distance = null, int $private = null, int $trainer = null): array
    {
        try {
            return $this->service->createActivity($name, $type, $start_date_local, $elapsed_time, $description, $distance, $private, $trainer);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

    /**
     * Upload an activity
     *
     * @link    https://strava.github.io/api/v3/uploads/#post-file
     * @param $file
     * @param string|null $activity_type
     * @param string|null $name
     * @param string|null $description
     * @param int|null $private
     * @param int|null $trainer
     * @param int|null $commute
     * @param string|null $data_type
     * @param string|null $external_id
     * @return  array
     * @throws Exception
     */
    public function uploadActivity($file, string $activity_type = null, string $name = null, string $description = null, int $private = null, int $trainer = null, int $commute = null, string $data_type = null, string $external_id = null): array
    {
        try {
            return $this->service->uploadActivity($file, $activity_type, $name, $description, $private, $trainer, $commute, $data_type, $external_id);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

    /**
     * Update an activity
     *
     * @link    https://strava.github.io/api/v3/activities/#put-updates
     * @param int $id
     * @param string|null $name
     * @param string|null $type
     * @param boolean $private
     * @param boolean $commute
     * @param boolean $trainer
     * @param string|null $gear_id
     * @param string|null $description
     * @return  array
     * @throws  Exception
     */
    public function updateActivity(int $id, string $name = null, string $type = null, bool $private = false, bool $commute = false, bool $trainer = false, string $gear_id = null, string $description = null): array
    {
        try {
            return $this->service->updateActivity($id, $name, $type, $private, $commute, $trainer, $gear_id, $description);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

    /**
     * Delete an activity
     *
     * @link    https://strava.github.io/api/v3/activities/#delete
     * @param int $id
     * @return  array
     * @throws  Exception
     */
    public function deleteActivity(int $id): array
    {
        try {
            return $this->service->deleteActivity($id);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

    /**
     * Retrieve gear
     *
     * @link    https://strava.github.io/api/v3/gear/
     * @param int $id
     * @return  array
     * @throws  Exception
     */
    public function getGear(int $id): array
    {
        try {
            return $this->service->getGear($id);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

    /**
     * Retrieve a club
     *
     * @link    https://strava.github.io/api/v3/clubs/#get-details
     * @param int $id
     * @return  array
     * @throws  Exception
     */
    public function getClub(int $id): array
    {
        try {
            return $this->service->getClub($id);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

    /**
     * List club members
     *
     * @link    https://strava.github.io/api/v3/clubs/#get-members
     * @param int $id
     * @param int|null $page
     * @param int|null $per_page
     * @return  array
     * @throws  Exception
     */
    public function getClubMembers(int $id, int $page = null, int $per_page = null): array
    {
        try {
            return $this->service->getClubMembers($id, $page, $per_page);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

    /**
     * List club activities
     *
     * @link    https://strava.github.io/api/v3/clubs/#get-activities
     * @param int $id
     * @param int|null $page
     * @param int|null $per_page
     * @return  array
     * @throws  Exception
     */
    public function getClubActivities(int $id, int $page = null, int $per_page = null): array
    {
        try {
            return $this->service->getClubActivities($id, $page, $per_page);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

    /**
     * List club announcements
     *
     * @link    https://strava.github.io/api/v3/clubs/#get-announcements
     * @param int $id
     * @return  array
     * @throws  Exception
     */
    public function getClubAnnouncements(int $id): array
    {
        try {
            return $this->service->getClubAnnouncements($id);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

    /**
     * List club group events
     *
     * @link    https://strava.github.io/api/v3/clubs/#get-group-events
     * @param int $id
     * @return  array
     * @throws  Exception
     */
    public function getClubGroupEvents(int $id): array
    {
        try {
            return $this->service->getClubGroupEvents($id);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

    /**
     * Join a club
     *
     * @link    https://strava.github.io/api/v3/clubs/#join
     * @param int $id
     * @return  array
     * @throws  Exception
     */
    public function joinClub(int $id): array
    {
        try {
            return $this->service->joinClub($id);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

    /**
     * Leave a club
     *
     * @link    https://strava.github.io/api/v3/clubs/#leave
     * @param int $id
     * @return  array
     * @throws  Exception
     */
    public function leaveClub(int $id): array
    {
        try {
            return $this->service->leaveClub($id);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

    /**
     * Get route details
     *
     * @link    https://strava.github.io/api/v3/routes/#list
     * @param int $id
     * @return  array
     * @throws  Exception
     */
    public function getRoute(int $id): array
    {
        try {
            return $this->service->getRoute($id);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

    /**
     * Get route as GPX.
     *
     * @link    https://developers.strava.com/docs/reference/#api-Routes-getRouteAsGPX
     * @param int $id
     * @return  string
     * @throws  Exception
     */
    public function getRouteAsGPX(int $id): string
    {
        try {
            return $this->service->getRouteAsGPX($id);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

    /**
     * Get route as TCX.
     *
     * @link    https://developers.strava.com/docs/reference/#api-Routes-getRouteAsTCX
     * @param int $id
     * @return  string
     * @throws  Exception
     */
    public function getRouteAsTCX(int $id): string
    {
        try {
            return $this->service->getRouteAsTCX($id);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

    /**
     * Retrieve a segment
     *
     * @link    https://strava.github.io/api/v3/segments/#retrieve
     * @param int $id
     * @return  array
     * @throws  Exception
     */
    public function getSegment(int $id): array
    {
        try {
            return $this->service->getSegment($id);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

    /**
     * Segment leaderboards
     *
     * @link    https://strava.github.io/api/v3/segments/#leaderboard
     * @param int $id
     * @param string|null $gender
     * @param string|null $age_group
     * @param string|null $weight_class
     * @param boolean|null $following
     * @param int|null $club_id
     * @param string|null $date_range
     * @param int|null $context_entries
     * @param int|null $page
     * @param int|null $per_page
     * @return  array
     * @throws  Exception
     */
    public function getSegmentLeaderboard(int $id, string $gender = null, string $age_group = null, string $weight_class = null, bool $following = null, int $club_id = null, string $date_range = null, int $context_entries = null, int $page = null, int $per_page = null): array
    {
        try {
            return $this->service->getSegmentLeaderboard($id, $gender, $age_group, $weight_class, $following, $club_id, $date_range, $context_entries, $page, $per_page);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

    /**
     * Segment explorer
     *
     * @link    https://strava.github.io/api/v3/segments/#explore
     * @param string $bounds
     * @param string $activity_type
     * @param int|null $min_cat
     * @param int|null $max_cat
     * @return  array
     * @throws  Exception
     */
    public function getSegmentExplorer(string $bounds, string $activity_type = 'riding', int $min_cat = null, int $max_cat = null): array
    {
        try {
            return $this->service->getSegmentExplorer($bounds, $activity_type, $min_cat, $max_cat);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

    /**
     * List efforts filtered by athlete and/or a date range
     *
     * @link    https://strava.github.io/api/v3/segments/#efforts
     * @param int $id
     * @param int|null $athlete_id
     * @param string|null $start_date_local
     * @param string|null $end_date_local
     * @param int|null $page
     * @param int|null $per_page
     * @return  array
     * @throws  Exception
     */
    public function getSegmentEffort(int $id, int $athlete_id = null, string $start_date_local = null, string $end_date_local = null, int $page = null, int $per_page = null): array
    {
        try {
            return $this->service->getSegmentEffort($id, $athlete_id, $start_date_local, $end_date_local, $page, $per_page);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

    /**
     * Retrieve activity streams
     *
     * @link    https://strava.github.io/api/v3/streams/#activity
     * @param int $id
     * @param string $types
     * @param string|null $resolution
     * @param string $series_type
     * @return  array
     * @throws  Exception
     */
    public function getStreamsActivity(int $id, string $types, string $resolution = null, string $series_type = 'distance'): array
    {
        try {
            return $this->service->getStreamsActivity($id, $types, $resolution, $series_type);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

    /**
     * Retrieve effort streams
     *
     * @link    https://strava.github.io/api/v3/streams/#effort
     * @param int $id
     * @param string $types
     * @param ?string $resolution
     * @param string $series_type
     * @return  array
     * @throws  Exception
     */
    public function getStreamsEffort(int $id, string $types, string $resolution = null, string $series_type = 'distance'): array
    {
        try {
            return $this->service->getStreamsEffort($id, $types, $resolution, $series_type);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

    /**
     * Retrieve segment streams
     * @link    https://strava.github.io/api/v3/streams/#segment
     * @param int $id
     * @param string $types
     * @param ?string $resolution
     * @param string $series_type
     * @return  array
     * @throws  Exception
     */
    public function getStreamsSegment(int $id, string $types, string $resolution = null, string $series_type = 'distance'): array
    {
        try {
            return $this->service->getStreamsSegment($id, $types, $resolution, $series_type);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

    /**
     * Retrieve route streams
     *
     * @link    https://strava.github.io/api/v3/streams/#routes
     * @param int $id
     * @return  array
     * @throws  Exception
     */
    public function getStreamsRoute(int $id): array
    {
        try {
            return $this->service->getStreamsRoute($id);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }
}

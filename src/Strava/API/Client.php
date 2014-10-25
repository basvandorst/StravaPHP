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
class Client {

    /**
     * Exception prefix
     */
    const ERROR_VALIDATION = '[VALIDATION] ',
          ERROR_SERVICE = '[SERVICE] ',
          ERROR_UNKNOWN = '[UNKOWN] ';
    
    /**
     * @var ServiceInterface $service
     */
    protected $service;
    
    /**
     * Initiate this class with a subclass of the IService interface. In 
     * the V3 package there are two service subclasses available:
     * - Service\REST: Service which makes calls to the live Strava API 
     * - Service\Stub: Service stub for test purposes (unit tests)
     * 
     * @param ServiceInterface $service
     */
    public function __construct(ServiceInterface $service) {
        $this->service = $service;
    }

    /**
     * Retrieve current athlete
     * 
     * @param id $id
     * @return array
     * @throws Exception
     */
    public function getAthlete($id = null) {
        try {
            return $this->service->getAthlete($id);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] '.$e->getMessage());
        }
    }
    
    /**
     * List athlete clubs
     * 
     * @return array
     * @throws Exception
     */
    public function getAthleteClubs() {
        try {
            return $this->service->getAthleteClubs();
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] '.$e->getMessage());
        }
    }
    
    /**
     * List athlete activities
     * 
     * @param string $before
     * @param string $after
     * @param int $page
     * @param int $per_page
     * @return array
     * @throws Exception
     */
    public function getAthleteActivities($before = null, $after = null, $page = null, $per_page = null) {
        try {
            return $this->service->getAthleteActivities($before, $after, $page, $per_page);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] '.$e->getMessage());
        }
    }
    
    /**
     * List athlete friends
     * 
     * @param int $id
     * @param int $page
     * @param int $per_page
     * @return array
     * @throws Exception
     */
    public function getAthleteFriends($id = null, $page = null, $per_page = null) {
        try {
            return $this->service->getAthleteFriends($id, $page, $per_page);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] '.$e->getMessage());
        }
    }
    
    /**
     * List athlete followers
     * 
     * @param int $id
     * @param int $page
     * @param int $per_page
     * @return array
     * @throws Exception
     */
    public function getAthleteFollowers($id = null, $page = null, $per_page = null) {
        try {
            return $this->service->getAthleteFollowers($id, $page, $per_page);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] '.$e->getMessage());
        }
    }
    
    /**
     * List both following
     * 
     * @param int $id
     * @param int $page
     * @param int $per_page
     * @return type
     * @throws Exception
     */
    public function getAthleteBothFollowing($id, $page = null, $per_page = null) {
        try {
            return $this->service->getAthleteBothFollowing($id, $page, $per_page);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] '.$e->getMessage());
        }
    }
    
    /**
     * List athlete K/QOMs/CRs
     * 
     * @param int $id
     * @param int $page
     * @param int $per_page
     * @return array
     * @throws Exception
     */
    public function getAthleteKom($id, $page = null, $per_page = null) {
        try {
            return $this->service->getAthleteKom($id, $page, $per_page);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] '.$e->getMessage());
        }
    }
    
    /**
     * List starred segment
     * 
     * @param int $id
     * @param int $page
     * @param int $per_page
     * @return array
     * @throws Exception
     */
    public function getAthleteStarredSegments($id = null, $page = null, $per_page = null) {
        try {
            return $this->service->getAthleteStarredSegments($id, $page, $per_page);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] '.$e->getMessage());
        }
    }
    
    /**
     * Update current athlete
     * 
     * @param string $city
     * @param string $state
     * @param string $country
     * @param string $sex
     * @param float $weight
     * @return array
     * @throws Exception
     */
    public function updateAthlete($city, $state, $country, $sex, $weight){
        try {
            return $this->service->updateAthlete($city, $state, $country, $sex, $weight);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] '.$e->getMessage());
        }
    }
    
    /**
     * Retrieve an activity
     * 
     * @param int $id
     * @param boolean $include_all_efforts
     * @return array
     * @throws Exception
     */
    public function getActivity($id, $include_all_efforts = null) {
        try {
            return $this->service->getActivity($id, $include_all_efforts);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] '.$e->getMessage());
        }
    }
    
    /**
     * List activity comments
     * 
     * @param int $id
     * @param boolean $markdown
     * @param int $page
     * @param int $per_page
     * @return array
     * @throws Exception
     */
    public function getActivityComments($id, $markdown = null, $page = null, $per_page = null) {
        try {
            return $this->service->getActivityComments($id, $markdown, $page, $per_page);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] '.$e->getMessage());
        }
    }
    
    /**
     * List activity kudoers
     * 
     * @param int $id
     * @param int $page
     * @param int $per_page
     * @return array
     * @throws Exception
     */
    public function getActivityKudos($id, $page = null, $per_page = null) {
        try {
            return $this->service->getActivityKudos($id, $page, $per_page);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] '.$e->getMessage());
        }
    }
    
    /**
     * List activity photos
     * 
     * @param int $id
     * @return array
     * @throws Exception
     */
    public function getActivityPhotos($id) {
        try {
            return $this->service->getActivityPhotos($id);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] '.$e->getMessage());
        }
    }
    
    /**
     * List activity zones
     * 
     * @param int $id
     * @return array
     * @throws Exception
     */
    public function getActivityZones($id) {
        try {
            return $this->service->getActivityZones($id);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] '.$e->getMessage());
        }
    }
    
    /**
     * List activity laps
     * 
     * @param int $id
     * @return array
     * @throws Exception
     */
    public function getActivityLaps($id) {
        try {
            return $this->service->getActivityLaps($id);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] '.$e->getMessage());
        }
    }
    
    /**
     * Check upload status
     * 
     * @param int $id
     * @return array
     * @throws Exception
     */
    public function getActivityUploadStatus($id) {
        try {
            return $this->service->getActivityUploadStatus($id);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] '.$e->getMessage());
        }
    }
    
    /**
     * Create an activity
     * 
     * @param string $name
     * @param string $type
     * @param string $start_date_local
     * @param int $elapsed_time
     * @param string $description
     * @param float $distance
     * @return type
     * @throws Exception
     */
    public function createActivity($name, $type, $start_date_local, $elapsed_time, $description = null, $distance = null) {
        try {
            return $this->service->createActivity($name, $type, $start_date_local, $elapsed_time, $description, $distance);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] '.$e->getMessage());
        }
    }
    
    /**
     * Upload an activity
     * 
     * @param mixed $file
     * @param string $activity_type
     * @param string $name
     * @param string $description
     * @param int $private
     * @param int $trainer
     * @param string $data_type
     * @param string $external_id
     * @return type
     * @throws Exception
     */
    public function uploadActivity($file, $activity_type = null, $name = null, $description = null, $private = null, $trainer = null, $data_type = null, $external_id = null) { 
        try {
            return $this->service->uploadActivity($file, $activity_type, $name, $description, $private, $trainer, $data_type, $external_id);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] '.$e->getMessage());
        }
    }
    
    /**
     * Update an activity
     * 
     * @param string $name
     * @param string $type
     * @param boolean $private
     * @param boolean $commute
     * @param boolean $trainer
     * @param string $gear_id
     * @param string $description
     * @return type
     * @throws Exception
     */
    public function updateActivity($name = null, $type = null, $private = false, $commute = false, $trainer = false, $gear_id = null, $description = null) {
        try {
            return $this->service->updateActivity($name, $type, $private, $commute, $trainer, $gear_id, $description);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] '.$e->getMessage());
        }
    }
    
    /**
     * Delete an activity
     * 
     * @param int $id
     * @return array
     * @throws Exception
     */
    public function deleteActivity($id) {
        try {
            return $this->service->deleteActivity($id);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] '.$e->getMessage());
        }
    }
    
    
    /**
     * Retrieve gear
     * 
     * @param int $id
     * @return array
     * @throws Exception
     */
    public function getGear($id) {
        try {
            return $this->service->getGear($id);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] '.$e->getMessage());
        }
    }

    /**
     * Retrieve a club
     * 
     * @param int $id
     * @return array
     * @throws Exception
     */
    public function getClub($id) {
        try {
            return $this->service->getClub($id);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] '.$e->getMessage());
        }
    }
    
    /**
     * List club members
     * 
     * @param int $id
     * @param int $page
     * @param int $per_page
     * @return array
     * @throws Exception
     */
    public function getClubMembers($id, $page = null, $per_page  = null) {
        try {
            return $this->service->getClubMembers($id, $page, $per_page);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] '.$e->getMessage());
        }
    }
    
    /**
     * List club activities
     * 
     * @param int $id
     * @param int $page
     * @param int $per_page
     * @return array
     * @throws Exception
     */
    public function getClubActivities($id, $page = null, $per_page  = null) {
        try {
            return $this->service->getClubActivities($id, $page, $per_page);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] '.$e->getMessage());
        }
    }
    
    /**
     * Retrieve a segment
     * 
     * @param int $id
     * @return array
     * @throws Exception
     */
    public function getSegment($id) {
        try {
            return $this->service->getSegment($id);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] '.$e->getMessage());
        }
    }
    
    /**
     * Segment leaderboards
     * 
     * @param id $id
     * @param string $gender
     * @param string $age_group
     * @param string $weight_class
     * @param boolean $following
     * @param int $club_id
     * @param string $date_range
     * @param int $page
     * @param int $per_page
     * @return type
     * @throws Exception
     */
    public function getSegmentLeaderboard($id, $gender = null, $age_group = null, $weight_class = null, $following = null, $club_id = null, $date_range = null, $page = null, $per_page = null) {
        try {
            return $this->service->getSegmentLeaderboard($id, $gender, $age_group, $weight_class, $following, $club_id, $date_range, $page, $per_page);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] '.$e->getMessage());
        }
    }
    
    /**
     * Segment explorer
     * 
     * @param string $bounds
     * @param string $activity_type
     * @param int $min_cat
     * @param int $max_cat
     * @return type
     * @throws Exception
     */
    public function getSegmentExplorer($bounds, $activity_type = 'riding', $min_cat = null, $max_cat = null) {
        try {
            return $this->service->getSegmentExplorer($bounds, $activity_type, $min_cat, $max_cat);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] '.$e->getMessage());
        }     
    }
    
    /**
     * List efforts filtered by athlete and/or a date range
     * 
     * @param int $id
     * @param int $athlete_id
     * @param string $start_date_local
     * @param string $end_date_local
     * @param int $page
     * @param int $per_page
     * @return array
     * @throws Exception
     */
    public function getSegmentEffort($id, $athlete_id = null, $start_date_local = null, $end_date_local = null, $page = null, $per_page = null) {
        try {
            return $this->service->getSegmentEffort($id, $athlete_id, $start_date_local, $end_date_local, $page, $per_page);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] '.$e->getMessage());
        }            
    }
    
    /**
     * Retrieve activity streams
     * 
     * @param int $id
     * @param string $types
     * @param string $resolution
     * @param string $series_type
     * @return array
     * @throws Exception
     */
    public function getStreamsActivity($id, $types, $resolution = 'all', $series_type = 'distance') {
        try {
            return $this->service->getStreamsActivity($id, $types, $resolution, $series_type);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] '.$e->getMessage());
        }
    }
    
    /**
     * Retrieve effort streams
     * 
     * @param int $id
     * @param string $types
     * @param string $resolution
     * @param string $series_type
     * @return array
     * @throws Exception
     */
    public function getStreamsEffort($id, $types, $resolution = 'all', $series_type = 'distance') {
        try {
            return $this->service->getStreamsEffort($id, $types, $resolution, $series_type);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] '.$e->getMessage());
        }
    }
    
    /**
     * Retrieve segment streams
     * 
     * @param int $id
     * @param string $types
     * @param string $resolution
     * @param string $series_type
     * @return array
     * @throws Exception
     */
    public function getStreamsSegment($id, $types, $resolution = 'all', $series_type = 'distance') {
        try {
            return $this->service->getStreamsSegment($id, $types, $resolution, $series_type);
        } catch (ServiceException $e) {
            throw new ClientException('[SERVICE] '.$e->getMessage());
        }
    }
}
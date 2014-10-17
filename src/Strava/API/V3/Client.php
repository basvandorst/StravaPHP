<?php
namespace Strava\API\V3;

use Exception;
use Strava\API\V3;
use Strava\API\V3\ServiceException;
use Respect\Validation\Validator;
use Respect\Validation\Exceptions\ValidationException;

/**
 * Strava API Client
 * The client validates the parameters and makes the call to the Strava API.
 * 
 * @author: Bas van Dorst
 * @package Strava
 */
class Client {
    
    /**
     * @var IService $service
     */
    protected $service;
    
    /**
     * initiate this class with a subclass of the IService interface. In 
     * the V3 package there are two service subclasses available:
     * - ServiceREST: Service which makes calls to the live Strava API 
     * - ServiceStub: Service stub for test purposes (unit tests)
     * 
     * @param IService $service
     */
    public function __construct(IService $service) {
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
        } catch (ValidationException $e) {
            throw new Exception('[VALIDATION] '.$e->getMessage());
        } catch (ServiceException $e) {
            throw new Exception('[SERVICE] '.$e->getMessage());
        } catch (Exception $e) {
            throw new Exception('[UNKOWN] '.$e->getMessage());
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
        } catch (ValidationException $e) {
            throw new Exception('[VALIDATION] '.$e->getMessage());
        } catch (ServiceException $e) {
            throw new Exception('[SERVICE] '.$e->getMessage());
        } catch (Exception $e) {
            throw new Exception('[UNKOWN] '.$e->getMessage());
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
        } catch (ValidationException $e) {
            throw new Exception('[VALIDATION] '.$e->getMessage());
        } catch (ServiceException $e) {
            throw new Exception('[SERVICE] '.$e->getMessage());
        } catch (Exception $e) {
            throw new Exception('[UNKOWN] '.$e->getMessage());
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
        } catch (ValidationException $e) {
            throw new Exception('[VALIDATION] '.$e->getMessage());
        } catch (ServiceException $e) {
            throw new Exception('[SERVICE] '.$e->getMessage());
        } catch (Exception $e) {
            throw new Exception('[UNKOWN] '.$e->getMessage());
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
        } catch (ValidationException $e) {
            throw new Exception('[VALIDATION] '.$e->getMessage());
        } catch (ServiceException $e) {
            throw new Exception('[SERVICE] '.$e->getMessage());
        } catch (Exception $e) {
            throw new Exception('[UNKOWN] '.$e->getMessage());
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
        } catch (ValidationException $e) {
            throw new Exception('[VALIDATION] '.$e->getMessage());
        } catch (ServiceException $e) {
            throw new Exception('[SERVICE] '.$e->getMessage());
        } catch (Exception $e) {
            throw new Exception('[UNKOWN] '.$e->getMessage());
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
        } catch (ValidationException $e) {
            throw new Exception('[VALIDATION] '.$e->getMessage());
        } catch (ServiceException $e) {
            throw new Exception('[SERVICE] '.$e->getMessage());
        } catch (Exception $e) {
            throw new Exception('[UNKOWN] '.$e->getMessage());
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
        } catch (ValidationException $e) {
            throw new Exception('[VALIDATION] '.$e->getMessage());
        } catch (ServiceException $e) {
            throw new Exception('[SERVICE] '.$e->getMessage());
        } catch (Exception $e) {
            throw new Exception('[UNKOWN] '.$e->getMessage());
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
        } catch (ValidationException $e) {
            throw new Exception('[VALIDATION] '.$e->getMessage());
        } catch (ServiceException $e) {
            throw new Exception('[SERVICE] '.$e->getMessage());
        } catch (Exception $e) {
            throw new Exception('[UNKOWN] '.$e->getMessage());
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
        } catch (ValidationException $e) {
            throw new Exception('[VALIDATION] '.$e->getMessage());
        } catch (ServiceException $e) {
            throw new Exception('[SERVICE] '.$e->getMessage());
        } catch (Exception $e) {
            throw new Exception('[UNKOWN] '.$e->getMessage());
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
        } catch (ValidationException $e) {
            throw new Exception('[VALIDATION] '.$e->getMessage());
        } catch (ServiceException $e) {
            throw new Exception('[SERVICE] '.$e->getMessage());
        } catch (Exception $e) {
            throw new Exception('[UNKOWN] '.$e->getMessage());
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
        } catch (ValidationException $e) {
            throw new Exception('[VALIDATION] '.$e->getMessage());
        } catch (ServiceException $e) {
            throw new Exception('[SERVICE] '.$e->getMessage());
        } catch (Exception $e) {
            throw new Exception('[UNKOWN] '.$e->getMessage());
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
        } catch (ValidationException $e) {
            throw new Exception('[VALIDATION] '.$e->getMessage());
        } catch (ServiceException $e) {
            throw new Exception('[SERVICE] '.$e->getMessage());
        } catch (Exception $e) {
            throw new Exception('[UNKOWN] '.$e->getMessage());
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
        } catch (ValidationException $e) {
            throw new Exception('[VALIDATION] '.$e->getMessage());
        } catch (ServiceException $e) {
            throw new Exception('[SERVICE] '.$e->getMessage());
        } catch (Exception $e) {
            throw new Exception('[UNKOWN] '.$e->getMessage());
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
        } catch (ValidationException $e) {
            throw new Exception('[VALIDATION] '.$e->getMessage());
        } catch (ServiceException $e) {
            throw new Exception('[SERVICE] '.$e->getMessage());
        } catch (Exception $e) {
            throw new Exception('[UNKOWN] '.$e->getMessage());
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
        } catch (ValidationException $e) {
            throw new Exception('[VALIDATION] '.$e->getMessage());
        } catch (ServiceException $e) {
            throw new Exception('[SERVICE] '.$e->getMessage());
        } catch (Exception $e) {
            throw new Exception('[UNKOWN] '.$e->getMessage());
        }
    }
    
    public function createActivity() {}
    public function updateActivity() {}
    public function uploadActivity() {}
    public function deleteActivity() {}
    
    
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
        } catch (ValidationException $e) {
            throw new Exception('[VALIDATION] '.$e->getMessage());
        } catch (ServiceException $e) {
            throw new Exception('[SERVICE] '.$e->getMessage());
        } catch (Exception $e) {
            throw new Exception('[UNKOWN] '.$e->getMessage());
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
        } catch (ValidationException $e) {
            throw new Exception('[VALIDATION] '.$e->getMessage());
        } catch (ServiceException $e) {
            throw new Exception('[SERVICE] '.$e->getMessage());
        } catch (Exception $e) {
            throw new Exception('[UNKOWN] '.$e->getMessage());
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
        } catch (ValidationException $e) {
            throw new Exception('[VALIDATION] '.$e->getMessage());
        } catch (ServiceException $e) {
            throw new Exception('[SERVICE] '.$e->getMessage());
        } catch (Exception $e) {
            throw new Exception('[UNKOWN] '.$e->getMessage());
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
        } catch (ValidationException $e) {
            throw new Exception('[VALIDATION] '.$e->getMessage());
        } catch (ServiceException $e) {
            throw new Exception('[SERVICE] '.$e->getMessage());
        } catch (Exception $e) {
            throw new Exception('[UNKOWN] '.$e->getMessage());
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
        } catch (ValidationException $e) {
            throw new Exception('[VALIDATION] '.$e->getMessage());
        } catch (ServiceException $e) {
            throw new Exception('[SERVICE] '.$e->getMessage());
        } catch (Exception $e) {
            throw new Exception('[UNKOWN] '.$e->getMessage());
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
        } catch (ValidationException $e) {
            throw new Exception('[VALIDATION] '.$e->getMessage());
        } catch (ServiceException $e) {
            throw new Exception('[SERVICE] '.$e->getMessage());
        } catch (Exception $e) {
            throw new Exception('[UNKOWN] '.$e->getMessage());
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
        } catch (ValidationException $e) {
            throw new Exception('[VALIDATION] '.$e->getMessage());
        } catch (ServiceException $e) {
            throw new Exception('[SERVICE] '.$e->getMessage());
        } catch (Exception $e) {
            throw new Exception('[UNKOWN] '.$e->getMessage());
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
            return $this->service->getSegmentEffortFiltered($id, $athlete_id, $start_date_local, $end_date_local, $page, $per_page);
        } catch (ValidationException $e) {
            throw new Exception('[VALIDATION] '.$e->getMessage());
        } catch (ServiceException $e) {
            throw new Exception('[SERVICE] '.$e->getMessage());
        } catch (Exception $e) {
            throw new Exception('[UNKOWN] '.$e->getMessage());
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
        } catch (ValidationException $e) {
            throw new Exception('[VALIDATION] '.$e->getMessage());
        } catch (ServiceException $e) {
            throw new Exception('[SERVICE] '.$e->getMessage());
        } catch (Exception $e) {
            throw new Exception('[UNKOWN] '.$e->getMessage());
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
        } catch (ValidationException $e) {
            throw new Exception('[VALIDATION] '.$e->getMessage());
        } catch (ServiceException $e) {
            throw new Exception('[SERVICE] '.$e->getMessage());
        } catch (Exception $e) {
            throw new Exception('[UNKOWN] '.$e->getMessage());
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
        } catch (ValidationException $e) {
            throw new Exception('[VALIDATION] '.$e->getMessage());
        } catch (ServiceException $e) {
            throw new Exception('[SERVICE] '.$e->getMessage());
        } catch (Exception $e) {
            throw new Exception('[UNKOWN] '.$e->getMessage());
        }
    }
}
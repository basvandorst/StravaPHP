<?php
namespace Strava\API\V3;

use Exception;
use Strava\API\V3;
use Strava\API\V3\ServiceException;
use Respect\Validation\Validator;
use Respect\Validation\Exceptions\ValidationException;

/**
 * Strava API Client
 * The client validates the parameters and makes the call to the Strava API
 * 
 * You should initiate this class with a subclass of the IService interface. In 
 * this V3 package there are two service subclasses implemented:
 * - ServiceREST: Service which makes calls to the live Strava API 
 * - ServiceStub: Service stub for test purposes (unit tests)
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
     * 
     * @param IService $service
     */
    public function __construct(IService $service) {
        $this->service = $service;
    }

    public function getAthlete($id = null) {
        return $this->service->getAthlete($id);
    }
    
    public function getAthleteClubs() {
        return $this->service->getAthleteClubs();
    }
    
    public function getAthleteActivities($before = null, $after = null, $page = null, $per_page = null) {
        return $this->service->getAthleteActivities($before, $after, $page, $per_page);
    }
    
    public function getAthleteFriends($id = null, $page = null, $per_page = null) {
        return $this->service->getAthleteFriends($id, $page, $per_page);
    }
    
    public function getAthleteFollowers($id = null, $page = null, $per_page = null) {
        return $this->service->getAthleteFollowers($id, $page, $per_page);
    }
    
    public function getAthleteBothFollowing($id, $page = null, $per_page = null) {
        return $this->service->getAthleteBothFollowing($id, $page, $per_page);
    }
    
    public function getAthleteKom($id, $page = null, $per_page = null) {
        return $this->service->getAthleteKom($id, $page, $per_page);
    }
    
    public function getAthleteStarredSegments($id = null, $page = null, $per_page = null) {
        return $this->service->getAthleteStarredSegments($id, $page, $per_page);
    }
    
    public function updateAthlete($city, $state, $country, $sex, $weight){
        return $this->service->updateAthlete($city, $state, $country, $sex, $weight);
    }
    
    public function getActivity($id, $include_all_efforts = null) {
        return $this->service->getActivity($id, $include_all_efforts);
    }
    
    public function getActivityComments($id, $markdown = null, $page = null, $per_page = null) {
        return $this->service->getActivityComments($id, $markdown, $page, $per_page);
    }
    
    public function getActivityKudos($id, $page = null, $per_page = null) {
        return $this->service->getActivityKudos($id, $page, $per_page);
    }
    
    public function getActivityPhotos($id) {
        return $this->service->getActivityPhotos($id);
    }
    
    public function getActivityZones($id) {
        return $this->service->getActivityZones($id);
    }
    
    public function getActivityLaps($id) {
        return $this->service->getActivityLaps($id);
    }
    
    public function getActivityUploadStatus($id) {
        return $this->service->getActivityUploadStatus($id);
    }
    
    public function createActivity() {}
    public function updateActivity() {}
    public function uploadActivity() {}
    public function deleteActivity() {}
    
    
    public function getGear($id) {
        return $this->service->getGear($id);
    }

    public function getClub($id) {
        return $this->service->getClub($id);
    }
    
    public function getClubMembers($id, $page = null, $per_page  = null) {
        return $this->service->getClubMembers($id, $page, $per_page);
    }
    
    public function getClubActivities($id, $page = null, $per_page  = null) {
        return $this->service->getClubActivities($id, $page, $per_page);
    }
    
    // todo optional params
    public function getSegment($id) {
        return $this->service->getSegment($id);
    }
    
    public function getSegmentEffort($id, $athlete_id, $start_date_local, $end_date_local, $page, $per_page) {
        return $this->service->getSegmentEffort($id, $athlete_id, $start_date_local, $end_date_local, $page, $per_page);
    }
    
    public function getSegmentLeaderboard($id, $gender, $age_group, $weight_class, $following, $club_id, $date_range, $page, $per_page) {
        return $this->service->getSegmentLeaderboard($id, $gender, $age_group, $weight_class, $following, $club_id, $date_range, $page, $per_page);
    }
    
    public function getSegmentExplorer($bounds, $activity_type, $min_cat, $max_cat) {
        return $this->service->getSegmentExplorer($bounds, $activity_type, $min_cat, $max_cat);
    }    
    
    public function getStreamsActivity($id, $types, $resolution, $series_type) {
        return $this->service->getStreamsActivity($id, $types, $resolution, $series_type);
    }
    
    public function getStreamsEffort($id, $types, $resolution, $series_type) {
        return $this->service->getStreamsEffort($id, $types, $resolution, $series_type);
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
            throw new Exception('[VALIDATION] test'.$e->getMessage());
        } catch (ServiceException $e) {
            throw new Exception('[SERVICE] '.$e->getMessage());
        } catch (Exception $e) {
            throw new Exception('[UNKOWN] '.$e->getMessage());
        }
    }
}
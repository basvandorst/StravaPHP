<?php
namespace Strava\API\V3;

use Exception;
use Strava\API\V3;
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

    public function getAthlete() {
        return $this->service->getAthlete();
    }
    public function getAthleteActivities($before, $after, $page, $per_page) {
        return $this->service->getAthleteActivities($before, $after, $page, $per_page);
    }
    public function getAthleteFriends() {}
    public function getAthleteFollowers() {}
    public function getAthleteBothFollowing() {}
    public function getAthleteKom() {}
    public function getAthleteStarredSegments() {}
    public function getAthleteClubs() {}
    public function updateAthlete() {}
    
    public function getActivity() {}
    
    public function getActivityComments() {}
    public function getActivityKudos() {}
    public function getActivityPhotos() {}
    public function getActivityZones() {}
    public function getActivityLaps() {}
    public function getActivityUploadStatus() {}
    
    public function createActivity() {}
    public function updateActivity() {}
    public function uploadActivity() {}
    public function deleteActivity() {}
    
    public function getGear($id) {
        try {
           Validator::string()->notEmpty()->assert($id);
           
           $this->service->getGear($id);
        } catch (ValidationException $e) {
            throw new Exception('[VALIDATION] '.$e->getMessage());
        } catch (ServiceException $e) {
            throw new Exception('[SERVICE] '.$e->getMessage());
        } catch (Exception $e) {
            throw new Exception('[UNKOWN] '.$e->getMessage());
        }
    }
    
    public function getClub($id) {}
    public function getClubMembers($id, $page, $per_page) {}
    public function getClubActivities($id, $page, $per_page) {}
    
    public function getSegment($id) {}
    public function getSegmentEffort($id, $athlete_id, $start_date_local, $end_date_local, $page, $per_page) {}
    public function getSegmentLeaderboard($id, $gender, $age_group, $weight_class, $following, $club_id, $date_range, $page, $per_page) {}
    public function getSegmentExplorer($bounds, $activity_type, $min_cat, $max_cat) {}

    public function getStreamsActivity($id, $types, $resolution, $series_type) {}
    public function getStreamsEffort($id, $types, $resolution, $series_type) {}
    
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
           // $usernameValidator = Validator::int()->notEmpty()->length(1,15)->setName('x')->assert($id);
            //Validator::string()->negative()->notEmpty()->assert($id);
            $this->service->getStreamsSegment($id, $types, $resolution, $series_type);
        } catch (ValidationException $e) {
            throw new Exception('[VALIDATION] '.$e->getMessage());
        } catch (ServiceException $e) {
            throw new Exception('[SERVICE] '.$e->getMessage());
        } catch (Exception $e) {
            throw new Exception('[UNKOWN] '.$e->getMessage());
        }
    }
}
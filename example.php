<?php 
include 'vendor/autoload.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

use Strava\API\OAuth as OAuth;
use Strava\API\V3\Client as StravaClient;
use Strava\API\V3\ServiceREST as ServiceREST;

try {
    $OAuth = new OAuth(array(
        'clientId'     => '562',
        'clientSecret' => '05fdb76a660ae25556e392b5b915b3edb6ed1b9f',
        'redirectUri'  => 'http://localhost/StravaPHP/example.php'
    ));
    
    if (!isset($_GET['code'])) {
        print '<a href="'.$OAuth->getAuthorizationUrl().'">connect</a>';
    } else {
        $token = $OAuth->getAccessToken('authorization_code', array(
            'code' => $_GET['code']
        ));
        
        $strava = new StravaClient(new ServiceREST($token));
        $activities = $strava->getAthleteActivities(null, null, null, 2);
        print_r($activities);
        
        $update = $strava->updateAthlete('Dongen', 'NB', 'The Netherlands', 'M', 81.00);
        print_r($update);
        //$clubs = $strava->getAthleteClubs();
        //print_r($clubs);
        
        //$members = $strava->getClub(9729);
        //print_r($members);
        
        //$gear = $strava->getGear(1);
        //print_r($gear);
    }
    
} catch(Exception $e) {
    print $e->getMessage();
}

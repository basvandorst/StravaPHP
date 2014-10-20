StravaPHP - WIP
=========
[![Build Status](https://scrutinizer-ci.com/g/basvandorst/StravaPHP/badges/build.png?b=master)](https://scrutinizer-ci.com/g/basvandorst/StravaPHP/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/basvandorst/StravaPHP/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/basvandorst/StravaPHP/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/basvandorst/StravaPHP/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/basvandorst/StravaPHP/?branch=master)

**TLDR;** Strava V3 API PHP client with OAauth authentication

The Strava V3 API is a publicly available interface allowing developers access 
to the rich Strava dataset. The interface is stable and currently used by the 
Strava mobile applications. However, changes are occasionally made to improve 
performance and enhance features. See the [changelog](http://strava.github.io/api/v3/changelog/) for more details.

In this GitHub repository you can find the PHP implementation of the 
Strava V3 API. The current version of StravaPHP combines the V3 API 
with a proper OAuth authentication.

## Getting started
### Get your API key
All calls to the Strava API require an access token defining the athlete and 
application making the call. Any registered Strava user can obtain an access 
token by first creating an application at [strava.com/developers](http://www.strava.com/developers)

### Composer package 
Use composer to install this StravaPHP package.

```
{
    "require": {
        "basvandorst/StravaPHP": "dev-master"
    }
}
```


### Use it!
```php
<?php 
include 'vendor/autoload.php';
use Strava\API\Exception;
use Strava\API\Factory;

try {
    $factory = new Factory();
    $OAuthClient = $factory->getOAuthClient('CLIENT_ID', 'CLIENT_SECRET', 'CALLBACK URI');
    
    if (!isset($_GET['code'])) {
        print '<a href="'.$OAuthClient->getAuthorizationUrl().'">connect</a>';
    } else {
        $token = $OAuthClient->getAccessToken('authorization_code', array(
            'code' => $_GET['code']
        ));
        
        $strava = $factory->getAPIClient($token);
        $activities = $strava->getAthleteKOM();
        print_r($activities);
    }
} catch(Exception $e) {
    print $e->getMessage();
}
```

## Class documentation

### Strava\API\Factory
#### Methods
```php
$factory->getOAuthClient($client_id, $client_secret, $redirect_uri);
$factory->getAPIClient($token);
```

### Strava\API\OAuth
#### Methods
```php
$oauth->getAuthorizationUrl($options = array());
$oauth->getAuthorizationUrl($grant = 'authorization_code', $params = array());
```
### Strava\API\Client
#### Methods
```php

### Strava\API\Client
#### Methods
$client->getAthlete($id = null);
$client->getAthleteClubs();
$client->getAthleteActivities($before = null, $after = null, $page = null, $per_page = null);
$client->getAthleteFriends($id = null, $page = null, $per_page = null);
$client->getAthleteFollowers($id = null, $page = null, $per_page = null);
$client->getAthleteBothFollowing($id, $page = null, $per_page = null);
$client->getAthleteKom($id, $page = null, $per_page = null);
$client->getAthleteStarredSegments($id = null, $page = null, $per_page = null);
$client->updateAthlete($city, $state, $country, $sex, $weight);
// Activity
$client->getActivity($id, $include_all_efforts = null);
$client->getActivityComments($id, $markdown = null, $page = null, $per_page = null);
$client->getActivityKudos($id, $page = null, $per_page = null);
$client->getActivityPhotos($id);
$client->getActivityZones($id);
$client->getActivityLaps($id);
$client->getActivityUploadStatus($id);
$client->createActivity($name, $type, $start_date_local, $elapsed_time, $description = null, $distance = null);
$client->uploadActivity($file, $activity_type = null, $name = null, $description = null, $private = null, $trainer = null, $data_type = null, $external_id = null);
$client->updateActivity($name = null, $type = null, $private = false, $commute = false, $trainer = false, $gear_id = null, $description = null);
$client->deleteActivity($id);
// Gear
$client->getGear($id);
// Club
$client->getClub($id);
$client->getClubMembers($id, $page = null, $per_page  = null);
$client->getClubActivities($id, $page = null, $per_page  = null);
// Segment
$client->getSegment($id);
$client->getSegmentLeaderboard($id, $gender = null, $age_group = null, $weight_class = null, $following = null, $club_id = null, $date_range = null, $page = null, $per_page = null);
$client->getSegmentExplorer($bounds, $activity_type = 'riding', $min_cat = null, $max_cat = null);
$client->getSegmentEffort($id, $athlete_id = null, $start_date_local = null, $end_date_local = null, $page = null, $per_page = null);
// Stream
$client->getStreamsActivity($id, $types, $resolution = 'all', $series_type = 'distance');
$client->getStreamsEffort($id, $types, $resolution = 'all', $series_type = 'distance');
$client->getStreamsSegment($id, $types, $resolution = 'all', $series_type = 'distance');
```

## Class diagram
![stravaphp_uml](https://cloud.githubusercontent.com/assets/1196963/4705696/764cd4e2-587e-11e4-8c9f-d265255ee0a2.png)

## Thanks guys!
- [Strava API](http://strava.github.io/api/)
- [thephpleague/oauth2-client](https://github.com/thephpleague/oauth2-client/)
- [respect/Validation](https://github.com/respect/Validation)
- [educoder/pest] (https://github.com/educoder/pest)

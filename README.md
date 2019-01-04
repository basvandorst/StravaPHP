StravaPHP
=========
[![Build Status](https://scrutinizer-ci.com/g/basvandorst/StravaPHP/badges/build.png?b=master)](https://scrutinizer-ci.com/g/basvandorst/StravaPHP/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/basvandorst/StravaPHP/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/basvandorst/StravaPHP/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/basvandorst/StravaPHP/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/basvandorst/StravaPHP/?branch=master)

**TLDR;** Strava V3 API PHP client with OAuth authentication

The Strava V3 API is a publicly available interface allowing developers access
to the rich [Strava](https://www.strava.com/) dataset. The interface is stable and currently used by the
Strava mobile applications. However, changes are occasionally made to improve
performance and enhance features. See the [changelog](https://strava.github.io/api/v3/changelog/) for more details.

In this GitHub repository you can find the PHP implementation of the
Strava V3 API. The current version of StravaPHP combines the V3 API
with a proper OAuth authentication.

## Getting started
### Get your API key
All calls to the Strava API require an access token defining the athlete and
application making the call. Any registered Strava user can obtain an access
token by first creating an application at [labs.strava.com/developers](http://labs.strava.com/developers/)

### Composer package
Use composer to install this StravaPHP package.

```
{
    "require": {
        "basvandorst/StravaPHP": "1.2.0"
    }
}
```

### StravaPHP usage
#### First, authorisation and authentication
```php
<?php
include 'vendor/autoload.php';

use Strava\API\OAuth;
use Strava\API\Exception;

try {
    $options = [
        'clientId'     => 1234,
        'clientSecret' => 'APP-TOKEN',
        'redirectUri'  => 'http://my-app/callback.php'
    ];
    $oauth = new OAuth($options);

    if (!isset($_GET['code'])) {
        print '<a href="'.$oauth->getAuthorizationUrl([
            // Uncomment required scopes.
            'scope' => [
                'public',
                // 'write',
                // 'view_private',
            ]
        ]).'">Connect</a>';
    } else {
        $token = $oauth->getAccessToken('authorization_code', [
            'code' => $_GET['code']
        ]);
        print $token->getToken();
    }
} catch(Exception $e) {
    print $e->getMessage();
}
```
#### Then, call your API method!
```php
<?php
include 'vendor/autoload.php';

use Strava\API\Client;
use Strava\API\Exception;
use Strava\API\Service\REST;

try {
    $adapter = new \GuzzleHttp\Client(['base_uri' => 'https://www.strava.com/api/v3']);
    $service = new REST($token, $adapter);  // Define your user token here.
    $client = new Client($service);

    $athlete = $client->getAthlete();
    print_r($athlete);

    $activities = $client->getAthleteActivities();
    print_r($activities);

    $club = $client->getClub(9729);
    print_r($club);
} catch(Exception $e) {
    print $e->getMessage();
}
```

## Class documentation

### Strava\API\Factory
#### Usage
```php
// Configure your app ID, app token and callback uri
$factory = new Factory();
$OAuthClient = $factory->getOAuthClient(1234, 'APP-TOKEN', 'http://my-app/callback.php');
```
#### Methods
```php
$factory->getOAuthClient($client_id, $client_secret, $redirect_uri);
$factory->getAPIClient($token);
```

### Strava\API\OAuth
#### Usage
```php
// Parameter information: https://strava.github.io/api/v3/oauth/#get-authorize
$options = [
    'clientId'     => 1234,
    'clientSecret' => 'APP-TOKEN',
    'redirectUri'  => 'http://my-app/callback.php'
];
$oauth = new OAuth($options);

// The OAuth authorization procces (1st; let the user approve, 2nd; token exchange with Strava)
if (!isset($_GET['code'])) {
    print '<a href="'.$oauth->getAuthorizationUrl([
        // Uncomment required scopes.
        'scope' => [
            'public',
            // 'write',
            // 'view_private',
        ]
    ]).'">Connect</a>';
} else {
    $token = $oauth->getAccessToken('authorization_code', [
        'code' => $_GET['code']
    ]);
    print $token->getToken();
}
```
#### Methods
```php
$oauth->getAuthorizationUrl($options = []);
$oauth->getAccessToken($grant = 'authorization_code', $params = []);
```
### Strava\API\Client
#### Usage
```php
// REST adapter (We use `Guzzle` in this project)
$adapter = new \GuzzleHttp\Client(['base_uri' => 'https://www.strava.com/api/v3']);
// Service to use (Service\Stub is also available for test purposes)
$service = new Service\REST('RECEIVED-TOKEN', $adapter);

// Receive the athlete!
$client = new Client($service);
$athlete = $client->getAthlete();
print_r($athlete);
```
#### Methods
```php
$client->getAthlete($id = null);
$client->getAthleteStats($id);
$client->getAthleteClubs();
$client->getAthleteRoutes($id, $type = null, $after = null, $page = null, $per_page = null);
$client->getAthleteActivities($before = null, $after = null, $page = null, $per_page = null);
$client->getAthleteFriends($id = null, $page = null, $per_page = null);
$client->getAthleteFollowers($id = null, $page = null, $per_page = null);
$client->getAthleteBothFollowing($id, $page = null, $per_page = null);
$client->getAthleteKom($id, $page = null, $per_page = null);
$client->getAthleteZones();
$client->getAthleteStarredSegments($id = null, $page = null, $per_page = null);
$client->updateAthlete($city, $state, $country, $sex, $weight);
$client->getActivityFollowing($before = null, $page = null, $per_page = null) 
$client->getActivity($id, $include_all_efforts = null);
$client->getActivityComments($id, $markdown = null, $page = null, $per_page = null);
$client->getActivityKudos($id, $page = null, $per_page = null);
$client->getActivityPhotos($id, $size = 2048, $photo_sources = 'true');
$client->getActivityZones($id);
$client->getActivityLaps($id);
$client->getActivityUploadStatus($id);
$client->createActivity($name, $type, $start_date_local, $elapsed_time, $description = null, $distance = null);
$client->uploadActivity($file, $activity_type = null, $name = null, $description = null, $private = null, $commute = null, $trainer = null, $data_type = null, $external_id = null);
$client->updateActivity($id, $name = null, $type = null, $private = false, $commute = false, $trainer = false, $gear_id = null, $description = null);
$client->deleteActivity($id);
$client->getGear($id);
$client->getClub($id);
$client->getClubMembers($id, $page = null, $per_page = null);
$client->getClubActivities($id, $page = null, $per_page = null);
$client->getRoute($id);
$client->getSegment($id);
$client->getSegmentLeaderboard($id, $gender = null, $age_group = null, $weight_class = null, $following = null, $club_id = null, $date_range = null, $page = null, $per_page = null);
$client->getSegmentExplorer($bounds, $activity_type = 'riding', $min_cat = null, $max_cat = null);
$client->getSegmentEffort($id, $athlete_id = null, $start_date_local = null, $end_date_local = null, $page = null, $per_page = null);
$client->getStreamsActivity($id, $types, $resolution = null, $series_type = 'distance');
$client->getStreamsEffort($id, $types, $resolution = null, $series_type = 'distance');
$client->getStreamsSegment($id, $types, $resolution = null, $series_type = 'distance');
$client->getStreamsRoute($id);
```

## UML diagrams
### Class diagram
![class](https://cloud.githubusercontent.com/assets/1196963/4705696/764cd4e2-587e-11e4-8c9f-d265255ee0a2.png)
### Sequence diagram
![sequence](https://cloud.githubusercontent.com/assets/1196963/4781256/14ad07f2-5c93-11e4-9f2c-b304fe312f05.png)

## About StravaPHP
### Used libraries
- [Strava API](https://strava.github.io/api/)
- [thephpleague/oauth2-client](https://github.com/thephpleague/oauth2-client/)
- [guzzlehttp/guzzle](https://github.com/guzzle/guzzle)

### Development
The StravaPHP library was created by Bas van Dorst, [software engineer](https://www.linkedin.com/in/basvandorst) and cyclist enthusiast.
And of course, special thanks to all [contributors](https://github.com/basvandorst/StravaPHP/graphs/contributors)

### Contributing
All issues and pull requests should be filled on the basvandorst/StravaPHP repository.

### License
The StravaPHP library is open-source software licensed under MIT license.

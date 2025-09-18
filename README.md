StravaPHP
=========
[![Build Status](https://github.com/basvandorst/StravaPHP/workflows/PHP/badge.svg)](https://github.com/basvandorst/StravaPHP/actions/workflows/php.yml) [![Coverage Status](https://coveralls.io/repos/github/basvandorst/StravaPHP/badge.svg?branch=develop)](https://coveralls.io/github/basvandorst/StravaPHP?branch=develop)

**TLDR;** Strava V3 API PHP client with OAuth authentication

The Strava V3 API is a publicly available interface allowing developers access
to the rich [Strava](https://www.strava.com/) dataset. The interface is stable and currently used by the
Strava mobile applications. However, changes are occasionally made to improve
performance and enhance features. See Strava's [changelog](https://strava.github.io/api/v3/changelog/) for more details.

In this GitHub repository you can find the PHP implementation of the
Strava V3 API. The current version of StravaPHP combines the V3 API
with a proper OAuth authentication.

## Getting started
### Get your API key
All calls to the Strava API require an access token defining the athlete and
application making the call. Any registered Strava user can obtain an access
token by first creating an application at [https://developers.strava.com](https://developers.strava.com/)

### Composer package
Use composer to install this StravaPHP package.

```
{
    "require": {
        "basvandorst/stravaphp": "^2.0.0"
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
                'read',
                // 'read_all',
                // 'profile:read_all',
                // 'profile:write',
                // 'activity:read',
                // 'activity:read_all',
                // 'activity:write',
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
    $adapter = new \GuzzleHttp\Client(['base_uri' => 'https://www.strava.com/api/v3/']);
    $service = new REST($token->getToken(), $adapter);  // Define your user token here.
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
use Strava\API\Factory;

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
use Strava\API\OAuth;

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
            'read',
            // 'read_all',
            // 'profile:read_all',
            // 'profile:write',
            // 'activity:read',
            // 'activity:read_all',
            // 'activity:write',
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
use GuzzleHttp\Client as GuzzleClient;
use Strava\API\Service\REST;
use Strava\API\Client;

$adapter = new GuzzleClient(['base_uri' => 'https://www.strava.com/api/v3/']);
// Service to use (Service\Stub is also available for test purposes)
$service = new REST('RECEIVED-TOKEN', $adapter);

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
$client->getActivityFollowing($before = null, $page = null, $per_page = null); 
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
$client->getRouteAsGPX($id);
$client->getRouteAsTCX($id);
$client->getSegment($id);
$client->getSegmentLeaderboard($id, $gender = null, $age_group = null, $weight_class = null, $following = null, $club_id = null, $date_range = null, $page = null, $per_page = null);
$client->getSegmentExplorer($bounds, $activity_type = 'riding', $min_cat = null, $max_cat = null);
$client->getSegmentEffort($id, $athlete_id = null, $start_date_local = null, $end_date_local = null, $page = null, $per_page = null);
$client->getStreamsActivity($id, $types, $resolution = null, $series_type = 'distance');
$client->getStreamsEffort($id, $types, $resolution = null, $series_type = 'distance');
$client->getStreamsSegment($id, $types, $resolution = null, $series_type = 'distance');
$client->getStreamsRoute($id);
$client->createWebhookSubscription($clientId, $clientSecret, $callbackUrl, $verifyToken);
$client->listWebhookSubscriptions($clientId, $clientSecret);
$client->deleteWebhookSubscription($clientId, $clientSecret, $subscriptionId);
```

## Webhook Integration

StravaPHP now includes comprehensive webhook support for real-time event notifications. This allows you to receive instant notifications when activities are created, updated, or deleted.

### Webhook Subscription Management

```php
<?php
include 'vendor/autoload.php';

use Strava\API\Client;
use Strava\API\Service\REST;
use GuzzleHttp\Client as GuzzleClient;

// Create API client
$adapter = new GuzzleClient(['base_uri' => 'https://www.strava.com/api/v3/']);
$service = new REST('YOUR_ACCESS_TOKEN', $adapter);
$client = new Client($service);

// Your Strava app credentials
$clientId = 12345;
$clientSecret = 'your_client_secret';
$callbackUrl = 'https://yourdomain.com/webhook-endpoint.php';
$verifyToken = 'your_random_verify_token';

try {
    // Create a webhook subscription
    $subscription = $client->createWebhookSubscription(
        $clientId,
        $clientSecret,
        $callbackUrl,
        $verifyToken
    );
    
    echo "Webhook subscription created: " . $subscription['id'] . "\n";
    
    // List existing subscriptions
    $subscriptions = $client->listWebhookSubscriptions($clientId, $clientSecret);
    echo "Active subscriptions: " . count($subscriptions) . "\n";
    
    // Delete a subscription
    $client->deleteWebhookSubscription($clientId, $clientSecret, $subscription['id']);
    echo "Subscription deleted\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
```

### Webhook Event Handling

```php
<?php
// webhook-endpoint.php
include 'vendor/autoload.php';

use Strava\API\Webhook;

// Handle subscription challenge (when creating webhook)
$verifyToken = 'your_random_verify_token';
$challengeResult = Webhook::handleSubscriptionChallenge($verifyToken);

if ($challengeResult['success']) {
    // Send challenge response to Strava
    Webhook::sendChallengeResponse($challengeResult['challenge']);
}

// Process incoming webhook events
$eventResult = Webhook::processEvent();

if ($eventResult['success']) {
    $event = $eventResult['event'];
    
    // Handle different event types
    switch (Webhook::getEventType($event)) {
        case 'activity.create':
            echo "New activity: " . $event['object_id'] . "\n";
            // Process new activity
            break;
            
        case 'activity.update':
            echo "Updated activity: " . $event['object_id'] . "\n";
            // Process activity update
            break;
            
        case 'activity.delete':
            echo "Deleted activity: " . $event['object_id'] . "\n";
            // Process activity deletion
            break;
            
        case 'athlete.update':
            echo "Updated athlete: " . $event['object_id'] . "\n";
            // Process athlete update
            break;
    }
    
    // Send success response
    http_response_code(200);
    echo json_encode(['status' => 'success']);
} else {
    // Handle error
    http_response_code(400);
    echo json_encode(['error' => $eventResult['error']]);
}
```

### Webhook Helper Methods

The `Webhook` class provides several utility methods:

```php
// Get event type (e.g., 'activity.create')
$eventType = Webhook::getEventType($event);

// Check if event is for specific object type
$isActivity = Webhook::isObjectType($event, 'activity');
$isAthlete = Webhook::isObjectType($event, 'athlete');

// Check if event is specific aspect type
$isCreate = Webhook::isAspectType($event, 'create');
$isUpdate = Webhook::isAspectType($event, 'update');
$isDelete = Webhook::isAspectType($event, 'delete');

// Verify webhook signature (if using signature verification)
$isValid = Webhook::verifySignature($payload, $signature, $secret);
```

### Webhook Events

Strava webhooks support the following event types:

- **Activity Events:**
  - `activity.create` - New activity created
  - `activity.update` - Activity updated
  - `activity.delete` - Activity deleted

- **Athlete Events:**
  - `athlete.update` - Athlete profile updated

For more information about webhook events, see the [Strava Webhook Documentation](https://developers.strava.com/docs/webhooks/).

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

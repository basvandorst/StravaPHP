StravaPHP - Work in progress
=========

Strava API REST client with OAuth authentication

WIP
## Methods
### Athlete
#### Retrieve current athlete
```php
$strava->getAthlete();
```
###### Retrieve another athlete
```php
$strava->getAthlete(201946203);
```
###### Update current athlete
```php
$strava->updateAthlete('Dongen', 'NB', 'The Netherlands', 'M', 81.00);
```
###### List athlete K/QOMs/CRs
```php
$strava->getAthleteKom(201946203);
```
###### List athlete clubs
```php
$strava->getClubs(1234);
```

### Clubs
###### Retrieve a club
```php
$strava->getClub(1234);
```
###### List club members
```php
$strava->getClubMembers(1234);
```
###### List club activities
```php
$strava->getClubActivities(1234);
```





### Example

```php

<?php 
include 'vendor/autoload.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

use Strava\API\OAuth as OAuth;
use Strava\API\V3\Client as StravaClient;
use Strava\API\V3\ServiceREST as ServiceREST;

try {
    $OAuth = new OAuth(array(
        'clientId'     => 'CLIENT ID',
        'clientSecret' => 'SECRET HERE',
        'redirectUri'  => 'URL ENDPOINT'
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
        
        $gear = $strava->getGear(1);
        print_r($gear);
    }
    
} catch(Exception $e) {
    print $e->getMessage();
}
```



### Thanks guys!
- Strava
- thephpleague/oauth2-client
- respect/Validation
- educoder/pest

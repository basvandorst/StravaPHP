<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Strava\API\Client;
use Strava\API\Service\REST;
use Strava\API\Webhook;
use GuzzleHttp\Client as GuzzleClient;

/**
 * Example: Strava Webhook Integration
 * 
 * This example demonstrates how to use the StravaPHP library
 * to manage webhook subscriptions and handle webhook events.
 */

// Configuration - Replace with your actual values
$clientId = 12345; // Your Strava app client ID
$clientSecret = 'your_client_secret_here'; // Your Strava app client secret
$callbackUrl = 'https://yourdomain.com/webhook-endpoint.php'; // Your webhook endpoint URL
$verifyToken = Webhook::generateVerifyToken(); // Generate a random verify token

// Note: Logging is not included in the library to keep it framework-agnostic.
// You can add your own logging in your application if needed.

// Create API client (you'll need an access token for some operations)
$accessToken = 'your_access_token_here'; // Get this through OAuth flow
$adapter = new GuzzleClient(['base_uri' => 'https://www.strava.com/api/v3/']);
$service = new REST($accessToken, $adapter);
$client = new Client($service);

try {
    // 1. Create a webhook subscription
    echo "Creating webhook subscription...\n";
    $subscription = $client->createWebhookSubscription(
        $clientId,
        $clientSecret,
        $callbackUrl,
        $verifyToken
    );
    
    echo "Subscription created successfully!\n";
    echo "Subscription ID: " . $subscription['id'] . "\n";
    echo "Callback URL: " . $subscription['callback_url'] . "\n";
    echo "Created at: " . $subscription['created_at'] . "\n\n";

    // 2. List existing webhook subscriptions
    echo "Listing webhook subscriptions...\n";
    $subscriptions = $client->listWebhookSubscriptions($clientId, $clientSecret);
    
    echo "Found " . count($subscriptions) . " subscription(s):\n";
    foreach ($subscriptions as $sub) {
        echo "- ID: " . $sub['id'] . ", URL: " . $sub['callback_url'] . "\n";
    }
    echo "\n";

    // 3. Delete a webhook subscription (uncomment to use)
    /*
    echo "Deleting webhook subscription...\n";
    $deleted = $client->deleteWebhookSubscription(
        $clientId,
        $clientSecret,
        $subscription['id']
    );
    
    if ($deleted) {
        echo "Subscription deleted successfully!\n";
    } else {
        echo "Failed to delete subscription.\n";
    }
    */

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

/**
 * Example webhook endpoint handler
 * 
 * Save this as webhook-endpoint.php on your server
 */
function webhookEndpointExample()
{
    // Handle subscription challenge
    $verifyToken = 'your_verify_token_here'; // Same token used when creating subscription
    
    $challengeResult = Webhook::handleSubscriptionChallenge($verifyToken);
    
    if ($challengeResult['success']) {
        // Send challenge response to Strava
        Webhook::sendChallengeResponse($challengeResult['challenge']);
    } else {
        // Handle challenge error
        http_response_code(400);
        echo json_encode(['error' => $challengeResult['error']]);
        exit;
    }
    
    // Process webhook events
    $eventResult = Webhook::processEvent();
    
    if (!$eventResult['success']) {
        http_response_code(400);
        echo json_encode(['error' => $eventResult['error']]);
        exit;
    }
    
    $event = $eventResult['event'];
    
    // Handle different event types
    switch (Webhook::getEventType($event)) {
        case 'activity.create':
            echo "New activity created: " . $event['object_id'] . "\n";
            // Process new activity
            break;
            
        case 'activity.update':
            echo "Activity updated: " . $event['object_id'] . "\n";
            // Process activity update
            break;
            
        case 'activity.delete':
            echo "Activity deleted: " . $event['object_id'] . "\n";
            // Process activity deletion
            break;
            
        case 'athlete.update':
            echo "Athlete updated: " . $event['object_id'] . "\n";
            // Process athlete update
            break;
            
        default:
            echo "Unknown event type: " . Webhook::getEventType($event) . "\n";
    }
    
    // Send success response
    http_response_code(200);
    echo json_encode(['status' => 'success']);
}

// Uncomment to test the webhook endpoint
// webhookEndpointExample();

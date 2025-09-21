<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Strava\API\Webhook;

/**
 * Complete Strava Webhook Endpoint
 * 
 * This is a complete webhook endpoint that handles both subscription
 * verification (GET requests) and event processing (POST requests).
 * 
 * Usage:
 * 1. Upload this file to your web server
 * 2. Set the $verifyToken to match what you use when creating subscriptions
 * 3. Configure your Strava app to use this URL as the webhook callback
 * 4. Implement your event handling logic in the $eventHandler function
 */

// Configuration
$verifyToken = 'your_verify_token_here'; // Must match the token used when creating subscriptions

// Note: Logging is not included in the library to keep it framework-agnostic.
// You can add your own logging in your application if needed.

// Define your event handler function (matching your tested implementation)
$eventHandler = function($event) {
    // Log the event
    error_log('Processing Strava webhook event: ' . json_encode($event, JSON_PRETTY_PRINT));

    // Validate payload structure (matching your tested implementation)
    $validation = Webhook::validateEventPayload($event);
    if (!$validation['valid']) {
        error_log('Invalid webhook payload structure: ' . $validation['error']);
        return false;
    }

    // Only process activity creation events (matching your business logic)
    if (Webhook::isActivityCreationEvent($event)) {
        $activityId = Webhook::getObjectId($event);
        $athleteId = Webhook::getAthleteId($event);
        
        error_log("Processing activity creation - Activity ID: {$activityId}, Athlete ID: {$athleteId}");
        
        // Your custom logic for new activity
        // Example: Import activity, update database, send notifications, etc.
        
        return true; // Indicate successful processing
    } else {
        // Log other event types but don't process them (matching your implementation)
        $eventType = Webhook::getEventType($event);
        error_log("Skipping non-activity creation event: {$eventType}");
        return true; // Not an error, just not what we're interested in
    }
};

// Handle the webhook request
Webhook::handleWebhookEndpoint($verifyToken, $eventHandler);

// Note: The handleWebhookEndpoint method will exit after sending the response,
// so this line will never be reached.

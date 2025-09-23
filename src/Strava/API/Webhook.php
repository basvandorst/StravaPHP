<?php

namespace Strava\API;

/**
 * Strava Webhook Handler
 *
 * This class provides utilities for handling Strava webhook events,
 * including subscription validation and event processing.
 *
 * @author Jennifer Martinez
 * @package StravaPHP
 */
class Webhook
{
    /**
     * Handle webhook subscription validation challenge
     *
     * When Strava creates a webhook subscription, it sends a GET request
     * to your callback URL with a challenge to verify ownership.
     *
     * @param string $verifyToken The verify token you provided when creating the subscription
     * @param bool $autoRespond Whether to automatically send the response (default: false)
     * @return array Response array with challenge or error
     */
    public static function handleSubscriptionChallenge(string $verifyToken, bool $autoRespond = false): array
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? '';
        $queryString = $_SERVER['QUERY_STRING'] ?? '';

        // Parse query string manually to handle Strava's malformed URL format
        parse_str($queryString, $queryParams);

        $hubMode = $queryParams['hub_mode'] ?? '';
        $hubChallenge = $queryParams['hub_challenge'] ?? '';
        $hubVerifyToken = $queryParams['hub_verify_token'] ?? '';

        // Check if this is a subscription challenge request
        if ($method !== 'GET') {
            return [
                'success' => false,
                'error' => 'Invalid request method. Expected GET.'
            ];
        }

        if ($hubMode !== 'subscribe') {
            return [
                'success' => false,
                'error' => 'Invalid hub_mode. Expected "subscribe".'
            ];
        }

        if (empty($hubChallenge)) {
            return [
                'success' => false,
                'error' => 'Missing hub_challenge parameter.'
            ];
        }

        if ($hubVerifyToken !== $verifyToken) {
            return [
                'success' => false,
                'error' => 'Invalid verify token.'
            ];
        }

        $result = [
            'success' => true,
            'challenge' => $hubChallenge
        ];

        // Auto-respond if requested
        if ($autoRespond) {
            self::sendChallengeResponse($hubChallenge);
        }

        return $result;
    }

    /**
     * Send challenge response to Strava
     *
     * @param string $challenge The challenge string from Strava
     * @return void
     */
    public static function sendChallengeResponse(string $challenge): void
    {
        header('Content-Type: application/json');
        http_response_code(200);
        echo json_encode(['hub.challenge' => $challenge]);
        exit;
    }

    /**
     * Process incoming webhook event
     *
     * @param callable|null $eventHandler Optional callback function to handle the event
     * @return array Parsed webhook event data
     */
    public static function processEvent(?callable $eventHandler = null): array
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? '';

        if ($method !== 'POST') {
            return [
                'success' => false,
                'error' => 'Invalid request method. Expected POST.'
            ];
        }

        $rawBody = file_get_contents('php://input');
        if (empty($rawBody)) {
            return [
                'success' => false,
                'error' => 'Empty request body.'
            ];
        }

        $data = json_decode($rawBody, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return [
                'success' => false,
                'error' => 'Invalid JSON: ' . json_last_error_msg()
            ];
        }

        // Validate required webhook event fields (matching your tested implementation)
        if (!isset($data['object_type']) || !isset($data['aspect_type']) || !isset($data['object_id']) || !isset($data['owner_id'])) {
            return [
                'success' => false,
                'error' => 'Invalid webhook payload structure. Missing required fields: object_type, aspect_type, object_id, or owner_id.'
            ];
        }

        // Process the webhook event with custom handler if provided
        if ($eventHandler) {
            try {
                $success = call_user_func($eventHandler, $data);
                if (!$success) {
                    return [
                        'success' => false,
                        'error' => 'Event processing failed.'
                    ];
                }
            } catch (\Exception $e) {
                return [
                    'success' => false,
                    'error' => 'Event processing failed: ' . $e->getMessage()
                ];
            }
        }

        return [
            'success' => true,
            'event' => $data
        ];
    }

    /**
     * Verify webhook event signature (if using signature verification)
     *
     * @param string $payload The raw request body
     * @param string $signature The X-Hub-Signature header value
     * @param string $secret Your webhook secret (if configured)
     * @return bool True if signature is valid
     */
    public static function verifySignature(string $payload, string $signature, string $secret): bool
    {
        if (empty($secret)) {
            return true; // No secret configured, skip verification
        }

        $expectedSignature = 'sha256=' . hash_hmac('sha256', $payload, $secret);
        return hash_equals($expectedSignature, $signature);
    }

    /**
     * Get webhook event type
     *
     * @param array $event The parsed webhook event
     * @return string The event type (e.g., 'activity.create', 'activity.update')
     */
    public static function getEventType(array $event): string
    {
        return $event['object_type'] . '.' . $event['aspect_type'];
    }

    /**
     * Check if event is for a specific object type
     *
     * @param array $event The parsed webhook event
     * @param string $objectType The object type to check (e.g., 'activity', 'athlete')
     * @return bool True if event is for the specified object type
     */
    public static function isObjectType(array $event, string $objectType): bool
    {
        return isset($event['object_type']) && $event['object_type'] === $objectType;
    }

    /**
     * Check if event is a specific aspect type
     *
     * @param array $event The parsed webhook event
     * @param string $aspectType The aspect type to check (e.g., 'create', 'update', 'delete')
     * @return bool True if event is the specified aspect type
     */
    public static function isAspectType(array $event, string $aspectType): bool
    {
        return isset($event['aspect_type']) && $event['aspect_type'] === $aspectType;
    }

    /**
     * Handle complete webhook endpoint (both GET and POST requests)
     *
     * This method provides a complete webhook endpoint handler that can be used
     * as the main entry point for your webhook endpoint.
     *
     * @param string $verifyToken The verify token for subscription validation
     * @param callable|null $eventHandler Optional callback function to handle events
     * @return void This method will exit after sending response
     */
    public static function handleWebhookEndpoint(string $verifyToken, ?callable $eventHandler = null): void
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? '';

        // Set content type based on request method
        if ($method === 'GET') {
            header('Content-Type: application/json');
        } else {
            header('Content-Type: text/plain');
        }

        // Handle GET requests (webhook verification)
        if ($method === 'GET') {
            $result = self::handleSubscriptionChallenge($verifyToken, false);

            if ($result['success']) {
                // Return the challenge value as JSON as required by Strava
                echo json_encode(['hub.challenge' => $result['challenge']]);
                exit;
            } else {
                http_response_code(400);
                echo 'Invalid verification request';
                exit;
            }
        }

        // Handle POST requests (webhook events)
        if ($method === 'POST') {
            $result = self::processEvent($eventHandler);

            if ($result['success']) {
                http_response_code(200);
                echo 'OK';
                exit;
            } else {
                http_response_code(400);
                echo $result['error'];
                exit;
            }
        }

        // Invalid method
        http_response_code(405);
        echo 'Method not allowed';
        exit;
    }

    /**
     * Generate a random verify token
     *
     * @param int $length Length of the token (default: 32)
     * @return string Random verify token
     */
    public static function generateVerifyToken(int $length = 32): string
    {
        if (function_exists('random_bytes')) {
            return bin2hex(random_bytes($length / 2));
        } elseif (function_exists('openssl_random_pseudo_bytes')) {
            return bin2hex(openssl_random_pseudo_bytes($length / 2));
        } else {
            // Fallback for older PHP versions
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $token = '';
            for ($i = 0; $i < $length; $i++) {
                $token .= $characters[rand(0, strlen($characters) - 1)];
            }
            return $token;
        }
    }

    /**
     * Check if webhook event is an activity creation event
     *
     * @param array $event The webhook event data
     * @return bool True if this is an activity creation event
     */
    public static function isActivityCreationEvent(array $event): bool
    {
        return self::isObjectType($event, 'activity') && self::isAspectType($event, 'create');
    }

    /**
     * Get athlete ID from webhook event
     *
     * @param array $event The webhook event data
     * @return int|null The athlete ID or null if not found
     */
    public static function getAthleteId(array $event): ?int
    {
        return isset($event['owner_id']) ? (int)$event['owner_id'] : null;
    }

    /**
     * Get object ID from webhook event
     *
     * @param array $event The webhook event data
     * @return int|null The object ID or null if not found
     */
    public static function getObjectId(array $event): ?int
    {
        return isset($event['object_id']) ? (int)$event['object_id'] : null;
    }

    /**
     * Validate webhook event payload structure
     *
     * @param array $event The webhook event data
     * @return array Validation result with 'valid' boolean and 'error' message if invalid
     */
    public static function validateEventPayload(array $event): array
    {
        // Check required fields (matching your tested implementation)
        $requiredFields = ['object_type', 'aspect_type', 'object_id', 'owner_id'];

        foreach ($requiredFields as $field) {
            if (!isset($event[$field])) {
                return [
                    'valid' => false,
                    'error' => "Missing required field: {$field}"
                ];
            }
        }

        // Validate field types
        if (!is_string($event['object_type'])) {
            return [
                'valid' => false,
                'error' => 'object_type must be a string'
            ];
        }

        if (!is_string($event['aspect_type'])) {
            return [
                'valid' => false,
                'error' => 'aspect_type must be a string'
            ];
        }

        if (!is_numeric($event['object_id'])) {
            return [
                'valid' => false,
                'error' => 'object_id must be numeric'
            ];
        }

        if (!is_numeric($event['owner_id'])) {
            return [
                'valid' => false,
                'error' => 'owner_id must be numeric'
            ];
        }

        return [
            'valid' => true,
            'error' => null
        ];
    }
}

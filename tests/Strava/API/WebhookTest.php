<?php

use Strava\API\Webhook;
use Tests\Support\TestCase;

/**
 * Test...
 *
 * @see Strava\API\Webhook
 * @author Bas van Dorst
 * @package StravaPHP
 */
class WebhookTest extends TestCase
{
    public function testHandleSubscriptionChallengeSuccess()
    {
        // Mock $_SERVER and $_GET
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_SERVER['QUERY_STRING'] = 'hub_mode=subscribe&hub_challenge=test_challenge_123&hub_verify_token=test_verify_token';
        $_GET = [];

        $result = Webhook::handleSubscriptionChallenge('test_verify_token');

        $this->assertTrue($result['success']);
        $this->assertEquals('test_challenge_123', $result['challenge']);
    }

    public function testHandleSubscriptionChallengeInvalidMethod()
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_SERVER['QUERY_STRING'] = '';
        $_GET = [];

        $result = Webhook::handleSubscriptionChallenge('test_verify_token');

        $this->assertFalse($result['success']);
        $this->assertEquals('Invalid request method. Expected GET.', $result['error']);
    }

    public function testHandleSubscriptionChallengeInvalidMode()
    {
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_SERVER['QUERY_STRING'] = 'hub_mode=unsubscribe&hub_challenge=test_challenge_123&hub_verify_token=test_verify_token';
        $_GET = [];

        $result = Webhook::handleSubscriptionChallenge('test_verify_token');

        $this->assertFalse($result['success']);
        $this->assertEquals('Invalid hub_mode. Expected "subscribe".', $result['error']);
    }

    public function testHandleSubscriptionChallengeMissingChallenge()
    {
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_SERVER['QUERY_STRING'] = 'hub_mode=subscribe&hub_verify_token=test_verify_token';
        $_GET = [];

        $result = Webhook::handleSubscriptionChallenge('test_verify_token');

        $this->assertFalse($result['success']);
        $this->assertEquals('Missing hub_challenge parameter.', $result['error']);
    }

    public function testHandleSubscriptionChallengeInvalidToken()
    {
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_SERVER['QUERY_STRING'] = 'hub_mode=subscribe&hub_challenge=test_challenge_123&hub_verify_token=wrong_token';
        $_GET = [];

        $result = Webhook::handleSubscriptionChallenge('test_verify_token');

        $this->assertFalse($result['success']);
        $this->assertEquals('Invalid verify token.', $result['error']);
    }

    public function testGetEventType()
    {
        $event = [
            'object_type' => 'activity',
            'aspect_type' => 'create',
            'object_id' => 12345
        ];

        $eventType = Webhook::getEventType($event);

        $this->assertEquals('activity.create', $eventType);
    }

    public function testIsObjectType()
    {
        $event = [
            'object_type' => 'activity',
            'aspect_type' => 'create',
            'object_id' => 12345
        ];

        $this->assertTrue(Webhook::isObjectType($event, 'activity'));
        $this->assertFalse(Webhook::isObjectType($event, 'athlete'));
    }

    public function testIsAspectType()
    {
        $event = [
            'object_type' => 'activity',
            'aspect_type' => 'create',
            'object_id' => 12345
        ];

        $this->assertTrue(Webhook::isAspectType($event, 'create'));
        $this->assertFalse(Webhook::isAspectType($event, 'update'));
    }

    public function testVerifySignature()
    {
        $payload = '{"test": "data"}';
        $secret = 'test_secret';
        $signature = 'sha256=' . hash_hmac('sha256', $payload, $secret);

        $this->assertTrue(Webhook::verifySignature($payload, $signature, $secret));
        $this->assertFalse(Webhook::verifySignature($payload, 'wrong_signature', $secret));
        $this->assertTrue(Webhook::verifySignature($payload, $signature, '')); // No secret configured
    }

    public function testGenerateVerifyToken()
    {
        $token1 = Webhook::generateVerifyToken();
        $token2 = Webhook::generateVerifyToken();

        // Tokens should be 32 characters long by default
        $this->assertEquals(32, strlen($token1));
        $this->assertEquals(32, strlen($token2));

        // Tokens should be different
        $this->assertNotEquals($token1, $token2);

        // Test custom length
        $token3 = Webhook::generateVerifyToken(16);
        $this->assertEquals(16, strlen($token3));
    }

    public function testIsActivityCreationEvent()
    {
        $activityCreateEvent = [
            'object_type' => 'activity',
            'aspect_type' => 'create',
            'object_id' => 12345,
            'owner_id' => 67890
        ];

        $activityUpdateEvent = [
            'object_type' => 'activity',
            'aspect_type' => 'update',
            'object_id' => 12345,
            'owner_id' => 67890
        ];

        $athleteUpdateEvent = [
            'object_type' => 'athlete',
            'aspect_type' => 'update',
            'object_id' => 67890,
            'owner_id' => 67890
        ];

        $this->assertTrue(Webhook::isActivityCreationEvent($activityCreateEvent));
        $this->assertFalse(Webhook::isActivityCreationEvent($activityUpdateEvent));
        $this->assertFalse(Webhook::isActivityCreationEvent($athleteUpdateEvent));
    }

    public function testGetAthleteId()
    {
        $event = [
            'object_type' => 'activity',
            'aspect_type' => 'create',
            'object_id' => 12345,
            'owner_id' => 67890
        ];

        $this->assertEquals(67890, Webhook::getAthleteId($event));

        $eventWithoutOwner = [
            'object_type' => 'activity',
            'aspect_type' => 'create',
            'object_id' => 12345
        ];

        $this->assertNull(Webhook::getAthleteId($eventWithoutOwner));
    }

    public function testGetObjectId()
    {
        $event = [
            'object_type' => 'activity',
            'aspect_type' => 'create',
            'object_id' => 12345,
            'owner_id' => 67890
        ];

        $this->assertEquals(12345, Webhook::getObjectId($event));

        $eventWithoutObject = [
            'object_type' => 'activity',
            'aspect_type' => 'create',
            'owner_id' => 67890
        ];

        $this->assertNull(Webhook::getObjectId($eventWithoutObject));
    }

    public function testValidateEventPayload()
    {
        $validEvent = [
            'object_type' => 'activity',
            'aspect_type' => 'create',
            'object_id' => 12345,
            'owner_id' => 67890
        ];

        $result = Webhook::validateEventPayload($validEvent);
        $this->assertTrue($result['valid']);
        $this->assertNull($result['error']);

        // Test missing fields
        $invalidEvent = [
            'object_type' => 'activity',
            'aspect_type' => 'create'
            // Missing object_id and owner_id
        ];

        $result = Webhook::validateEventPayload($invalidEvent);
        $this->assertFalse($result['valid']);
        $this->assertStringContainsString('Missing required field', $result['error']);

        // Test invalid field types
        $invalidTypesEvent = [
            'object_type' => 123, // Should be string
            'aspect_type' => 'create',
            'object_id' => 'not_numeric', // Should be numeric
            'owner_id' => 67890
        ];

        $result = Webhook::validateEventPayload($invalidTypesEvent);
        $this->assertFalse($result['valid']);
        $this->assertStringContainsString('must be', $result['error']);
    }

    protected function tearDown(): void
    {
        // Clean up global variables after each test
        $_SERVER = [];
        $_GET = [];
        parent::tearDown();
    }
}

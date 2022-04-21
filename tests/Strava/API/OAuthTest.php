<?php

use Tests\Support\TestCase;

/**
 * Test...
 *
 * @see Strava\API\OAuth
 * @author Bas van Dorst
 * @package StravaPHP
 */
final class OAuthTest extends TestCase
{
    /**
     * @var Strava\API\OAuth
     */
    private $oauth;

    protected function setUp(): void
    {
        parent::setUp();

        $this->oauth = new Strava\API\OAuth(array());
    }

    private function getResponseMock()
    {
        $json = '{"id": 12345, "firstname": "mock_first_name", "lastname": "mock_last_name", "email": "mock_email", "country": "NL", "sex": "M", "profile": "profile_url"}';
        $response = json_decode($json);
        return $response;
    }

    public function testUrlAuthorize()
    {
        $url = $this->oauth->urlAuthorize();
        $this->assertNotEmpty($url);
    }

    public function testUrlAccessToken()
    {
        $url = $this->oauth->urlAccessToken();
        $this->assertNotEmpty($url);
    }

    public function testUrlUserDetails()
    {
        $url = $this->oauth->urlUserDetails();
        $this->assertNotEmpty($url);
    }

    public function testUserDetails()
    {
        $reponseMock = $this->getResponseMock();

        $output = $this->oauth->userDetails($reponseMock);
        $this->assertInstanceOf('stdClass', $output);
    }

    public function testUserUid()
    {
        $reponseMock = $this->getResponseMock();

        $output = $this->oauth->userUid($reponseMock);
        $this->assertEquals(12345, $output);
    }

    public function testUserEmail()
    {
        $reponseMock = $this->getResponseMock();

        $output = $this->oauth->userEmail($reponseMock);
        $this->assertEquals('mock_email', $output);
    }

    public function testUserScreenName()
    {
        $reponseMock = $this->getResponseMock();

        $output = $this->oauth->userScreenName($reponseMock);
        $this->assertEquals('mock_first_name mock_last_name', $output);
    }

    public function testBaseAuthorizationUrl()
    {
        $result = $this->oauth->getBaseAuthorizationUrl();

        $this->assertSame('https://www.strava.com/oauth/authorize', $result);
    }

    public function testBaseAccessTokenUrl()
    {
        $result = $this->oauth->getBaseAccessTokenUrl(array());

        $this->assertSame('https://www.strava.com/oauth/token', $result);
    }
}

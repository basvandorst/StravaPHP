<?php

/**
 * Test...
 *
 * @see Strava\API\OAuth
 * @author Bas van Dorst
 * @package StravaPHP
 */
class OAuthTest extends PHPUnit_Framework_TestCase
{
    private function getResponseMock()
    {
        $json = '{"id": 12345, "firstname": "mock_first_name", "lastname": "mock_last_name", "email": "mock_email", "country": "NL", "sex": "M", "profile": "profile_url"}';
        $response = json_decode($json);
        return $response;
    }

    public function testUrlAuthorize()
    {
        $oauth = new Strava\API\OAuth(array());
        $url = $oauth->urlAuthorize();
        $this->assertNotEmpty($url);
    }

    public function testUrlAccessToken()
    {
        $oauth = new Strava\API\OAuth(array());
        $url = $oauth->urlAccessToken();
        $this->assertNotEmpty($url);
    }

    public function testUrlUserDetails()
    {
        $oauth = new Strava\API\OAuth(array());
        $url = $oauth->urlUserDetails();
        $this->assertNotEmpty($url);
    }

    public function testUserDetails()
    {
        $reponseMock = $this->getResponseMock();

        $oauth = new Strava\API\OAuth(array());
        $output = $oauth->userDetails($reponseMock);
        $this->assertInstanceOf('stdClass', $output);
    }

    public function testUserUid()
    {
        $reponseMock = $this->getResponseMock();

        $oauth = new Strava\API\OAuth(array());
        $output = $oauth->userUid($reponseMock);
        $this->assertEquals(12345, $output);
    }

    public function testUserEmail()
    {
        $reponseMock = $this->getResponseMock();

        $oauth = new Strava\API\OAuth(array());
        $output = $oauth->userEmail($reponseMock);
        $this->assertEquals('mock_email', $output);
    }

    public function testUserScreenName()
    {
        $reponseMock = $this->getResponseMock();

        $oauth = new Strava\API\OAuth(array());
        $output = $oauth->userScreenName($reponseMock);
        $this->assertEquals('mock_first_name mock_last_name', $output);
    }
}

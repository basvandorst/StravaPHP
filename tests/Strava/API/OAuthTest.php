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
    private function getAccessTokenMock() {
        $tokenMock = $this->getMockBuilder('League\OAuth2\Client\Token\AccessToken')
            ->disableOriginalConstructor()
            ->getMock();
        return $tokenMock;
    }
    
    private function getResponseMock() {
        $json = '{"id": 12345, "firstname": "mock_first_name", "lastname": "mock_last_name", "email": "mock_email", "country": "NL", "sex": "M", "profile": "profile_url"}';
        $response = json_decode($json);
        return $response;
    }
    
    public function testUrlAuthorize() {
        $oauth = new Strava\API\OAuth(array());
        $url = $oauth->urlAuthorize();
        $this->assertNotEmpty($url);
    }
    
    public function testUrlAccessToken() {
        $oauth = new Strava\API\OAuth(array());
        $url = $oauth->urlAccessToken();
        $this->assertNotEmpty($url);
    }
    
    public function testUrlUserDetails() {
        $tokenMock = $this->getAccessTokenMock();
        
        $oauth = new Strava\API\OAuth(array());
        $url = $oauth->urlUserDetails($tokenMock);
        $this->assertNotEmpty($url);
    }
    
    public function testUserDetails() {
        $tokenMock = $this->getAccessTokenMock();
        $reponseMock = $this->getResponseMock();
        
        $oauth = new Strava\API\OAuth(array());
        $output = $oauth->userDetails($reponseMock,$tokenMock);
        $this->assertInstanceOf('League\OAuth2\Client\Entity\User',$output);
    }
    
    public function testUserUid() {
        $tokenMock = $this->getAccessTokenMock();
        $reponseMock = $this->getResponseMock();
        
        $oauth = new Strava\API\OAuth(array());
        $output = $oauth->userUid($reponseMock,$tokenMock);
        $this->assertEquals(12345, $output);
    }
    
    public function testUserEmail() {
        $tokenMock = $this->getAccessTokenMock();
        $reponseMock = $this->getResponseMock();
        
        $oauth = new Strava\API\OAuth(array());
        $output = $oauth->userEmail($reponseMock,$tokenMock);
        $this->assertEquals('mock_email', $output);
    }
    
    public function testUserScreenName() {
        $tokenMock = $this->getAccessTokenMock();
        $reponseMock = $this->getResponseMock();
        
        $oauth = new Strava\API\OAuth(array());
        $output = $oauth->userScreenName($reponseMock,$tokenMock);
        $this->assertEquals('mock_first_name mock_last_name', $output);
    }
}
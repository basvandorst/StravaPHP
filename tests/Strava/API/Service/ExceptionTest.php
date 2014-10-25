<?php
/**
 * Test...
 * 
 * @see Strava\API\Service\Exception
 * @author Bas van Dorst
 * @package StravaPHP
 */
class ServiceExceptionTest extends PHPUnit_Framework_TestCase
{    
    public function testIsException() {
        $this->setExpectedException('Strava\API\Service\Exception');
        throw new Strava\API\Service\Exception();
    }
    
    public function testInstanceOfException() {
        try {
            throw new Strava\API\Service\Exception();    
        } catch (Exception $ex) {
            $this->assertInstanceOf('Strava\API\Service\Exception',$ex);
            $this->assertInstanceOf('\Exception',$ex);
        }
    }
    
    public function testExceptionMessageAndCode() {
        try {
            throw new Strava\API\Service\Exception('test', 100);
        } catch (Exception $ex) {
            $this->assertEquals('test',$ex->getMessage());
            $this->assertEquals(100,$ex->getCode());
        }
    }
}
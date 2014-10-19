<?php

class ServiceExceptionTest extends PHPUnit_Framework_TestCase
{    
    public function testIsException() {
        $this->setExpectedException('Strava\API\Exception\ServiceException');
        throw new Strava\API\Exception\ServiceException();
    }
    
    public function testInstanceOfException() {
        try {
            throw new Strava\API\Exception\ServiceException();    
        } catch (Exception $ex) {
            $this->assertInstanceOf('Strava\API\Exception\ServiceException',$ex);
            $this->assertInstanceOf('\Exception',$ex);
        }
    }
    
    public function testExceptionMessageAndCode() {
        try {
            throw new Strava\API\Exception\ServiceException('test', 100);
        } catch (Exception $ex) {
            $this->assertEquals('test',$ex->getMessage());
            $this->assertEquals(100,$ex->getCode());
        }
    }
}
<?php

class ClientExceptionTest extends PHPUnit_Framework_TestCase
{    
    public function testIsException() {
        $this->setExpectedException('Strava\API\Exception\ClientException');
        throw new Strava\API\Exception\ClientException();
    }
    
    public function testInstanceOfException() {
        try {
            throw new Strava\API\Exception\ClientException();    
        } catch (Exception $ex) {
            $this->assertInstanceOf('Strava\API\Exception\ClientException',$ex);
            $this->assertInstanceOf('\Exception',$ex);
        }
    }
    
    public function testExceptionMessageAndCode() {
        try {
            throw new Strava\API\Exception\ClientException('test', 100);
        } catch (Exception $ex) {
            $this->assertEquals('test',$ex->getMessage());
            $this->assertEquals(100,$ex->getCode());
        }
    }
}
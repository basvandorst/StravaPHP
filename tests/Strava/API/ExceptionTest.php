<?php

use Tests\Support\TestCase;

/**
 * Test...
 *
 * @see Strava\API\Exception
 * @author Bas van Dorst
 * @package StravaPHP
 */
class ExceptionTest extends TestCase
{
    public function testIsException()
    {
        $this->expectException('Strava\API\Exception');
        throw new Strava\API\Exception();
    }

    public function testInstanceOfException()
    {
        try {
            throw new Strava\API\Exception();
        } catch (Exception $ex) {
            $this->assertInstanceOf('Strava\API\Exception', $ex);
            $this->assertInstanceOf('\Exception', $ex);
        }
    }

    public function testExceptionMessageAndCode()
    {
        try {
            throw new Strava\API\Exception('test', 100);
        } catch (Exception $ex) {
            $this->assertEquals('test', $ex->getMessage());
            $this->assertEquals(100, $ex->getCode());
        }
    }
}

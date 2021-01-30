<?php

namespace Beekalam\IRAirports\Tests;

use Beekalam\IRAirports\IRAirport;
use PHPUnit\Framework\TestCase;

class AirportTest extends TestCase
{
    /** @test */
    public function can_make_an_airport()
    {
        $this->assertEquals('JSK', IRAirport::fromCode('JSK')->getCode());
    }

    /** @test */
    function can_create_airport_from_code()
    {
        $this->assertEquals('JSK', IRAirport::fromCode('JSK')->getCode());
    }

    /** @test */
    function can_get_airport_name()
    {
        $this->assertEquals('JSK', IRAirport::fromCode('JSK')->getCode());
    }

}

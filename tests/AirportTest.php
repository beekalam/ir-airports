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

    /** @test */
    function it_should_give_persian_name()
    {
        $this->assertNotEmpty('JSK', IRAirport::fromCode('JSK')->getPersianName());
    }

    /** @test */
    function it_can_give_type_of_airport()
    {
        $this->assertNotEmpty('small_airport', IRAirport::fromCode('JSK')->getType());
    }

    /** @test */
    function it_accepts_array_values_in_constructor()
    {
        $this->expectException(\InvalidArgumentException::class);
        new IRAirport('string');
    }

    /** @test */
    function it_can_create_an_airport_from_iata_code()
    {
        $this->expectException(\InvalidArgumentException::class);
        new IRAirport([]);
    }

    /** @test */
    function it_can_not_create_airport_from_invalid_iata_code()
    {
        $this->expectException(\InvalidArgumentException::class);
        IRAirport::fromCode('not valid airport code')->getCode();
    }
}

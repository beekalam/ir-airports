<?php

namespace Beekalam\IrAirports\Tests;

use Beekalam\IrAirports\IRAirport;
use PHPUnit\Framework\TestCase;

class AirportTest extends TestCase
{
    /** @test */
    public function true_is_true()
    {
        $this->assertNotNull(new IRAirport());
    }
}

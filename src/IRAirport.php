<?php

namespace Beekalam\IRAirports;

$airport_data = require __DIR__."/airportdata.php";
die(var_dump($airport_data));

class IRAirport
{
    private string $code;

    private string $englishName;

    private static $airports = $airport_data;

    public function __construct()
    {

    }
}

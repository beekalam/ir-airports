<?php

namespace Beekalam\IRAirports;

use Webmozart\Assert\Assert;

class IRAirport
{
    /**
     * @var mixed
     */
    private $code;

    /**
     * @var mixed
     */
    private $englishName;

    /**
     * @var mixed
     */
    private $type;

    /**
     * @var mixed
     */
    private $coordinates;

    /**
     * @var mixed
     */
    private $municipality;

    /**
     * @var
     */
    private $persianName;

    public function __construct($airport)
    {
        Assert::isArray($airport);
        Assert::inArray('iata_code', array_keys($airport), 'iata_code not found.');

        $this->code = $airport['iata_code'];
        $this->coordinates = $airport['coordinates'];
        $this->municipality = $airport['municipality'];
        $this->name = $airport['name'];
        $this->englishName = $this->name;
        $this->type = $airport['type'];
        $this->persianName = $airport['fa_name'];
    }

    public static function fromCode($code)
    {
        $airports = AirportsArray::IRAirportsArray();
        if (array_key_exists($code, $airports)) {
            $airport = $airports[$code];

            return new self($airport);
        }
        throw new \InvalidArgumentException('Invalid Airport code.');
    }

    /**
     * @return mixed|string
     */
    public function getEnglishName()
    {
        return $this->englishName;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     * @return mixed
     */
    public function getMunicipality()
    {
        return $this->municipality;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     * @return IRAirport
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @param mixed $type
     * @return IRAirport
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @param mixed $coordinates
     * @return IRAirport
     */
    public function setCoordinates($coordinates)
    {
        $this->coordinates = $coordinates;

        return $this;
    }

    /**
     * @param mixed $municipality
     * @return IRAirport
     */
    public function setMunicipality($municipality)
    {
        $this->municipality = $municipality;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPersianName()
    {
        return $this->persianName;
    }

    /**
     * @param mixed $persianName
     */
    public function setPersianName($persianName): void
    {
        $this->persianName = $persianName;
    }
}

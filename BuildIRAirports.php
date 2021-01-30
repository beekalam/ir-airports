<?php

class BuildIRAirports
{
    private $export_path;

    private $airportJsonURL;

    private $filterCountries = ['IR'];

    /**
     * BuildIRAirports constructor.
     */
    public function __construct()
    {
        set_time_limit(-1);
        $this->export_path = __DIR__."/src/AirportsArray.php";
        $this->airportJsonURL = "https://datahub.io/core/airport-codes/r/airport-codes.json";

        $export = $this->buildExportString($this->buildAirportArray());
        var_dump($export);
        $this->writeExport($export);
    }

    public function buildAirportArray()
    {
        $airport_data = json_decode(file_get_contents($this->airportJsonURL), true);

        $export = [];
        foreach ($airport_data as $row) {
            if (in_array($row['iso_country'], $this->filterCountries)) {
                $export[$row['iata_code']] = $row;
            }
        }

        return $export;
    }

    public function buildExportString($export)
    {
        //return "<?php".PHP_EOL."return ".var_export($export, true).";";
        $template = <<<TEMPLATE
<?php
namespace Beekalam\IRAirports;

class AirportsArray {
    public static function IRAirportsArray() {
        return %s;
    }
}
TEMPLATE;

        return sprintf($template, var_export($export, true));
    }

    public function writeExport($content)
    {
        file_put_contents($this->export_path, $content);
    }

}

new BuildIRAirports();

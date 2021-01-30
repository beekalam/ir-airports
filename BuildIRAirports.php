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
        $this->export_path = __DIR__."/IRAirports/airportdata.php";
        $this->airportJsonURL = "https://datahub.io/core/airport-codes/r/airport-codes.json";

        $export = $this->buildExportString($this->buildAirportArray());
        $this->writeExport($export);
    }

    public function buildAirportArray()
    {
        $airport_data = json_decode(file_get_contents($this->airportJsonURL), true);

        $export = [];
        foreach ($airport_data as $row) {
            if ($row['iata_code'] && in_array($row['iata_code'], $this->filterCountries)) {
                $export[$row['iata_code']] = $row;
            }
        }

        return $export;
    }

    public function buildExportString($export)
    {
        return "<?php".PHP_EOL.var_export($export, true).";";
    }

    public function writeExport($content)
    {
        file_put_contents($this->export_path, $content);
    }
}

new BuildIRAirports();

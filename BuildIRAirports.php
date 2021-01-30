<?php

class BuildIRAirports
{
    private $export_path;

    private $airportJsonURL;

    private $filterCountries = ['IR'];

    private $persianNames = [
        'KHA' => 'خانه',
        'GSM' => 'قشم',
        'IAQ' => 'بهرگان',
        'ABD' => 'آبادان',
        'DEF' => 'دزفول',
        'AKW' => 'آقاجاری',
        'GCH' => 'گچساران',
        'OMI' => 'امیدیه',
        'MRX' => 'ماهشهر',
        'AWZ' => 'اهواز',
        'AEU' => 'ابوموسی',
        'BUZ' => 'بوشهر',
        'YEH' => 'عسلویه',
        'KNR' => 'کنگان',
        'KIH' => 'کیش',
        'BDH' => 'بندر لنگه',
        'PGU' => 'عسلویه',
        'KHK' => 'خارک',
        'SXI' => '',
        'LVP' => 'لاوان',
        'KSH' => 'کرمانشاه',
        'IIL' => 'ایلام',
        'KHD' => 'خرم آباد',
        'SDG' => 'سنندج',
        'IFH' => '',
        'KKS' => 'کاشان',
        'IFN' => 'اصفهان',
        'CQD' => 'شهرکرد',
        'RAS' => 'رشت',
        'HDM' => 'همدان',
        'AJK' => 'اراک',
        'IKA' => 'تهران',
        'THR' => 'تهران',
        'GWZ' => 'قزوین',
        'PYK' => 'کرج',
        'SNX' => 'سمنان',
        'BND' => 'بندرعباس',
        'JYR' => 'جیرفت',
        'KER' => 'کرمان',
        'BXR' => 'بام',
        'HDR' => 'هوادریا',
        'RJN' => 'رفسنجان',
        'SYJ' => 'سیرجان',
        'XBJ' => 'بیرجند',
        'CKT' => 'سرخس',
        'RUD' => 'شاهرود',
        'MHD' => 'مشهد',
        'BJB' => 'بجنورد',
        'AFZ' => 'سبزوار',
        'TCX' => 'طبس',
        'KLM' => 'کلاله',
        'GBT' => 'گرگان',
        'BSM' => 'آمل',
        'NSH' => 'نوشهر',
        'RZR' => 'رامسر',
        'SRY' => 'ساری',
        'FAZ' => 'فسا',
        'JAR' => 'جهرم',
        'LRR' => 'لار',
        'LFM' => 'لامرد',
        'SYZ' => 'شیراز',
        'YES' => 'یاسوج',
        'KHY' => 'خوی',
        'ADU' => 'اردبیل',
        'ACP' => 'مراغه',
        'PFQ' => 'پارس آباد',
        'OMH' => 'ارومیه',
        'TBZ' => 'تبریز',
        'IMQ' => 'ماکو',
        'JWN' => 'زنجان',
        'AZD' => 'یزد',
        'ACZ' => 'زابل',
        'ZBR' => 'چابهار',
        'ZAH' => 'زاهدان',
        'IHR' => 'ایرانشهر',
        'JSK' => 'جاسک',
    ];

    /**
     * BuildIRAirports constructor.
     */
    public function __construct()
    {
        set_time_limit(-1);
        $this->export_path = __DIR__."/src/AirportsArray.php";
        $this->airportJsonURL = "https://datahub.io/core/airport-codes/r/airport-codes.json";

        $export = $this->buildExportString($this->buildAirportArray());
        $this->writeExport($export);
    }

    public function buildAirportArray()
    {
        $airport_data = json_decode(file_get_contents($this->airportJsonURL), true);

        $export = [];
        foreach ($airport_data as $row) {
            if ($row['iata_code']) {
                if (in_array($row['iso_country'], $this->filterCountries)) {
                    $row['fa_name'] = $this->getPersianName($row['iata_code']);
                    $export[$row['iata_code']] = $row;
                }
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

    public function getPersianName($iata_code)
    {
        if (array_key_exists($iata_code, $this->persianNames)) {
            return $this->persianNames[$iata_code];
        }

        return '';
    }
}

new BuildIRAirports();

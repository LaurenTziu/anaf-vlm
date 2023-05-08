<?php

declare(strict_types=1);

namespace Anaf\Responses\Info;

final class RetrieveResponseHqAddress
{
    /**
     * @readonly
     * @var string
     */
    public $street;
    /**
     * @readonly
     * @var string
     */
    public $no;
    /**
     * @readonly
     * @var string
     */
    public $city;
    /**
     * @readonly
     * @var string
     */
    public $cityCode;
    /**
     * @readonly
     * @var string
     */
    public $county;
    /**
     * @readonly
     * @var string
     */
    public $countyCode;
    /**
     * @readonly
     * @var string
     */
    public $countyShort;
    /**
     * @readonly
     * @var string
     */
    public $country;
    /**
     * @readonly
     * @var string
     */
    public $details;
    /**
     * @readonly
     * @var string
     */
    public $postalCode;
    private function __construct(string $street, string $no, string $city, string $cityCode, string $county, string $countyCode, string $countyShort, string $country, string $details, string $postalCode)
    {
        $this->street = $street;
        $this->no = $no;
        $this->city = $city;
        $this->cityCode = $cityCode;
        $this->county = $county;
        $this->countyCode = $countyCode;
        $this->countyShort = $countyShort;
        $this->country = $country;
        $this->details = $details;
        $this->postalCode = $postalCode;
    }
    /**
     * @param  array{sdenumire_Strada: string, snumar_Strada: string, sdenumire_Localitate: string, scod_Localitate: string, sdenumire_Judet: string, scod_Judet: string, scod_JudetAuto: string, stara: string, sdetalii_Adresa: string, scod_Postal: string}  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self($attributes['sdenumire_Strada'], $attributes['snumar_Strada'], $attributes['sdenumire_Localitate'], $attributes['scod_Localitate'], $attributes['sdenumire_Judet'], $attributes['scod_Judet'], $attributes['scod_JudetAuto'], $attributes['stara'], $attributes['sdetalii_Adresa'], $attributes['scod_Postal']);
    }

    /**
     * @return array{street: string, no: string, city: string, city_code: string, county: string, county_code: string, county_short: string, country: string, details: string, postalCode: string}
     */
    public function toArray(): array
    {
        return [
            'street' => $this->street,
            'no' => $this->no,
            'city' => $this->city,
            'city_code' => $this->cityCode,
            'county' => $this->county,
            'county_code' => $this->countyCode,
            'county_short' => $this->countyShort,
            'country' => $this->country,
            'details' => $this->details,
            'postalCode' => $this->postalCode,
        ];
    }
}

<?php

declare(strict_types=1);

namespace Anaf\Responses\Info;

final class RetrieveResponseFiscalAddress
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
     * @param  array{ddenumire_Strada: string, dnumar_Strada: string, ddenumire_Localitate: string, dcod_Localitate: string, ddenumire_Judet: string, dcod_Judet: string, dcod_JudetAuto: string, dtara: string, ddetalii_Adresa: string, dcod_Postal: string}  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self($attributes['ddenumire_Strada'], $attributes['dnumar_Strada'], $attributes['ddenumire_Localitate'], $attributes['dcod_Localitate'], $attributes['ddenumire_Judet'], $attributes['dcod_Judet'], $attributes['dcod_JudetAuto'], $attributes['dtara'], $attributes['ddetalii_Adresa'], $attributes['dcod_Postal']);
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

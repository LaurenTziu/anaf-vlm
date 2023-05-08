<?php

declare(strict_types=1);

namespace Anaf\Responses\BalanceSheet;

use Anaf\Contracts\Indicator;
use Anaf\Contracts\Response;
use Anaf\Enums\BalanceSheet\BL;
use Anaf\Enums\BalanceSheet\OL;
use Anaf\Responses\Concerns\ArrayAccessible;

/**
 * @implements Response<array{year: int, tax_identification_number: int, company_name: string, activity_code: int, activity_name: string, indicators: array<string, array{indicator: string, value: int, indicator_name: string}>}>
 */
final class GetResponse implements Response
{
    /**
     * @use ArrayAccessible<array{year: int, tax_identification_number: int, company_name: string, activity_code: int, activity_name: string, indicators: array<string, array{indicator: string, value: int, indicator_name: string}>}>
     */
    use ArrayAccessible;
    /**
     * @readonly
     * @var int
     */
    public $year;
    /**
     * @readonly
     * @var int
     */
    public $taxIdentificationNumber;
    /**
     * @readonly
     * @var string
     */
    public $companyName;
    /**
     * @readonly
     * @var int
     */
    public $activityCode;
    /**
     * @readonly
     * @var string
     */
    public $activityName;
    /**
     * @var array<string, RetrieveResponseIndicators>
     * @readonly
     */
    public $indicators;
    /**
     * @param  array<string, RetrieveResponseIndicators>  $indicators
     */
    private function __construct(int $year, int $taxIdentificationNumber, string $companyName, int $activityCode, string $activityName, array $indicators)
    {
        $this->year = $year;
        $this->taxIdentificationNumber = $taxIdentificationNumber;
        $this->companyName = $companyName;
        $this->activityCode = $activityCode;
        $this->activityName = $activityName;
        $this->indicators = $indicators;
    }

    /**
     * Acts as static factory, and returns a new Response instance.
     *
     * @param  array{an: int, cui: int, deni: string, caen: int, den_caen: string, i: array<int, array{indicator: string, val_indicator: int, val_den_indicator: string}>}  $attributes
     */
    public static function from(array $attributes): self
    {
        switch ($attributes['i'][0]['val_den_indicator']) {
            case 'Numar mediu de salariati':
                $indicatorType = BL::class;
                break;
            case 'Efectivul de personal privind activitatile economice':
                $indicatorType = OL::class;
                break;
            default:
                $indicatorType = BL::class;
                break;
        }

        $indicators = array_reduce($attributes['i'], function (array $result, $item) use ($indicatorType): array {
            $replaceDiacritics = (string) iconv('UTF-8', 'ASCII//TRANSLIT', $item['val_den_indicator']);
            $key = str_replace(['  ', ':'], [' ', ''], trim(strtoupper($replaceDiacritics)));
            $cleanKey = (string) preg_replace('/ - LA (\d{2}\.\d{2}\.\d{4})/', '', $key);

            /**
             * @var array<string, RetrieveResponseIndicators> $result
             */
            $result[$indicatorType::from($cleanKey)->name] = RetrieveResponseIndicators::from($item);

            return $result;
        }, []);

        return new self($attributes['an'], $attributes['cui'], $attributes['deni'], $attributes['caen'], $attributes['den_caen'], $indicators);
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'year' => $this->year,
            'tax_identification_number' => $this->taxIdentificationNumber,
            'company_name' => $this->companyName,
            'activity_code' => $this->activityCode,
            'activity_name' => $this->activityName,
            'indicators' => array_map(static function (RetrieveResponseIndicators $response) : array {
                return $response->toArray();
            }, $this->indicators),
        ];
    }
}

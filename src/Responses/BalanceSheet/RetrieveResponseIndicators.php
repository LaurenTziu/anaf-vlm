<?php

declare(strict_types=1);

namespace Anaf\Responses\BalanceSheet;

final class RetrieveResponseIndicators
{
    /**
     * @readonly
     * @var string
     */
    public $indicator;
    /**
     * @readonly
     * @var int
     */
    public $value;
    /**
     * @readonly
     * @var string
     */
    public $indicatorName;
    private function __construct(string $indicator, int $value, string $indicatorName)
    {
        $this->indicator = $indicator;
        $this->value = $value;
        $this->indicatorName = $indicatorName;
    }
    /**
     * @param  array{indicator: string, val_indicator: int, val_den_indicator: string}  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self($attributes['indicator'], $attributes['val_indicator'], $attributes['val_den_indicator']);
    }

    /**
     * @return array{indicator: string, value: int, indicator_name: string}
     */
    public function toArray(): array
    {
        return [
            'indicator' => $this->indicator,
            'value' => $this->value,
            'indicator_name' => $this->indicatorName,
        ];
    }
}

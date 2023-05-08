<?php

declare(strict_types=1);

namespace Anaf\Responses\Info;

final class RetrieveResponseVatPeriods
{
    /**
     * @readonly
     * @var string|null
     */
    public $startDate;
    /**
     * @readonly
     * @var string|null
     */
    public $stopDate;
    /**
     * @readonly
     * @var string|null
     */
    public $stopEffectiveDate;
    /**
     * @readonly
     * @var string|null
     */
    public $message;
    private function __construct(?string $startDate, ?string $stopDate, ?string $stopEffectiveDate, ?string $message)
    {
        $this->startDate = $startDate;
        $this->stopDate = $stopDate;
        $this->stopEffectiveDate = $stopEffectiveDate;
        $this->message = $message;
    }
    /**
     * @param  array{data_inceput_ScpTVA: ?string, data_sfarsit_ScpTVA: ?string, data_anul_imp_ScpTVA: ?string, mesaj_ScpTVA: ?string}  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self($attributes['data_inceput_ScpTVA'], $attributes['data_sfarsit_ScpTVA'], $attributes['data_anul_imp_ScpTVA'], $attributes['mesaj_ScpTVA']);
    }

    /**
     * @return array{start_date: ?string, stop_date: ?string, stop_effective_date: ?string, message: ?string}
     */
    public function toArray(): array
    {
        return [
            'start_date' => $this->startDate,
            'stop_date' => $this->stopDate,
            'stop_effective_date' => $this->stopEffectiveDate,
            'message' => $this->message,
        ];
    }
}

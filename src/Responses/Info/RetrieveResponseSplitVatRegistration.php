<?php

declare(strict_types=1);

namespace Anaf\Responses\Info;

final class RetrieveResponseSplitVatRegistration
{
    /**
     * @readonly
     * @var string
     */
    public $startDate;
    /**
     * @readonly
     * @var string
     */
    public $stopDate;
    /**
     * @readonly
     * @var bool
     */
    public $status;
    private function __construct(string $startDate, string $stopDate, bool $status)
    {
        $this->startDate = $startDate;
        $this->stopDate = $stopDate;
        $this->status = $status;
    }
    /**
     * @param  array{dataInceputSplitTVA: string, dataAnulareSplitTVA: string, statusSplitTVA: bool}  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self($attributes['dataInceputSplitTVA'], $attributes['dataAnulareSplitTVA'], $attributes['statusSplitTVA']);
    }

    /**
     * @return array{start_date: string, stop_date: string, status: bool}
     */
    public function toArray(): array
    {
        return [
            'start_date' => $this->startDate,
            'stop_date' => $this->stopDate,
            'status' => $this->status,
        ];
    }
}

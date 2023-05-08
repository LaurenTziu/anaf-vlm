<?php

declare(strict_types=1);

namespace Anaf\Responses\Info;

final class RetrieveResponseVatRegistrationAtCheckout
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
     * @var string
     */
    public $updateDate;
    /**
     * @readonly
     * @var string
     */
    public $publishDate;
    /**
     * @readonly
     * @var string
     */
    public $updatedType;
    /**
     * @readonly
     * @var bool
     */
    public $status;
    private function __construct(string $startDate, string $stopDate, string $updateDate, string $publishDate, string $updatedType, bool $status)
    {
        $this->startDate = $startDate;
        $this->stopDate = $stopDate;
        $this->updateDate = $updateDate;
        $this->publishDate = $publishDate;
        $this->updatedType = $updatedType;
        $this->status = $status;
    }
    /**
     * @param array{dataInceputTvaInc: string, dataSfarsitTvaInc: string, dataActualizareTvaInc: string,
     *     dataPublicareTvaInc: string, tipActTvaInc: string, statusTvaIncasare: bool} $attributes
     */
    public static function from(array $attributes): self
    {
        return new self($attributes['dataInceputTvaInc'], $attributes['dataSfarsitTvaInc'], $attributes['dataActualizareTvaInc'], $attributes['dataPublicareTvaInc'], $attributes['tipActTvaInc'], $attributes['statusTvaIncasare']);
    }

    /**
     * @return array{start_date: string, stop_date: string, update_date: string, publish_date: string, updated_type: string}
     */
    public function toArray(): array
    {
        return [
            'start_date' => $this->startDate,
            'stop_date' => $this->stopDate,
            'update_date' => $this->updateDate,
            'publish_date' => $this->publishDate,
            'updated_type' => $this->updatedType,
        ];
    }
}

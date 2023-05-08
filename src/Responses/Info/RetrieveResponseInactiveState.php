<?php

declare(strict_types=1);

namespace Anaf\Responses\Info;

final class RetrieveResponseInactiveState
{
    /**
     * @readonly
     * @var string
     */
    public $inactivationDate;
    /**
     * @readonly
     * @var string
     */
    public $reactivationDate;
    /**
     * @readonly
     * @var string
     */
    public $publishDate;
    /**
     * @readonly
     * @var string
     */
    public $deletionDate;
    /**
     * @readonly
     * @var bool
     */
    public $status;
    private function __construct(string $inactivationDate, string $reactivationDate, string $publishDate, string $deletionDate, bool $status)
    {
        $this->inactivationDate = $inactivationDate;
        $this->reactivationDate = $reactivationDate;
        $this->publishDate = $publishDate;
        $this->deletionDate = $deletionDate;
        $this->status = $status;
    }
    /**
     * @param  array{dataInactivare: string, dataReactivare: string, dataPublicare: string, dataRadiere: string, statusInactivi: bool}  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self($attributes['dataInactivare'], $attributes['dataReactivare'], $attributes['dataPublicare'], $attributes['dataRadiere'], $attributes['statusInactivi']);
    }

    /**
     * @return array{inactivation_date: string, reactivation_date: string, publish_date: string, deletion_date: string, status: bool}
     */
    public function toArray(): array
    {
        return [
            'inactivation_date' => $this->inactivationDate,
            'reactivation_date' => $this->reactivationDate,
            'publish_date' => $this->publishDate,
            'deletion_date' => $this->deletionDate,
            'status' => $this->status,
        ];
    }
}

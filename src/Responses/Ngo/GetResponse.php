<?php

declare(strict_types=1);

namespace Anaf\Responses\Ngo;

use Anaf\Contracts\Response;
use Anaf\Responses\Concerns\ArrayAccessible;

/**
 * @implements Response<array{tax_identification_number: int, search_date: string, entity_name: string, address: string, phone: string, postal_code: string, document: string, start_date: string, end_date: string, status: bool}>
 */
final class GetResponse implements Response
{
    /**
     * @use ArrayAccessible<array{tax_identification_number: int, search_date: string, entity_name: string, address: string, phone: string, postal_code: string, document: string, registration_status: string, start_date: string, end_date: string, status: bool}>
     */
    use ArrayAccessible;
    /**
     * @readonly
     * @var int
     */
    public $taxIdentificationNumber;
    /**
     * @readonly
     * @var string
     */
    public $searchDate;
    /**
     * @readonly
     * @var string
     */
    public $entityName;
    /**
     * @readonly
     * @var string
     */
    public $address;
    /**
     * @readonly
     * @var string
     */
    public $phone;
    /**
     * @readonly
     * @var string
     */
    public $postalCode;
    /**
     * @readonly
     * @var string
     */
    public $document;
    /**
     * @readonly
     * @var string
     */
    public $registrationStatus;
    /**
     * @readonly
     * @var string
     */
    public $startDate;
    /**
     * @readonly
     * @var string
     */
    public $endDate;
    /**
     * @readonly
     * @var bool
     */
    public $status;
    private function __construct(int $taxIdentificationNumber, string $searchDate, string $entityName, string $address, string $phone, string $postalCode, string $document, string $registrationStatus, string $startDate, string $endDate, bool $status)
    {
        $this->taxIdentificationNumber = $taxIdentificationNumber;
        $this->searchDate = $searchDate;
        $this->entityName = $entityName;
        $this->address = $address;
        $this->phone = $phone;
        $this->postalCode = $postalCode;
        $this->document = $document;
        $this->registrationStatus = $registrationStatus;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->status = $status;
    }

    /**
     * Acts as static factory, and returns a new Response instance.
     *
     * @param  array{cui: int, data: string, denumire: string, adresa: string, telefon: string, codPostal: string, act: string, stare_inregistrare: string, dataInceputRegCult: string, dataAnulareRegCult: string, statusRegCult: bool}  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self($attributes['cui'], $attributes['data'], $attributes['denumire'], $attributes['adresa'], $attributes['telefon'], $attributes['codPostal'], $attributes['act'], $attributes['stare_inregistrare'], $attributes['dataInceputRegCult'], $attributes['dataAnulareRegCult'], $attributes['statusRegCult']);
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'tax_identification_number' => $this->taxIdentificationNumber,
            'search_date' => $this->searchDate,
            'entity_name' => $this->entityName,
            'address' => $this->address,
            'phone' => $this->phone,
            'postal_code' => $this->postalCode,
            'document' => $this->document,
            'registration_status' => $this->registrationStatus,
            'start_date' => $this->startDate,
            'end_date' => $this->endDate,
            'status' => $this->status,
        ];
    }
}

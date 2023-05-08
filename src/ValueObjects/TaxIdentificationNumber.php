<?php

declare(strict_types=1);

namespace Anaf\ValueObjects;

use Anaf\Contracts\Stringable;

/**
 * @internal
 */
final class TaxIdentificationNumber implements Stringable
{
    /**
     * @readonly
     * @var string
     */
    private $taxIndentificationNumber;
    /**
     * Creates a new tax identification number value object.
     */
    private function __construct(string $taxIndentificationNumber)
    {
        $this->taxIndentificationNumber = $taxIndentificationNumber;
        // ..
    }

    public static function from(string $taxIndentificationNumber): self
    {
        $cleanTaxIdentificationNumber = str_replace('RO', '', strtoupper(trim($taxIndentificationNumber)));

        return new self($cleanTaxIdentificationNumber);
    }

    /**
     * {@inheritdoc}
     */
    public function toString(): string
    {
        return $this->taxIndentificationNumber;
    }
}

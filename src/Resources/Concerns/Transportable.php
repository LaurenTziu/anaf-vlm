<?php

declare(strict_types=1);

namespace Anaf\Resources\Concerns;

use Anaf\Contracts\Transporter;
use Anaf\ValueObjects\TaxIdentificationNumber;

trait Transportable
{
    private Transporter $transporter;
    private TaxIdentificationNumber $taxIdentificationNumber;
    /**
     * Creates a Client instance with the given Tax Identification Number.
     */
    public function __construct( Transporter $transporter,  TaxIdentificationNumber $taxIdentificationNumber)
    {
        $this->transporter = $transporter;
        $this->taxIdentificationNumber = $taxIdentificationNumber;
    }
}

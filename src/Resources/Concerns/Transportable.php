<?php

declare(strict_types=1);

namespace Anaf\Resources\Concerns;

use Anaf\Contracts\Transporter;
use Anaf\ValueObjects\TaxIdentificationNumber;

trait Transportable
{
    public $transporter;
    public $taxIdentificationNumber;
    /**
     * Creates a Client instance with the given Tax Identification Number.
     */
    public function __construct( Transporter $transporter,  TaxIdentificationNumber $taxIdentificationNumber)
    {
        $this->transporter = $transporter;
        $this->taxIdentificationNumber = $taxIdentificationNumber;
    }
}

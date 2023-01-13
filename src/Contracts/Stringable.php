<?php

declare(strict_types=1);

namespace Anaf\Contracts;

/**
 * @internal
 */
interface Stringable
{
    /**
     * Returns the string representation of the object.
     */
    public function toString(): string;
}

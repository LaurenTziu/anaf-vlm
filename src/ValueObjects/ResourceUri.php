<?php

declare(strict_types=1);

namespace Anaf\ValueObjects;

use Anaf\Contracts\Stringable;

/**
 * @internal
 */
final class ResourceUri implements Stringable
{
    /**
     * @readonly
     * @var string
     */
    private $uri;
    /**
     * Creates a new ResourceUri value object.
     */
    private function __construct(string $uri)
    {
        $this->uri = $uri;
        // ..
    }

    /**
     * Creates a new ResourceUri value object that creates the given resource.
     */
    public static function retrieveInfo(string $resource): self
    {
        return new self($resource);
    }

    /**
     * Creates a new ResourceUri value object that retrieves the given resource content.
     */
    public static function retrieveBalanceSheet(string $resource, string $taxIdentificationNumber, string $year): self
    {
        return new self("{$resource}?an={$year}&cui={$taxIdentificationNumber}");
    }

    /**
     * {@inheritDoc}
     */
    public function toString(): string
    {
        return $this->uri;
    }
}

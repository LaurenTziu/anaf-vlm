<?php

declare(strict_types=1);

namespace Anaf\ValueObjects\Transporter;

use Anaf\Enums\Transporter\ContentType;

/**
 * @internal
 */
final class Headers
{
    /**
     * @var array<string, string>
     * @readonly
     */
    private $headers;
    /**
     * Creates a new Headers value object.
     *
     * @param  array<string, string>  $headers
     */
    private function __construct(array $headers)
    {
        $this->headers = $headers;
        // ..
    }

    /**
     * Creates a new Headers value object, with the given content type, and the existing headers.
     */
    public static function withContentType(ContentType $contentType, string $suffix = ''): self
    {
        return new self([
            'Content-Type' => 'application/json',
        ]);
    }

    /**
     * @return array<string, string> $headers
     */
    public function toArray(): array
    {
        return $this->headers;
    }
}

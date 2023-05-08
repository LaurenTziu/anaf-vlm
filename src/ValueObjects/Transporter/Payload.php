<?php

declare(strict_types=1);

namespace Anaf\ValueObjects\Transporter;

use Anaf\Enums\Transporter\ContentType;
use Anaf\Enums\Transporter\Method;
use Anaf\ValueObjects\ResourceUri;
use GuzzleHttp\Psr7\Request as Psr7Request;

/**
 * @internal
 */
final class Payload
{
    /**
     * @readonly
     * @var \Anaf\Enums\Transporter\ContentType
     */
    private $contentType;
    /**
     * @readonly
     * @var \Anaf\Enums\Transporter\Method
     */
    private $method;
    /**
     * @readonly
     * @var \Anaf\ValueObjects\ResourceUri
     */
    private $uri;
    /**
     * @var array<int, array{cui: string, data: string}>
     * @readonly
     */
    private $parameters = [];
    /**
     * Creates a new Request value object.
     *
     * @param  array<int, array{cui: string, data: string}>  $parameters
     */
    private function __construct( $contentType, $method, ResourceUri $uri, array $parameters = [])
    {
        
        $contentTypeS  = new ContentType();
        $met  = new Method();
        $this->contentType = $contentTypeS;
        $this->method =$method;
        $this->uri = $uri;
        $this->parameters = $parameters;
        // ..
    }
    /**
     * Creates a new Payload value object from the given parameters.
     *
     * @param  array<int, array{cui: string, data: string}>  $parameters
     */
    public static function create(string $resource, array $parameters): self
    {
        $contentType = ContentType::JSON;
        $method = Method::POST;
        $uri = ResourceUri::retrieveInfo($resource);

        return new self($contentType, $method, $uri, $parameters);
    }

    /**
     * Creates a new Payload value object from the given parameters to retrieve the balance sheet for given year
     */
    public static function get(string $resource, string $taxIdentificationNumber, string $year): self
    {
        $contentType = ContentType::JSON;
        $method = Method::GET;
        $uri = ResourceUri::retrieveBalanceSheet($resource, $taxIdentificationNumber, $year);

        return new self($contentType, $method, $uri);
    }

    /**
     * Creates a new Psr 7 Request instance.
     */
    public function toRequest(BaseUri $baseUri, Headers $headers): Psr7Request
    {
        $body = null;
        $uri = $baseUri->toString().$this->uri->toString();

        $headers = $headers->withContentType($this->contentType);

        if ($this->method === Method::POST) {
            $body = json_encode($this->parameters, JSON_THROW_ON_ERROR);
        }
        return new Psr7Request($this->method, $uri, $headers->toArray(), $body);
    }
}

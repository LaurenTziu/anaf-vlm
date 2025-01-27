<?php

declare(strict_types=1);

namespace Anaf\Transporters;

use Anaf\Contracts\Transporter;
use Anaf\Exceptions\TaxIdentificationNumberNotFoundException;
use Anaf\Exceptions\TransporterException;
use Anaf\Exceptions\UnserializableResponse;
use Anaf\ValueObjects\Transporter\BaseUri;
use Anaf\ValueObjects\Transporter\Headers;
use Anaf\ValueObjects\Transporter\Payload;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;

/**
 * @internal
 */
final class HttpTransporter implements Transporter
{
    /**
     * @readonly
     * @var \Psr\Http\Client\ClientInterface
     */
    private $client;
    /**
     * @readonly
     * @var \Anaf\ValueObjects\Transporter\BaseUri
     */
    private $baseUri;
    /**
     * @readonly
     * @var \Anaf\ValueObjects\Transporter\Headers
     */
    private $headers;
    /**
     * Creates a new Http Transporter instance.
     */
    public function __construct(
        ClientInterface $client,
        BaseUri $baseUri,
        Headers $headers
    ) {
        $this->client = $client;
        $this->baseUri = $baseUri;
        $this->headers = $headers;
        // ..
    }

    /**
     * {@inheritDoc}
     *
     * @throws TaxIdentificationNumberNotFoundException
     */
    public function requestObject(Payload $payload): array
    {
        $request = $payload->toRequest($this->baseUri, $this->headers);

        try {
            $response = $this->client->sendRequest($request);
        } catch (ClientExceptionInterface $clientException) {
            throw new TransporterException($clientException);
        }

        $contents = $response->getBody()->getContents();
        try {
            /** @var array{notFound?: array<int, int>} $response */
            $response = json_decode($contents, true, 512);
        } catch (Exception $jsonException) {
            throw new UnserializableResponse($jsonException);
        }
        if (! array_key_exists('notFound', $response)) {
            return $response;
        }
        if ($response['notFound'] !== []) {
            throw new TaxIdentificationNumberNotFoundException();
        }

        return $response;
    }
}

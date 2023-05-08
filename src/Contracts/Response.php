<?php

declare(strict_types=1);

namespace Anaf\Contracts;

use ArrayAccess;

/**
 * @template TArray of array
 *
 * @extends ArrayAccess<key-of<TArray>, value-of<TArray>>
 *
 * @internal
 */
interface Response extends ArrayAccess
{
    /**
     * Returns the array representation of the Response.
     *
     * @return TArray
     */
    public function toArray(): array;

    /**
     * @param  key-of<TArray>  $offset
     */
    public function offsetExists(mixed $offset): bool;

    /**
     * @template TOffsetKey of key-of<TArray>
     *
     * @param  TOffsetKey  $offset
     * @return TArray[TOffsetKey]
     */
    //convert to php73
    public function offsetGet( $offset);

    /**
     * @template TOffsetKey of key-of<TArray>
     *
     * @param  TOffsetKey  $offset
     * @param  TArray[TOffsetKey] $value
     */
    public function offsetSet( $offset,  $value);

    /**
     * @template TOffsetKey of key-of<TArray>
     *
     * @param  TOffsetKey  $offset
     */
    public function offsetUnset( $offset);
}

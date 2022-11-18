<?php

namespace Santore\Fish\Exception;

use RuntimeException;
use function sprintf;

class ServiceNotFound extends RuntimeException
{
    public static function withId(string $id): static
    {
        return new static(sprintf(
            'Service with id [] was not found.',
            $id
        ));
    }
}
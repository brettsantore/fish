<?php

namespace Santore\Fish\Domain\Rod\Event;

use Ramsey\Uuid\UuidInterface;

class RodAcquired
{
    public function __construct(private readonly UuidInterface $id)
    {
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }
}
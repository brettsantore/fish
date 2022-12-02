<?php

namespace Santore\Fish\Domain\Rod;

use Ramsey\Uuid\UuidInterface;
use Santore\Fish\Domain\Length;

class Rod
{
    public function __construct(
        private readonly UuidInterface $id,
        private readonly string        $name,
        private readonly int        $weight,
        private readonly Length        $length
    ) {
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function getLength(): Length
    {
        return $this->length;
    }
}
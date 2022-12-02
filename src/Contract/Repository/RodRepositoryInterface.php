<?php

namespace Santore\Fish\Contract\Repository;

use Ramsey\Uuid\UuidInterface;
use Santore\Fish\Domain\Rod\Rod;

interface RodRepositoryInterface
{
    public function save(Rod $rod);

    public function nextIdentity(): UuidInterface;
}
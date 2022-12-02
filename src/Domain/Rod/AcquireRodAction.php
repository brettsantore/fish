<?php

namespace Santore\Fish\Domain\Rod;

use Psr\EventDispatcher\EventDispatcherInterface;
use Santore\Fish\Contract\Repository\RodRepositoryInterface;
use Santore\Fish\Domain\Length;

class AcquireRodAction
{
    public function __construct(
        private readonly RodRepositoryInterface $rodRepository,
        private readonly EventDispatcherInterface $eventDispatcher
    ) {
    }

    public function __invoke(string $name, int $weight, Length $length)
    {
        $id = $this->rodRepository->nextIdentity();

        $rod = new Rod(
            $id,
            $name,
            $weight,
            $length
        );

        $this->rodRepository->save($rod);

        foreach ($this->rodRepository->releaseEvents() as $event) {
            $this->eventDispatcher->dispatch($event);
        }
    }
}
<?php

namespace Santore\Fish\Domain\Repository;

use PDO;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Santore\Fish\Contract\Repository\RodRepositoryInterface;
use Santore\Fish\Domain\Rod\Event\RodAcquired;
use Santore\Fish\Domain\Rod\Rod;

class RodRepository implements RodRepositoryInterface
{
    private array $events = [];

    public function __construct(private readonly PDO $db)
    {
    }

    public function nextIdentity(): UuidInterface
    {
        return Uuid::uuid4();
    }

    public function save(Rod $rod)
    {
        $existingRod = $this->find($rod->getId());

        if ($existingRod) {
            $this->update($rod);
        } else {
            $this->insert($rod);
        }
    }

    private function update(Rod $rod)
    {
    }

    private function insert(Rod $rod)
    {
        $query = $this->db->prepare(
            <<<SQL
INSERT INTO rods (id, name, length, weight)
values (:id, :name, :length, :weight)
SQL
        );

        $query->execute([
            ':id' => $rod->getId(),
            ':name' => $rod->getName(),
            ':length' => $rod->getLength()->getImperial(),
            ':weight' => $rod->getWeight(),
        ]);

        $this->events[] = new RodAcquired($rod->getId());
    }

    public function releaseEvents()
    {
        $events = $this->events;

        $this->events = [];

        return $events;
    }

    private function find(UuidInterface $getId): ?Rod
    {
        return null;
    }
}
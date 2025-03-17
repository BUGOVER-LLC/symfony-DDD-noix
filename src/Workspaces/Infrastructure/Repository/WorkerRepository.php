<?php

declare(strict_types=1);

namespace App\Workspaces\Infrastructure\Repository;

use App\Workspaces\Domain\Entity\Worker;
use App\Workspaces\Domain\Repository\WorkerRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class WorkerRepository extends ServiceEntityRepository implements WorkerRepositoryInterface
{
    private array $entities = [];

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Worker::class);
    }

    #[\Override] public function add(Worker $worker): string
    {
        $manager = $this->getEntityManager();

        if (!\array_key_exists($worker->getId(), $this->entities)) {
            $manager->persist($worker);
            $manager->flush();

            $this->entities[$worker->getId()] = $worker;
        }

        return $worker->getId();
    }
}

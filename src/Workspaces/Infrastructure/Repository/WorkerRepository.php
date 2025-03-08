<?php

declare(strict_types=1);

namespace App\Workspaces\Infrastructure\Repository;

use App\Workspaces\Domain\Entity\Worker;
use App\Workspaces\Domain\Repository\WorkerRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class WorkerRepository extends ServiceEntityRepository implements WorkerRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Worker::class);
    }
}

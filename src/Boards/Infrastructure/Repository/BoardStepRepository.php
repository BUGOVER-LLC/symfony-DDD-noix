<?php

declare(strict_types=1);

namespace App\Boards\Infrastructure\Repository;

use App\Boards\Domain\Entity\BoardStep;
use App\Boards\Domain\Repository\BoardStepRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class BoardStepRepository extends ServiceEntityRepository implements BoardStepRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BoardStep::class);
    }
}

<?php

declare(strict_types=1);

namespace App\Acl\Infrastructure\Repository;

use App\Acl\Domain\Entity\Plan;
use App\Acl\Domain\Repository\PlanRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class PlanRepository extends ServiceEntityRepository implements PlanRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Plan::class);
    }
}

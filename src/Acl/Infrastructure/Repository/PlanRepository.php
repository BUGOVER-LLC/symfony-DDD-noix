<?php

declare(strict_types=1);

namespace App\Acl\Infrastructure\Repository;

use App\Acl\Domain\Entity\Plan;
use App\Acl\Domain\Repository\PlanRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class PlanRepository extends ServiceEntityRepository implements PlanRepositoryInterface
{
    private array $entities;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Plan::class);
    }

    #[\Override] public function add(Plan $plan): void
    {
        $this->getEntityManager()->persist($plan);
        $this->getEntityManager()->flush();
        $this->entities[$plan->getId()] = $plan;
    }
}

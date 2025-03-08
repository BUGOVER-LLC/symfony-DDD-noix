<?php

declare(strict_types=1);

namespace App\Acl\Infrastructure\Repository;

use App\Acl\Domain\Entity\PlanFeature;
use App\Acl\Domain\Repository\PlanFeatureRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class PlanFeatureRepository extends ServiceEntityRepository implements PlanFeatureRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlanFeature::class);
    }
}

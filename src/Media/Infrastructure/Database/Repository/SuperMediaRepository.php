<?php

declare(strict_types=1);

namespace App\Media\Infrastructure\Database\Repository;

use App\Media\Domain\Entity\SuperMedia;
use App\Media\Domain\Repository\SuperMediaRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class SuperMediaRepository extends ServiceEntityRepository implements SuperMediaRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SuperMedia::class);
    }
}

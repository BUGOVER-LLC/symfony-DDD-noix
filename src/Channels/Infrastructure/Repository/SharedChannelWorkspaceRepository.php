<?php

declare(strict_types=1);

namespace App\Channels\Infrastructure\Repository;

use App\Channels\Domain\Entity\SharedChannelWorkspace;
use App\Channels\Domain\Repository\SharedChannelWorkspaceRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class SharedChannelWorkspaceRepository extends ServiceEntityRepository implements
    SharedChannelWorkspaceRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SharedChannelWorkspace::class);
    }
}

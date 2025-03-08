<?php

declare(strict_types=1);

namespace App\Channels\Infrastructure\Repository;

use App\Channels\Domain\Entity\SharedChannel;
use App\Channels\Domain\Repository\SharedChannelRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class SharedChannelRepository extends ServiceEntityRepository implements SharedChannelRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SharedChannel::class);
    }
}

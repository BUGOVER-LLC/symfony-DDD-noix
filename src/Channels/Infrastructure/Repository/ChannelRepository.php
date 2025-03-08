<?php

declare(strict_types=1);

namespace App\Channels\Infrastructure\Repository;

use App\Channels\Domain\Entity\Channel;
use App\Channels\Domain\Repository\ChannelRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ChannelRepository extends ServiceEntityRepository implements ChannelRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Channel::class);
    }
}

<?php

declare(strict_types=1);

namespace App\Boards\Infrastructure\Repository;

use App\Boards\Domain\Entity\BoardChannel;
use App\Boards\Domain\Repository\BoardChannelReppsitoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class BoardChannelRepository extends ServiceEntityRepository implements BoardChannelReppsitoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BoardChannel::class);
    }
}

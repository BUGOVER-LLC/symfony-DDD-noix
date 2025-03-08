<?php

declare(strict_types=1);

namespace App\Boards\Infrastructure\Repository;

use App\Boards\Domain\Entity\SharedBoard;
use App\Boards\Domain\Repository\SharedBoardRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class SharedBoardRepository extends ServiceEntityRepository implements SharedBoardRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SharedBoard::class);
    }
}

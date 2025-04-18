<?php

declare(strict_types=1);

namespace App\Oauth\Infrastructure\Repository;

use App\Oauth\Domain\Entity\OauthToken;
use App\Oauth\Domain\Repository\OauthTokenRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class OauthTokenRepository extends ServiceEntityRepository implements OauthTokenRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OauthToken::class);
    }
}

<?php

declare(strict_types=1);

namespace App\User\Infrastructure\Repository;

use App\User\Domain\Entity\UserInvitation;
use App\User\Domain\Repository\UserInvitationRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Query\Parameter;
use Doctrine\Persistence\ManagerRegistry;

class UserInvitationRepository extends ServiceEntityRepository implements UserInvitationRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserInvitation::class);
    }

    #[\Override] public function findInvitationByUserId(
        string $email,
        string $workspaceId,
        ?string $channelId = null
    ): ?UserInvitation
    {
        $qb = $this->createQueryBuilder('ui')
            ->where('ui.email = :userEmail and ui.workspace = :workspace')
            ->setParameters(
                new ArrayCollection([
                    new Parameter('userEmail', $email),
                    new Parameter('workspace', $workspaceId),
                ])
            );

        if ($channelId) {
            $qb
                ->where('ui.workspace = :workspace')
                ->setParameter('workspace', $workspaceId);
        }

        return $qb
            ->getQuery()
            ->getOneOrNullResult();
    }
}

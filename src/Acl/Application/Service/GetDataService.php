<?php

declare(strict_types=1);

namespace App\Acl\Application\Service;

use App\Acl\Application\QueryInteractor;
use App\Acl\Application\UseCase\Query\FindRoles\FindAllRoleByWorkspaceQuery;
use App\Acl\Domain\Entity\Role;
use Symfony\Bundle\SecurityBundle\Security;

final readonly class GetDataService
{
    public function __construct(private QueryInteractor $queryInteractor, private Security $security)
    {
    }

    /**
     * @return array<Role>
     */
    public function getRoles(): array
    {
        return $this->queryInteractor->findAllRolesQuery(
            new FindAllRoleByWorkspaceQuery(
                $this->security->getToken()->getUser()->getCurrentWorkspace()->getId()
            )
        );
    }
}

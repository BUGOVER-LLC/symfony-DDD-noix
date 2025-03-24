<?php

declare(strict_types=1);

namespace App\Acl\Domain\Fixture;

use App\Acl\Domain\Factory\RoleFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;

class RoleFixture extends Fixture
{
    public function __construct(
        private readonly RoleFactory $createRoleFactory,
        private readonly ContainerBagInterface $params,
    )
    {
    }

    #[\Override] public function load(ObjectManager $manager): void
    {
        $roles = $this->params->get('security.role_hierarchy.roles');

        foreach ($roles as $key => $roleName) {
            $role = $this->createRoleFactory->create($key, $roleName[0]);
            $manager->persist($role);
        }

        $manager->flush();
    }
}

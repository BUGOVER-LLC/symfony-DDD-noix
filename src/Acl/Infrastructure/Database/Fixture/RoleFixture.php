<?php

declare(strict_types=1);

namespace App\Acl\Infrastructure\Database\Fixture;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RoleFixture extends Fixture
{
    public function __construct()
    {
        ini_set('max_execution_time', 360);
    }

    #[\Override] public function load(ObjectManager $manager): void
    {
        // TODO: Implement load() method.
    }
}

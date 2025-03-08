<?php

declare(strict_types=1);

namespace App\Tests\Resource\Fixtures;

use App\Skills\Domain\Factory\SkillGroupFactory;
use App\Tests\Resource\Tools\FakerTool;
use App\User\Domain\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SkillGroupFixture extends Fixture implements DependentFixtureInterface
{
    use FakerTool;

    public const string REFERENCE = 'skill-group';

    public function __construct(
        private readonly SkillGroupFactory $skillGroupFactory,
    )
    {
    }

    public function load(ObjectManager $manager): void
    {
        /* @var User $user */
        $user = $this->getReference(UserFixture::REFERENCE, User::class);
        $skillGroup = $this->skillGroupFactory->create($this->getFaker()->name(), $user->getId());

        $manager->persist($skillGroup);
        $manager->flush();

        $this->addReference(self::REFERENCE, $skillGroup);
    }

    public function getDependencies(): array
    {
        return [
            UserFixture::class,
        ];
    }
}

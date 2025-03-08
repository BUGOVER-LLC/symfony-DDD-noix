<?php

declare(strict_types=1);

namespace App\Tests\Resource\Fixtures;

use App\Skills\Domain\Aggregate\Skill\SkillGroup;
use App\Skills\Domain\Factory\SkillFactory;
use App\Tests\Resource\Tools\FakerTool;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SkillFixture extends Fixture implements DependentFixtureInterface
{
    use FakerTool;

    public const REFERENCE = 'skill';

    public function __construct(
        private readonly SkillFactory $skillFactory,
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        /* @var SkillGroup $skillGroup */
        $skillGroup = $this->getReference(SkillGroupFixture::REFERENCE);
        $skill = $this->skillFactory->create($this->getFaker()->name(), $skillGroup, $skillGroup->getOwnerId());

        $manager->persist($skill);
        $manager->flush();

        $this->addReference(self::REFERENCE, $skill);
    }

    public function getDependencies(): array
    {
        return [
            SkillGroupFixture::class,
        ];
    }
}

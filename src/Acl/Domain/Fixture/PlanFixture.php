<?php

declare(strict_types=1);

namespace App\Acl\Domain\Fixture;

use App\Acl\Domain\Factory\PlanFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;
use Override;

class PlanFixture extends Fixture
{
    private Generator $facer;

    public function __construct(private readonly PlanFactory $planFactory)
    {
        $this->facer = Factory::create();
    }

    #[Override] public function load(ObjectManager $manager): void
    {
        for ($i = 0; 4 >= $i; ++$i) {
            $this->planFactory->create(
                name: $this->facer->name(),
                price: $this->facer->numberBetween(0.0, 100.00),
                trial: $this->facer->boolean(),
                description: $this->facer->text(255),
                active: $this->facer->boolean(),
                planFeatures: $this->features()->current(),
            );
        }

        $manager->flush();
    }

    private function features(): \Generator
    {
        yield [
            [
                'name' => $this->facer->name(),
                'description' => $this->facer->text(255),
            ],
            [
                'name' => $this->facer->name(),
                'description' => $this->facer->text(255),
            ],
            [
                'name' => $this->facer->name(),
                'description' => $this->facer->text(255),
            ],
        ];
    }
}

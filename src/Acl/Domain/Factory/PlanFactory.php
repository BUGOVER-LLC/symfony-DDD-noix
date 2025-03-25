<?php

declare(strict_types=1);

namespace App\Acl\Domain\Factory;

use App\Acl\Domain\Entity\Plan;
use Doctrine\ORM\EntityManagerInterface;

final class PlanFactory
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly PlanFeatureFactory $planFeatureFactory,
    )
    {
    }

    public function create(
        string $name,
        float $price = 0.0,
        bool $trial = false,
        string $description = '',
        bool $active = true,
        array $planFeatures = [],
    ): Plan
    {
        $plan = new Plan();

        $plan->setName($name);
        $plan->setActive($active);
        $plan->setDescription($description);
        $plan->setPrice($price);
        $plan->setTrial($trial);

        $this->entityManager->persist($plan);

        foreach ($planFeatures as $planFeatureItem) {
            $planFeature = $this->planFeatureFactory->create(
                name: $planFeatureItem['name'],
                description: $planFeatureItem['description'],
                plan: $plan
            );

            $plan->setPlanFeatures($planFeature);
        }

        return $plan;
    }
}

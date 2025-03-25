<?php

declare(strict_types=1);

namespace App\Acl\Domain\Factory;

use App\Acl\Domain\Entity\Plan;
use App\Acl\Domain\Entity\PlanFeature;
use Doctrine\ORM\EntityManagerInterface;

final class PlanFeatureFactory
{
    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
    }

    public function create(string $name, string $description, Plan $plan): PlanFeature
    {
        $planFeature = (new PlanFeature());

        $planFeature->setName($name);
        $planFeature->setDescription($description);
        $planFeature->setPlan($plan);

        $this->entityManager->persist($planFeature);

        return $planFeature;
    }
}

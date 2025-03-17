<?php

declare(strict_types=1);

namespace App\Acl\Domain\Repository;

use App\Acl\Domain\Entity\Plan;

interface PlanRepositoryInterface
{
    /**
     * @param Plan $plan
     * @return void
     */
    public function add(Plan $plan): void;
}

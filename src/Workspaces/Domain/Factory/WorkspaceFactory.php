<?php

declare(strict_types=1);

namespace App\Workspaces\Domain\Factory;

use App\Workspaces\Domain\Entity\Workspace;

class WorkspaceFactory
{
    public function create(string $name, string $urlPath): Workspace
    {
        $workspace = (new Workspace());

        return $workspace->setName($name)->setUrlPath($urlPath);
    }
}

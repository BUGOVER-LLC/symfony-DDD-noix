<?php

declare(strict_types=1);

namespace App\Workspaces\Application\UseCase\DTO;

class WorkspaceDTO extends WorkspaceAssembler
{
    public function __construct(
        public string $id,
        public string $name,
        public int $membersCount,
        public string $urlPath,
        public string $createdAt,
    )
    {
    }
}

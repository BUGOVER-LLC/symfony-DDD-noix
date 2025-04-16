<?php

declare(strict_types=1);

namespace App\Media\Domain\Repository;

use App\Media\Domain\Entity\Image;

interface DocumentRepositoryInterface
{
    public function add(Image $document): void;
}

<?php

declare(strict_types=1);

namespace App\Media\Infrastructure\Database\Types;

use App\Media\Domain\Enum\Bucket;
use App\Shared\Infrastructure\Database\Grammar\AbstractEnumType;

final class BucketType extends AbstractEnumType
{
    private string $typeName = 'blog_status';

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->typeName;
    }

    /**
     * @return class-string
     */
    protected function getEnum(): string
    {
        return Bucket::class;
    }
}

<?php

declare(strict_types=1);

namespace App\Media\Domain\Enum;

enum Bucket: string
{
    case document = 'document';

    case image = 'image';

    case video = 'video';

    case archive = 'archive';
}

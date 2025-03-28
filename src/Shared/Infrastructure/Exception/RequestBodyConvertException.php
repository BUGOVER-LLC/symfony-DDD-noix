<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Exception;

use RuntimeException;
use Throwable;

class RequestBodyConvertException extends RuntimeException
{
    public function __construct(Throwable $previous)
    {
        parent::__construct('error while unmarshalling the request body', 0, $previous);
    }
}

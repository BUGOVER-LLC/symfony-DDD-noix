<?php

declare(strict_types=1);

namespace App\User\Infrastructure\Exception;

use RuntimeException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\WithHttpStatus;

#[WithHttpStatus(Response::HTTP_FAILED_DEPENDENCY, headers: ['x-header' => 'Not found'])]
class UserAlreadyHaveInvitationException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('Already have an invitation.');
    }
}

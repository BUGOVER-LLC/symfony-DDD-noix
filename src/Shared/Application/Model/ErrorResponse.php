<?php

declare(strict_types=1);

namespace App\Shared\Application\Model;

use Nelmio\ApiDocBundle\Model\Model;
use OpenApi\Attributes as OA;
use Symfony\Component\PropertyInfo\Type;

class ErrorResponse
{
    public function __construct(private readonly string $message, private readonly mixed $details = null)
    {
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    #[OA\Property(type: 'object', nullable: true, oneOf: [
        new OA\Schema(ref: new Model(type: new Type(ErrorDebugDetails::class))),
        new OA\Schema(ref: new Model(type: new Type(ErrorValidationDetails::class))),
    ])]
    public function getDetails(): mixed
    {
        return $this->details;
    }
}

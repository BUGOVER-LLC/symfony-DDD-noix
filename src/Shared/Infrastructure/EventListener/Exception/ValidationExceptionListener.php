<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\EventListener\Exception;

use App\Shared\Application\Model\ErrorResponse;
use App\Shared\Application\Model\ErrorValidationDetails;
use App\Shared\Infrastructure\Exception\ValidationException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;

final class ValidationExceptionListener
{
    public function __construct(private readonly SerializerInterface $serializer)
    {
    }

    public function __invoke(ExceptionEvent $event): void
    {
        $throwable = $event->getThrowable();
        if (!($throwable instanceof ValidationException)) {
            return;
        }

        $data = $this->serializer->serialize(
            new ErrorResponse($throwable->getMessage(), $this->formatViolations($throwable->getViolations())),
            JsonEncoder::FORMAT,
        );

        $response = new JsonResponse($data, Response::HTTP_BAD_REQUEST, [], true);
        $response->setEncodingOptions($response->getEncodingOptions() | JSON_PRETTY_PRINT);

        $event->setResponse($response);
    }

    private function formatViolations(ConstraintViolationListInterface $violations): ErrorValidationDetails
    {
        $details = new ErrorValidationDetails();

        /* @var ConstraintViolationInterface $violation */
        foreach ($violations as $violation) {
            $details->addViolation($violation->getPropertyPath(), $violation->getMessage());
        }

        return $details;
    }
}

<?php

declare(strict_types=1);

namespace App\Shared\Domain\Resolver;

use App\Shared\Application\Attribute\RequestFile;
use App\Shared\Infrastructure\Exception\ValidationException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
use Symfony\Component\Validator\Validator\ValidatorInterface;

final class RequestFileArgumentResolver implements ValueResolverInterface
{
    public function __construct(private readonly ValidatorInterface $validator)
    {
    }

    public function resolve(Request $request, ArgumentMetadata $argument): iterable
    {
        $attributes = $argument->getAttributes(RequestFile::class, ArgumentMetadata::IS_INSTANCEOF);
        if (!$attributes) {
            return [];
        }

        /* @var RequestFile $attribute */
        $attribute = $attributes[0];

        /* @var UploadedFile $uploadedFile */
        $uploadedFile = $request->files->get($attribute->getField());

        $errors = $this->validator->validate($uploadedFile, $attribute->getConstraints());
        if (count($errors) > 0) {
            throw new ValidationException($errors);
        }

        return [$uploadedFile];
    }
}

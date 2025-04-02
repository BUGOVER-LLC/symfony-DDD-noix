<?php

declare(strict_types=1);

namespace App\Shared\Domain\Resolver;

use App\Shared\Application\Model\ExceptionMapping;
use InvalidArgumentException;

final class ExceptionMappingResolver
{
    /**
     * @var ExceptionMapping[]
     */
    private array $mappings = [];

    public function __construct(array $mappings)
    {
        foreach ($mappings as $class => $mapping) {
            if (empty($mapping['code'])) {
                throw new InvalidArgumentException('Code is mandatory for class' . $class);
            }

            $this->addMapping(
                class: $class,
                code: $mapping['code'],
                hidden: $mapping['hidden'] ?? true,
                loggable: $mapping['loggable'] ?? false
            );
        }
    }

    private function addMapping(string $class, int $code, bool $hidden, bool $loggable): void
    {
        $this->mappings[$class] = new ExceptionMapping($code, $hidden, $loggable);
    }

    public function resolve(string $throwableClass): ?ExceptionMapping
    {
        $foundMapping = null;

        foreach ($this->mappings as $class => $mapping) {
            if ($throwableClass === $class || is_subclass_of($throwableClass, $class)) {
                $foundMapping = $mapping;
                break;
            }
        }

        return $foundMapping;
    }
}

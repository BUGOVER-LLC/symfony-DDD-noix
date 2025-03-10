<?php

declare(strict_types=1);

namespace App\Tests\Resource\Tools;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

trait DITool
{
    /**
     * @template T
     *
     * @param class-string<T> $service
     *
     * @return T|object|null
     */
    public function getService(string $service)
    {
        return static::getContainer()->get($service);
    }

    public function getUrlGenerator(): UrlGeneratorInterface
    {
        return $this->getService(UrlGeneratorInterface::class);
    }
}

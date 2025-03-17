<?php

declare(strict_types=1);

return Rector\Config\RectorConfig::configure()
    ->withRules(rules: [
        Rector\TypeDeclaration\Rector\Property\TypedPropertyFromStrictConstructorRector::class,
    ])
    ->withPaths([
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ])
    ->withPreparedSets(
        deadCode: true,
        codeQuality: true,
    )
    ->withComposerBased(
        twig: true,
        doctrine: true,
        phpunit: true,
        symfony: true,
    );

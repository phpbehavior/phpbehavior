<?php

declare(strict_types=1);

namespace PhpBehavior\BehaviorTestCase;

trait PhpVersionTrait
{
    protected function isPhp70(): bool
    {
        return static::isPhpBetween('7.0.0', '7.1.0');
    }

    protected function isPhp71(): bool
    {
        return static::isPhpBetween('7.1.0', '7.2.0');
    }

    protected function isPhp72(): bool
    {
        return static::isPhpBetween('7.2.0', '7.3.0');
    }

    protected function isPhp73(): bool
    {
        return static::isPhpBetween('7.3.0', '7.4.0');
    }

    protected function isPhp74(): bool
    {
        return static::isPhpBetween('7.4.0', '7.5.0');
    }

    protected function isPhp80(): bool
    {
        return static::isPhpBetween('8.0.0', '8.1.0');
    }

    protected function isPhp81(): bool
    {
        return static::isPhpBetween('8.1.0', '8.2.0');
    }

    protected function isPhpBetween(string $version1, string $version2): bool
    {
        return
            version_compare(PHP_VERSION, $version1, '>=')
            && version_compare(PHP_VERSION, $version2, '<=');
    }
}

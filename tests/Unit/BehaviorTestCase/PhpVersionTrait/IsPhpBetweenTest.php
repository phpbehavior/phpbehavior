<?php

declare(strict_types=1);

namespace Unit\BehaviorTestCase\PhpVersionTrait;

use PhpBehavior\BehaviorTestCase\PhpVersionTrait;
use PHPUnit\Framework\TestCase;

/** @covers \PhpBehavior\BehaviorTestCase\PhpVersionTrait::isPhpBetween */
final class IsPhpBetweenTest extends TestCase
{
    use PhpVersionTrait;

    public function testMajor(): void
    {
        if (version_compare(PHP_VERSION, '8.0', '<=')) {
            static::assertTrue(static::isPhpBetween('7', '8'));
        } else {
            static::assertTrue(static::isPhpBetween('8', '9'));
        }
    }

    public function testMinor(): void
    {
        if (version_compare(PHP_VERSION, '8.0', '<=')) {
            static::assertTrue(static::isPhpBetween('7.4', '8.0'));
        } else {
            static::assertTrue(static::isPhpBetween('8.0', '8.1'));
        }
    }
}

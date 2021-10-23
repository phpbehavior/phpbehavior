<?php

declare(strict_types=1);

namespace Unit\BehaviorTestCase\PhpVersionTrait;

use PhpBehavior\BehaviorTestCase\PhpVersionTrait;
use PHPUnit\Framework\TestCase;

/** @covers \PhpBehavior\BehaviorTestCase\PhpVersionTrait::isPhp7 */
final class IsPhp7Test extends TestCase
{
    use PhpVersionTrait;

    public function testIsPhp7(): void
    {
        if (
            version_compare(PHP_VERSION, '7.0', '>=')
            && version_compare(PHP_VERSION, '8.0', '<=')
        ) {
            static::assertTrue(static::isPhp7());
        } else {
            static::assertFalse(static::isPhp7());
        }
    }
}

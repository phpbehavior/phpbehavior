<?php

declare(strict_types=1);

namespace Unit\BehaviorTestCase\PhpVersionTrait;

use PhpBehavior\BehaviorTestCase\PhpVersionTrait;
use PHPUnit\Framework\TestCase;

/** @covers \PhpBehavior\BehaviorTestCase\PhpVersionTrait::isPhp80 */
final class IsPhp80Test extends TestCase
{
    use PhpVersionTrait;

    public function testIsPhp80(): void
    {
        if (
            version_compare(PHP_VERSION, '7.4', '>=')
            && version_compare(PHP_VERSION, '8.0', '<=')
        ) {
            static::assertFalse(static::isPhp80());
        } else {
            static::assertTrue(static::isPhp80());
        }
    }
}

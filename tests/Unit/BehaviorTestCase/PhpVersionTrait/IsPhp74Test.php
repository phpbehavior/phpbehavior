<?php

declare(strict_types=1);

namespace Unit\BehaviorTestCase\PhpVersionTrait;

use PhpBehavior\BehaviorTestCase\PhpVersionTrait;
use PHPUnit\Framework\TestCase;

/** @covers \PhpBehavior\BehaviorTestCase\PhpVersionTrait::isPhp74 */
final class IsPhp74Test extends TestCase
{
    use PhpVersionTrait;

    public function testIsPhp74(): void
    {
        if (
            version_compare(PHP_VERSION, '7.4', '>=')
            && version_compare(PHP_VERSION, '8.0', '<=')
        ) {
            static::assertTrue(static::isPhp74());
        } else {
            static::assertFalse(static::isPhp74());
        }
    }
}

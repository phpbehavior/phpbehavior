<?php

declare(strict_types=1);

namespace Unit\BehaviorTestCase\PhpVersionTrait;

use PhpBehavior\BehaviorTestCase\PhpVersionTrait;
use PHPUnit\Framework\TestCase;

/** @covers \PhpBehavior\BehaviorTestCase\PhpVersionTrait::isPhp81 */
final class IsPhp81Test extends TestCase
{
    use PhpVersionTrait;

    public function testIsPhp80(): void
    {
        static::assertFalse(static::isPhp81());
    }
}

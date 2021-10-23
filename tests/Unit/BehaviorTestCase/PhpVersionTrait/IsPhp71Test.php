<?php

declare(strict_types=1);

namespace Unit\BehaviorTestCase\PhpVersionTrait;

use PhpBehavior\BehaviorTestCase\PhpVersionTrait;
use PHPUnit\Framework\TestCase;

/** @covers \PhpBehavior\BehaviorTestCase\PhpVersionTrait::isPhp71 */
final class IsPhp71Test extends TestCase
{
    use PhpVersionTrait;

    public function testIsPhp70(): void
    {
        static::assertFalse(static::isPhp71());
    }
}

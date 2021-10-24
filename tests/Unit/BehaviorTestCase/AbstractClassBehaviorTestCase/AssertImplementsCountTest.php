<?php

declare(strict_types=1);

namespace PhpBehavior\Tests\Unit\BehaviorTestCase\AbstractClassBehaviorTestCase;

use PhpBehavior\{
    BehaviorTestCase\AbstractClassBehaviorTestCase,
    Tests\Data\Test
};

/** @covers \PhpBehavior\BehaviorTestCase\AbstractClassBehaviorTestCase::assertImplementsCount */
final class AssertImplementsCountTest extends AbstractClassBehaviorTestCase
{
    protected static function getClassName(): string
    {
        return Test::class;
    }

    public function testAssertImplementsCount(): void
    {
        static::assertImplementsCount(1);
    }
}

<?php

declare(strict_types=1);

namespace PhpBehavior\Tests\Unit\BehaviorTestCase\AbstractClassBehaviorTestCase;

use PhpBehavior\{
    BehaviorTestCase\AbstractClassBehaviorTestCase,
    Tests\Data\Foo
};

/** @covers \PhpBehavior\BehaviorTestCase\AbstractClassBehaviorTestCase::assertImplementsCount */
final class AssertImplementsCountTest extends AbstractClassBehaviorTestCase
{
    protected static function getClassName(): string
    {
        return Foo::class;
    }

    public function testAssertImplementsCount(): void
    {
        static::assertImplementsCount(1);
    }
}

<?php

declare(strict_types=1);

namespace PhpBehavior\Tests\Unit\BehaviorTestCase\AbstractClassBehaviorTestCase;

use PhpBehavior\{
    BehaviorTestCase\AbstractClassBehaviorTestCase,
    Tests\Data\Foo,
    Tests\Data\FooInterface
};

/** @covers \PhpBehavior\BehaviorTestCase\AbstractClassBehaviorTestCase::assertImplement */
final class AssertImplementTest extends AbstractClassBehaviorTestCase
{
    protected static function getClassName(): string
    {
        return Foo::class;
    }

    public function testAssertImplement(): void
    {
        static::assertImplement(FooInterface::class);
    }
}

<?php

declare(strict_types=1);

namespace PhpBehavior\Tests\Unit\BehaviorTestCase\AbstractClassBehaviorTestCase;

use PhpBehavior\{
    BehaviorTestCase\AbstractClassBehaviorTestCase,
    Tests\Data\Test,
    Tests\Data\TestInterface
};

/** @covers \PhpBehavior\BehaviorTestCase\AbstractClassBehaviorTestCase::assertImplement */
final class AssertImplementTest extends AbstractClassBehaviorTestCase
{
    protected static function getClassName(): string
    {
        return Test::class;
    }

    public function testAssertImplement(): void
    {
        static::assertImplement(TestInterface::class);
    }
}

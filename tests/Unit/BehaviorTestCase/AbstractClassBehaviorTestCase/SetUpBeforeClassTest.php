<?php

declare(strict_types=1);

namespace PhpBehavior\Tests\Unit\BehaviorTestCase\AbstractClassBehaviorTestCase;

use PhpBehavior\BehaviorTestCase\AbstractClassBehaviorTestCase;

/**
 * @covers \PhpBehavior\BehaviorTestCase\AbstractClassBehaviorTestCase::setUpBeforeClass
 * @covers \PhpBehavior\BehaviorTestCase\AbstractClassBehaviorTestCase::getReflectionClass
 */
final class SetUpBeforeClassTest extends AbstractClassBehaviorTestCase
{
    protected static function getClassName(): string
    {
        return __CLASS__;
    }

    public function testSetUpBeforeClass(): void
    {
        static::assertInstanceOf(\ReflectionClass::class, static::getReflectionClass());
        static::assertSame(static::getReflectionClass()->getName(), __CLASS__);
    }
}

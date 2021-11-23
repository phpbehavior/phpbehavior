<?php

declare(strict_types=1);

namespace PhpBehavior\Tests\Unit\BehaviorTestCase\AbstractMethodBehaviorTestCase;

use PhpBehavior\{
    BehaviorTestCase\AbstractMethodBehaviorTestCase,
    Exception\ClassNotFoundException,
    Tests\Data\Test
};

/** @covers \PhpBehavior\BehaviorTestCase\AbstractMethodBehaviorTestCase::assertCode */
final class ClassNotFoundTest extends AbstractMethodBehaviorTestCase
{
    private static bool $classNotFoundThrowned = false;

    protected static function getClassName(): string
    {
        return Test::class . 'NotFound';
    }

    protected static function getMethodName(): string
    {
        return 'methodCode';
    }

    public static function setUpBeforeClass(): void
    {
        try {
            parent::setUpBeforeClass();
        } catch (ClassNotFoundException $exception) {
            static::$classNotFoundThrowned = true;
        }
    }

    public function testCode(): void
    {
        static::assertTrue(
            static::$classNotFoundThrowned,
            ClassNotFoundException::class . ' exception has not been throwned.'
        );
    }
}

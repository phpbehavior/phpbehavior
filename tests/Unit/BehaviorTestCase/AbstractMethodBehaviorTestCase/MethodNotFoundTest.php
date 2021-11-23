<?php

declare(strict_types=1);

namespace PhpBehavior\Tests\Unit\BehaviorTestCase\AbstractMethodBehaviorTestCase;

use PhpBehavior\{
    BehaviorTestCase\AbstractMethodBehaviorTestCase,
    Exception\MethodNotFoundException,
    Tests\Data\Test
};

/** @covers \PhpBehavior\BehaviorTestCase\AbstractMethodBehaviorTestCase::assertCode */
final class MethodNotFoundTest extends AbstractMethodBehaviorTestCase
{
    private static bool $methodNotFoundThrowned = false;

    protected static function getClassName(): string
    {
        return Test::class;
    }

    protected static function getMethodName(): string
    {
        return 'methodCodeNotFound';
    }

    public static function setUpBeforeClass(): void
    {
        try {
            parent::setUpBeforeClass();
        } catch (MethodNotFoundException $exception) {
            static::$methodNotFoundThrowned = true;
        }
    }

    public function testCode(): void
    {
        static::assertTrue(
            static::$methodNotFoundThrowned,
            MethodNotFoundException::class . ' exception has not been throwned.'
        );
    }
}

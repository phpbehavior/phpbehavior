<?php

declare(strict_types=1);

namespace PhpBehavior\Tests\Unit\BehaviorTestCase\AbstractMethodBehaviorTestCase;

use PhpBehavior\BehaviorTestCase\AbstractMethodBehaviorTestCase;
use PhpBehavior\Tests\Data\Test;

/** @covers \PhpBehavior\BehaviorTestCase\AbstractMethodBehaviorTestCase::assertCode */
final class AssertCodeTest extends AbstractMethodBehaviorTestCase
{
    protected static function getClassName(): string
    {
        return Test::class;
    }

    protected static function getMethodName(): string
    {
        return 'methodCode';
    }

    public function testCode(): void
    {
        static::assertCode('        return \'foo\';');
    }
}

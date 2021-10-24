<?php

declare(strict_types=1);

namespace PhpBehavior\Tests\Unit\BehaviorTestCase\AbstractExceptionBehaviorTestCase;

use PhpBehavior\{
    BehaviorTestCase\AbstractExceptionBehaviorTestCase,
    Tests\Data\TestException
};
use Steevanb\VersionComparator\Comparator\PhpVersionComparator;

/** @covers \PhpBehavior\BehaviorTestCase\AbstractExceptionBehaviorTestCase::getExpectedInterfaces */
final class GetExpectedInterfacesTest extends AbstractExceptionBehaviorTestCase
{
    protected static function getClassName(): string
    {
        return TestException::class;
    }

    public function testGetExpectedInterfaces(): void
    {
        $interfaces = static::getExpectedInterfaces();

        if (PhpVersionComparator::isPhp7()) {
            static::assertCount(1, $interfaces);
            static::assertSame(\Throwable::class, $interfaces[0]);
        } elseif (PhpVersionComparator::isPhp8()) {
            static::assertCount(2, $interfaces);
            static::assertSame(\Throwable::class, $interfaces[0]);
            static::assertSame(\Stringable::class, $interfaces[1]);
        }
    }
}

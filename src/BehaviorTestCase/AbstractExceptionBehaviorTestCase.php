<?php

declare(strict_types=1);

namespace PhpBehavior\BehaviorTestCase;

use Steevanb\VersionComparator\Comparator\PhpVersionComparator;

abstract class AbstractExceptionBehaviorTestCase extends AbstractClassBehaviorTestCase
{
    /** @return \Generator<array<int, string>> */
    public function dataProviderInterfaces(): \Generator
    {
        foreach (static::getExpectedInterfaces() as $interface) {
            yield [$interface];
        }
    }

    public function testImplementsCount(): void
    {
        static::assertImplementsCount(count(static::getExpectedInterfaces()));
    }

    /** @dataProvider dataProviderInterfaces */
    public function testImplement(string $interface): void
    {
        static::assertImplement($interface);
    }

    /** @return array<string|int, string> */
    protected static function getExpectedInterfaces(): array
    {
        $return = parent::getExpectedInterfaces();
        $return[] = \Throwable::class;

        if (PhpVersionComparator::isPhp8()) {
            $return[] = \Stringable::class;
        }

        return $return;
    }
}

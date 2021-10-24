<?php

declare(strict_types=1);

namespace PhpBehavior\BehaviorTestCase;

trait ClassImplementTrait
{
    abstract public static function assertCount(int $expectedCount, $haystack, string $message = ''): void;

    abstract public static function assertArrayHasKey($key, $array, string $message = ''): void;

    /** @return class-string */
    abstract protected static function getClassName(): string;

    abstract protected static function getReflectionClass(): \ReflectionClass;

    /** @return array<string|int, string> */
    abstract protected static function getExpectedInterfaces(): array;

    protected static function assertImplementsCount(int $count): void
    {
        static::assertCount(
            $count,
            static::getReflectionClass()->getInterfaces(),
            'Class '
            . static::getClassName()
            . ' implement '
            . count(static::getReflectionClass()->getInterfaces())
            . ' interface'
            . (count(static::getReflectionClass()->getInterfaces()) > 1 ? 's' : null)
            . ' but should implement '
            . $count
            . '.'
        );
    }

    protected static function assertImplement(string $interface): void
    {
        static::assertArrayHasKey(
            $interface,
            static::getReflectionClass()->getInterfaces(),
            'Class ' . static::getClassName() . ' should implement ' . $interface . '.'
        );
    }

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
}

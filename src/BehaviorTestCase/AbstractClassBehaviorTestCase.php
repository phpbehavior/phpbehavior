<?php

declare(strict_types=1);

namespace PhpBehavior\BehaviorTestCase;

use PHPUnit\Framework\TestCase;

abstract class AbstractClassBehaviorTestCase extends TestCase
{
    /** @return class-string */
    abstract protected static function getClassName(): string;

    private static \ReflectionClass $reflectionClass;

    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();

        static::$reflectionClass = new \ReflectionClass(static::getClassName());
    }

    protected static function getReflectionClass(): \ReflectionClass
    {
        return static::$reflectionClass;
    }

    protected function assertImplementsCount(int $count): void
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
}

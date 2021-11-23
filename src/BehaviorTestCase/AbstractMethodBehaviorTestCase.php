<?php

declare(strict_types=1);

namespace PhpBehavior\BehaviorTestCase;

use PhpBehavior\{
    Exception\ClassNotFoundException,
    Exception\MethodNotFoundException,
    Exception\PhpBehaviorException
};
use PHPUnit\Framework\TestCase;

abstract class AbstractMethodBehaviorTestCase extends TestCase
{
    /** @return class-string */
    abstract protected static function getClassName(): string;

    abstract protected static function getMethodName(): string;

    private static \ReflectionMethod $reflectionMethod;

    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();

        if (class_exists(static::getClassName()) === false) {
            throw new ClassNotFoundException(static::getClassName());
        }
        if (method_exists(static::getClassName(), static::getMethodName()) === false) {
            throw new MethodNotFoundException(static::getClassName(), static::getMethodName());
        }
        static::$reflectionMethod = new \ReflectionMethod(static::getClassName(), static::getMethodName());
    }

    protected static function getReflectionMethod(): \ReflectionMethod
    {
        return static::$reflectionMethod;
    }

    protected static function assertCode(string $code): void
    {
        static::assertSame(
            $code,
            static::getMethodCode(),
            'Code for ' . static::getClassName() . '::' . static::getMethodName() . '() is not the expected one.'
        );
    }

    protected static function getFileName(): string
    {
        $return = static::getReflectionMethod()->getFileName();
        if (is_string($return) === false) {
            throw new PhpBehaviorException('ReflectionMethod::getFileName() return false but shoult not.');
        }

        return $return;
    }

    protected static function getStartLine(): int
    {
        $return = static::getReflectionMethod()->getStartLine();
        if (is_int($return) === false) {
            throw new PhpBehaviorException('ReflectionMethod::getStartLine() return false but shoult not.');
        }

        return $return;
    }

    protected static function getEndLine(): int
    {
        $return = static::getReflectionMethod()->getEndLine();
        if (is_int($return) === false) {
            throw new PhpBehaviorException('ReflectionMethod::getEndLine() return false but shoult not.');
        }

        return $return;
    }

    protected static function getMethodCode(): string
    {
        $fileName = static::getFileName();
        $startLine = static::getStartLine();
        $endLine = static::getEndLine();

        $classCode = file_get_contents($fileName);
        if (is_string($classCode) === false) {
            static::fail('Unable to read file "' . $fileName . '".');
        }

        $methodCodeLines = array_slice(
            explode("\n", $classCode),
            $startLine,
            $endLine - $startLine
        );

        if (trim($methodCodeLines[0]) === '{') {
            unset($methodCodeLines[0]);
        }

        $lastKey = array_key_last($methodCodeLines);
        if (trim($methodCodeLines[$lastKey]) === '}') {
            unset($methodCodeLines[$lastKey]);
        }

        return implode("\n", $methodCodeLines);
    }
}

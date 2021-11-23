<?php

declare(strict_types=1);

namespace PhpBehavior\Exception;

class MethodNotFoundException extends PhpBehaviorException
{
    public function __construct(string $className, string $methodName, int $code = 0, \Throwable $previous = null)
    {
        parent::__construct('Method ' . $className . '::' . $methodName . '() not found.', $code, $previous);
    }
}

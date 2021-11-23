<?php

declare(strict_types=1);

namespace PhpBehavior\Exception;

class ClassNotFoundException extends PhpBehaviorException
{
    public function __construct(string $className, int $code = 0, \Throwable $previous = null)
    {
        parent::__construct('Class "' . $className . '" not found.', $code, $previous);
    }
}

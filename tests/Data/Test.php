<?php

declare(strict_types=1);

namespace PhpBehavior\Tests\Data;

final class Test implements TestInterface
{
    public function methodCode(): string
    {
        return 'foo';
    }
}

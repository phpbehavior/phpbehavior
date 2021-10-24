<?php

declare(strict_types=1);

namespace PhpBehavior\BehaviorTestCase;

use Steevanb\VersionComparator\Comparator\PhpVersionComparator;

abstract class AbstractExceptionBehaviorTestCase extends AbstractClassBehaviorTestCase
{
    use ClassImplementTrait;

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

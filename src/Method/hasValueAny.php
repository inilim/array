<?php

namespace Inilim\Array\Method;

use Inilim\Array\Array_;

/**
 * @param mixed[]|mixed $values
 */
function hasValueAny(array $array, $values, bool $strict = false): bool
{
    $values = Array_::wrap($values);

    if (!$array || !$values) {
        return false;
    }

    foreach ($values as $value) {
        if (Array_::hasValue($array, $value, $strict)) {
            return true;
        }
    }

    return false;
}

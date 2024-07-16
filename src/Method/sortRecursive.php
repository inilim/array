<?php

namespace Inilim\Array\Method;

use Inilim\Array\Array_;

/**
 * Recursively sort an array by keys and values.
 */
function sortRecursive(array $array, int $options = \SORT_REGULAR, bool $descending = true): array
{
    foreach ($array as &$value) {
        if (\is_array($value)) {
            $value = Array_::sortRecursive($value, $options, $descending);
        }
    }

    if (Array_::isAssoc($array)) {
        $descending
            ? \krsort($array, $options)
            : \ksort($array, $options);
    } else {
        $descending
            ? \rsort($array, $options)
            : \sort($array, $options);
    }

    return $array;
}

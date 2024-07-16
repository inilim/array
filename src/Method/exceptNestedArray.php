<?php

namespace Inilim\Array\Method;

use Inilim\Array\Array_;

/**
 * @param  array<string|int>|string|int $keys
 */
function exceptNestedArray(array $array, $keys, int $depth = 1): array
{
    if ($depth === 0 || $depth < 0) {
        return Array_::except($array, $keys);
    }
    foreach ($array as $idx =>  $item) {
        if (\is_array($item)) {
            $array[$idx] = Array_::exceptNestedArray($item, $keys, ($depth - 1));
        }
    }
    return $array;
}

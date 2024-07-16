<?php

namespace Inilim\Array\Method;

use Inilim\Array\Array_;

/**
 * @param  array<string|int>|string|int $keys
 */
function onlyNestedArray(array $array, $keys, int $depth = 1): array
{
    if ($depth === 0 || $depth < 0) {
        return Array_::only($array, $keys);
    }
    foreach ($array as $idx =>  $item) {
        if (\is_array($item)) {
            $array[$idx] = Array_::onlyNestedArray($item, $keys, ($depth - 1));
        }
    }
    return $array;
}

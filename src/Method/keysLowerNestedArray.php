<?php

namespace Inilim\Array\Method;

use Inilim\Array\Array_;

function keysLowerNestedArray(array $array, int $depth = 1): array
{
    if ($depth === 0 || $depth < 0) {
        return Array_::keysLower($array);
    }
    foreach ($array as $idx =>  $item) {
        if (\is_array($item)) {
            $array[$idx] = Array_::keysLowerNestedArray($item, ($depth - 1));
        }
    }
    return $array;
}

<?php

namespace Inilim\Array\Method;

use Inilim\Array\Array_;

function keysUpperNestedArray(array $array, int $depth = 1): array
{
    if ($depth === 0 || $depth < 0) {
        return Array_::keysUpper($array);
    }
    foreach ($array as $idx =>  $item) {
        if (\is_array($item)) {
            $array[$idx] = keysUpperNestedArray($item, ($depth - 1));
        }
    }
    return $array;
}

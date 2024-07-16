<?php

namespace Inilim\Array\Method;

use Inilim\Array\Array_;

/**
 * Flatten a multi-dimensional array into a single level.
 */
function flatten(iterable $array, int $depth): array
{
    $result = [];

    foreach ($array as $item) {
        if (!\is_array($item)) {
            $result[] = $item;
        } else {
            $values = $depth === 1
                ? \array_values($item)
                : flatten($item, $depth - 1);

            foreach ($values as $value) {
                $result[] = $value;
            }
        }
    }

    return $result;
}

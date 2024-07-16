<?php

namespace Inilim\Array\Method;

use Inilim\Array\Array_;

/**
 * Check if an item or items exist in an array using "dot" notation.
 *
 * @param  \ArrayAccess|array  $array
 * @param  array<string|int>|string|int  $keys
 */
function has($array, $keys): bool
{
    $keys = (array) $keys;

    if (!$array || $keys === []) {
        return false;
    }

    foreach ($keys as $key) {
        $subKeyArray = $array;

        if (Array_::exists($array, $key)) {
            continue;
        }

        foreach (\explode('.', $key) as $segment) {
            if (Array_::accessible($subKeyArray) && Array_::exists($subKeyArray, $segment)) {
                $subKeyArray = $subKeyArray[$segment];
            } else {
                return false;
            }
        }
    }

    return true;
}

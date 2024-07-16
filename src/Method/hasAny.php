<?php

namespace Inilim\Array\Method;

use Inilim\Array\Array_;

/**
 * Determine if any of the keys exist in an array using "dot" notation.
 *
 * @param  \ArrayAccess|array  $array
 * @param  array<string|int>|int|string|null  $keys
 */
function hasAny($array, $keys): bool
{
    if ($keys === null) {
        return false;
    }

    $keys = (array) $keys;

    if (!$array) {
        return false;
    }

    if ($keys === []) {
        return false;
    }

    foreach ($keys as $key) {
        if (Array_::has($array, $key)) {
            return true;
        }
    }

    return false;
}

<?php

namespace Inilim\Array\Method;

// use Inilim\Array\Array_;

/**
 * Determine if the given key exists in the provided array.
 *
 * @param  \ArrayAccess|array  $array
 * @param  string|int  $key
 */
function exists($array, $key): bool
{
    if ($array instanceof \ArrayAccess) {
        return $array->offsetExists($key);
    }

    return \array_key_exists($key, $array);
}

<?php

namespace Inilim\Array\Method;

use Inilim\Array\Array_;

/**
 * Get all of the given array except for a specified array of keys.
 * @param  array<string|int>|string|int $keys
 */
function except(array $array, $keys): array
{
    Array_::forget($array, $keys);

    return $array;
}

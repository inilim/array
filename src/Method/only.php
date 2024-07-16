<?php

namespace Inilim\Array\Method;

// use Inilim\Array\Array_;

/**
 * Get a subset of the items from the given array.
 * @param  array<string|int>|string|int  $keys
 */
function only(array $array, $keys): array
{
    return \array_intersect_key($array, \array_flip((array) $keys));
}

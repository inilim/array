<?php

namespace Inilim\Array\Method;

// use Inilim\Array\Array_;

/**
 * Returns zero-indexed position of given array key. Returns null if key is not found.
 */
function getKeyOffset(array $array, string|int $key): ?int
{
    $value = \array_search(\key([$key => null]), \array_keys($array), true);
    return $value === false ? null : $value;
}

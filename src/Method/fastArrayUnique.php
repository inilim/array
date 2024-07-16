<?php

namespace Inilim\Array\Method;

// use Inilim\Array\Array_;

/**
 * Remove the duplicates from an array.
 *
 * This is faster version than the builtin array_unique().
 *
 * Notes on time requirements:
 *   array_unique -> O(n log n)
 *   array_flip -> O(n)
 *
 * http://stackoverflow.com/questions/8321620/array-unique-vs-array-flip
 * http://php.net/manual/en/function.array-unique.php
 */
function fastArrayUnique(array $array): array
{
    return \array_keys(\array_flip($array));
}

<?php

namespace Inilim\Array\Method;

use Inilim\Array\Array_;

/**
 * Add an element to an array using "dot" notation if it doesn't exist.
 *
 * @param  mixed  $value
 */
function add(array $array, string $key, $value): array
{
    if (Array_::get($array, $key) === null) {
        Array_::set($array, $key, $value);
    }

    return $array;
}

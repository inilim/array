<?php

namespace Inilim\Array\Method;

use Inilim\Array\Array_;

/**
 * Get an item from an array using "dot" notation.
 *
 * @param  \ArrayAccess|array  $array
 * @param  string|int|null  $key
 * @param  mixed  $default
 *
 * @return mixed
 */
function get($array, $key, $default = null)
{
    if (!Array_::accessible($array)) {
        return Array_::value($default);
    }

    if ($key === null) {
        return $array;
    }

    if (Array_::exists($array, $key)) {
        return $array[$key];
    }

    if (\strpos(\strval($key), '.') === false) {
        return $array[$key] ?? Array_::value($default);
    }

    foreach (\explode('.', \strval($key)) as $segment) {
        if (Array_::accessible($array) && Array_::exists($array, $segment)) {
            $array = $array[$segment];
        } else {
            return Array_::value($default);
        }
    }

    return $array;
}

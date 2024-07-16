<?php

namespace Inilim\Array\Method;

use Inilim\Array\Array_;

/**
 * Get a value from the array, and remove it.
 *
 * @param  string|int  $key
 * @param  mixed  $default
 * @return mixed
 */
function pull(array &$array, $key, $default = null)
{
    $value = Array_::get($array, $key, $default);

    Array_::forget($array, $key);

    return $value;
}

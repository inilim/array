<?php

namespace Inilim\Array\Method;

use Inilim\Array\Array_;

/**
 * alternate dataGet
 *
 * @param  mixed  $target
 * @param  string|array|int|null  $key
 * @param  mixed  $default
 * @return mixed
 */
function dataGet2($target, $key, $default = null)
{
    if ($key === null) {
        return $target;
    }

    if (\is_array($key) || \is_int($key) || !\str_contains($key, '*')) {
        return Array_::dataGet($target, $key, $default);
    }

    $keys = Array_::getDotKeys($target, $key);

    if (!$keys) {
        return $default;
    }

    return Array_::dataGet(
        Array_::undot(Array_::only(Array_::dot($target), $keys)),
        $key,
        $default
    );
}

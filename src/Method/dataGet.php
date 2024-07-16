<?php

namespace Inilim\Array\Method;

use Inilim\Array\Array_;

/**
 * Get an item from an array or object using "dot" notation.
 *
 * @param  mixed  $target
 * @param  string|array|int|null  $key
 * @param  mixed  $default
 * @return mixed
 */
function dataGet($target, $key, $default = null)
{
    if ($key === null) {
        return $target;
    }

    $key = \is_array($key) ? $key : \explode('.', $key);

    foreach ($key as $i => $segment) {
        unset($key[$i]);

        if ($segment === null) {
            return $target;
        }

        if ($segment === '*') {
            if (!\is_array($target)) {
                return Array_::value($default);
            }

            $result = [];

            foreach ($target as $item) {
                $result[] = Array_::dataGet($item, $key);
            }

            return \in_array('*', $key) ? Array_::collapse($result) : $result;
        }

        if (Array_::accessible($target) && Array_::exists($target, $segment)) {
            $target = $target[$segment];
        } elseif (\is_object($target) && isset($target->{$segment})) {
            $target = $target->{$segment};
        } else {
            return Array_::value($default);
        }
    }

    return $target;
}

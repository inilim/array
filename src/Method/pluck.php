<?php

namespace Inilim\Array\Method;

use Inilim\Array\Array_;

/**
 * Pluck an array of values from an array.
 *
 * @param  string|array|int|null  $value
 * @param  string|string[]|null  $key
 */
function pluck(iterable $array, $value, $key = null): array
{
    $results = [];

    $value = \is_string($value) ? \explode('.', $value) : $value;

    $key = $key === null || \is_array($key) ? $key : \explode('.', $key);

    foreach ($array as $item) {
        $item_value = Array_::dataGet($item, $value);

        // If the key is "null", we will just append the value to the array and keep
        // looping. Otherwise we will key the array using the value of the key we
        // received from the developer. Then we'll return the final array form.
        if ($key === null) {
            $results[] = $item_value;
        } else {
            $item_key = Array_::dataGet($item, $key);

            if (\is_object($item_key) && \method_exists($item_key, '__toString')) {
                $item_key = (string) $item_key;
            }

            $results[$item_key] = $item_value;
        }
    }

    return $results;
}

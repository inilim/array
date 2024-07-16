<?php

namespace Inilim\Array\Method;

use Inilim\Array\Array_;

/**
 * Remove one or many array items from a given array using "dot" notation.
 * @param  array<string|int>|string|int  $keys
 */
function forget(array &$array, $keys): void
{
    $original = &$array;

    $keys = (array) $keys;

    if (!$keys) return;

    foreach ($keys as $key) {
        // if the exact key exists in the top-level, remove it
        if (Array_::exists($array, $key)) {
            unset($array[$key]);

            continue;
        }

        $parts = \explode('.', $key);

        // clean up before each pass
        $array = &$original;

        while (\sizeof($parts) > 1) {
            $part = \array_shift($parts);

            if (isset($array[$part]) && \is_array($array[$part])) {
                $array = &$array[$part];
            } else {
                continue 2;
            }
        }

        unset($array[\array_shift($parts)]);
    }
}

<?php

namespace Inilim\Array\Method;

use Inilim\Array\Array_;

/**
 * Renames key in array.
 */
function renameKey(array &$array, string|int $old_key, string|int $new_key): bool
{
    $offset = Array_::getKeyOffset($array, $old_key);
    if ($offset === null) {
        return false;
    }

    $val = &$array[$old_key];
    $keys = \array_keys($array);
    $keys[$offset] = $new_key;
    $array = \array_combine($keys, $array);
    $array[$new_key] = &$val;
    return true;
}

<?php

namespace Inilim\Array\Method;

use Inilim\Array\Array_;

/**
 * Inserts the contents of the $inserted array into the $array immediately after the $key.
 * If $key is null (or does not exist), it is inserted at the beginning.
 */
function insertBefore(array &$array, string|int|null $key, array $inserted): void
{
    $offset = $key === null ? 0 : (int) Array_::getKeyOffset($array, $key);
    $array = \array_slice($array, 0, $offset, true)
        + $inserted
        + \array_slice($array, $offset, \sizeof($array), true);
}

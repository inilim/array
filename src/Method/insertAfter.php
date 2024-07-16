<?php

namespace Inilim\Array\Method;

use Inilim\Array\Array_;

/**
 * Inserts the contents of the $inserted array into the $array before the $key.
 * If $key is null (or does not exist), it is inserted at the end.
 */
function insertAfter(array &$array, string|int|null $key, array $inserted): void
{
    if ($key === null || ($offset = Array_::getKeyOffset($array, $key)) === null) {
        $offset = \sizeof($array) - 1;
    }

    $array = \array_slice($array, 0, $offset + 1, true)
        + $inserted
        + \array_slice($array, $offset + 1, \sizeof($array), true);
}

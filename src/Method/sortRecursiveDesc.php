<?php

namespace Inilim\Array\Method;

use Inilim\Array\Array_;

/**
 * Recursively sort an array by keys and values in descending order.
 */
function sortRecursiveDesc(array $array, int $options = \SORT_REGULAR): array
{
    return Array_::sortRecursive($array, $options, true);
}

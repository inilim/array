<?php

namespace Inilim\Array\Method;

// use Inilim\Array\Array_;

/**
 * Take the first or last {$limit} items from an array.
 */
function take(array $array, int $limit): array
{
    if ($limit < 0) {
        return \array_slice($array, $limit, \abs($limit));
    }

    return \array_slice($array, 0, $limit);
}

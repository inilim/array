<?php

namespace Inilim\Array\Method;

// use Inilim\Array\Array_;

/**
 * Collapse an array of arrays into a single array.
 */
function collapse(iterable $array): array
{
    $results = [];

    foreach ($array as $values) {
        if (!\is_array($values)) {
            continue;
        }

        $results[] = $values;
    }

    return \array_merge([], ...$results);
}

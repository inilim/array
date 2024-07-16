<?php

namespace Inilim\Array\Method;

// use Inilim\Array\Array_;

/**
 * Shuffle the given array and return the result.
 */
function shuffle(array $array, ?int $seed = null): array
{
    if ($seed === null) {
        \shuffle($array);
    } else {
        \mt_srand($seed);
        \shuffle($array);
        \mt_srand();
    }

    return $array;
}

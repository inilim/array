<?php

namespace Inilim\Array\Method;

use Inilim\Array\Array_;

/**
 * Convert a flatten "dot" notation array into an expanded array.
 * @param  iterable  $array
 */
function undot($array): array
{
    $results = [];

    foreach ($array as $key => $value) {
        Array_::set($results, $key, $value);
    }

    return $results;
}

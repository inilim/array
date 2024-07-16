<?php

namespace Inilim\Array\Method;

// use Inilim\Array\Array_;

/**
 * Convert the array into a query string.
 */
function query(array $array): string
{
    return \http_build_query($array, '', '&', \PHP_QUERY_RFC3986);
}

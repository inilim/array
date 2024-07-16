<?php

namespace Inilim\Array\Method;

// use Inilim\Array\Array_;

/**
 * Get the first element of an array. Useful for method chaining.
 * @return mixed
 */
function head(array $array)
{
    return \reset($array);
}

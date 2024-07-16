<?php

namespace Inilim\Array\Method;

// use Inilim\Array\Array_;

/**
 * Return the default value of the given value.
 *
 * @param  mixed $value
 * @return mixed
 */
function value($value)
{
    return $value instanceof \Closure ? $value() : $value;
}

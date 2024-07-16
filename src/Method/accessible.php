<?php

namespace Inilim\Array\Method;

// use Inilim\Array\Array_;

/**
 * Determine whether the given value is array accessible.
 *
 * @param  mixed  $value
 * @return bool
 */
function accessible($value): bool
{
    return \is_array($value) || $value instanceof \ArrayAccess;
}

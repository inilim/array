<?php

namespace Inilim\Array\Method;

/**
 * If the given value is not an array, wrap it in one.
 * @param  mixed  $value
 */
function wrap($value): array
{
    return \is_array($value) ? $value : [$value];
}

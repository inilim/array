<?php

namespace Inilim\Array\Method;

// use Inilim\Array\Array_;

/**
 * If the given value is not an array and not null, wrap it in one.
 * @param  mixed  $value
 */
function wrap($value): array
{
    if ($value === null) return [];
    return \is_array($value) ? $value : [$value];
}

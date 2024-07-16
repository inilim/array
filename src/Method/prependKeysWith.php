<?php

namespace Inilim\Array\Method;

use Inilim\Array\Array_;

/**
 * Prepend the key names of an associative array.
 */
function prependKeysWith(array $array, string $prepend_with): array
{
    return Array_::mapWithKeys($array, static fn ($item, $key) => [$prepend_with . $key => $item]);
}

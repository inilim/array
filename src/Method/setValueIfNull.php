<?php

namespace Inilim\Array\Method;

use Inilim\Array\Array_;

/**
 * установить значение если значение по ключу null
 * @param mixed $value
 */
function setValueIfNull(array &$array, string $key_dot, $value): bool
{
    if (Array_::has($array, $key_dot) && Array_::get($array, $key_dot) === null) {
        Array_::set($array, $key_dot, $value);
        return true;
    }
    return false;
}

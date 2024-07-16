<?php

namespace Inilim\Array\Method;

use Inilim\Array\Array_;

/**
 * установить значение если значения по ключу нет
 * @param mixed $value
 */
function setValueIfNotExists(array &$array, string $key_dot, $value): bool
{
    if (!Array_::has($array, $key_dot)) {
        Array_::set($array, $key_dot, $value);
        return true;
    }
    return false;
}

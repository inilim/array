<?php

namespace Inilim\Array\Method;

use Inilim\Array\Array_;

function renameDotKey(array &$array, string $old_key, string $new_key): bool
{
    $array  = Array_::dot($array);
    $result = Array_::renameKey($array, $old_key, $new_key);
    $array  = Array_::undot($array);
    return $result;
}

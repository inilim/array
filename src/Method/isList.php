<?php

namespace Inilim\Array\Method;

// use Inilim\Array\Array_;

function isList(array $array): bool
{
    return \array_is_list($array);
}

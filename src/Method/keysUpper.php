<?php

namespace Inilim\Array\Method;

// use Inilim\Array\Array_;

function keysUpper(array $array): array
{
    return \array_change_key_case($array, \CASE_UPPER);
}

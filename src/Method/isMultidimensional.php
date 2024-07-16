<?php

namespace Inilim\Array\Method;

// use Inilim\Array\Array_;

/**
 * проверка на многомерный массив
 * true - многомерный
 * false - одномерный
 */
function isMultidimensional(array $arr): bool
{
    return (\sizeof($arr) - \sizeof($arr, \COUNT_RECURSIVE)) !== 0;
}

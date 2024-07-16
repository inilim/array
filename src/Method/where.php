<?php

namespace Inilim\Array\Method;

// use Inilim\Array\Array_;

/**
 * Filter the array using the given callback. array_filter
 *
 * TODO need check generic
 * @template TKey
 * @template TValue
 *
 * @param  array<TKey,TValue>  $array
 * @param  callable(TValue,TKey): bool  $callback
 * @return array<TKey, TValue>|array{}
 */
function where(array $array, callable $callback): array
{
    return \array_filter($array, $callback, \ARRAY_FILTER_USE_BOTH);
}

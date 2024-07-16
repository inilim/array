<?php

namespace Inilim\Array\Method;

// use Inilim\Array\Array_;

/**
 * Run a map over each of the items in the array.
 * TODO need check generic
 * @template TKey
 * @template TValue
 *
 * @param  array<TKey, TValue>  $array
 * @param  callable(TValue, TKey): TValue  $callback
 * @return array<TKey, TValue>
 */
function map(array $array, callable $callback): array
{
    $keys = \array_keys($array);

    try {
        $items = \array_map($callback, $array, $keys);
    } catch (\ArgumentCountError) {
        $items = \array_map($callback, $array);
    }

    return \array_combine($keys, $items);
}

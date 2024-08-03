<?php

namespace Inilim\Array\Method;

/**
 * Execute a callback over each item.
 * @param callable(TValue,TKey): mixed $callback
 */
function each(array $array, callable $callback): void
{
    foreach ($array as $key => $item) {
        if ($callback($item, $key) === false) {
            break;
        }
    }
}

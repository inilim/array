<?php

namespace Inilim\Array\Method;

use Inilim\Array\Array_;

/**
 * Execute a callback over each nested chunk of items.
 * @param callable(...mixed): mixed $callback
 */
function eachSpread(array $array, callable $callback): void
{
    Array_::each($array, static function ($chunk, $key) use ($callback) {
        $chunk[] = $key;
        return $callback(...$chunk);
    });
}

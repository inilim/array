<?php

namespace Inilim\Array\Method;

use Inilim\Array\Array_;

/**
 * Run a map over each nested chunk of items.
 */
function mapSpread(array $array, callable $callback): array
{
    return Array_::map($array, static function ($chunk) use ($callback) {
        return $callback(...$chunk);
    });
}

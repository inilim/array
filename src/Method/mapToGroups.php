<?php

namespace Inilim\Array\Method;

use Inilim\Array\Array_;

/**
 * Run a grouping map over the items.
 * The callback should return an associative array with a single key/value pair.
 */
function mapToGroups(array $array, callable $callback): array
{
    return \array_reduce(
        Array_::map($array, $callback),
        static function ($groups, $pair) {
            $groups[\key($pair)][] = \reset($pair);
            return $groups;
        }
    );
}

<?php

namespace Inilim\Array\Method;

use Inilim\Array\Array_;

function sortBy(array $arr, string $by, int $options = \SORT_REGULAR, bool $descending = false): array
{
    $t = [];
    foreach ($arr as $key => $value) {
        $t[$key] = Array_::dataGet($value, $by);
    }

    $descending ? \arsort($t, $options) : \asort($t, $options);

    foreach (\array_keys($t) as $key) {
        $t[$key] = $arr[$key];
    }

    return $t;
}

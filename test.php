<?php

require_once __DIR__ . '/vendor/autoload.php';

use Inilim\Dump\Dump;
use Inilim\Array\Array_;

Dump::init();

$value = [
    [
        'name' => 'John Doe',
        'department' => 'Sales',
    ],
    [
        'name' => 'Jane Doe',
        'department' => 'Sales',
    ],
    [
        'name' => 'Johnny Doe',
        'department' => 'Marketing',
    ]
];

$a = _arr()->mapToGroups($value, function (array $item, int $key) {
    return [$item['department'] => $item['name']];
});





de($a);
$a = [1, 2, 3, 4];


$a = Array_::map($a, function ($i) {
    return $i + 1;
});


de($a);





de();




/**
 * установить значение если значения по ключу нет
 * @param mixed $value
 */
function setValueIfNotExists(array &$array, string $key_dot, $value): bool
{
    if (!\_arr()->has($array, $key_dot)) {
        \_arr()->set($array, $key_dot, $value);
        return true;
    }
    return false;
}

/**
 * установить значение если значение по ключу null
 * @param mixed $value
 */
function setValueIfNull(array &$array, string $key_dot, $value): bool
{
    if (\_arr()->has($array, $key_dot) && \_arr()->get($array, $key_dot) === null) {
        \_arr()->set($array, $key_dot, $value);
        return true;
    }
    return false;
}

function renameDotKey(array &$array, string $old_key, string $new_key): bool
{
    $array  = \_arr()->dot($array);
    $result = \_arr()->renameKey($array, $old_key, $new_key);
    $array  = \_arr()->undot($array);
    return $result;
}

/**
 * @param  (string|int)[]|string|int $keys
 */
function onlyNestedArray(array $array, $keys, int $depth = 1): array
{
    if ($depth === 0) {
        return \_arr()->map($array, static fn ($item) => \_arr()->only($item, $keys));
    } else {
        foreach ($array as $idx =>  $item) {
            if (\is_array($item)) {
                $array[$idx] = \onlyNestedArray($item, ($depth - 1));
            }
        }
        return $array;
    }
}

/**
 * @param  (string|int)[]|string|int $keys
 */
function exceptNestedArray(array $array, $keys, int $depth = 1): array
{
    if ($depth === 0) {
        return \_arr()->map($array, static fn ($item) => \_arr()->except($item, $keys));
    } else {
        foreach ($array as $idx =>  $item) {
            if (\is_array($item)) {
                $array[$idx] = \exceptNestedArray($item, ($depth - 1));
            }
        }
        return $array;
    }
}

function getNestedArraysAtLevel(array $array, int $depth = 1): array
{
    if ($depth === 0) {
        return \_arr()->where($array, static fn ($item) => \is_array($item));
    } else {
        $result = [];
        foreach ($array as $item) {
            if (\is_array($item)) {
                $result = \array_merge($result, \getNestedArraysAtLevel($item, ($depth - 1)));
            }
        }
        return $result;
    }
}

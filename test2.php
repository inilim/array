<?php

require_once __DIR__ . '/vendor/autoload.php';

use Inilim\Dump\Dump;

Dump::init();


$data = [
    'key1' => [
        'subkey1' => 42,
        'subkey2' => 0.123,
        'subkey3' => 'abcdefghij',
        'subkey4' => [1, 2, 3, 4, 5]
    ],
    'key2' => [
        'subkey1' => 99,
        'subkey2' => 0.789,
        'subkey3' => 'klmnopqrst',
        'subkey4' => [6, 7, 8, 9, 10]
    ],
];

$start_mem = \memory_get_usage();


$start = \microtime(true);






$data = \_arr()->dot($data);
$data = \_arr()->undot($data);
$data = \_arr()->sortRecursive($data);
\_arr()->isAssoc($data);
\_arr()->isMultidimensional($data);








$end = \microtime(true);

d(\memory_get_usage() - $start_mem);
\de($end - $start);

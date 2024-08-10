<?php

namespace Inilim\Array\Method;

use Inilim\Array\Array_;

/**
 * получаем ключи dot notation по паттерну | 
 * key.*.key....
 * @return array{}|string[]
 */
function getDotKeys(array $target, string $dot_pattern): array
{
    $pattern = '#^' . \str_replace('\*', '[^\.]+', \preg_quote($dot_pattern)) . '#';
    return \array_values(
        \array_filter(
            \array_keys(Array_::dot($target)),
            static fn($key) => \preg_match($pattern, $key),
        )
    );
}

<?php

namespace Inilim\Array\Method;

use Inilim\Array\Array_;

/**
 * Fill in data where it's missing.
 *
 * @param  mixed  $target
 * @param  string|string[]  $key
 * @param  mixed  $value
 * @return mixed
 */
function dataFill(&$target, $key, $value)
{
    return Array_::dataSet($target, $key, $value, false);
}

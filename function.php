<?php

use Inilim\Array\Array_;

if (!\function_exists('_arr')) {
    function _arr(): Array_
    {
        static $o = new Array_;
        return $o;
    }
}

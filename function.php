<?php

use Inilim\Array\Array_;

if (!function_exists('_arr')) {
    function _arr(): Array_
    {
        static $instance = null;
        if ($instance !== null) return $instance;
        return $instance = new Array_;
    }
}

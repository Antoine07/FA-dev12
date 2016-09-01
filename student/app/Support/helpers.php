<?php

if (!function_exists('check_radio')) {

    function check_radio($name, $value, $default=null)
    {
        $old = old($name);

        if (!is_null($default) && empty($old)) return 'checked';

        if (old($name) == $value) return 'checked';
    }

}

if (!function_exists('check_select')) {

    function check_select($name, $id, $default = null)
    {
        $old = old($name);

        if (!is_null($default) && empty($old))return 'selected';

        if ($old == $id) return 'selected';
    }

}
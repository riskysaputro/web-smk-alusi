<?php

use App\Models\Setting;

if (!function_exists('getSetting')) {
    function getSetting($key, $default = '')
    {
        return Setting::getValue($key, $default);
    }
}
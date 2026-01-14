<?php
use App\Models\Setting;

if (!function_exists('get_setting')) {
    function get_setting() {
        return \App\Models\Setting::first();
    }
}


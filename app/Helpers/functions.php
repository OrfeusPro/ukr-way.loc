<?php

if (!function_exists('ver_asset')) {
    function ver_asset($path, $secure = null): string
    {
        $timestamp = @filemtime(public_path($path)) ?: 0;

        return asset($path, $secure) . '?' . $timestamp;
    }
}

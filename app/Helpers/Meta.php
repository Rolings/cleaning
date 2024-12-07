<?php

use Illuminate\Support\Str;

/**
 * Function return description text for meta
 */
if (!function_exists('getDescription')) {
    function getDescription(): string
    {
        return view()->shared('metaData')['description'] ?? '';
    }
}

/**
 * Function return keywords for meta
 */
if (!function_exists('getKeywords')) {
    function getKeywords(): string
    {
        return view()->shared('metaData')['keywords'] ?? '';
    }
}

/**
 *
 */
if (!function_exists('isRobotIndex')) {
    function isRobotIndex(): bool
    {
        return view()->shared('metaData')['robot_index'] ?? true;
    }
}

if (!function_exists('canonical_url')) {
    function canonicaUrl()
    {
        if (Str::startsWith($current = url()->current(), 'https://www')) {
            return str_replace('https://www.', 'https://', $current);
        }

        return str_replace('https://', 'https://www.', $current);
    }
}

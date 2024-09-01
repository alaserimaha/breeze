<?php


if (!function_exists('getDataTableTranslationLink')) {
    function getDataTableTranslationLink(): string
    {
        return app()->isLocale('ar') ? asset('assets/custom/tables/ar.json') : 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/en-GB.json';
    }
}

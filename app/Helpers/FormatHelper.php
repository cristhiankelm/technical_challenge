<?php

if (!function_exists('format_currency')) {
    /**
     * Format a number as currency.
     *
     * @param  float  $amount
     * @return string
     */
    function format_currency($amount)
    {
        return 'G$ ' . number_format($amount, 0, ',', '.');
    }
}

<?php

if (!function_exists('format_currency')) {
    /**
     * Format a number as currency.
     *
     * @param  float  $amount
     * @return string
     *
     * Helper nivel global de la aplicación para formatear valor monetário en Formato Guaranies PY
     * Accionado dentro de composer.json
     */
    function format_currency($amount)
    {
        return 'G$ ' . number_format($amount, 0, ',', '.');
    }
}

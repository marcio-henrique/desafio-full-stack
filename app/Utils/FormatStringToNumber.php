<?php


namespace App\Utils;


class FormatStringToNumber
{
    public static function stringToInt ($string): int
    {
        return (int) filter_var($string, FILTER_SANITIZE_NUMBER_INT);
    }
    public static function moneyMaskedStringToFloat ($string): float
    {
        $filter= array('R', '$', '.', ' ');
        $string = str_replace($filter, '', $string);
        $string = str_replace(',', '.', $string);

        return floatval($string);
    }
}

<?php

namespace App\Utils;

abstract class Number
{
    /**
     * @param $value
     * @return float
     */
    public static function unmask($value)
    {
        $value = str_replace('.', '', $value);
        $value = str_replace(',', '.', $value);

        if (is_numeric($value)) {
            return floatval($value);
        } else {
            throw new \InvalidArgumentException('Invalid string to format to number');
        }
    }
}

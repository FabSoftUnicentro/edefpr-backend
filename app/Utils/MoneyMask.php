<?php

/**
 * @param $value
 * @return mixed|string
 */
function money($value)
{
    $maskedValue = number_format($value, 2);
    $maskedValue = str_replace(',', '$', $maskedValue);
    $maskedValue = str_replace('.', ',', $maskedValue);
    $maskedValue = str_replace('$', '.', $maskedValue);

    return $maskedValue;
}

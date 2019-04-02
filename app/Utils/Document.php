<?php

namespace App\Utils;

abstract class Document
{
    const TYPE_CNPJ = 'CNPJ';
    const TYPE_CPF = 'CPF';

    /**
     * @param $cnpj
     * @return bool
     */
    public static function isCnpj($cnpj)
    {
        /** Value validation */
        if (! $cnpj) {
            return false;
        }

        /** Ponctuation validation */
        $ponctuation = preg_replace('/[0-9]/', '', (string) $cnpj);

        if ($ponctuation !== '../-' && $ponctuation !== '') {
            return false;
        }

        $cnpjNumbers = preg_replace('/[^0-9]/', '', (string) $cnpj);

        /** Length validation */
        if (strlen($cnpjNumbers) != 14) {
            return false;
        }

        /** Validation the first check digit */
        for ($i = 0, $j = 5, $sum = 0; $i < 12; $i++) {
            $sum += $cnpjNumbers{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $remainder = $sum % 11;

        if ($cnpjNumbers{12} != ($remainder < 2 ? 0 : 11 - $remainder)) {
            return false;
        }

        /** Validation the second check digit */
        for ($i = 0, $j = 6, $sum = 0; $i < 13; $i++) {
            $sum += $cnpjNumbers{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $remainder = $sum % 11;

        return $cnpjNumbers{13} == ($remainder < 2 ? 0 : 11 - $remainder);
    }

    /**
     * @param $cpf
     * @return bool
     */
    public static function isCpf($cpf)
    {
        $cpf = preg_replace('/[^0-9]/', '', (string) $cpf);
        // Valida tamanho
        if (strlen($cpf) != 11) {
            return false;
        }
        // Calcula e confere primeiro dígito verificador
        for ($i = 0, $j = 10, $soma = 0; $i < 9; $i++, $j--) {
            $soma += $cpf{$i} * $j;
        }
        $resto = $soma % 11;
        if ($cpf{9} != ($resto < 2 ? 0 : 11 - $resto)) {
            return false;
        }
        // Calcula e confere segundo dígito verificador
        for ($i = 0, $j = 11, $soma = 0; $i < 10; $i++, $j--) {
            $soma += $cpf{$i} * $j;
        }

        $resto = $soma % 11;

        return $cpf{10} == ($resto < 2 ? 0 : 11 - $resto);
    }

    /**
     * @return array
     */
    public static function getDocumentTypes()
    {
        return [
            self::TYPE_CPF => 'CPF',
            self::TYPE_CNPJ => 'CNPJ'
        ];
    }
}

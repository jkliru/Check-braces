<?php

namespace jkliru;

/**
 * Проверяет корректность открытых/закрытых круглых скобок
 */
class CheckBraces
{
    public function isCorrectString($str) {
        if (preg_match('/[^\(\)\t\r\n ]/', $str))
            throw new \InvalidArgumentException('Unexpected symbol in a string');

        $braces = [];

        foreach(str_split($str) as $index => $symbol) {
            switch($symbol) {
                case '(':
                    array_push($braces, '(');
                    break;
                case ')':
                    if (empty($braces)) {
                        return false;
                    }

                    array_pop($braces);
                    break;
            }
        }

        if (!empty($braces))
            return false;

        return true;
    }
}
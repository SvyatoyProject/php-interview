<?php

namespace App\Helpers;

class DateHelper
{
    /**
     * Конвертация строковой даты в timestamp
     *
     * @param string $date
     * @param string $separator
     * @return bool|int
     */
    public static function convertDateToTimestamp(string $date, string $separator): bool|int
    {
        if (!str_contains($date, '-')) {
            $date = str_replace($separator, '-', $date);
        }

        return strtotime($date);
    }
}

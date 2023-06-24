<?php

namespace App\Helpers;

class ArrHelper
{
    /**
     * Уникальное значение по ключу многомерного массива
     *
     * @param array $data
     * @param string $key
     * @return array
     */
    public static function uniqueByKey(array $data, string $key): array
    {
        $keys = [];

        return array_filter(
            $data,
            function (array $item) use (&$keys, $key) {
                $value = $item[$key];

                if (in_array($value, $keys)) {
                    return false;
                }

                $keys[] = $item[$key];
                return true;
            }
        );
    }
}

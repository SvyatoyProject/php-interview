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

    /**
     * Сортировка по ключу многомерного массива
     *
     * @param array $array
     * @param string $key
     * @param int $sort
     * @return array
     */
    public static function sortBy(array $array, string $key, int $sort = SORT_ASC): array
    {
        $values = array_column($array, $key);
        array_multisort($values, $sort, $array);

        return $array;
    }
}

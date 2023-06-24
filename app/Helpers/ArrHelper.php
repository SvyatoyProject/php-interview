<?php

namespace App\Helpers;

class ArrHelper
{
    /**
     * Уникальность по ключу многомерного массива
     *
     * @param array $array
     * @param string $key
     * @return array
     */
    public static function uniqueByKey(array $array, string $key): array
    {
        $keys = [];

        return array_filter(
            $array,
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

    /**
     * 3. Отбор по значению многомерного массива
     *
     * @param array $array
     * @param string $key
     * @param $value
     * @return array
     */
    public static function whereBy(array $array, string $key, $value): array
    {
        return array_filter(
            $array,
            function (array $item) use ($key, $value) {
                return $item[$key] == $value;
            }
        );
    }
}

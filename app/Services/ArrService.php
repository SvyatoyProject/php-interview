<?php

namespace App\Services;

use App\Helpers\ArrHelper;
use App\Helpers\DateHelper;

class ArrService
{
    /**
     * 1. Уникальность по ключу многомерного массива
     *
     * @param array $array
     * @param string $key
     * @return array
     */
    public function unique(array $array, string $key): array
    {
        return ArrHelper::uniqueByKey($array, $key);
    }

    /**
     * 2. Сортировка по ключу многомерного массива
     *
     * @param array $array
     * @param string $key
     * @param int $sort
     * @return array
     */
    public function sort(array $array, string $key, int $sort = SORT_ASC): array
    {
        $dateKey = 'date';
        $sortDateKey = 'sort_date';

        if ($key === $dateKey) {
            $array = array_map(
                function (array $item) use ($dateKey, $sortDateKey) {
                    $dateValue = $item[$dateKey];
                    $item[$sortDateKey] = DateHelper::convertDateToTimestamp($dateValue, '.') ?? $dateValue;

                    return $item;
                },
                $array
            );
            $key = $sortDateKey;
        }

        $array = ArrHelper::sortBy($array, $key, $sort);

        if ($key === $sortDateKey) {
            $array = array_map(
                function (array $item) use ($sortDateKey) {
                    unset($item[$sortDateKey]);
                    return $item;
                },
                $array
            );
        }

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
    public function where(array $array, string $key, $value): array
    {
        return ArrHelper::whereBy($array, $key, $value);
    }
}

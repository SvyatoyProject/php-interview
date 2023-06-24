<?php

namespace App\Services;

use App\Helpers\ArrHelper;
use App\Helpers\DateHelper;

class ArrService
{
    /**
     * Уникальный многомерный массив
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
     * Сортировка по ключу многомерного массива
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
                    $item[$sortDateKey] = DateHelper::convertDateToTimestamp($item[$dateKey], '.') ?? $item[$dateKey];
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
}

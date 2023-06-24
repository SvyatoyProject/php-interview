<?php

namespace App\Controllers;

use App\Services\ArrService;

class Controller
{
    private ArrService $service;


    public function __construct(ArrService $service)
    {
        $this->service = $service;
    }

    /**
     * 1. Уникальность по ключу многомерного массива
     *
     * @param array $array
     * @param string $key
     * @return array
     */
    public function unique(array $array, string $key): array
    {
        return $this->service->unique($array, $key);
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
        return $this->service->sort($array, $key, $sort);
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
        return $this->service->where($array, $key, $value);
    }

    /**
     * 4. Преобразование двух значений многомерного массива в ключ => значение
     *
     * @param array $array
     * @param string $key
     * @param string $keyValue
     * @return array
     */
    public function twoValuesToKeyValue(array $array, string $key, string $keyValue): array
    {
        return $this->service->twoValuesToKeyValue($array, $key, $keyValue);
    }
}

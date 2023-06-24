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
     * Уникальность по ключу многомерного массива
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
     * Сортировка по ключу многомерного массива
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
}

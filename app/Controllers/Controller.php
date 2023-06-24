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
     * Уникальный многомерный массив
     *
     * @param array $array
     * @param string $key
     * @return array
     */
    public function unique(array $array, string $key): array
    {
        return $this->service->unique($array, $key);
    }
}

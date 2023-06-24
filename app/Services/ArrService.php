<?php

namespace App\Services;

use App\Helpers\ArrHelper;

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
}

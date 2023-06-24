<?php

use App\Controllers\Controller;
use App\Services\ArrService;

require __DIR__ . '/../vendor/autoload.php';

$array = [
    ['id' => 1, 'date' => '12.01.2020', 'name' => 'test1'],
    ['id' => 2, 'date' => '02.05.2020', 'name' => 'test2'],
    ['id' => 4, 'date' => '08.03.2020', 'name' => 'test4'],
    ['id' => 1, 'date' => '22.01.2020', 'name' => 'test1'],
    ['id' => 2, 'date' => '11.11.2020', 'name' => 'test4'],
    ['id' => 3, 'date' => '06.06.2020', 'name' => 'test3']
];
var_dump($array);

$arrService = new ArrService();
$controller = new Controller($arrService);

// 1. Уникальность по ключу многомерного массива
$uniqueArray = $controller->unique($array, 'id');
var_dump($uniqueArray);

// 2. Сортировка по ключу многомерного массива
$sortArray = $controller->sort($uniqueArray, 'date', SORT_DESC);
var_dump($sortArray);

// 3. Отбор по значению многомерного массива
$whereArray = $controller->where($array, 'id', 2);
var_dump($whereArray);

// 4. Преобразование двух значений многомерного массива в ключ => значение
$flipArray = $controller->twoValuesToKeyValue($uniqueArray, 'name', 'id');
var_dump($flipArray);

// 5. Запрос на вывод всех товаров, которые имеют все возможные теги
var_dump('
select *
from goods
where id in (select goods_id
             from goods_tags,
                  tags
             group by goods_id
             having sum(tag_id) = sum(id));
');

// 6. Запрос на вывод всех департаментов, в которых есть мужчины и поставлена оценка выше 5
var_dump('
select distinct d.id, d.name
from departments as d,
     evaluations as e
where d.id = e.department_id
  and e.gender = true
  and e.value > 5
');

// 7. Open-Closed Principle
include 'architecture/solid_o.php';

// 8. Dependency Inversion Principle
include 'architecture/solid_d.php';

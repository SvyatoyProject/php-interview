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
var_dump('Оригинальный массив', $array);

$arrService = new ArrService();
$controller = new Controller($arrService);

$uniqueArray = $controller->unique($array, 'id');
var_dump('1. Уникальность по ключу многомерного массива', $uniqueArray);

$sortArray = $controller->sort($uniqueArray, 'date', SORT_DESC);
var_dump('2. Сортировка по ключу многомерного массива', $sortArray);

$whereArray = $controller->where($array, 'id', 2);
var_dump('3. Отбор по значению многомерного массива', $whereArray);

$flipArray = $controller->twoValuesToKeyValue($uniqueArray, 'name', 'id');
var_dump('4. Преобразование двух значений многомерного массива в ключ => значение', $flipArray);

var_dump(
    '5. Запрос на вывод всех товаров, которые имеют все возможные теги',
    '
select *
from goods
where id in (select goods_id
             from goods_tags,
                  tags
             group by goods_id
             having sum(tag_id) = sum(id));
'
);

var_dump(
    '6. Запрос на вывод всех департаментов, в которых есть мужчины и поставлена оценка выше 5',
    '
select distinct d.id, d.name
from departments as d,
     evaluations as e
where d.id = e.department_id
  and e.gender = true
  and e.value > 5
'
);

var_dump(
    '6. Корректировка решения задачи, не правильно понял в первый раз',
    '
select department_id
from evaluations
where gender = true
group by department_id
having min(value) > 5
'
);

$result = include 'architecture/solid_o.php';
var_dump('7. Open-Closed Principle', $result);

$result = include 'architecture/solid_d.php';
var_dump('8. Dependency Inversion Principle', $result);

var_dump(
    '9. Универсальный подход к получению токена из разных хранилищ',
    '
/** @var IDatabase $driverClass */
$driverClass = config("database.driver")
$driver = new $driverClass;

$service = new Concept($driver);
$result = $service->getUserData();
'
);

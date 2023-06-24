<?php

namespace Architecture;

class SomeObjectOne
{
    public function getHandleName(): string
    {
        return 'handle_object_1';
    }
}

class SomeObjectTwo
{
    public function getHandleName(): string
    {
        return 'handle_object_2';
    }
}

class SomeObjectsHandler
{
    public function handleObjects(array $objects): array
    {
        $handlers = [];

        foreach ($objects as $object) {
            $handlers[] = $object->getHandleName();
        }

        return $handlers;
    }
}

$objects = [
    new SomeObjectOne(),
    new SomeObjectTwo()
];

$soh = new SomeObjectsHandler();
$result = $soh->handleObjects($objects);

var_dump($result);

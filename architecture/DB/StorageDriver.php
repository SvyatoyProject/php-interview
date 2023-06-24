<?php

namespace Architecture\DB;

use Architecture\DB\Interfaces\IDatabase;

class StorageDriver implements IDatabase
{
    public function getSecretKey(): string
    {
        return 'Возвращен ключ из файла';
    }
}

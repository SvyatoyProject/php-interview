<?php

namespace Architecture\DB;

use Architecture\DB\Interfaces\IDatabase;

class RedisDriver implements IDatabase
{
    public function getSecretKey(): string
    {
        return 'Возвращен ключ из redis';
    }
}

<?php

namespace Architecture\DB;

use Architecture\DB\Interfaces\IDatabase;

class PostgresDriver implements IDatabase
{
    public function getSecretKey(): string
    {
        return 'Возвращен ключ из postgresql';
    }
}

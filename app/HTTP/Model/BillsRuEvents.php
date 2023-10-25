<?php

namespace App\HTTP\Model;

use App\System\DataBase\QueryBuilder;

class BillsRuEvents extends QueryBuilder
{
    protected string $table = 'bills_ru_events';

    public function createData($array): void
    {
       $this->insert($array);
    }

    public function createTable($array): void
    {
       $this->create($array);
    }

    public function readData(): false|array
    {
        return $this->read($this->table);
    }
}
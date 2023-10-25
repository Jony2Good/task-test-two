<?php

namespace App\HTTP\Model;

use App\System\DataBase\QueryBuilder;

class BillsRuEvents extends QueryBuilder
{
    /**
     * @var string
     */
    protected string $table = 'bills_ru_events';

    /**
     * Записывает данные в таблицу
     * @param array<string> $array
     * @return void
     */
    public function createData(array $array): void
    {
       $this->insert($array);
    }

    /**
     * Создает таблицу
     * @param array<string> $array
     * @return void
     */
    public function createTable(array $array): void
    {
       $this->create($array);
    }

    /**
     * Получает данные из таблицы
     * @return false|array<string>
     */
    public function readData(): false|array
    {
        return $this->read($this->table);
    }
}
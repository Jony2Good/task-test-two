<?php

namespace App\System\DataBase;

use PDO;
use PDOStatement;

class ConnectionDB
{

    public static $instance;
    /**
     * @var PDO
     */
    public PDO $db;

    /**
     * @return mixed
     */
    public static function getInstance(): self
    {
        var_dump(gettype(self::$instance));
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct()
    {
        $this->db = new PDO('mysql:host=' . $_ENV['DB_HOST'] . ';port=' . $_ENV['DB_PORT'] . ';dbname=' . $_ENV['DB_DATABASE'] . '', $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'],
            [
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
    }
    /**
     * Формирует запрос в базу данных
     * @param string $query
     * @param array<string> $params
     * @return array|null
     */
    public function select(string $query, array $params = []): ?array
    {
        return $this->query($query, $params)->fetchAll();
    }

    /**
     * Обрабатывает входящие данные для предотвращения SQL-иньекций
     * @param string $query
     * @param array<string> $params
     * @return PDOStatement|false
     */
    public function query(string $query, array $params = []): PDOStatement|false
    {
        $query = $this->db->prepare($query);
        $query->execute($params);
        return $query;
    }

    /**
     * Проверяет на основе поступивших данныых наличие в таблице url
     * @param string $field
     * @param string $table
     * @return mixed
     */
    public function check(string $field, string $table): mixed
    {
        $query = $this->db->prepare("SELECT url FROM {$table} WHERE url = :url");
        $params = ['url' => $field];
        $query->execute($params);
        return $query->fetch();
    }

    /**
     * Получает последнее вхождение в таблицу по id
     * @return int
     */
    public function lastInsertId(): int
    {
        return (int)$this->db->lastInsertId();
    }

}
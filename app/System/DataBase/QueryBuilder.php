<?php

namespace App\System\DataBase;

class QueryBuilder
{
    /**
     * @var ConnectionDB|mixed
     */
    public ConnectionDB $db;

    /**
     * @var string
     */
    protected string $table;

    public function __construct()
    {
        $this->db = ConnectionDB::getInstance();
    }

    /**
     * Проверяет наличие таблицы базе данных, если её нет создает таблицу,
     * если есть выбрасывает сообщение с ошибкой в формате JSON
     * @param array<string> $fields
     * @return void
     */
    public function create(array $fields): void
    {
        $str = $this->getFields($fields);
        $query = "SELECT * FROM information_schema.tables WHERE  {$str[0]} = {$str[1]} LIMIT 1";
        $result = $this->db->select($query, $fields);
        if (empty($result)) {
            $query = "CREATE TABLE IF NOT EXISTS {$fields['table_name']} (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, date DATETIME NOT NULL, 
    title VARCHAR(230) NOT NULL, 
    url VARCHAR(260) NOT NULL, UNIQUE(url))";
            $this->db->query($query);
            http_response_code(200);
            echo json_encode(array('message' => 'Table created'));
        } else {
            http_response_code(403);
            echo json_encode(array('message' => 'Table already exists'));
            die();
        }
    }

    /**
     * Проверяет наличие url в таблице, если нет записывает строки
     * в противном случае выбрасывает предупреждение в формате JSON
     * @param array<string> $fields
     * @return void
     */
    public function insert(array $fields): void
    {
        $result = $this->db->check($fields['url'], $this->table);
        if(!empty($result)) {
            http_response_code(403);
            echo json_encode(array('message' => 'Url already exists'));
            die();
        } else {
            $str = $this->getFields($fields);
            $query = "INSERT INTO {$this->table} ({$str[0]}) VALUES ({$str[1]})";
            $this->db->query($query, $fields);
        }
    }

    /**
     * Получает все данные из таблицы
     * @param string $table
     * @return array<string>|false
     */
    public function read(string $table): false|array
    {
        $stmt = $this->db->query("SELECT * FROM {$table}");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Происходит обработка входящих параметром (создаются placeholders) для формирования qwery запроса к бд
     * @param array<string> $fields
     * @return array<string>
     */
    private function getFields(array $fields): array
    {
        $names = [];
        $masks = [];
        foreach ($fields as $field => $val) {
            $names[] = $field;
            $masks[] = ":$field";
        }
        $namesStr = implode(', ', $names);
        $masksStr = implode(', ', $masks);
        return [$namesStr, $masksStr];
    }
}
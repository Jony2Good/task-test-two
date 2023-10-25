<?php

namespace App\HTTP\Controller;


use App\HTTP\Service\ParseBizonLinks;
use App\System\View\View;

class BizonRuEventsController extends Controller
{

    /**
     * Отображает главную страницу
     * @return string
     */
    public function show(): string
    {
        return View::view('main.main');
    }

    /**
     * Создает таблицу
     * @return void
     */
    public function make(): void
    {
        $this->db->createTable(['table_name' => 'bills_ru_events']);
    }

    /**
     * Получает данные с сайта bills.ru, парсит и группирует данные, записывает их в таблицу
     * @return void
     */
    public function create(): void
    {
        $page = $this->get($_ENV['LINKS']);
        $data = ParseBizonLinks::create($page);

        foreach ($data as $item) {
            $this->db->createData($item);
        }
        http_response_code(200);
        echo json_encode(array('message' => 'Data inserted successful'));
    }

    /**
     * Возвращает данные из таблицы в JSON формате
     * @return false|string
     */
    public function read(): false|string
    {
       return json_encode($this->db->readData(), JSON_UNESCAPED_UNICODE);
    }

}










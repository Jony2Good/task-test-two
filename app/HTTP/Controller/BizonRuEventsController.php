<?php

namespace App\HTTP\Controller;


use App\HTTP\Service\ParseBizonLinks;
use App\System\View\View;

class BizonRuEventsController extends Controller
{
    public function show(): string
    {
        return View::view('main.main');
    }

    public function create(): void
    {
        $page = $this->get($_ENV['LINKS']);
        $data = ParseBizonLinks::create($page);

        foreach ($data as $item) {
            $this->db->createData($item);
        }
        http_response_code(200);
        echo json_encode(array('message' => 'Data inserted'));
    }

    public function read(): false|string
    {
       return json_encode($this->db->readData(), JSON_UNESCAPED_UNICODE);
    }
}










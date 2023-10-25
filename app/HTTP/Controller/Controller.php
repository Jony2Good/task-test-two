<?php

namespace App\HTTP\Controller;

use App\HTTP\Model\BillsRuEvents;
use App\System\Parser\Parser;

class Controller
{
    /**
     * @var Parser
     */
    protected Parser $data;

    /**
     * @var BillsRuEvents
     */
    protected BillsRuEvents $db;

    public function __construct()
    {
        $this->data = new Parser();
        $this->db = new BillsRuEvents();
    }

    /**
     * Получает необработанные данне с сайта bills.ru
     * @param string $link
     * @return bool|string
     */
    public function get(string $link): bool|string
    {
        return $this->data->read($link);
    }
}
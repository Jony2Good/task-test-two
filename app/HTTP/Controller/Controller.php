<?php

namespace App\HTTP\Controller;

use App\HTTP\Model\BillsRuEvents;
use App\System\Parser\Parser;

class Controller
{
    protected Parser $data;
    protected BillsRuEvents $db;

    public function __construct()
    {
        $this->data = new Parser();
        $this->db = new BillsRuEvents();
    }

    public function get($link): bool|string
    {
        return $this->data->read($link);
    }
}
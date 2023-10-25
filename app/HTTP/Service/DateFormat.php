<?php

namespace App\HTTP\Service;

class DateFormat
{
    public static function getMonths(string $date): string
    {
        $ruMonths = ['янв', 'фев', 'мар', 'апр', 'мая', 'июн', 'июл', 'авг', 'сен', 'окт', 'ноя', 'дек'];
        $enMonths = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $result = str_ireplace($ruMonths, $enMonths, $date);
        return date('Y-m-d H:i:s',strtotime($result));
    }
}


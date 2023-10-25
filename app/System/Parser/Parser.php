<?php

namespace App\System\Parser;

class Parser
{
    public function parseLink($link)
    {
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $link);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_USERAGENT, $_ENV['USER_AGENT']);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
            $result = curl_exec($ch);
            curl_close($ch);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    public function read($link)
    {
       return $this->parseLink($link);
    }
}
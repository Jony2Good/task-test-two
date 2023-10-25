<?php

namespace App\HTTP\Service;

use App\HTTP\Service\DateFormat;


class ParseBizonLinks
{
    public static array $list;

    public static function create(string $page)
    {
        $array = [];
        $hrefs = explode('bizon_api_news_row', $page);
        unset($hrefs[0]);
        foreach ($hrefs as $item) {
            if (preg_match('/[0-9]{1,2}\s[а-я].+?/iU', $item, $outData) && preg_match('|<a[^>]*?>(.*?)</a>|si', $item, $outLinks)) {
                $data = preg_replace('/^[^\d]*|(?<=\d{4}).*$|(?<=\s)\s+|/', "", $outData);
                preg_match_all('/<a\s+href="([^"]+)">([^<]+)<\/a>/i', $outLinks[0], $out);
                $array[] = [
                    'title' => $out[2],
                    'url' => $out[1],
                    'data' => $data,
                ];
            };
        }
        foreach ($array as $item) {
            static::$list[] = [
                'title' => $item['title'][0],
                'url' => $item['url'][0],
                'date' => DateFormat::getMonths($item['data'][0]),
            ];
        }
        return static::$list;
    }

}
<?php

namespace App\System\View;

class View
{
    /**
     * @var string
     */
    private static string $path;
    /**
     * @var array<string>|null
     */
    private static ?array $data;

    /**
     * Подключает с помощью манипуляции с путями файл из директории resorces/views
     * @param string $str
     * @param array<string> $data
     * @return string
     */
    public static function view(string $str, array $data = []): string
    {
        self::$data = $data;
        $path = str_replace('app\System\View', 'resources\views', __DIR__);
        self::$path = $path . DIRECTORY_SEPARATOR . str_replace('.', DIRECTORY_SEPARATOR, $str) . '.php';
        return self::getContent();
    }

    /**
     * Иницализирует запись файла в буфер для эго дальнейшего отображения
     * @return false|string
     */
    private static function getContent(): false|string
    {
        extract(self::$data);
        ob_start();
        require self::$path;
        $html = ob_get_contents();
        ob_get_clean();
        return $html;
    }

}
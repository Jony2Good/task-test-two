<?php

namespace App\System\ENV;

class DotEnvEnvironment
{
    /**
     * Записывает данные в глобальный массив $_ENV из файла .env
     * @param string $path
     * @return void
     */
    public function load(string $path): void
    {
        try {
            $newPath = str_replace('public', '.env', $path);
            $lines = file($newPath);
            foreach ($lines as $line) {
                [$key, $value] = explode('=', $line, 2);
                $key = trim($key);
                $value = trim($value);
                putenv(sprintf('%s=%s', $key, $value));
                $_ENV[$key] = $value;
                $_SERVER[$key] = $value;
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
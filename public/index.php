<?php

require "../vendor/autoload.php";

use App\System\Kernel;

(new App\System\ENV\DotEnvEnvironment)->load(__DIR__);

try {
    Kernel::run();
} catch (\Exception $e) {
    echo $e->getMessage();
}

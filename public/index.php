<?php

use App\Core\Routes;
use App\Core\View;

require '../bootstrap.php';

try {
    Routes::load();
} catch (Exception $exception) {
    echo $exception->getMessage();
}

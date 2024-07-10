<?php

use App\Core\Routes;
use App\Core\View;

try {
    Routes::load();
} catch (Exception $exception) {
    echo $exception->getMessage();
}

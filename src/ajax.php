<?php
require __DIR__ . '/../vendor/autoload.php';

if (!empty($_REQUEST)) {
    echo (new Controller())->init($_REQUEST);
}

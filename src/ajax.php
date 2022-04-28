<?php
require __DIR__ . '/../vendor/autoload.php';

if (!empty($_REQUEST)) {
    (new Controller())->init($_REQUEST);
}

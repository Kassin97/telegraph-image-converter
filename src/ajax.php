<?php
require __DIR__ . '/../vendor/autoload.php';

if (!empty($_REQUEST)) {
    $arResult = (new Controller())->init($_REQUEST);
    echo json_encode($arResult);
}

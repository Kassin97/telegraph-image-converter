<?php
require __DIR__ . '/../vendor/autoload.php';

if (!empty($_REQUEST)) {
    Log::add('Запит від '.$_SERVER['REMOTE_ADDR'].': '.$_REQUEST['link']);
    $arResult = (new Controller())->init($_REQUEST);
    echo json_encode($arResult);
}

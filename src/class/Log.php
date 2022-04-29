<?php

class Log
{
    public static string $pathToLogFolder = __DIR__ . '/../../logs/';

    public static function add($message): void
    {
        $message = date("H:i:s ") . $message . "\n";
        $logFilePath = self::$pathToLogFolder . date("d-m-Y") . '.log';
        file_put_contents($logFilePath, $message, FILE_APPEND);
    }
}
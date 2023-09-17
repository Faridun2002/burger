<?php
function logger($message) {
    $currentDate = date('Y-m-d');
    
    $logDirectory = __DIR__ . "/logs"; 
    $logFilePath = "$logDirectory/$currentDate.log";

    $timestamp = date('Y-m-d H:i:s');

    $logMessage = "[$timestamp] $message" . PHP_EOL;

    if (!file_exists($logFilePath)) {
        if (!is_dir($logDirectory)) {
            mkdir($logDirectory); 
        }
        touch($logFilePath); 
    }

    if ($logFile = fopen($logFilePath, 'a')) {
        fwrite($logFile, $logMessage);
        fclose($logFile);
    } else {
        echo "Ошибка при открытии файла журнала логов.";
    }
}

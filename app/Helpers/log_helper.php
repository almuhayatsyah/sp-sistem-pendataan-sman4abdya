<?php

if (!function_exists('log_activity')) {
  function log_activity($message)
  {
    $logFile = WRITEPATH . 'logs/activity.log';
    $timestamp = date('Y-m-d H:i:s');
    $entry = "[$timestamp] $message" . PHP_EOL;

    file_put_contents($logFile, $entry, FILE_APPEND);
  }
}

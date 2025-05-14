<?php

namespace App\Controllers;

class LogController extends BaseController
{
  public function log()
  {
    // Example: Read logs from a file
    $logFile = WRITEPATH . 'logs/activity.log';
    $logs = file_exists($logFile) ? file($logFile, FILE_IGNORE_NEW_LINES) : [];

    $data = [
      'title' => 'Log Pengaturan',
      'logs' => $logs
    ];

    return view('pengaturan/log', $data);
  }
}

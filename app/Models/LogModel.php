<?php

namespace App\Models;

use CodeIgniter\Model;

class LogModel extends Model
{
  protected $table = 'log';
  protected $primaryKey = 'id';
  protected $allowedFields = ['aktivitas', 'user_id', 'waktu', 'nisn']; // Tambahkan field lain jika ada

  public function getRecentLogs($limit = 10)
  {
    return $this->select('log.*, user.username')
      ->join('user', 'user.id = log.user_id', 'left')
      ->orderBy('log.waktu', 'DESC')
      ->findAll($limit);
  }
}

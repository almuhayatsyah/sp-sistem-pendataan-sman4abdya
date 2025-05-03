<?php

namespace App\Models;

use CodeIgniter\Model;

class OrtuModel extends Model
{
  protected $table = 'ortu';
  protected $primaryKey = 'id';
  protected $allowedFields = [
    'nama',
    'pekerjaan',
    'nomor_hp',
    'gaji'
  ];
}

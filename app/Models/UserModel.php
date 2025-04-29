<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
  protected $table = 'user';
  protected $primaryKey = 'id';
  protected $useAutoIncrement = true;
  protected $returnType = 'array';
  protected $useSoftDeletes = false;

  protected $allowedFields = ['username', 'password', 'role'];

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';

  // Validation rules
  protected $validationRules = [
    'username' => 'required|min_length[3]|max_length[50]|is_unique[user.username,id,{id}]',
    'password' => 'required|min_length[6]',
    'role' => 'required|in_list[operator,kesiswaan,pengunjung]'
  ];

  protected $beforeInsert = ['hashPassword'];
  protected $beforeUpdate = ['hashPassword'];

  protected function hashPassword(array $data)
  {
    if (!isset($data['data']['password'])) return $data;

    $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

    return $data;
  }
}

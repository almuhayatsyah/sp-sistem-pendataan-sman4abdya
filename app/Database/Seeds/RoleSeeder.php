<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder
{
  public function run()
  {
    $data = [
      [
        'name' => 'admin',
        'description' => 'Administrator',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
      ],
      [
        'name' => 'guru',
        'description' => 'Guru',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
      ],
      [
        'name' => 'siswa',
        'description' => 'Siswa',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
      ],
      [
        'name' => 'ortu',
        'description' => 'Orang Tua',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
      ]
    ];

    $this->db->table('roles')->insertBatch($data);
  }
}

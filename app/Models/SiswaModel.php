<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id',
        'nisn',
        'nama_siswa',
        'kelas',
        'tanggal_lahir',
        'tempat_lahir',
        'jenis_kelamin',
        'alamat',
        'agama',
        'umur',
        'nomor_hp',
        'foto_siswa',
        'foto_rumah',
        'status_kurang_mampu',
        'ortu_id',
        'kelas_id',
        'lokasi_id'



    ];
}

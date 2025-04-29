<?php

// SiswaModel.php
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

    // Fungsi untuk mendapatkan laporan siswa berdasarkan kelas, status kurang mampu, dan jenis kelamin
    // SiswaModel.php

    public function getLaporanRekap()
    {
        return $this->select('kelas, 
                    SUM(CASE WHEN LOWER(jenis_kelamin) = "laki-laki" THEN 1 ELSE 0 END) as laki_laki,
                    SUM(CASE WHEN LOWER(jenis_kelamin) = "perempuan" THEN 1 ELSE 0 END) as perempuan,
                    SUM(CASE WHEN status_kurang_mampu = 1 THEN 1 ELSE 0 END) as kurang_mampu,
                    SUM(CASE WHEN status_kurang_mampu = 0 THEN 1 ELSE 0 END) as tidak_kurang_mampu,
                    COUNT(*) as total')
            ->groupBy('kelas')
            ->findAll();
    }


    // Fungsi untuk mendapatkan laporan siswa berdasarkan kelas, status kurang mampu, dan jenis kelamin ke dalam pdf
    public function getLaporanSiswa()
    {
        return $this->select('nama_siswa, kelas, status_kurang_mampu, jenis_kelamin')
            ->findAll();
    }
}

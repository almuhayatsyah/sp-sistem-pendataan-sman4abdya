<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\KelasModel;
use App\Models\OrangTuaModel;
use App\Models\UserModel;
use App\Models\LogAktivitasModel;

class Dashboard extends BaseController
{
  protected $siswaModel;
  protected $kelasModel;
  protected $orangTuaModel;
  protected $userModel;
  protected $logAktivitasModel;

  public function __construct()
  {
    $this->siswaModel = new SiswaModel();
    $this->kelasModel = new KelasModel();
    $this->orangTuaModel = new OrangTuaModel();
    $this->userModel = new UserModel();
    $this->logAktivitasModel = new LogAktivitasModel();
  }

  public function index()
  {
    // Mengambil data total
    $data['total_siswa'] = $this->siswaModel->countAll();
    $data['total_kelas'] = $this->kelasModel->countAll();
    $data['total_orang_tua'] = $this->orangTuaModel->countAll();
    $data['total_user'] = $this->userModel->countAll();

    // Mengambil data untuk grafik siswa per kelas
    $kelas = $this->kelasModel->findAll();
    $data['kelas_labels'] = [];
    $data['siswa_data'] = [];

    foreach ($kelas as $k) {
      $data['kelas_labels'][] = $k['nama_kelas'];
      $data['siswa_data'][] = $this->siswaModel->where('id_kelas', $k['id'])->countAllResults();
    }

    // Mengambil log aktivitas terbaru
    $data['log_aktivitas'] = $this->logAktivitasModel->getRecentLogs();

    return view('dashboard/index', $data);
  }
}

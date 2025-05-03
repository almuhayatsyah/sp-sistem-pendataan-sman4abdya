<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\KelasModel;
use App\Models\OrtuModel;
use App\Models\UserModel;
use App\Models\LogModel;
use CodeIgniter\Controller;

class Dashboard extends Controller
{
  protected $siswaModel;
  protected $kelasModel;
  protected $ortuModel;
  protected $userModel;
  protected $logModel;

  public function __construct()
  {
    $this->siswaModel = new SiswaModel();
    $this->kelasModel = new KelasModel();
    $this->ortuModel = new OrtuModel();
    $this->userModel = new UserModel();
    $this->logModel = new LogModel();
  }

  public function index()
  {
    $role = session()->get('role');
    if ($role !== 'operator' && $role !== 'kesiswaan') {
      return redirect()->to('/login');
    }

    // Mengambil data total
    $data['total_siswa'] = $this->siswaModel->countAll();
    $data['total_kelas'] = $this->kelasModel->countAll();
    $data['total_orang_tua'] = $this->ortuModel->countAll();
    $data['total_user'] = $this->userModel->countAll();

    // Data untuk pie chart
    $data['kurang_mampu'] = $this->siswaModel->where('status_kurang_mampu', 1)->countAllResults();
    $data['tidak_kurang_mampu'] = $this->siswaModel->where('status_kurang_mampu', 0)->countAllResults();
    $data['laki_laki'] = $this->siswaModel->where('jenis_kelamin', 'Laki-laki')->countAllResults();
    $data['perempuan'] = $this->siswaModel->where('jenis_kelamin', 'Perempuan')->countAllResults();

    // Mengambil data untuk grafik siswa per kelas
    $kelas = $this->kelasModel->findAll();
    $data['kelas_labels'] = [];
    $data['siswa_data'] = [];

    foreach ($kelas as $k) {
      $data['kelas_labels'][] = $k['nama_kelas'];
      $data['siswa_data'][] = $this->siswaModel->where('id_kelas', $k['id'])->countAllResults();
    }

    // Mengambil log aktivitas terbaru
    $data['log_aktivitas'] = $this->logModel->getRecentLogs();

    return view('dashboard/index', $data);
  }
}

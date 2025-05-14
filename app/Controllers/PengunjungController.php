<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use CodeIgniter\Controller;

class PengunjungController extends Controller
{
  public function index()
  {
    // Cek role
    if (session()->get('role') !== 'pengunjung') {
      return redirect()->to('/login');
    }

    $siswaModel = new SiswaModel();
    $siswaKurangMampu = $siswaModel
      ->select('siswa.*, kelas.nama_kelas')
      ->join('kelas', 'kelas.id = siswa.kelas_id', 'left')
      ->where('status_kurang_mampu', 1)
      ->paginate(5, 'siswa');
    $pager = $siswaModel->pager;

    return view('pengunjung/index', [
      'siswa' => $siswaKurangMampu,
      'pager' => $pager
    ]);
  }
}

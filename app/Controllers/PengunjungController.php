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
    $siswaKurangMampu = $siswaModel->where('status_kurang_mampu', 1)->paginate(5, 'siswa');
    $pager = $siswaModel->pager;

    return view('pengunjung/index', [
      'siswa' => $siswaKurangMampu,
      'pager' => $pager
    ]);
  }
}

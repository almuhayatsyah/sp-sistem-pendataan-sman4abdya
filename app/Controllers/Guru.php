<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Guru extends BaseController
{
  public function dashboard()
  {
    return view('guru/dashboard');
  }

  public function siswa()
  {
    return view('guru/siswa');
  }

  public function kelas()
  {
    return view('guru/kelas');
  }
}

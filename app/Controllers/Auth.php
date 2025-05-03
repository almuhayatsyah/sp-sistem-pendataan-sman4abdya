<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Auth extends Controller
{
  public function login()
  {
    return view('auth/login');
  }

  public function loginPost()
  {
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    $userModel = new UserModel();
    $user = $userModel->where('username', $username)->first();

    if ($user && password_verify($password, $user['password'])) {
      // Set session
      session()->set([
        'id' => $user['id'],
        'username' => $user['username'],
        'role' => $user['role'],
        'logged_in' => true
      ]);
      // Redirect sesuai role
      if ($user['role'] === 'operator' || $user['role'] === 'kesiswaan') {
        return redirect()->to('/dashboard');
      } elseif ($user['role'] === 'pengunjung') {
        return redirect()->to('/pengunjung');
      }
    } else {
      return redirect()->to('/login')->with('error', 'Username atau password salah!');
    }
  }

  public function logout()
  {
    session()->destroy();
    return redirect()->to('/login');
  }
}

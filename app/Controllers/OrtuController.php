<?php

namespace App\Controllers;

use App\Models\OrtuModel;

class OrtuController extends BaseController
{
  protected $OrtuModel;

  public function __construct()
  {
    $this->OrtuModel = new OrtuModel();
  }

  public function index()
  {
    $data = [
      'title' => 'Halaman Orang Tua',
      'ortus' => $this->OrtuModel->findAll() // Ensure the key matches the view
    ];

    return view('ortu/index', $data);
  }

  public function create()
  {
    $data = [
      'title' => 'Tambah Ortu'
    ];

    return view('ortu/create', $data);
  }

  public function store()
  {
    // Validate the input
    if (!$this->validate([
      'nama' => 'required',
      'pekerjaan' => 'required',
      'nomor_hp' => 'required|numeric|min_length[10]|max_length[13]',
      'gaji' => 'required|numeric'
    ])) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    // simpan data orang tua
    $this->OrtuModel->save([
      'nama' => $this->request->getPost('nama'),
      'pekerjaan' => $this->request->getPost('pekerjaan'),
      'nomor_hp' => $this->request->getPost('nomor_hp'),
      'gaji' => $this->request->getPost('gaji')
    ]);

    // Log the activity
    log_activity("User added a new parent: " . $this->request->getPost('nama'));

    // Redirect with success message
    return redirect()->to('/ortu')->with('success', 'Data Orang Tua berhasil disimpan.');
  }

  public function edit($id)
  {
    // Fetch the data of the specific "Orang Tua" by ID
    $ortu = $this->OrtuModel->find($id);

    if (!$ortu) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException("Data Orang Tua dengan ID $id tidak ditemukan.");
    }

    $data = [
      'title' => 'Edit Orang Tua',
      'ortu' => $ortu
    ];

    return view('ortu/edit', $data);
  }

  public function update($id)
  {
    // Validate the input
    if (!$this->validate([
      'nama' => 'required',
      'pekerjaan' => 'required',
      'nomor_hp' => 'required|numeric|min_length[10]|max_length[13]',
      'gaji' => 'required|numeric'
    ])) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    // Update the data
    $this->OrtuModel->update($id, [
      'nama' => $this->request->getPost('nama'),
      'pekerjaan' => $this->request->getPost('pekerjaan'),
      'nomor_hp' => $this->request->getPost('nomor_hp'),
      'gaji' => $this->request->getPost('gaji')
    ]);

    // Redirect with success message
    return redirect()->to('/ortu')->with('success', 'Data Orang Tua berhasil diperbarui.');
  }

  public function delete($id)
  {
    // Check if the record exists
    $ortu = $this->OrtuModel->find($id);

    if (!$ortu) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException("Data Orang Tua dengan ID $id tidak ditemukan.");
    }

    // Delete the record
    $this->OrtuModel->delete($id);

    // Redirect with success message
    return redirect()->to('/ortu')->with('success', 'Data Orang Tua berhasil dihapus.');
  }
}

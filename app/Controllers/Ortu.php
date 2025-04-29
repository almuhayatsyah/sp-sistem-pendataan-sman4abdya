<?php

namespace App\Controllers;

use App\Models\OrangTuaModel;

class Ortu extends BaseController
{
    protected $ortuModel;

    public function __construct()
    {
        $this->ortuModel = new OrangTuaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Orang Tua',
            'ortu' => $this->ortuModel->findAll()
        ];

        return view('ortu/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Orang Tua'
        ];

        return view('ortu/create', $data);
    }

    public function save()
    {
        if (!$this->validate($this->ortuModel->getValidationRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->ortuModel->save([
            'nama' => $this->request->getPost('nama'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'nomor_hp' => $this->request->getPost('nomor_hp'),
            'gaji' => $this->request->getPost('gaji')
        ]);

        return redirect()->to('/ortu')->with('message', 'Data orang tua berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Orang Tua',
            'ortu' => $this->ortuModel->find($id)
        ];

        if (empty($data['ortu'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data orang tua tidak ditemukan');
        }

        return view('ortu/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate($this->ortuModel->getValidationRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->ortuModel->update($id, [
            'nama' => $this->request->getPost('nama'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'nomor_hp' => $this->request->getPost('nomor_hp'),
            'gaji' => $this->request->getPost('gaji')
        ]);

        return redirect()->to('/ortu')->with('message', 'Data orang tua berhasil diupdate');
    }

    public function delete($id)
    {
        $ortu = $this->ortuModel->find($id);
        if (empty($ortu)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data orang tua tidak ditemukan');
        }

        $this->ortuModel->delete($id);
        return redirect()->to('/ortu')->with('message', 'Data orang tua berhasil dihapus');
    }
} 
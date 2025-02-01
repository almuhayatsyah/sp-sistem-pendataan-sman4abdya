<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use CodeIgniter\Controller;
use Dompdf\Dompdf;
use Dompdf\Options;

class SiswaController extends Controller
{
    protected $siswaModel;

    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
    }

    // Menampilkan halaman form tambah siswa
    public function create()
    {
        return view('siswa/create');
    }

    // Menyimpan data siswa baru
    public function store()
    {
        // Validasi apakah NISN sudah ada
        $existingSiswa = $this->siswaModel->where('nisn', $this->request->getPost('nisn'))->first();
        if ($existingSiswa) {
            return redirect()->back()->with('error', 'NISN sudah digunakan, gunakan NISN lain.');
        }




        // Cek apakah ada file foto yang diupload
        $foto = $this->request->getFile('foto_siswa');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            // Menyimpan file foto ke folder tertentu
            $fotoName = $foto->getRandomName();
            $foto->move('uploads/fotosiswa', $fotoName); // Tentukan folder penyimpanan foto
        } else {
            // Jika tidak ada foto, set nilai null atau gunakan foto default
            $fotoName = null;
        }

        $tanggalLahir = $this->request->getPost('tanggal_lahir');

        // Simpan data siswa baru
        $this->siswaModel->insert([
            'nisn' => $this->request->getPost('nisn'),
            'nama_siswa' => $this->request->getPost('nama_siswa'),
            'kelas' => $this->request->getPost('kelas'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'alamat' => $this->request->getPost('alamat'),
            'foto_siswa' => $fotoName,
            'pendapatan_orang_tua' => $this->request->getPost('pendapatan_orang_tua'),
            'status_kurang_mampu' => $this->request->getPost('status_kurang_mampu') == '1' ? 1 : 0,
        ]);

        return redirect()->to('/siswa');
    }


    // Menampilkan halaman edit untuk data siswa
    public function edit($id)
    {
        $data['siswa'] = $this->siswaModel->find($id);
        return view('siswa/edit', $data);
    }

    // Memperbarui data siswa
    public function update($id)
    {
        // Ambil data siswa yang ada di database
        $siswaData = $this->siswaModel->find($id);

        /// Upload foto siswa
        $foto = $this->request->getFile('foto_siswa');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            // Menyimpan file foto di folder tertentu
            $fotoName = $foto->getRandomName();
            $foto->move('uploads/fotosiswa', $fotoName); // Tentukan folder penyimpanan foto
        } else {
            // Jika tidak ada foto, set nilai null atau default foto
            $fotoName = null;

            $tanggalLahir = $this->request->getPost('tanggal_lahir');
        }


        // Update data siswa
        $this->siswaModel->update($id, [
            'nisn' => $this->request->getPost('nisn'),
            'nama_siswa' => $this->request->getPost('nama_siswa'),
            'kelas' => $this->request->getPost('kelas'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'alamat' => $this->request->getPost('alamat'),
            'foto_siswa' => $fotoName,
            'pendapatan_orang_tua' => $this->request->getPost('pendapatan_orang_tua'),
            'status_kurang_mampu' => $this->request->getPost('status_kurang_mampu') == '1' ? 1 : 0,
        ]);

        return redirect()->to('/siswa')->with('success', 'Data siswa berhasil diperbarui!');
    }





    // Menghapus data siswa
    public function delete($id)
    {
        $siswaData = $this->siswaModel->find($id);
        if ($siswaData && $siswaData['foto_siswa']) {
            // Hapus foto siswa jika ada
            if (file_exists('uploads/fotosiswa/' . $siswaData['foto_siswa'])) {
                unlink('uploads/fotosiswa/' . $siswaData['foto_siswa']);
            }
        }

        // Hapus data siswa dari database
        $this->siswaModel->delete($id);

        return redirect()->to('/siswa')->with('success', 'Data siswa berhasil dihapus');
    }

    // Menampilkan daftar siswa dengan paginasi
    public function index()
    {
        // Mendapatkan query pencarian dari URL
        $search = $this->request->getGet('search');

        if ($search) {
            $data['siswa'] = $this->siswaModel->like('nisn', $search)->orLike('nama_siswa', $search)->paginate(10);
        } else {
            $data['siswa'] = $this->siswaModel->paginate(10);
        }
        $data['pager'] = $this->siswaModel->pager;

        return view('siswa/index', $data);
    }


    // Menyimpan dan mengekspor data siswa dalam format PDF
    public function exportPdf()
    {
        $siswa = $this->siswaModel->findAll();

        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $dompdf = new Dompdf($options);
        $html = view('siswa/pdf', ['siswa' => $siswa]);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('Daftar_Siswa.pdf', ['Attachment' => true]);
    }
}

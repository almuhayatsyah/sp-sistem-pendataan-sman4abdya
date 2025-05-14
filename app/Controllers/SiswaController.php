<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use CodeIgniter\Controller;
use Dompdf\Dompdf;
use Dompdf\Options;

// SiswaController
// Controller untuk manajemen data siswa SMAN 4 Aceh Barat Daya

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
        $kelasModel = new \App\Models\KelasModel();
        $data['kelas'] = $kelasModel->findAll();
        return view('siswa/create', $data);
    }

    // Menyimpan data siswa baru ke database
    public function store()
    {
        // Cek apakah NISN sudah digunakan
        $existingSiswa = $this->siswaModel->where('nisn', $this->request->getPost('nisn'))->first();
        if ($existingSiswa) {
            return redirect()->back()->with('error', 'NISN sudah digunakan, gunakan NISN lain.');
        }

        $tanggal_lahir = $this->request->getPost('tanggal_lahir');
        $formattedTanggal = date('Y-m-d', strtotime($tanggal_lahir));

        // Cek dan buat folder upload jika belum ada
        if (!is_dir('uploads/fotosiswa')) {
            mkdir('uploads/fotosiswa', 0777, true);
        }

        // Cek apakah ada file foto yang diupload
        $foto = $this->request->getFile('foto_siswa');
        $fotoName = null;

        if ($foto->isValid() && !$foto->hasMoved()) {
            // Generate nama unik untuk file foto
            $fotoName = $foto->getRandomName();
            // Pindahkan file ke folder uploads
            try {
                $foto->move('uploads/fotosiswa', $fotoName);
            } catch (\Exception $e) {
                return redirect()->back()
                    ->with('error', 'Gagal mengupload foto: ' . $e->getMessage())
                    ->withInput();
            }
        } else if ($foto->getError() == 4) { // Error 4: tidak ada file yang diupload
            return redirect()->back()
                ->with('error', 'Silakan pilih file foto')
                ->withInput();
        } else {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat upload foto: ' . $foto->getErrorString())
                ->withInput();
        }

        // Simpan data siswa baru ke database
        try {
            $this->siswaModel->insert([
                'nisn' => $this->request->getPost('nisn'),
                'nama_siswa' => $this->request->getPost('nama_siswa'),
                'kelas_id' => $this->request->getPost('kelas_id'),
                'tanggal_lahir' => $formattedTanggal,
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'alamat' => $this->request->getPost('alamat'),
                'agama' => $this->request->getPost('agama'),
                'umur' => $this->request->getPost('umur'),
                'nomor_hp' => $this->request->getPost('nomor_hp'),
                'foto_siswa' => $fotoName,
                'status_kurang_mampu' => $this->request->getPost('status_kurang_mampu') == '1' ? 1 : 0,
            ]);

            return redirect()->to('/siswa')->with('success', 'Data siswa berhasil ditambahkan!');
        } catch (\Exception $e) {
            // Jika gagal simpan, hapus file foto yang sudah diupload
            if ($fotoName && file_exists('uploads/fotosiswa/' . $fotoName)) {
                unlink('uploads/fotosiswa/' . $fotoName);
            }
            return redirect()->back()
                ->with('error', 'Gagal menyimpan data siswa: ' . $e->getMessage())
                ->withInput();
        }
    }

    // Menampilkan halaman edit siswa
    public function edit($id)
    {
        $kelasModel = new \App\Models\KelasModel();
        $data['siswa'] = $this->siswaModel->find($id);
        $data['kelas'] = $kelasModel->findAll();
        return view('siswa/edit', $data);
    }

    // Memperbarui data siswa di database
    public function update($id)
    {
        $tanggal_lahir = $this->request->getPost('tanggal_lahir');
        $formattedTanggal = date('Y-m-d', strtotime($tanggal_lahir));

        // Ambil data siswa lama dari database
        $siswaData = $this->siswaModel->find($id);
        if (!$siswaData) {
            return redirect()->back()->with('error', 'Data siswa tidak ditemukan.');
        }

        // Cek dan buat folder upload jika belum ada
        if (!is_dir('uploads/fotosiswa')) {
            mkdir('uploads/fotosiswa', 0777, true);
        }

        // Inisialisasi nama foto dengan foto lama
        $fotoName = $siswaData['foto_siswa'];

        // Cek apakah ada file foto baru yang diupload
        $foto = $this->request->getFile('foto_siswa');
        // Proses upload foto baru jika ada
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            // Generate nama unik untuk file baru
            $fotoName = $foto->getRandomName();
            try {
                // Upload file baru
                $foto->move('uploads/fotosiswa', $fotoName);
                // Hapus foto lama jika ada dan bukan default
                if ($siswaData['foto_siswa'] && file_exists('uploads/fotosiswa/' . $siswaData['foto_siswa'])) {
                    unlink('uploads/fotosiswa/' . $siswaData['foto_siswa']);
                }
            } catch (\Exception $e) {
                return redirect()->back()
                    ->with('error', 'Gagal mengupload foto: ' . $e->getMessage())
                    ->withInput();
            }
        }

        try {
            // Update data siswa di database
            $this->siswaModel->update($id, [
                'nisn' => $this->request->getPost('nisn'),
                'nama_siswa' => $this->request->getPost('nama_siswa'),
                'kelas_id' => $this->request->getPost('kelas_id'),
                'tanggal_lahir' => $formattedTanggal,
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'alamat' => $this->request->getPost('alamat'),
                'agama' => $this->request->getPost('agama'),
                'umur' => $this->request->getPost('umur'),
                'nomor_hp' => $this->request->getPost('nomor_hp'),
                'foto_siswa' => $fotoName,
                'status_kurang_mampu' => $this->request->getPost('status_kurang_mampu') == '1' ? 1 : 0,
            ]);

            return redirect()->to('/siswa')->with('success', 'Data siswa berhasil diperbarui!');
        } catch (\Exception $e) {
            // Jika gagal update dan ada foto baru, hapus foto baru tersebut
            if ($fotoName != $siswaData['foto_siswa'] && file_exists('uploads/fotosiswa/' . $fotoName)) {
                unlink('uploads/fotosiswa/' . $fotoName);
            }
            return redirect()->back()
                ->with('error', 'Gagal memperbarui data siswa: ' . $e->getMessage())
                ->withInput();
        }
    }

    // Menghapus data siswa dari database
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

    // Menampilkan daftar siswa dengan paginasi dan pencarian
    public function index()
    {
        $search = $this->request->getGet('search');
        $builder = $this->siswaModel
            ->select('siswa.*, kelas.nama_kelas')
            ->join('kelas', 'kelas.id = siswa.kelas_id', 'left');
        if ($search) {
            $builder = $builder
                ->like('nisn', $search)
                ->orLike('nama_siswa', $search)
                ->orLike('kelas.nama_kelas', $search);
        }
        $siswa = $builder->paginate(10, 'siswa');
        $data['siswa'] = $siswa;
        $data['pager'] = $this->siswaModel->pager;
        $data['search'] = $search;
        return view('siswa/index', $data);
    }

    // Menampilkan halaman laporan rekap siswa
    public function laporanSiswa()
    {
        $data['laporan'] = $this->siswaModel->getLaporanRekap();
        return view('siswa/laporan_siswa', $data);
        
    }

    // Export data siswa ke PDF
    public function exportPdf()
    {
        $siswa = $this->siswaModel->findAll();
        $dompdf = new \Dompdf\Dompdf();
        $html = view('siswa/laporan_pdf', ['siswa' => $siswa]);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('Daftar_Siswa.pdf', ['Attachment' => true]);
    }

    // Export data siswa ke Excel
    public function exportExcel()
    {
        $siswa = $this->siswaModel->findAll();
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        // Judul
        $sheet->setCellValue('A1', 'LAPORAN DATA SISWA SMAN 4 ACEH BARAT DAYA');
        $sheet->mergeCells('A1:J1');
        $sheet->getStyle('A1')->getFont()->setBold(true);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        // Header kolom
        $headers = ['No', 'NISN', 'Nama Siswa', 'Kelas_id', 'Jenis Kelamin', 'Status KM', 'Alamat', 'Lokasi', 'Tanggal Lahir', 'Umur', 'Nomor HP'];
        $col = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($col . '2', $header);
            $col++;
        }
        $sheet->getStyle('A2:K2')->getFont()->setBold(true);
        $sheet->getStyle('A2:K2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        // Data siswa
        $row = 3;
        $no = 1;
        foreach ($siswa as $s) {
            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, $s['nisn']);
            $sheet->setCellValue('C' . $row, $s['nama_siswa']);
            $sheet->setCellValue('D' . $row, $s['kelas_id']);
            $sheet->setCellValue('E' . $row, $s['jenis_kelamin']);
            $sheet->setCellValue('F' . $row, $s['status_kurang_mampu'] == 1 ? 'Kurang Mampu' : 'Tidak Kurang Mampu');
            $sheet->setCellValue('G' . $row, $s['alamat']);
            $sheet->setCellValue('H' . $row, isset($s['nama_lokasi']) ? $s['nama_lokasi'] : 'Belum ditentukan');
            $sheet->setCellValue('I' . $row, date('d/m/Y', strtotime($s['tanggal_lahir'])));
            $sheet->setCellValue('J' . $row, $s['umur'] . ' Tahun');
            $sheet->setCellValue('K' . $row, $s['nomor_hp']);
            $row++;
        }
        // Auto size kolom
        foreach (range('A', 'K') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }
        // Border untuk header dan data
        $sheet->getStyle('A2:K' . ($row - 1))->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        // Output
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Daftar_Siswa.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }
}
// End of SiswaController class

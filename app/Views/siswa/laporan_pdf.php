<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Data Siswa</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 12px;
      margin: 20px;
    }

    .header {
      text-align: center;
      margin-bottom: 20px;
    }

    .header h1 {
      margin: 0;
      padding: 0;
      font-size: 18px;
    }

    .header p {
      margin: 5px 0;
      font-size: 14px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th,
    td {
      padding: 8px;
      text-align: center;
      border: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
      font-weight: bold;
    }

    .footer {
      text-align: center;
      margin-top: 20px;
      font-size: 10px;
    }
  </style>
</head>

<body>
  <div class="header">
    <h1>Laporan Data Siswa</h1>
    <p>SMAN 4 Aceh Barat Daya</p>
    <p>Tahun Ajaran <?= date('Y') ?>/<?= date('Y') + 1 ?></p>
  </div>

  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>NISN</th>
        <th>Nama Siswa</th>
        <th>Kelas</th>
        <th>Jenis Kelamin</th>
        <th>Status KM</th>
        <th>Alamat</th>
        <th>Lokasi</th>
        <th>Tanggal Lahir</th>
        <th>Umur</th>
        <th>Nomor HP</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1;
      foreach ($siswa as $s): ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $s['nisn'] ?></td>
          <td><?= $s['nama_siswa'] ?></td>
          <td class="text-center"><?= $s['nama_kelas'] ?? '-' ?></td>
          <td><?= $s['jenis_kelamin'] ?></td>
          <td><?= $s['status_kurang_mampu'] == 1 ? 'Kurang Mampu' : 'Tidak Kurang Mampu' ?></td>
          <td><?= $s['alamat'] ?></td>
          <td><?= isset($s['nama_lokasi']) ? $s['nama_lokasi'] : 'Belum ditentukan' ?></td>
          <td><?= date('d/m/Y', strtotime($s['tanggal_lahir'])) ?></td>
          <td><?= $s['umur'] ?> Tahun</td>
          <td><?= $s['nomor_hp'] ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <div class="footer">
    <p>Dicetak pada: <?= date('d/m/Y H:i:s') ?></p>
  </div>
</body>

</html>
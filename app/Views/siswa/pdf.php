<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Daftar Siswa</h1>
    <table>
        <thead>
            <tr>
                <th>NISN</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>tanggal lahir</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>foto</th>
                <th>status kurang mampu</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($siswa as $s): ?>
                <tr>
                    <td><?= $s['nisn'] ?></td>
                    <td><?= $s['nama_siswa'] ?></td>
                    <td><?= $s['kelas'] ?></td>
                    <td><?= date('d/m/Y', strtotime($s['tanggal_lahir'])); ?></td>
                    <td><?= $s['jenis_kelamin'] ?></td>
                    <td><?= $s['alamat'] ?></td>
                    <td><?= $s['foto_siswa'] ?></td>
                    <td>
                        <?php if ($s['status_kurang_mampu'] == 1): ?>
                            <span class="badge badge-danger">Kurang Mampu</span>
                        <?php else: ?>
                            <span class="badge badge-success">Tidak Kurang Mampu</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
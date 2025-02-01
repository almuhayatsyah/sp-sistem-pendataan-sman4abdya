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
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Foto_siswa</th>
                <th>Foto_rumah</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($siswa as $s): ?>
                <tr>
                    <td><?= $s['nisn'] ?></td>
                    <td><?= $s['nama_siswa'] ?></td>
                    <td><?= $s['kelas'] ?></td>
                    <td><?= $s['jenis_kelamin'] ?></td>
                    <td><?= $s['alamat'] ?></td>
                    <td><?= $s['foto_siswa'] ?></td>
                    <td><?= $s['foto_rumah'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('success') ?>
            </div>
        <?php endif; ?>

        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Daftar Siswa</h3>
            </div>
            <div class="card-body">
                <a href="<?= site_url('siswa/tambah') ?>" class="btn btn-success mb-3">Tambah Data</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($siswa as $row): ?>
                        <tr>
                            <td><?= $row->nama ?></td>
                            <td><?= $row->alamat ?></td>
                            <td><?= $row->no_hp ?></td>
                            <td>
                                <a href="<?= site_url('siswa/edit/' . $row->id) ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?= site_url('siswa/hapus/' . $row->id) ?>" 
                                   class="btn btn-danger btn-sm" 
                                   onclick="return confirm('Yakin hapus data?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-3 pt-3">
        <div class="card">
            <div class="card-header">Data Siswa</div>
            <div class="card-body">
                <?= $this->session->flashdata('info_siswa'); ?>
                <div class="table-responsive">
                    <table class="table table-bordered" id="table-data">
                        <thead>
                            <th width="1">No</th>
                            <th>Nama Lengkap</th>
                            <th>NIS</th>
                            <th class="text-center" width="1">Aksi</th>
                        </thead>
                        <tbody>
                            <?php if ($siswa->num_rows() > 0): ?>
                                <?php $nomor = 1;
                                foreach ($siswa->result() as $dt): ?>
                                    <tr>
                                        <td>
                                            <?= $nomor++; ?>
                                        </td>
                                        <td>
                                            <?= $dt->nama_lengkap; ?>
                                        </td>
                                        <td>
                                            <?= $dt->nis; ?>
                                        </td>
                                        <td nowrap>
                                            <a href="<?= base_url(); ?>siswa/detail/<?= $dt->id; ?>"
                                                class="btn btn-info">Detail</a>
                                            <a href="<?= base_url(); ?>siswa/edit/<?= $dt->id; ?>"
                                                class="btn btn-warning">Edit</a>
                                            <a href="<?= base_url(); ?>siswa/destroy/<?= $dt->id; ?>"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <a href="<?= base_url('siswa/add_view'); ?>" class="btn btn-primary">Tambah data</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
        integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.js"></script>
    <script>
        let table = new DataTable('#table-data');
    </script>

</body>

</html>
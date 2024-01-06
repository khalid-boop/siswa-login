<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-3 pt-3">
        <a href="<?= base_url('siswa/index') ?>" class="btn btn-info">balek</a>
        <div class="card">
            <div class="card-header">Tambah Siswa</div>
            <?=$this->session->flashdata('info_siswa');?>
            <div class="card-body">
                <form method="POST" action="<?=base_url('siswa/save'); ?>">
                <label for="nama">Nama Lengkap Siswa</label>
                <input type="text" name="nama" class="form-control" id="nama" required autofocus maxlength="255">
                <label for="nis">NIS</label>
                <input type="number" name="nis" class="form-control" id="nis" required maxlength="8">
                <input type="submit" class="btn btn-primary" value="Submit">
                </form> 
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
<?php if($siswa->num_rows() < 1)
{
    $this->session->set_flashdata('info_siswa' , '<div class="alert alert-danger">Data Mu Mana!!!!</div>');
    redirect(base_url('siswa/index'));
}else {
     foreach($siswa->result() as $dt) {}
     $this->session->set_flashdata('info_siswa' , '<div class="alert alert-success">Nih data Anda, Yg Mau Di Edit!!</div>');
}
?>
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
            <div class="card-header">Hapus Siswa</div>
            <div class="card-body">
                <?= $this->session->flashdata('info_siswa'); ?>
                <form method="POST" action="<?=base_url('siswa/delete'); ?>">
                <label for="nama">Nama Lengkap Siswa</label>
                <input type="text" name="nama" disabled class="form-control" id="nama"  maxlength="255" value=<?=$dt->nama_lengkap;?> required autofocus>
                <label for="nis">NIS</label>
                <input type="number" name="nis" disabled class="form-control" id="nis" required value="<?=$dt->nis;?>">
                <input type="hidden" name="id" value="<?=$dt->id;?>" required>
                <input type="submit" class="btn btn-danger" value="Hapus?">
                </form> 
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
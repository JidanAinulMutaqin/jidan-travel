<?php

require 'functions.php';
$aatravel = query ("SELECT * FROM tb_booking ORDER BY id DESC");

//tombol search
if (isset($_POST["cari"])){
    $aatravel = cari($_POST['search']);
  }

include("template/header.php");

?>

<img src="img/datapelanggan.jpg" class="img-fluid">

<!-- background -->
<div class="bg-light p-3 mb-2">

    <div class="container mt-4 ">
        <div class="d-flex justify-content-between">

            <div>
                <h3>Data Pelanggan</h3>
                <hr>
            </div>

            <form action="" method="post" class="d-flex p-2">
                <input name="search" type="search" class="form-control me-2 p-1 m-1" autocomplete="off" placeholder="Search">
                <button name="cari" type="submit" class="btn btn-sml btn-dark p-1 m-1 text-white">Search</button>
            </form>
            <br>
    
            <a href="booking.php" class="btn btn-outline-dark p-1  m-1 md-3 mb-4">Booking</a>

        </div>
    </div>


    <div class="container p-3 my-3 bg-white">
        <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Paket</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php  $i=1; ?>
            <?php foreach ($aatravel as $row): ?>
            <tr>
            <th><?= $i; ?></th>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["paket"]; ?></td>
            <td><?= $row["jumlah"]; ?></td>
            <td><?= $row["tanggal"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td>
                <a href="hapus.php?id=<?=$row["id"];?>" onclick="return confirm('Anda Yakin Ingin Mengahapus?')" class="btn btn-sml btn-outline-danger">Hapus</a>
                <a href="ubah.php?id=<?=$row["id"];?>" class="btn btn-sml btn-outline-success">Ubah</a>
            </td>
            <?php $i++; ?>
            <?php endforeach ?>
        </tbody>
        </table>
    </div>
</div>

<?php

include("template/footer.php");

?>
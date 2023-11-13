<?php

require 'functions.php';

//ambil data di url
$id = $_GET["id"];

//query data pengunjung diambil dari id
$dp = query("SELECT * FROM tb_booking WHERE id = $id")[0];

if (isset($_POST["submit"])){
    
  //buat test
  // var_dump($_POST);

  //alert
  if (create($_POST)>0){
      echo
      "<script>
          alert('Data Berhasil Ditambahkan');
          document.location.href = 'data_pelanggan.php';
      </script>";
  }
  else{
      echo 
      "<script>
          alert('Data Gagal Ditambahkan');
      </script>";
  }
}

include("template/header.php");

?>

<img src="img/bookinghi.jpg" class="img-fluid">

<div>
    <h1 class=" text-center text-truncate p-3 mt-6">Good Luck Have Fun</h1>
</div>

<!--Background-->
<div class="bg-light p-3 mb-2">

    <div class="container p-3 my-3 bg-white">

        <form action="" method="post" class="row g-3 needs-validation" novalidate>
        <input type="hidden" name="id" value="<?= $dp["id"]; ?>">
        <div class="col-md-4">
            <label for="nama" class="form-label">Nama</label>
            <input name="nama" type="text" class="form-control" id="nama" value="<?= $dp["nama"]; ?>" required>
            <div class="valid-feedback">
            Looks good!
            </div>
        </div>
        <div class="col-md-3">
            <label for="paket" class="form-label">Paket Travel</label>
            <select name="paket" class="form-select" id="paket" value="<?= $dp["paket"]; ?>" required>
            <option selected disabled value="">Choose...</option>
            <option>Explore Cianjur</option>
            <option>Dive Into bali</option>
            <option>Highland Majalengka</option>
            <option>Rebelion Yogyakarta</option>
            <option>Flower Bandung</option>
            <option>Spesial Batu Raden</option>
            <option>Beauty Lombok</option>
            </select>
            <div class="invalid-feedback">
            Please select a valid paket.
            </div>
        </div>
        <div class="col-md-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="text" name="jumlah" class="form-control" id="jumlah" value="<?= $dp["jumlah"]; ?>" required>
            <div class="invalid-feedback">
            Please provide a valid jumlah.
            </div>
        </div>
        <div class="col-md-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" id="tanggal" value="<?= $dp["tanggal"]; ?>" required>
            <div class="invalid-feedback">
            Please provide a valid date.
            </div>
        </div>
        <div class="col-md-7">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" class="form-control" id="email" value="<?= $dp["email"]; ?>" required>
            <div class="invalid-feedback">
            Please provide a valid email.
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-dark" name="submit" type="submit">BOOKING</button>
        </div>
        </form>

    </div>

</div>
<!--Background-->

<?php

include("template/footer.php");

?>
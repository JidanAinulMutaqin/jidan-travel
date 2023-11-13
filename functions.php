<?php

$conn = mysqli_connect("localhost", "root", "", "aatravel");


function query ($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while ($row = mysqli_fetch_assoc ($result)){
        $rows[]=$row;
    }
    return $rows;
}; 

function create ($data){
    global $conn;
        //ambil data dari tiap elemen yang ada di form
        $nama=htmlspecialchars($data["nama"]);
        $paket=htmlspecialchars($data["paket"]);
        $jumlah=htmlspecialchars($data["jumlah"]);
        $tanggal=htmlspecialchars($data["tanggal"]);
        $email=htmlspecialchars($data["email"]);
    
        //query insert data
        $query = "INSERT INTO tb_booking
                    VALUES ('','$nama','$paket','$jumlah','$tanggal','$email','','')";
    
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
}

function hapus ($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM tb_booking WHERE id = $id");
    mysqli_affected_rows($conn);
}

function update($data){
    global $conn;
    //ambil data dari tiap elemen yang ada di form
    $id=$data["id"];
    $nama=htmlspecialchars($data["nama"]);
    $paket=htmlspecialchars($data["paket"]);
    $jumlah=htmlspecialchars($data["jumlah"]);
    $tanggal=htmlspecialchars($data["tanggal"]);
    $email=htmlspecialchars($data["email"]);
    
    //query update data
    $query = "UPDATE data_pengunjung SET
            nama = '$nama',
            paket = '$paket',
            jumlah = '$jumlah',
            tanggal = '$tanggal',
            email = '$email'
            WHERE id=$id
            ";
    
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function cari($search){
    $query = "SELECT * FROM tb_booking WHERE
    nama LIKE '%$search%'
    ";
    return query($query);
}
<?php
session_start();
include 'koneksi.php';

if ($_SESSION['status'] != 'login') {
    echo "<script>
    alert('Anda Belum Login!');
    location.href='../index.php'
    </script>";
    exit;
}

if (isset($_POST['tambah'])) {
    $namatugas = $_POST['namatugas'];
    $mapel = $_POST['mapel'];
    $deadline = date('Y-m-d');
    $userid = $_SESSION['userid'];

    $sql = mysqli_query($koneksi, "INSERT INTO tugas (tugas, user_id) VALUES('mbaranbg')");
    if ($sql) {
    echo "<script>
    alert ('Data berhasil disimpan');
    location.href='../admin/tugas.php';
    </script>";
    }else{
        echo "gak kenek" ;
    }
}

if (isset($_POST['edit'])) {
    $tugas = $_POST['tugasid'];
    $namatugas = $_POST['namatugas'];
    $mapel = $_POST['mapel'];
    $deadline = date('Y-m-d');

    $sql = mysqli_query($koneksi, "UPDATE tugas SET namatugas='$namatugas', mapel='$mapel', deadline='$deadline' WHERE tugasid='$tugasid'");
    if ($sql) { 
        echo "<script>
        alert('Data berhasil disimpan!');
        location.href='../admin/tugas.php';
        </script>";
    } else { 
        echo "<script>
        alert('Error: " . mysqli_error($koneksi) . "');
        </script>";
    }
    
}


if (isset($_POST['hapus'])) {
    $tugasid = $_POST['tugasid'];

    $sql = mysqli_query($koneksi, "DELETE FROM tugas WHERE tugasid='$tugasid'");
    echo "<script>
    alert ('Tugas berhasil dihapus');
    location.href='../admin/tugas.php';
    </script>";
}

?>
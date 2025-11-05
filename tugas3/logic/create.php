<?php 

include '../config/koneksi.php';

$nama = $_POST['nama'];
$nim = $_POST['nim'];
$gender = $_POST['gender'];

$sql = "INSERT INTO mahasiswa (nim, nama, jenis_kelamin) VALUES ('$nim', '$nama', '$gender')";
$result = mysqli_query($connect, $sql);
if ($result){
    header("Location: ../index.php");
} else {
    echo "Gagal menambahkan data mahasiswa";
}

?>
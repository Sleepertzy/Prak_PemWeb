<?php 

include '../config/koneksi.php';
$id = $_POST['id'];
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$gender = $_POST['gender'];

$sql = "UPDATE mahasiswa SET nim = '$nim', nama = '$nama', jenis_kelamin = '$gender' WHERE id = '$id'";
$result = mysqli_query($connect, $sql); 
if ($result){
    header("Location: ../index.php");
} else {
    echo "Gagal mengupdate data mahasiswa";
}

?>
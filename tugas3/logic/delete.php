<?php 

include '../config/koneksi.php';
$id = $_GET['id'];

$sql = "DELETE FROM mahasiswa WHERE id = '$id'";
$result = mysqli_query($connect, $sql);

if ($result){
    header("Location: ../index.php");
} else {
    echo "Gagal menghapus data mahasiswa";
    die();
    header("Location: ../index.php");
}

?>
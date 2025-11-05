<?php 
$host = "localhost";
$port = "3306";
$user = "root";
$pass = "";
$db = "kampus";

$connect = new mysqli($host, $user, $pass, $db, $port);

if ($connect){
} else {
    echo "Koneksi Gagal: ";
    die;
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Speda - edit mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>  
</head>

<body style="background-color: #ffffff;">
    
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <img src="Learn.png" alt="E-Learning" width="30px" style="padding-right: 2px">
            <a class="navbar-brand" href="index.html">Speda</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <div style="padding-left: 20px;">
                    <a class="nav-link active" href="tambah_Mahasiswa.php">Tambah Mahasiswa</a>
                </div>
            </li>
        </ul>
        </div>
    </div>
</nav>

<div>
  <div class="container mt-4">
    <h3>Edit Mahasiswa</h3>
  </div> 
</div>

<?php 

include 'config/koneksi.php';

$id = $_GET['id'];

$sql = "SELECT * FROM mahasiswa WHERE id='$id'";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);

?>
<!-- Form -->
<div class="container mt-4">
    <form action="logic/update.php" method="POST">
        <input type="hidden" name="id" value="<?= $row['id'];?>">
      <div class="mb-3">
        <label for="nim" class="form-label">NIM</label>
        <input type="text" class="form-control" name="nim" id="nim" value="<?= $row['nim']; ?>" placeholder="Masukkan NIM">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Nama</label>
        <input type="text" class="form-control" name="nama" id="nama" value="<?= $row['nama']; ?>" placeholder="Masukkan Nama">
      </div>
      <div class="mb-3 form-label">
        <input type="radio" class="form-check-input" id="laki" name="gender" value="<?= $row['gender'] = 'Laki Laki';?>">
        <label class="form-check-label" for="laki">Laki-Laki</label>
      </div>
      <div class="mb-3 form-label">
        <input type="radio" class="form-check-input" id="perempuan" name="gender" value="<?= $row['gender'] = 'Perempuan';?>">
        <label class="form-check-label" for="perempuan">Perempuan</label>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
</html>
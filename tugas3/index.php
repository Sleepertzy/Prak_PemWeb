<?php 

include 'config/koneksi.php';

$cari= isset($_GET['cari']) ? $_GET['cari'] : "" ;
if ($cari != "") {
    $sql = "SELECT * FROM mahasiswa WHERE nama LIKE '%$cari%' OR nim LIKE '%$cari%'";
} else {
    $sql = "SELECT * FROM mahasiswa";
}

$result = mysqli_query($connect, $sql);
$nomor = 1;

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <title>Speda - Home</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>  
    
</head>

<body style="background-color: white;">
<div class="backgrd">
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
                <a class="nav-link active" aria-current="page" href="index.php" >Home</a>
                </li>
                <li class="nav-item">
                    <div style="padding-left: 20px;">
                        <a class="nav-link" href="Mahasiswa.php">Tambah Mahasiswa</a>
                    </div>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    

    <!-- Container -->
    <div class="container mt-4">
        <h3>Daftar Mahasiswa</h3>

        <!-- Search -->
        <div class="row mb-3">
            <form action="" method="get" class="d-flex">
                <input name="cari" type="text" class="form-control" placeholder="Cari mahasiswa">
                <button class="btn btn-outline-secondary" type="submit" style="background-color: white;">Cari</button>
            </form>
        </div>

        <!-- Table -->
        <table class="table table-dark table-striped-columns">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nim</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(mysqli_num_rows($result) > 0) :  ?>
                    <?php while($row = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                            <th scope="row"><?php echo $nomor++; ?></th>
                            <td><?php echo $row['nim']; ?></td>
                            <td><?php echo $row['nama']; ?></td>
                            <td><?php echo $row['jenis_kelamin']; ?></td>
                            <td class="text-center"> 
                                <div class="d-flex justify-content-center gap-2">
                                    <button type="button" class="btn btn-primary"><a href="edit.php?id=<?= $row['id']?>" style="color: white; text-decoration:none" >Update</a></button>
                                    <button type="button"
                                     class="btn btn-danger" 
                                     data-bs-toggle="modal" 
                                     data-bs-target="#deleteModal"
                                     data-id="<?= $row['id']; ?>"
                                     data-nama="<?= $row['nama']; ?>"
                                     >Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data mahasiswa</td>
                    </tr>
                <?php endif;?>
                
            </tbody>
        </table>
    </div>

    <!-- Modal Bagian Hapus -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="deleteModal">Hapus Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin menghapus mahasiswa?<b id="namaData"></b>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="" class="btn btn-danger" id="btnHapus">Hapus</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        const deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget; // tombol delete yang diklik
            const id = button.getAttribute('data-id');
            const nama = button.getAttribute('data-nama');

            // tampilkan nama mahasiswa di teks modal
            document.getElementById('namaData').textContent = nama;

            // ubah link tombol hapus agar sesuai ID
            const btnHapus = document.getElementById('btnHapus');
            btnHapus.href = 'logic/delete.php?id=' + id;
        });
    </script>
</div>



</body>
</html>
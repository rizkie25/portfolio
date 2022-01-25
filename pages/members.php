<?php
require '../php/functions.php';
$data = query("SELECT * FROM anggota");

if (isset($_POST["submit"])) {
    //cek data berhasil atau tidak masuk ke database
    if (tambahmrd($_POST) > 0) {
        echo "
                <script>
                    alert('Data Berhasil Ditambahkan');
                    document.location.href ='./members.php';
                </script>
                ";
    } else {
        echo "
            <script>
                alert('Data Gagal Ditambahkan');
                document.location.href ='./members.php';
            </script>
            ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- my css -->
    <link rel="stylesheet" href="../style.css" />

    <!-- Javasricpt -->
    <script src="script.js"></script>
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Data Anggota</title>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark shadow-sm" style="background-color: teal">
        <div class="container">
            <a class="navbar-brand" href="../index.php">C I D group</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php#content">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php#gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./article.php">Article</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  active" aria-current="page" href="./members.php"><strong>Members</strong></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="tambah">
        <div id="examanggota" class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Anggota</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-placeholder="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <p class="ket">Nama Lengkap</p>
                            <input type="text" name="nama" autofocus autocomplete="off" required>
                            <br>
                            <p class="ket">Jenis Kelamin</p>
                            <input type="radio" name="jenis_kelamin" value="Laki-laki">Laki-laki
                            <input type="radio" name="jenis_kelamin" value="Perempuan">Perempuan
                            <br>
                            <br>
                            <p class="ket">Kelas</p>
                            <input type="text" name="kelas" autofocus autocomplete="off" required>
                            <br>
                            <p class="ket">Jabatan</p>
                            <input type="text" name="jabatan" autofocus autocomplete="off" required>
                            <br>
                            <div class="anggota-footer">
                                <br>
                                <input type="reset" value="Hapus">
                                <input type="submit" name="submit" value="Tambah">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- tables -->
    <div class="container-fluid mt-3">
        <div class="row justify-content-between">
            <div class="col-sm-5">
                <h4>Data anggota</h4>
            </div>
            <div class="col-sm-5">
                <button id="exambutton" class="btn btn-warning" onclick="tambah()">Tambah Data anggota</button>
            </div>

        </div>
        <table class="table table-hover mt-3">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>

            <?php $i = 1;  ?>
            <?php foreach ($data as $row) : ?>
                <tbody>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $row["nama"]; ?></td>
                        <td><?= $row["jenis_kelamin"]; ?></td>
                        <td><?= $row["kelas"]; ?></td>
                        <td><?= $row["jabatan"]; ?></td>
                        <td>
                            <a href="./ubah_members.php ?id=<?= $row["id"]; ?>" class="btn btn-warning" role="button">Edit</a>
                            <a href="../php/hapus.php ?id=<?= $row["id"]; ?>" onclick=" return confirm('Apakah Anda Sudah Yakin ?');" class="btn btn-danger" role="button">Hapus</a>
                        </td>
                    </tr>
                </tbody>
                <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>
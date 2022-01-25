<?PHP

require '../php/functions.php';
//ambil data di url
$no = $_GET["id"];
//query data siswa berdasar id
$mrd = query(" SELECT * FROM anggota WHERE id = $no")[0];
//cek tombol submit sudah di tekan atau belum
if (isset($_POST["update"])) {
    //cek data berhasil atau tidak diubah ke database
    if (ubah($_POST) > 0) {
        echo "
                <script>
                    alert('Data Berhasil Diubah');
                    document.location.href ='./members.php';
                </script>
                ";
    } else {
        echo "
            <script>
                alert('Data Gagal Diubah');
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
    <title>Members</title>
    <link rel="stylesheet" href="pages.css">
</head>

<body>
    <div class="side">
        <!-- Comment Side -->
        <div class="komen">
            <div class="title-k">
                <h2>Edit Data Siswa</h2>
                <hr>
                <br>
            </div>

            <!-- Form -->
            <div>
                <form method="POST" action="">
                    <!-- ID -->
                    <input type="hidden" name="id" value="<?= $mrd["id"] ?>">
                    <!-- Name Input -->
                    <label for="nama">Nama</label>
                    <br>
                    <input type="text" name="nama" autocomplete="off" value="<?= $mrd["nama"] ?>">
                    <br>
                    <!-- Comment Input -->
                    <p class="ket">Jenis Kelamin</p>
                    <input type="radio" name="jenis_kelamin" value="Laki-laki" <?php if ($mrd["jenis_kelamin"] == 'Laki-laki') {
                                                                                    echo 'checked';
                                                                                } ?>>Laki-laki
                    <br>
                    <input type="radio" name="jenis_kelamin" value="Perempuan" <?php if ($mrd["jenis_kelamin"] == 'Perempuan') {
                                                                                    echo 'checked';
                                                                                } ?>>Perempuan
                    <br><br><br>
                    <label for="kelas">Kelas</label>
                    <br>
                    <input type="text" name="kelas" autocomplete="off" value="<?= $mrd["kelas"] ?>">
                    <br>
                    <label for="jabatan">Jabatan</label>
                    <br>
                    <input type="text" name="jabatan" autocomplete="off" value="<?= $mrd["jabatan"] ?>">
                    <br>
                    <!-- Reset Button -->
                    <button type="button" name="kembali"><a href="members.php">Kembali</a></button>
                    <!-- Submit Button -->
                    <button type="submit" name="update"><a onclick="return confirm('Yakinkah ?');">Ubah Data !</a></button>
                </form>
            </div>
            <!-- End Form -->
        </div>
        <!-- End Comment Side -->
    </div>
    <!-- End Side -->
</body>

</html>
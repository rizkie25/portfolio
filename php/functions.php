<?php
    //koneksi
    $conn = mysqli_connect("localhost", "root", "", "portofolio");

    function query($query) {
        global $conn;

        $result = mysqli_query($conn, $query);
        $rows = [];
        while( $row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
        }

    // Hapus

    function hapus($id) {
        global $conn;
    
        $del= "DELETE FROM anggota WHERE id = $id";
        mysqli_query($conn, $del);

        return mysqli_affected_rows($conn);
    }

     // Ubah

    function ubah($input) {
        global $conn;
        //ubah data dari tiap element form
        $no = $input["id"];
        $nama = htmlspecialchars($input["nama"]);
        $jenis_kelamin = htmlspecialchars($input["jenis_kelamin"]);
        $kelas = htmlspecialchars($input["kelas"]);
        $jabatan = htmlspecialchars($input["jabatan"]);

        //ambil insert data
        $query = " UPDATE anggota SET
                    nama = '$nama', jenis_kelamin = '$jenis_kelamin', kelas = '$kelas', jabatan = '$jabatan'
                    WHERE id = $no
                ";
        mysqli_query($conn , $query);

        return mysqli_affected_rows($conn);
    }


    // Tambah Siswa

    function tambahmrd($input) {
        global $conn;
        //ambil data dari tiap element form
        $nama = htmlspecialchars($input["nama"]);
        $jenis_kelamin = htmlspecialchars($input["jenis_kelamin"]);
        $kelas = htmlspecialchars($input["kelas"]);
        $jabatan = htmlspecialchars($input["jabatan"]);
        //query insert data
        $query = "INSERT INTO anggota VALUES ('','$nama','$jenis_kelamin','$kelas', '$jabatan')";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }
    ?>

    

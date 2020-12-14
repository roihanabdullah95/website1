<?php 
require 'koneksi.php';
//koneksi ke Database
// $conn = mysqli_connect("localhost", "root", "", "phpdasar");

//cek apakah tombol submit sudah ditekan atau belum
if(isset ($_POST["submit"])) {
    //  
    
    // //Ambil data dari tiap elemen dalam form
    // $nim = $_POST["nim"];
    // $nama = $_POST["nama"];
    // $email = $_POST["email"];
    // $jurusan = $_POST["jurusan"];
    // $gambar = $_POST["gambar"];

    // //query iinsert data
    // $query = "INSERT INTO mahasiswa VALUES
    //         ('', '$nim', '$nama', '$email', '$jurusan', '$gambar')
    //         ";
    // mysqli_query($conn, $query);

    //Cek data apakah berhasil ditambah atau tidak
    if(tambah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    }
    // if(mysqli_affected_rows($conn) > 0 ) {
    //     echo "berhasil";
    // } else {
    //     echo "gagal!";
    //     echo <br>
    //     echo mysqli_error($conn);
    // }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nim">NIM : </label>
                <input type="text" name="nim" id="nim" autocomplete="off">
                <!-- nim dari phpmyadmin -->
            </li>
            <li>
                <label for="nama">Nama Mahasiswa    : </label>
                <input type="text" name="nama" id="nama" autocomplete="off">
            </li>
            <li>
                <label for="email">Email    : </label>
                <input type="text" name="email" id="email" autocomplete="off">
            </li>
            <li>
                <label for="jurusan">Jurusan    : </label>
                <input type="text" name="jurusan" id="jurusan" autocomplete="off">
            </li>
            <li>
                <label for="gambar">Foto Mahasiswa  : </label>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data</button>
            </li>
            
            

        </ul>

    </form>

</body>
</html>
<?php 
session_start();

require 'koneksi.php';

//Ambil data di URL
$id = $_GET["id"];
// queri data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id") [0] ;

//cek apakah tombol submit sudah ditekan atau belum
if(isset ($_POST["submit"])) {
   
    //Cek data apakah berhasil diubah atau tidak
    if(ubah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Mahasiswa</title>
</head>
<body>
    <h1>Ubah Data Mahasiswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $mhs["id"]; ?>">
    <input type="hidden" name="gambarLama" value="<?php echo $mhs["gambar"]; ?>">
        <ul>
            <li>
                <label for="nim">NIM : </label>
                <input type="text" name="nim" id="nim" required
                value="<?php echo $mhs["nim"]; ?>">
                <!-- nim dari phpmyadmin -->
            </li>
            <li>
                <label for="nama">Nama Mahasiswa    : </label>
                <input type="text" name="nama" id="nama" required value="<?php echo $mhs["nama"]; ?>">
            </li>
            <li>
                <label for="email">Email    : </label>
                <input type="text" name="email" id="email" required value="<?php echo $mhs["email"]; ?>">
            </li>
            <li>
                <label for="jurusan">Jurusan    : </label>
                <input type="text" name="jurusan" id="jurusan" required value="<?php echo $mhs["jurusan"]; ?>">
            </li>
            <li>
                <label for="gambar">Foto Mahasiswa  : </label><br>
                <img src="img/thumb/<?php echo $mhs['gambar']; ?>" width="40"><br>
                <input type="file" name="gambar" id="gambar" required ?> 
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
            
            

        </ul>

    </form>

</body>
</html>
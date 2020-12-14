<?php 
    session_start();


    if(!isset($_SESSION["login"]) ) {
        header("Location: login.php");
        exit;
    }

   require 'koneksi.php';
   $mahasiswa = query("SELECT * FROM mahasiswa");
//    $mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id DESC"); / ORDER BY id DESC menampilkan data dari yg terbaru baru yang ke lama / kalau ASC dari yang terlama

// tombol cari ditekan
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <style>
        .loader {
            width : 100px;
            position: absolute;
            top:115px;
            left: 300px;
            z-index:-1;
            display: none;
        }

        @media print {
            .logout, .tambah, .form-cari {
                display: none;
            }
        }
    </style>
    
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/script.js"></script>

</head>
<body>

<a href="logout.php" class="logout">Logout</a> | <a href="cetak.php" target="_blank">Cetak</a>

<h1>Daftar Mahasiswa</h1>

<a href="tambah.php" class="tambah">Tambah Data Mahasiswa</a>
<br><br>

<form action="" method="post" class="form-cari">

    <input type="text" name="keyword" size="40" autofocus placeholder="masukan keyword pencarian.." autocomplete="off" id="keyword">
    <button type="submit" name="cari" id="tombol-cari">Cari!</button>

    <img src="img/thumb/loader1.gif" class="loader">

</form>

<br>
<div id="container">
<table border="1" cellpadding="10" cellspacing="0">

    <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>Foto Mahasiswa</th>
        <th>NIM</th>
        <th>Nama Mahasiswa</th>
        <th>Email</th>
        <th>Jurusan</th>
    </tr>

    <?php $i = 1; ?>
    <?php foreach( $mahasiswa as $row ) : ?>
    <tr>
    <td><?php echo $i; ?></td>
    <td>
    <!-- //["id"] adalah id pada phpmyadmin -->
        <a href="ubah.php?id=<?php echo $row["id"]; ?>">Ubah</a> |
        <a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick=" return confirm ('yakin anda ingin menghapus data?');">Hapus</a>
    </td>
    <td><img src="img/thumb/<?php echo $row["gambar"]; ?>" width:"50"></td>
    <td><?php echo $row["nim"]; ?></td>
    <td><?php echo $row["nama"]; ?></td>
    <td><?php echo $row["email"]; ?></td>
    <td><?php echo $row["jurusan"]; ?></td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>

</table>
</div>


</body>
</html>
<?php 
sleep(1);
require '../koneksi.php';

$keyword = $_GET["keyword"];


$query = "SELECT * FROM mahasiswa WHERE
    nama LIKE '%$keyword%' OR
    nim LIKE '%$keyword%' OR
    email LIKE '%$keyword%' OR
    jurusan LIKE '%$keyword%'
    ";
$mahasiswa = query($query);


?>

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
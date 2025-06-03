<?php
include '../koneksi.php';
session_start();

$query = "SELECT p.id, u.nama_lengkap, p.tanggal_pesan, p.total_harga, p.status, p.metode_pembayaran 
          FROM pesanan p 
          JOIN pembeli u ON p.id_user = u.id 
          ORDER BY p.created_at DESC";
$result = mysqli_query($conn, $query);
?>

<h2>Manajemen Pesanan</h2>
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nama Pembeli</th>
        <th>Tanggal</th>
        <th>Total</th>
        <th>Status</th>
        <th>Metode</th>
        <th>Aksi</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?= $row['id']; ?></td>
        <td><?= $row['nama_lengkap']; ?></td>
        <td><?= $row['tanggal_pesan']; ?></td>
        <td>Rp<?= number_format($row['total_harga'], 0, ',', '.'); ?></td>
        <td><?= ucfirst($row['status']); ?></td>
        <td><?= $row['metode_pembayaran']; ?></td>
        <td><a href="ubah_status.php?id=<?= $row['id']; ?>">Ubah Status</a></td>
    </tr>
    <?php } ?>
</table>

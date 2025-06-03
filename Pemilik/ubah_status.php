<?php
include '../koneksi.php';
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $status = $_POST['status'];
    $sql = "UPDATE pesanan SET status='$status' WHERE id=$id";
    mysqli_query($conn, $sql);
    header("Location: pesanan.php");
    exit;
}

$query = "SELECT * FROM pesanan WHERE id=$id";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
?>

<h2>Ubah Status Pesanan</h2>
<form method="post">
    <label>Status:</label>
    <select name="status">
        <?php
        $status_options = ['menunggu','diproses','dikirim','selesai','dibatalkan'];
        foreach ($status_options as $option) {
            $selected = $option == $data['status'] ? 'selected' : '';
            echo "<option value='$option' $selected>" . ucfirst($option) . "</option>";
        }
        ?>
    </select>
    <br><br>
    <button type="submit">Simpan</button>
</form>

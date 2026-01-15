<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM posts WHERE id='$id'");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Edit Data</title>
</head>

<body>

  <h2>Edit Post</h2>

  <form action="update.php" method="post">
    <input type="hidden" name="id" value="<?= $row['id']; ?>">

    <input type="text" name="judul" value="<?= $row['judul']; ?>" required><br><br>
    <textarea name="isi" required><?= $row['isi']; ?></textarea><br><br>

    <button type="submit">Update</button>
  </form>

</body>

</html>
<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>

<head>
  <title>CRUD Sederhana</title>
</head>

<body>

  <h2>Data Post</h2>
  <a href="tambah.php">+ Tambah Data</a>
  <br><br>

  <table border="1" cellpadding="10">
    <tr>
      <th>No</th>
      <th>Judul</th>
      <th>Isi</th>
      <th>Aksi</th>
    </tr>

    <?php
    $no = 1;
    $data = mysqli_query($conn, "SELECT * FROM posts");
    while ($row = mysqli_fetch_assoc($data)) {
    ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['judul']; ?></td>
        <td><?= $row['isi']; ?></td>
        <td>
          <a href="edit.php?id=<?= $row['id']; ?>">Edit</a> |
          <a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Hapus data?')">Hapus</a>
        </td>
      </tr>
    <?php } ?>

  </table>

</body>

</html>
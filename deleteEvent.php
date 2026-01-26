<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM promosi WHERE id='$id'"));

unlink("assets/images/acara/" . $data['gambar']);
mysqli_query($conn, "DELETE FROM promosi WHERE id='$id'");

header("location:Agenda.php");

<?php
include '../koneksi.php';

$id = $_POST['id'];
$query = "UPDATE doctor SET status='Approved' WHERE id='$id'";

mysqli_query($conn, $query);

?>

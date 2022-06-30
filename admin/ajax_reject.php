<?php
include '../koneksi.php';

$id = $_POST['id'];
$query = "UPDATE doctor SET status='Rejected' WHERE id='$id'";

mysqli_query($conn, $query);

?>

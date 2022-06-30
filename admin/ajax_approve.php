<<<<<<< HEAD
<?php
include '../koneksi.php';

$id = $_POST['id'];
$query = "UPDATE doctor SET status='Approved' WHERE id='$id'";

mysqli_query($conn, $query);

?>
=======
<?php
include '../koneksi.php';

$id = $_POST['id'];
$query = "UPDATE doctor SET status='Approved' WHERE id='$id'";

mysqli_query($conn, $query);

?>
>>>>>>> a74975e2cd187dbf5def3b7772ef1cc6b3266489

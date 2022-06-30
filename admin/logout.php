<<<<<<< HEAD
<?php
session_start();

if(isset($_SESSION['admin'])){
    unset($_SESSION['admin']);

    header("location:../index.php");
}

=======
<?php
session_start();

if(isset($_SESSION['admin'])){
    unset($_SESSION['admin']);

    header("location:../index.php");
}

>>>>>>> a74975e2cd187dbf5def3b7772ef1cc6b3266489
?>
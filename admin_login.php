<?php
session_start();
include 'koneksi.php';

if(isset($_POST['login'])){

    $nama = $_POST['nama'];
    $pass = $_POST['pass'];

    $error = array();

    if(empty($nama)){
        $error['admin'] = "Enter Username";
    }else if(empty($pass)){
        $error['admin'] = "Enter Password";
    }

    if(count($error)==0){
        $query = "SELECT * FROM admin WHERE 
            nama='$nama' AND pass='$pass'";

        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result)==1){
            echo "<script>alert('You Have Login as an Admin')</script>";

            $_SESSION['admin'] = $nama;

            header("Location:admin/index.php");
        }else{
            echo "<script>alert('Invalid Username of Password')</script>";
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Page</title>
</head>
<body style="background-image: url(https://www.apexplasteringco.com/wp-content/uploads/2014/05/Rockland-Hospital-India.jpg); background-repeat: no-repeat; background-size: cover;">
    <?php
        include 'header.php';
    ?>

    <div style="margin-top: 20px;"></div>

    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 jumbotron">
                <img src="https://logodix.com/logo/1707190.png" style="width: 40%;" class="col-md-12">
                    <form action="" method="post" class="my-2">

                            <div class="alert alert-danger">
                                <?php
                                    if(isset($error['admin'])){

                                        $sh = $error['admin'];

                                        $show = "<h4 class='alert alert-danger>$sh</h4>";

                                    }else{
                                        $show = "";
                                    }

                                    echo $show;
                                ?>
                            </div>

                        <div class="form-group">
                            <label for="">username</label>
                            <input type="text" name="nama" class="form-control" autocomplete="off" placeholder="Enter Username">
                        </div>
                        <div class="for-group">
                            <label for="">Password</label>
                            <input type="password" name="pass" class="form-control">
                        </div>
                        <br>
                        <input type="submit" name="login" class="btn btn-success" value="login">
                    </form>
                </div>
                <div class="cil-md-3"></div>
            </div>
        </div>
    </div>
</body>
</html>
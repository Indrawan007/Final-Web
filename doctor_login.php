<?php

    session_start();
    include 'koneksi.php';

    if(isset($_POST['login'])){
        $nama = $_POST['nama'];
        $pass = $_POST['pass'];

        $error = array();

        $q = "SELECT * FROM doctor WHERE nama='$nama' AND pass='$pass'";
        $qq = mysqli_query($conn, $q);

        $row = mysqli_fetch_array($qq);

        if(empty($nama)){
            $error['login'] = "Enter Username";
        }else if(empty($pass)){
            $error['login'] = "Enter Password";
        }else if($row['status'] == "Pendding"){
            $error['login'] = "Please Wait For the admin to confirm";
        }else if($row['status'] == "Rejected"){
            $error['login'] = "Try again later";
        }

        if(count($error) == 0){
            $query = "SELECT * FROM doctor WHERE nama='$nama' AND pass='$pass'";

            $res = mysqli_query($conn, $query);

            if(mysqli_num_rows($res)){
                echo "<script>alert('Done')</script>";
                $_SESSION['doctor'] =$nama;
                header('Location:doctor/index.php');
            }else{
                echo "<script>alert('Invalid Account')</script>";
            }
        }
    }

    if(isset($error['login'])){
        $l = $error['login'];

        $show = "<h5 class='text-center alert alert-danger'>$l</h5>";
    }else{
        $show = "";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Login Page</title>
</head>
<body style="background-image: url(https://www.apexplasteringco.com/wp-content/uploads/2014/05/Rockland-Hospital-India.jpg); background-repeat: no-repeat; background-size: cover;">
    <?php
        include 'header.php';
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 jumbotron my-3">
                    <h5 class="text-center my-2">Doctor Login</h5>
                        <div>
                            <?php echo $show; ?>
                        </div>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="nama" class="form-control" autocomplete="off" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="pass" class="form-control" autocomplete="off">
                        </div>
                        <input type="submit" name="login" class="btn btn-success" value="Login">

                        <p>I dont have an account <a href="apply.php">Apply Now!!!</a> </p>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>
</html>
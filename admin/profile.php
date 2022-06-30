<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
</head>
<body>
    <?php
        include '../header.php';
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php
                        include 'sidenav.php';
                        include '../koneksi.php';

                        $ad = $_SESSION['admin'];

                        $query = "SELECT * FROM admin WHERE nama='$ad'";

                        $res = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($res)){
                            $nama = $row['nama'];
                            $profil = $row['profil'];
                        }
                    ?>
                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h4><?php echo $nama; ?> Profile</h4>
                                    <?php
                                        if(isset($_POST['update'])){
                                            $profil = $_FILES['profil']['name'];

                                            if(empty($profil)){

                                            }else{
                                                $query = "UPDATE admin SET profil='$profil' WHERE nama='$ad'";

                                                $result = mysqli_query($conn, $query);

                                                if($result){
                                                    move_uploaded_file($_FILES['profil']['tmp_name'], "img/$profil");
                                                }
                                            }
                                        }
                                    ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <?php
                                        echo "<img src='img/$profil' class='col-md-12' style='height: 250px;'>";
                                    ?>
                                    <br><br>
                                    <div class="form-group">
                                        <label for="">UPDATE PROFILE</label>
                                        <input type="file" name="profil" class="form-control">
                                    </div><br>
                                    <input type="submit" name="update" value="UPFATE" class="btn btn-success">
                                </form>
                            </div>
                            <div class="col-md-6">
                                <?php
                                    if(isset($_POST['change'])){
                                        $nama = $_POST['nama'];

                                        if(empty($nama)){

                                        }else{
                                            $query = "UPDATE admin SET nama='$nama' WHERE nama='$ad'";

                                            $res = mysqli_query($conn, $query);

                                            if($res){
                                                $_SESSION['admin'] = $nama;
                                            }
                                        }
                                    }
                                ?>
                                <form action="" method="post">
                                    <label for="">Change Username</label>
                                    <input type="text" name="nama" id="" class="form-control" autocomplete="off"><br>
                                    <input type="submit" name="change" id="" class="btn btn-success" value="Change">
                                </form>

                                <br>

                                <?php
                                    if(isset($_POST['update_pass'])){
                                        $old_pass = $_POST['old_pass'];
                                        $new_pass = $_POST['new_pass'];
                                        $con_pass = $_POST['con_pass'];

                                        $error = array();

                                        $old = mysqli_query($conn, "SELECT * FROM admin WHERE nama='$ad'");

                                        $row = mysqli_fetch_array($old);
                                        $pass = $row['pass'];

                                        if(empty($old_pass)){
                                            $error['p'] = "Enter Old Password";
                                        }else if(empty($new_pass)){
                                            $error['p'] = "Enter New Password";
                                        }else if(empty($con_pass)){
                                            $error['p'] = "Confirm Password";
                                        }else if($old_pass != $pass){
                                            $error['p'] = "Invalid Old Password";
                                        }else if($new_pass != $con_pass){
                                            $error['p'] = "Both Password does not match";
                                        }
                                            if(count($error)==0){
                                                $query = "UPDATE admin SET pass='$new_pass' WHERE nama='$ad'";
    
                                                mysqli_query($conn, $query);
                                            }

                                            
                                        
                                    }

                                    if(isset($error['p'])){
                                        $e = $error['p'];

                                        $show = "<h5 class='text-center alert alert-danger'>$e</h5>";
                                    }else{
                                        $show = "";
                                    }
                                ?>
                                
                                <form action="" method="post">
                                    <h5 class="text-center my-4">Change Password</h5>
                                        <div>
                                            <?php
                                                echo $show;
                                            ?>
                                        </div>
                                    <div class="form-group">
                                        <label for="">Old Password</label>
                                        <input type="password" name="old_pass" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">New Password</label>
                                        <input type="password" name="new_pass" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Confirm Password</label>
                                        <input type="password" name="con_pass" class="form-control">
                                    </div>
                                    <input type="submit" name="update_pass" value="Update Password" class="btn btn-info">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
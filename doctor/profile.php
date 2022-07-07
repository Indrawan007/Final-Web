<?php
session_start();

error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Profile</title>
</head>
<body>
    <?php
        include '../header.php';
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px">
                    <?php
                        include 'sidenav.php';
                        include '../koneksi.php';
                    ?>
                </div>
                <div class="col-md-10">
                    <div class="container-fluid">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php
                                        $doc = $_SESSION['doctor'];
                                        $query = "SELECT * FROM doctor WHERE nama=''";

                                        $res = mysqli_query($conn, $query);

                                        $row = mysqli_fetch_array($res);

                                        if(isset($_POST['upload'])){
                                            $img = $_FILES['img']['nama'];

                                            if(empty($img)){

                                            }else{
                                                $query = "UPDATE doctor SET profile='$img' WHERE nama='$doc'";

                                                $res = mysqli_query($conn, $query);

                                                if($res){
                                                    move_uploaded_file($_FILES['img']['tmp_name'], "img/$img");
                                                }
                                            }
                                        }
                                    ?>

                                    <form action="" method="post" enctype="multipart/form-data">
                                        <?php
                                            echo "<img src='img/".$row['profile']."' style='height:250px;' class='col-md-12 my-3'>";
                                        ?>

                                        <input type="file" name="img" id="" class="form-control my-1">
                                        <input type="submit" name="upload" class="btn btn-success">
                                    </form>
                                    <div class="my-3">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th  colspan="2" class="text-center">Details</th>
                                            </tr>
                                            <tr>
                                                <td>Firstname</td>
                                                <td><?php echo $row['fnama']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Surname</td>
                                                <td><?php echo $row['snama']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td><?php echo $row['email']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Phone No.</td>
                                                <td><?php echo $row['phone']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Gender</td>
                                                <td><?php echo $row['gender']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Country</td>
                                                <td><?php echo $row['country']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Salary</td>
                                                <td><?php echo "$".$row['salary'].""; ?></td>
                                            </tr>
                                        </table>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <h5 class="text-center my2">Change Username</h5>
                                    <?php
                                        if(isset($_POST['change_uname'])){
                                            $uname = $_POST['uname'];

                                            if(empty($uname)){
                                                
                                            }else{
                                                $query = "UPDATE doctor SET username='$uname' WHERE username='$doc'";

                                                $res = mysqli_query($conn, $query);

                                                if($res){
                                                    $_SESSION['doctor'] = $uname;
                                                }
                                            }
                                        }
                                    ?>
                                    <form method="post">
                                        <label for="">Change Username</label>
                                        <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                                        <br>
                                        <input type="submit" name="change_uname" class="btn btn-success" value="Change Username">
                                    </form>
                                    <br><br>

                                    <h5 class="text-center my-2">Change Password</h5>
                                    <?php
                                        if(isset($_POST['change_pass'])){
                                            $old = $_POST['old_pass'];
                                            $new = $_POST['nem_pass'];
                                            $con = $_POST['con_pass'];

                                            $ol = "SELECT * FROM doctor WHERE username='$doc'";
                                            $ols = mysqli_query($conn, $ol);
                                            $row = mysqli_fetch_array($ols);

                                            if($old != $row['pass']){

                                            }else if(empty($new)){

                                            }else if($con != $new){

                                            }else{
                                                $query = "UPDATE doctor SET pass='$new' WHERE username='$doc'";

                                                mysqli_query($conn, $query);
                                            }
                                        }
                                    ?>
                                    <form method="post">
                                        <div class="form-group">
                                            <label for="">Old Password</label>
                                            <input type="password" name="old-pass" class="form-control" autocomplete="off" placeholder="Enter Old Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="">New Password</label>
                                            <input type="password" name="new-pass" class="form-control" autocomplete="off" placeholder="Enter New Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Confirm Password</label>
                                            <input type="password" name="old-pass" class="form-control" autocomplete="off" placeholder="Enter Confirm Password">
                                        </div>
                                        <input type="submit" name="change_pass" class="btn btn-info" value="Change Password">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
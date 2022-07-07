<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DPatient Dashboard</title>
</head>
<body>
    <?php
        include '../header.php';
        include '../koneksi.php'
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php
                        include 'sidenav.php';
                    ?>
                </div>
                <div class="col-md-10">
                    <h5 class="my-3">Patient Dashboard</h5>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3 bg-info mx-2" style="height: 150px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="text-white my-4">My Profile</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="">
                                                <i class="fa fa-user-circle fa-3x my-4" style="color: white;"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="col-md-3 bg-warning mx-2" style="height: 150px;">
                            <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                        <h5 class="text-white my-4">Book Appointment</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="">
                                                <i class="fa fa-calender fa-3x my-4" style="color: white;"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-success mx-2" style="height: 150px;">
                            <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                        <h5 class="text-white my-4">My Invoice</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="">
                                                <i class="fas fa-file-invoice-dollar fa-3x my-4" style="color: white;"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        if(isset($_POST['send'])){
                            $title = $_POST['send'];
                            $message = $_POST['message'];

                            if(empty($title)){

                            }else if(empty($message)){

                            }else{
                                $user = $_SESSION['patient'];

                                $query = "INSERT INTO report(title, message, username, date_send) VALUE('$title','$message','$user',NOW())";

                                $res = mysqli_query($conn, $query);
                            }
                        }
                    ?>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3 jumbotron bg-info my-5">
                                <h5 class="text-center my-2">Send A Report</h5>
                                <form action="" method="post">
                                    <label for="">Title</label>
                                    <input type="text" name="title" class="form-control" autocomplete="off" placeholder="Enter Title of the report">

                                    <label for="">Message</label>
                                    <input type="text" name="message"class="form-control" autocomplete="off" placeholder="Enter Title of the report">

                                    <input type="submit" name="send" value="Send Report" class="btn btn-success my-2">
                                </form>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
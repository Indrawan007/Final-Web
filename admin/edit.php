<<<<<<< HEAD
<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Doctors</title>
</head>
<body>
    <?php
        include '../header.php';
        include '../koneksi.php';
    ?>

    <div class="container-fluid">
        <div class="mcol-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php
                        include 'sidenav.php';
                    ?>
                </div>
                <div class="col-md-10">
                    <h5 class="text-center">Edit Doctors</h5>
                    
                    <?php
                        if(isset($_GET['id'])){
                            $id = $_GET['id'];

                            $query = "SELECT * FROM doctor WHERE id='$id'";
                            $res = mysqli_query($conn, $query);

                            $row = mysqli_fetch_array($res);
                        }
                    ?>

                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="text-center">Doctor Details</h5>

                            <h5 class="my-3">ID : <?php echo $row['id']; ?></h5>
                            <h5 class="my-3">Firstname : <?php echo $row['fnama']; ?></h5>
                            <h5 class="my-3">Surname : <?php echo $row['snama']; ?></h5>
                            <h5 class="my-3">Username : <?php echo $row['nama']; ?></h5>
                            <h5 class="my-3">Email : <?php echo $row['email']; ?></h5>
                            <h5 class="my-3">Phone : <?php echo $row['phone']; ?></h5>
                            <h5 class="my-3">Gender : <?php echo $row['gender']; ?></h5>
                            <h5 class="my-3">Country : <?php echo $row['country']; ?></h5>
                            <h5 class="my-3">Data Registrated : <?php echo $row['data_reg']; ?></h5>
                            <h5 class="my-3">Salary : $<?php echo $row['salary']; ?></h5>
                        </div>
                        <div class="col-md-4">
                            <h5 class="text-center">Update Salary</h5>
                                <?php
                                    if(isset($_POST['update'])){
                                        $salary = $_POST['salary'];

                                        $q = "UPDATE doctor SET salary='$salary' WHERE id='$id'";

                                        mysqli_query($conn, $q);
                                    };
                                ?>

                            <form action="" method="post">
                                <label for="">Enter Doctor's Salary</label>
                                <input type="number" name="salary" class="form-group" autocomplete="off" placeholder="Enter Doctor's Salary" value="<?php echo $row['salary']; ?>">
                                <input type="submit" name="update" class="btn btn-info" value="Update Salary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
=======
<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Doctors</title>
</head>
<body>
    <?php
        include '../header.php';
        include '../koneksi.php';
    ?>

    <div class="container-fluid">
        <div class="mcol-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php
                        include 'sidenav.php';
                    ?>
                </div>
                <div class="col-md-10">
                    <h5 class="text-center">Edit Doctors</h5>
                    
                    <?php
                        if(isset($_GET['id'])){
                            $id = $_GET['id'];

                            $query = "SELECT * FROM doctor WHERE id='$id'";
                            $res = mysqli_query($conn, $query);

                            $row = mysqli_fetch_array($res);
                        }
                    ?>

                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="text-center">Doctor Details</h5>

                            <h5 class="my-3">ID : <?php echo $row['id']; ?></h5>
                            <h5 class="my-3">Firstname : <?php echo $row['fnama']; ?></h5>
                            <h5 class="my-3">Surname : <?php echo $row['snama']; ?></h5>
                            <h5 class="my-3">Username : <?php echo $row['nama']; ?></h5>
                            <h5 class="my-3">Email : <?php echo $row['email']; ?></h5>
                            <h5 class="my-3">Phone : <?php echo $row['phone']; ?></h5>
                            <h5 class="my-3">Gender : <?php echo $row['gender']; ?></h5>
                            <h5 class="my-3">Country : <?php echo $row['country']; ?></h5>
                            <h5 class="my-3">Data Registrated : <?php echo $row['data_reg']; ?></h5>
                            <h5 class="my-3">Salary : $<?php echo $row['salary']; ?></h5>
                        </div>
                        <div class="col-md-4">
                            <h5 class="text-center">Update Salary</h5>
                                <?php
                                    if(isset($_POST['update'])){
                                        $salary = $_POST['salary'];

                                        $q = "UPDATE doctor SET salary='$salary' WHERE id='$id'";

                                        mysqli_query($conn, $q);
                                    };
                                ?>

                            <form action="" method="post">
                                <label for="">Enter Doctor's Salary</label>
                                <input type="number" name="salary" class="form-group" autocomplete="off" placeholder="Enter Doctor's Salary" value="<?php echo $row['salary']; ?>">
                                <input type="submit" name="update" class="btn btn-info" value="Update Salary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
>>>>>>> a74975e2cd187dbf5def3b7772ef1cc6b3266489
</html>
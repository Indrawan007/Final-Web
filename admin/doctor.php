<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Doctors</title>
</head>
<body>
    <?php
        include '../header.php';
        include '../koneksi.php';
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
                    <h5 class="text-center">Total Doctors</h5>
                    <?php
                        $query = "SELECT * FROM doctor WHERE status='Approved' ORDER BY data_reg ASC";

                        $res = mysqli_query($conn, $query);

                        $output = "";

                        $output .="
                            <table class='table table-bordered'>
                                <tr>
                                    <th>ID</th>
                                    <th>Firstname</th>
                                    <th>Surname</th>
                                    <th>Username</th>
                                    <th>Gender</th>
                                    <th>Phone</th>
                                    <th>Country</th>
                                    <th>Salary</th>
                                    <th>Data Registered</th>
                                </tr>
                        ";
                    
                        if(mysqli_num_rows($res) < 1){
                            $output .="
                                <tr>
                                    <td colspan='10' class='text-center'>No Job Request Yet.</td>
                                </tr>
                            ";
                        }
                    
                        while($row = mysqli_fetch_array($res)){
                            $output .="
                                <tr>
                                    <td>".$row['id']."</td>
                                    <td>".$row['fnama']."</td>
                                    <td>".$row['snama']."</td>
                                    <td>".$row['nama']."</td>
                                    
                                    <td>".$row['gender']."</td>
                                    <td>".$row['phone']."</td>
                                    <td>".$row['country']."</td>
                                    <td>".$row['salary']."</td>
                                    <td>".$row['data_reg']."</td>
                                    <td>
                                        <a href='edit.php?id=".$row['id']."'>
                                            <button class='btn btn-info'>Edit</button>
                                        </a>
                                    </td>
                            ";
                        }
                    
                            $output .="
                                    </tr>
                                </table>
                            ";
                    
                            echo $output;
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
include 'koneksi.php';

if(isset($_POST['create'])){
    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $pass = $_POST['pass'];
    $con_pass = $_POST['con_pass'];

    $error = array();

    if(empty($fnama)){
        $error['ac'] = 'Enter Fisrtname';
    }else if(empty($snama)){
        $error['ac'] = 'Enter Surname';
    }else if(empty($unama)){
        $error['ac'] = 'Enter Username';
    }else if(empty($email)){
        $error['ac'] = 'Enter Email Address';
    }else if($gender == ""){
        $error['ac'] = 'Select Your Gender';
    }else if(empty($phone)){
        $error['ac'] = 'Enter Phone Number';
    }else if($country == ""){
        $error['ac'] = 'Select Your Country';
    }else if(empty($pass)){
        $error['ac'] = 'Enter Password';
    }else if($con_pass != $pass){
        $error['ac'] = 'Both Password do not match';
    }

    if(count($error) == 0){
        $query = "INSERT INTO patient(fname, sname, uname, email, gender, phone, country, pass, salary, data_reg, status, profil) VALUE('$fname','$sname','$uname','$email','$gender','$phone','$country','$pass','0', NOW(),'Pendding','patient.jpg')";

        $result = mysqli_query($conn, $query);

        if($result){
            header("Location: patientogin.php");
        }else{
            echo "<script>alert('Failed')</script>";
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
    <title>Create Account</title>
</head>
<body style="background-image: url(img/);background-repeat: no repeat; backgorund-size: cover;">
    <?php
        include 'header.php';
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="com-md-3">

                </div>
                <div class="com-md-6 my-2 jumbotron">
                    <h5 class="text-center text-info my-2">Create Account</h5>

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">Firstname</label>
                            <input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname">
                        </div>
                        <div class="form-group">
                            <label for="">Surname</label>
                            <input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter Surname">
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="Email" class="form-control" autocomplete="off" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="">Phone No.</label>
                            <input type="text" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone Number">
                        </div>
                        <div class="form-group">
                            <label for="">Gender</label>
                            <select name="gender" id="">Select Your Gender
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Country</label>
                            <select name="Country" id="">Select Your Country
                                <option value="USA">USA</option>
                                <option value="Russia">Russia</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="text" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="text" name="con_pass" class="form-control" autocomplete="off" placeholder="Enter Confirm Password">
                        </div>
                        <input type="submit" name="create" value="Create Account" class="btn btn-info">
                        <p>I dont have an account <a href="patientlogin.php">Click Here</a></p>   
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
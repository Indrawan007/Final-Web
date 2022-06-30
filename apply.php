<?php
    include 'koneksi.php';

    if(isset($_POST['apply'])){
        $fnama = $_POST['fnama'];
        $snama = $_POST['snama'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $country = $_POST['country'];
        $pass = $_POST['pass'];
        $con_pass = $_POST['con_pass'];

        $error = array();

        if(empty($fnama)){
            $error['apply'] = 'Enter Fisrtname';
        }else if(empty($snama)){
            $error['apply'] = 'Enter Surname';
        }else if(empty($nama)){
            $error['apply'] = 'Enter Username';
        }else if(empty($email)){
            $error['apply'] = 'Enter Email Address';
        }else if($gender == ""){
            $error['apply'] = 'Select Your Gender';
        }else if(empty($phone)){
            $error['apply'] = 'Enter Phone Number';
        }else if($country == ""){
            $error['apply'] = 'Select Your Country';
        }else if(empty($pass)){
            $error['apply'] = 'Enter Password';
        }else if($con_pass != $pass){
            $error['apply'] = 'Both Password do not match';
        }

        if(count($error) == 0){
            $query = "INSERT INTO doctor(fnama, snama, nama, email, gender, phone, country, pass, salary, data_reg, status, profil) VALUE('$fnama','$snama','$nama','$email','$gender','$phone','$country','$pass','0', NOW(),'Pendding','doctor.jpg')";

            $result = mysqli_query($conn, $query);

            if($result){
                echo "<script>alert('You have Successfully Appled')</script>";

                header("Location: doctor_login.php");
            }else{
                echo "<script>alert('Failed')</script>";
            }
        }
    }

    if(isset($error['apply'])){
        $s = $error['apply'];

        $show = "<h5 class='text-center alert alert-danger'>$s</h5>";
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
    <title>Apply Now!!!</title>
</head>
<body style="background-image: url(https://www.apexplasteringco.com/wp-content/uploads/2014/05/Rockland-Hospital-India.jpg); background-repeat: no-repeat; background-size: cover;">
    <?php
        include 'header.php';
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 my-3 jumbotron">
                    <h5 class="text-center">Apply Now!!!</h5>
                        <div>
                            <?php echo $show; ?>
                        </div>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">Firstname</label>
                            <input type="text" name="fnama" class="form-control" autocomplete="off" placeholder="Enter Firstname" value="<?php if(isset($_POST['fnama'])) echo $_POST['fnama']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Surname</label>
                            <input type="text" name="snama" class="form-control" autocomplete="off" placeholder="Enter Surname" value="<?php if(isset($_POST['snama'])) echo $_POST['snama']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="nama" class="form-control" autocomplete="off" placeholder="Enter Username" value="<?php if(isset($_POST['nama'])) echo $_POST['nama']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control" autocomplete="off" placeholder="Enter Email Address" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Select Gender</label>
                            <select name="gender" id="" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone Number" value="<php if(isset($_POST['phone''[)) echo $_POST['phone']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Select Country</label>
                            <select name="country" id="" class="form-control">
                                <option value="">Select Country</option>
                                <option value="Rusia">Rusia</option>
                                <option value="USA">USA</option>
                                <option value="China">China</option>
                                <option value="South Korea">South Korea</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Enter Confirm Password">
                        </div>

                        <input type="submit" name="apply" value="Apply Now" class="btn btn-success">
                        <p>I already have an account <a href="doctor_login.php">Click Here</a></p>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>
</html>
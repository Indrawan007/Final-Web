<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script type="text/javascript" src="<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-info bg-info">
        <h5 class="text-white">Hospital Management System</h5>

        <div class="mr-auto"></div>

        <ul class="navbar-nav">
            <?php
            
                if(isset($_SESSION['admin'])){
                  
                    $user = $_SESSION['admin'];
                        echo '
                        <li class="nav-item"><a href="" class="nav-link text-white">'.$user.'</a></li>
                        <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>';
                }else if(isset($_SESSION['doctor'])){
                    $user = $_SESSION['doctor'];
                        echo '
                        <li class="nav-item"><a href="" class="nav-link text-white">'.$user.'</a></li>
                        <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>';
                }else if(isset($_SESSION['patient'])){
                    $user = $_SESSION['patient'];
                        echo '
                        <li class="nav-item"><a href="" class="nav-link text-white">'.$user.'</a></li>
                        <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>';
                }else{
                    echo '
                    <li class="nav-item"><a href="index.php" class="nav-link text-white">Home</a></li>
                    <li class="nav-item"><a href="admin_login.php" class="nav-link text-white">Admin</a></li>
                    <li class="nav-item"><a href="doctor_login.php" class="nav-link text-white">Doctor</a></li>
                    <li class="nav-item"><a href="patientlogin.php" class="nav-link text-white">Patient</a></li>';
                }
            
            ?>
        </ul>
    </nav>
</body>
</html>
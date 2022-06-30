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
    <title>Job Request</title>
</head>
<body>
    <?php
        include '../header.php';
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="co-md-12" style="margin-left: -30px;">
                    <?php
                        include 'sidenav.php';
                    ?>
                </div>
                <div class="col-md-10">
                    <h5 class="text-center my">Job Request</h5>

                    <div id="show"></div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){

            show();
            function show(){
                $.ajax({
                    url:"ajax_job_request.php",
                    method:"POST",
                    success:function(data){
                        $("#show").html(data);
                    }
                });
            }

                $(document).on('click','.approve',function(){
                    var id=$(this).attr("id");
                    
                    $.ajax({
                        url:"ajax_approve.php",
                        method:"POST",
                        data:{id:id},
                        success:function(data){
                            show();
                        }
                    });
                });

                $(document).on('click','.reject',function(){
                    var id=$(this).attr("id");
                    
                    $.ajax({
                        url:"ajax_reject.php",
                        method:"POST",
                        data:{id:id},
                        success:function(data){
                            show();
                        }
                    });
                });
        });
    </script>
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
    <title>Job Request</title>
</head>
<body>
    <?php
        include '../header.php';
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="co-md-12" style="margin-left: -30px;">
                    <?php
                        include 'sidenav.php';
                    ?>
                </div>
                <div class="col-md-10">
                    <h5 class="text-center my">Job Request</h5>

                    <div id="show"></div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){

            show();
            function show(){
                $.ajax({
                    url:"ajax_job_request.php",
                    method:"POST",
                    success:function(data){
                        $("#show").html(data);
                    }
                });
            }

                $(document).on('click','.approve',function(){
                    var id=$(this).attr("id");
                    
                    $.ajax({
                        url:"ajax_approve.php",
                        method:"POST",
                        data:{id:id},
                        success:function(data){
                            show();
                        }
                    });
                });

                $(document).on('click','.reject',function(){
                    var id=$(this).attr("id");
                    
                    $.ajax({
                        url:"ajax_reject.php",
                        method:"POST",
                        data:{id:id},
                        success:function(data){
                            show();
                        }
                    });
                });
        });
    </script>
</body>
>>>>>>> a74975e2cd187dbf5def3b7772ef1cc6b3266489
</html>
<?php 
    session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient dashboard</title>
</head>
<body>
<?php 
    include("../includes/header.php");
    include("../includes/connection.php");
    ?>

<div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                <?php 
                    include("sidenav.php");
                ?>
                </div>
                <div class="col-md-10">
                    <div class="container-fluid">
                        <h5>Patient's Dashboard</h5>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3 my-2 bg-info mx-2" style="height: 150px;">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h5 class="text-white my-4">my profile</h5>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="profile.php">
                                                    <i class="fa fa-user-circle fa-3x my-4" style="color: white;"></i>
                                                </a>    
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 my-2 bg-warning mx-2" style="height: 150px;">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h5 class="text-white my-4">Book Appointment</h5>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="appointment.php">
                                                    <i class="fa fa-calendar fa-3x my-4" style="color: white;"></i>
                                                </a>    
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 my-2 bg-success mx-2" style="height: 150px;">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h5 class="text-white my-4">my Invoice</h5>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="invoice.php">
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
                            $title=$_POST['title'];
                            $message = $_POST['message'];

                            if(empty($title)){

                            }else if(empty($message)){

                            }else{
                                $user=$_SESSION['patient'];
                                $query="INSERT INTO report(title,messages,username,date_send) VALUES('$title','$message','$user',NOW())";
                                $res= mysqli_query($connect,$query);
                                if($res){
                                    echo"<script>alert('Report sent')</script>";
                                }
                            }
                        }
                        ?>
                        <div class="col-md-12">
                            
                            <div class="row">'
                                <div class="col-md-3"></div>
                                <div class="col-md-6 jumbotron bg-secondary my-5">
                                    <h5 class="text-center">Send a report</h5>
                                    <form action="" method="POST">
                                        <label for="">Title</label>
                                        <input type="text" name="title" autocomplete="off" class="form-control" placeholder="Enter title">

                                        <label for=""> Message</label>
                                        <input type="text" name="message" autocomplete="off" class="form-control" placeholder="Enter message">

                                        <input type="submit" name="send" value="Send Report" class="btn btn-success my-3">
                                    </form>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
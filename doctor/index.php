<?php 
    session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor dashboard</title>
</head>
<body>
    <?php 
    include("../includes/header.php");
    include("../includes/connection.php")
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
                        <h5>Doctor's Dashboard</h5>
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
                                                <?php 
                                                $patient =mysqli_query($connect, "SELECT * FROM patient");
                                                $num3 =mysqli_num_rows($patient);
                                                ?>
                                                <h5 class="text-white my-2" style="font-size: 30px;"><?php echo $num3; ?></h5>
                                                <h5 class="text-white">Total</h5>
                                                <h5 class="text-white">Patient</h5>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="patient.php">
                                                    <i class="fa fa-procedures fa-3x my-4" style="color: white;"></i>
                                                </a>    
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 my-2 bg-success mx-2" style="height: 150px;">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <?php 
                                                $app =mysqli_query($connect, "SELECT * FROM appointment WHERE status_s='Pending'");
                                                $num6 =mysqli_num_rows($app);
                                                ?>
                                                <h5 class="text-white my-2" style="font-size: 30px;"><?php echo $num6; ?></h5>
                                                <h5 class="text-white">Total</h5>
                                                <h5 class="text-white">Appointment</h5>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="appointment.php">
                                                    <i class="fa fa-calendar fa-3x my-4" style="color: white;"></i>
                                                </a>    
                                            </div>
                                        </div>
                                    </div>
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
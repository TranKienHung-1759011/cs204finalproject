<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                    <h4 class="my-2">Admin Dashboard</h4>

                    <div class="col-md-12 my-1">
                        <div class="row">

                            <div class="col-md-3 bg-success mx-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <?php
                                                $ad = mysqli_query($connect,"SELECT * FROM admins");
                                                $num= mysqli_num_rows($ad);
                                            ?>

                                            <h5 class="my-2 text-white" style="font-size: 30px;">
                                                <?php
                                                    echo $num; 
                                                ?>
                                            </h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Admin</h5>
                                        </div>

                                        <div class="col-md-4">
                                            <a href="admin.php"><i class="fas fa-users-cog fa-3x my-4" style="color: white;"></i></a>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 bg-info mx-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <?php 
                                            $doctor =mysqli_query($connect, "SELECT * FROM doctors WHERE doctorstatus='Approved'");
                                            $num2 =mysqli_num_rows($doctor);
                                            ?>
                                            <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num2; ?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Doctor</h5>
                                        </div>

                                        <div class="col-md-4">
                                            <a href="doctor.php"><i class="fas fa-user-md fa-3x my-4" style="color: white;"></i></a>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 bg-warning mx-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <?php 
                                            $patient =mysqli_query($connect, "SELECT * FROM patient");
                                            $num3 =mysqli_num_rows($patient);
                                            ?>
                                            <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num3; ?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Patient</h5>
                                        </div>

                                        <div class="col-md-4">
                                            <a href="patient.php"><i class="fas fa-procedures fa-3x my-4" style="color: white;"></i></a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3 bg-danger mx-2 my-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <?php 
                                            $report =mysqli_query($connect, "SELECT * FROM report");
                                            $num4 =mysqli_num_rows($report);
                                            ?>
                                            <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num4; ?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Report</h5>
                                        </div>

                                        <div class="col-md-4">
                                            <a href="report.php"><i class="fas fa-flag fa-3x my-4" style="color: white;"></i></a>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 bg-secondary mx-2 my-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <?php
                                            $job =mysqli_query($connect,"SELECT * FROM doctors WHERE doctorstatus='Pending'");
                                            $num1=mysqli_num_rows($job);

                                            ?>
                                            <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num1?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Job request</h5>
                                        </div>

                                        <div class="col-md-4">
                                            <a href="job_request.php"><i class="fas fa-layer-plus fa-3x my-4" style="color: white;"></i></a>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 bg-primary mx-2 my-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                        <?php
                                            $income =mysqli_query($connect,"SELECT sum(amount_paid) AS profit FROM income");
                                            $row=mysqli_fetch_array($income);
                                            $num5 = $row['profit'];
                                            ?>
                                            <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num5?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Income</h5>
                                        </div>

                                        <div class="col-md-4">
                                            <a href="income.php"><i class="fas fa-money-check-alt fa-3x my-4" style="color: white;"></i></a>
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
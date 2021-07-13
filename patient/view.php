<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Invoice</title>
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
                    <h5 class="text-center">View Invoice</h5>
                    <?php 
                        if(isset($_GET['id'])){
                            $id=$_GET['id'];
                            $query ="SELECT * FROM income WHERE id='$id'";
                            $res=mysqli_query($connect,$query);
                            $row =mysqli_fetch_array($res);
                        }
                    ?>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <th class="text-center" colspan="2">Details</th>
                                    </tr>
                                    <tr>
                                        <td>Doctor</td>
                                        <td><?php echo $row['doctor']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Patient</td>
                                        <td><?php echo $row['patient']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Date discharge</td>
                                        <td><?php echo $row['date_discharge']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Amount paid</td>
                                        <td><?php echo $row['amount_paid']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td><?php echo $row['descriptions']; ?></td>
                                    </tr>
                                    
                                </table>
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
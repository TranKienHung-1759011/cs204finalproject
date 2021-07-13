<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check patient appointment</title>
</head>
<body>
    <?php
    include("../includes/connection.php");
    include("../includes/header.php");
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
                    <h5 class="text-center my-2">Total Appointment</h5>
                    <?php 
                        if(isset($_GET['id'])){
                            $id=$_GET['id'];
                            $query ="SELECT * FROM appointment WHERE id='$id'";
                            $res=mysqli_query($connect,$query);
                            $row =mysqli_fetch_array($res);
                        }
                    ?>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <th colspan="2" class="text-center">Appointment Details</th>
                                    </tr>
                                    <tr>
                                        <td>Firstname</td>
                                        <td><?php echo $row['firstname'] ?></td>
                                    </tr>

                                    <tr>
                                        <td>Surname</td>
                                        <td><?php echo $row['surname'] ?></td>
                                    </tr>

                                    <tr>
                                        <td>Gender</td>
                                        <td><?php echo $row['gender'] ?></td>
                                    </tr>

                                    <tr>
                                        <td>Phone</td>
                                        <td><?php echo $row['phone'] ?></td>
                                    </tr>

                                    <tr>
                                        <td>Appointment Date</td>
                                        <td><?php echo $row['appointment_date'] ?></td>
                                    </tr>

                                    <tr>
                                        <td>Symptoms</td>
                                        <td><?php echo $row['symptoms'] ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <?php
                                if(isset($_POST['send'])){
                                    $fee=$_POST['fee'];
                                    $des=$_POST['des'];
                                    if(empty($fee)){

                                    }else if(empty($des)){

                                    }else{
                                        $doc = $_SESSION['doctor'];
                                        $fname=$row['firstname'];
                                        $query="INSERT INTO income(doctor,patient,date_discharge,amount_paid,descriptions) VALUES('$doc','$fname',NOW(),'$fee','$des')";
                                        $res=mysqli_query($connect,$query);
                                        if($res){
                                            echo "<script>alert('You sent an invoice')</script>";
                                            mysqli_query($connect,"UPDATE appointment SET status_s='Discharged' WHERE id='$id'");
                                        }
                                    }
                                }
                                ?>
                                <h5 class="text-center my-1">Invoice</h5>
                                <form action="" method="POST">
                                    <label for="">Fee</label>
                                    <input type="number" name="fee" class="form-control" autocomplete="off" placeholder="Enter fee">

                                    <label for="">Description</label>
                                    <input type="text" name="des" class="form-control" autocomplete="off" placeholder="Enter Description">

                                    <input type="submit" name="send" class="btn btn-success my-2" value="Send">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
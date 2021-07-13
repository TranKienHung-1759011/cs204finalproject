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
                    <h5 class="text-center my-2">My Invoice</h5>
                    <?php 
                        $pat=$_SESSION['patient'];
                        $query="SELECT * FROM patient WHERE patientusername='$pat'";
                        $res=mysqli_query($connect,$query);
                        $row = mysqli_fetch_array($res);
                        $fname=$row['firstname'];
                        $query2=mysqli_query($connect,"SELECT * FROM income WHERE patient ='$fname'");
                        $output ="";
                        $output .="
                        <table class='table table-bordered'>
                            <tr>
                                <th>ID</th>
                                <th>Doctor</th>
                                <th>Patient</th>
                                <th>Date Discharge</th>
                                <th>Amount paid</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        ";

                        if(mysqli_num_rows($query2)<1){
                            $output .="
                                    <tr>
                                        <td colspan='10' class='text-center'>NO invoice Yet.</td>
                                    </tr>
                            ";
                        }
                        
                        while($row=mysqli_fetch_array($query2)){
                            $output.="
                                    <tr>
                                        <td>".$row['id']."</td>
                                        <td>".$row['doctor']."</td>  
                                        <td>".$row['patient']."</td>  
                                        <td>".$row['date_discharge']."</td>
                                        <td>".$row['amount_paid']."</td>  
                                        <td>".$row['descriptions']."</td>  
                                        <td>
                                            <a href='view.php?id=".$row['id']."'>
                                                <button class='btn btn-info'>View</button>
                                            </a>
                                        </td> 
                            ";
                        }
                        
                        $output.="
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